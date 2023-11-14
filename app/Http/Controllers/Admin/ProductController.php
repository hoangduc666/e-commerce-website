<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Contracts\AttributeRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\MediaRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;

    protected $mediaRepository;


    public function __construct(
        ProductRepositoryInterface  $productRepository,
        CategoryRepositoryInterface $categoryRepository,
        MediaRepositoryInterface    $mediaRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->mediaRepository = $mediaRepository;
    }

    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admins.product.list');
    }

    public function create()
    {
        return view('admins.product.create');
    }

    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only([
                'category_id', 'parent_id',
                'name', 'price',
                'description', 'quantity',
                'slug', 'expiration_date',
                'alt_text'
            ]);

            $product = $this->productRepository->insert($data);
            $paths = $request->input('image_path');
            if (is_array($paths) || is_object($paths)){
                $this->insertImageMulti($product->id, $paths);
            }
            $selectedAttributes = $request->input('attributes');
            //hàm attach thêm các thuộc tính cho sản phẩm
            $product->attributes()->attach($selectedAttributes);

            $selectedDiscounts = $request->input('discounts');
            $discounts = [];

            if (!empty($selectedDiscounts)) {
                foreach ($selectedDiscounts as $key => $selectedDiscount) {
                    $discounts[$selectedDiscount] = [
                        'expiration_date' => Carbon::parse($data['expiration_date'][$key])->format('Y-m-d'),
                    ];
                }
            }
            $product->discounts()->sync($discounts);
            DB::commit();
            return redirect()->route('product.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()], 500);

        }
    }

    public function edit($id)
    {
        $product = $this->productRepository->edit($id);
        $categories = $this->categoryRepository->queryList([])->get();
        $attributes = $product->attributes;
        $discounts = $product->discounts;
        $paths = $product->media->pluck('path','id');
        $expirationDates = $product->discounts->pluck('pivot.expiration_date')->map(function ($date) {
            return Carbon::parse($date)->format('m/d/Y');
        });

        return view('admins.product.edit', compact(
            'product', 'categories',
            'attributes', 'discounts',
            'expirationDates', 'paths',
        ));
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->only([
            'category_id', 'parent_id',
            'name', 'price',
            'description', 'quantity',
            'slug', 'expiration_date',
            'alt_text',
        ]);
        try {
            DB::beginTransaction();
            $product = $this->productRepository->update($id, $data);
            $paths = $request->input('image_path');
            if (is_array($paths) || is_object($paths)){
                $this->insertImageMulti($product->id, $paths);
            }
            $selectAttribute = $request->input('attributes');
            //hàm sync là để gán giá trị cho product
            $product->attributes()->sync($selectAttribute);

            $selectDiscounts = $request->input('discounts');
            $discounts = [];

            if (!empty($selectDiscounts)) {
                foreach ($selectDiscounts as $key => $selectDiscount) {
                    if (!empty($data['expiration_date'][$key])) {
                        $discounts[$selectDiscount]['expiration_date'] = Carbon::parse($data['expiration_date'][$key])->format('Y-m-d');
                    }
                }
            }

            $product->discounts()->sync($discounts);

            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $product = $this->productRepository->findOrFail($id);
            $product->discounts()->detach();
            $product->attributes()->detach();
            $this->productRepository->delete($id);
            DB::commit();
            return response()->json(['success' => 'Thành công'], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()], $exception->getCode());
        }
    }

    public function changeStatus($id)
    {
        try {
            DB::beginTransaction();
            $this->productRepository->changeStatus($id);
            DB::commit();
            return response()->json(['success' => 'Thành công'], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()], $exception->getCode());
        }
    }


    public function getAllProduct(Request $request)
    {
        $data = [
            'search' => $request->input(['search'])
        ];

        $product = $this->productRepository->queryList($data)->whereNull('parent_id')->select('id', 'name')->get();
        return response()->json($product);
    }

    public function copy($id)
    {
        $product = $this->productRepository->edit($id);
        $categories = $this->categoryRepository->queryList([])->get();
        $attributes = $product->attributes;
        $paths = $product->media->pluck('path','id');
        $discounts = $product->discounts;

        $expirationDates = $product->discounts->pluck('pivot.expiration_date')->map(function ($date) {
            return Carbon::parse($date)->format('m/d/Y');
        });

        return view('admins.product.copy', compact('product', 'categories', 'attributes', 'discounts', 'expirationDates','paths'));
    }

    protected function insertImageMulti($id, $paths)
    {
        $dataMedias = [];
        foreach ($paths as $path) {
            $dataMedias[] = ['mediaable_id' => $id, 'mediaable_type' => Product::class, 'path' => $path];
        }

        $this->mediaRepository->insertMulti($dataMedias);

    }


}
