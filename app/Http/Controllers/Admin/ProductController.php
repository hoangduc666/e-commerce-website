<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Repositories\Contracts\AttributeRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $productRepository;


    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
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
            $data = $request->only(['category_id', 'name', 'price', 'description', 'quantity','slug']);
            $product = $this->productRepository->insert($data);

            $selectedAttributes = $request->input('attributes');
            //hàm attach thêm các thuộc tính cho sản phẩm
            $product->attributes()->attach($selectedAttributes);

            $selectedDiscounts = $request->input('discounts');
            $product->discounts()->attach($selectedDiscounts);

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
        $categories = Category::all();
        $attributes = $product->attributes;
        $slugs = $product->slug;
        $discounts = $product->discounts;

        return view('admins.product.edit', compact('product', 'categories','attributes','slugs','discounts'));
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->only(['category_id', 'name', 'price', 'description', 'quantity','slug']);
        try {
            DB::beginTransaction();
            $product = $this->productRepository->update($id, $data);

            $selectAttribute = $request->input('attributes');
            //hàm sync là để gán giá trị cho product
           $product->attributes()->sync($selectAttribute);

            $selectDiscounts = $request->input('discounts');
            //hàm sync là để gán giá trị cho product
            $product->discounts()->sync($selectDiscounts);

            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()], $exception->getCode());
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
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


}
