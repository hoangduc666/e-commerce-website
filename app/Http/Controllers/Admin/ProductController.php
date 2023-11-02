<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Repositories\Contracts\AttributeRepositoryInterface;
<<<<<<< HEAD
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Carbon\Carbon;
=======
use App\Repositories\Contracts\ProductRepositoryInterface;
>>>>>>> dece221f309a6888873a1349df77751a0356c316
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $productRepository;
<<<<<<< HEAD
    protected $categoryRepository;


    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
=======


    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
>>>>>>> dece221f309a6888873a1349df77751a0356c316
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
<<<<<<< HEAD
            $data = $request->only([
                'category_id','parent_id',
                'name', 'price',
                'description', 'quantity',
                'slug','expiration_date'
            ]);

            $product = $this->productRepository->insert($data);



=======
            $data = $request->only(['category_id', 'name', 'price', 'description', 'quantity','slug']);
            $product = $this->productRepository->insert($data);

>>>>>>> dece221f309a6888873a1349df77751a0356c316
            $selectedAttributes = $request->input('attributes');
            //hàm attach thêm các thuộc tính cho sản phẩm
            $product->attributes()->attach($selectedAttributes);

<<<<<<< HEAD

            $selectedDiscounts = $request->input('discounts');
            $discounts = [];

            if(!empty($selectedDiscounts)){
                foreach ($selectedDiscounts as $key => $selectedDiscount){
                    $discounts[$selectedDiscount] = [
                        'expiration_date' => Carbon::parse($data['expiration_date'][$key])->format('Y-m-d') ,
                    ];
                }
            }
//            dd($discounts,$request->all());
            $product->discounts()->sync($discounts);

//            dd($request->all());
=======
            $selectedDiscounts = $request->input('discounts');
            $product->discounts()->attach($selectedDiscounts);

>>>>>>> dece221f309a6888873a1349df77751a0356c316
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
<<<<<<< HEAD
        $categories = $this->categoryRepository->queryList([])->get();
        $attributes = $product->attributes;
        $discounts = $product->discounts;
        $expirationDates = $product->discounts->pluck('pivot.expiration_date')->map(function ($date){
            return Carbon::parse($date)->format('m/d/Y');
        });

//        dd($expirationDates);

        return view('admins.product.edit', compact('product', 'categories','attributes','discounts','expirationDates'));
=======
        $categories = Category::all();
        $attributes = $product->attributes;
        $slugs = $product->slug;
        $discounts = $product->discounts;

        return view('admins.product.edit', compact('product', 'categories','attributes','slugs','discounts'));
>>>>>>> dece221f309a6888873a1349df77751a0356c316
    }

    public function update(ProductRequest $request, $id)
    {
<<<<<<< HEAD
        $data = $request->only([
            'category_id','parent_id',
            'name', 'price',
            'description', 'quantity',
            'slug','expiration_date'
        ]);
=======
        $data = $request->only(['category_id', 'name', 'price', 'description', 'quantity','slug']);
>>>>>>> dece221f309a6888873a1349df77751a0356c316
        try {
            DB::beginTransaction();
            $product = $this->productRepository->update($id, $data);

            $selectAttribute = $request->input('attributes');
            //hàm sync là để gán giá trị cho product
<<<<<<< HEAD
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


=======
           $product->attributes()->sync($selectAttribute);

            $selectDiscounts = $request->input('discounts');
            //hàm sync là để gán giá trị cho product
            $product->discounts()->sync($selectDiscounts);
>>>>>>> dece221f309a6888873a1349df77751a0356c316

            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
<<<<<<< HEAD
            return response()->json(['error' => $exception->getMessage()],500);
=======
            return response()->json(['error' => $exception->getMessage()], $exception->getCode());
>>>>>>> dece221f309a6888873a1349df77751a0356c316
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
<<<<<<< HEAD
            $product = $this->productRepository->findOrFail($id);
            $product->discounts()->detach();
            $product->attributes()->detach();
=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316
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


<<<<<<< HEAD
    public function getAllProduct(Request $request){
        $data = [
          'search' => $request->input(['search'])
        ];

        $product = $this->productRepository->queryList($data)->whereNull('parent_id')->select('id','name')->get();
        return response()->json($product);
    }

    public function copy($id){
        $product = $this->productRepository->edit($id);
        $categories = $this->categoryRepository->queryList([])->get();
        $attributes = $product->attributes;
        $discounts = $product->discounts;
        $expirationDates = $product->discounts->pluck('pivot.expiration_date')->map(function ($date){
            return Carbon::parse($date)->format('m/d/Y');
        });

//        dd($expirationDates);

        return view('admins.product.copy',compact('product', 'categories','attributes','discounts','expirationDates'));
    }
=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316
}
