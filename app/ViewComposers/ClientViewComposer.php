<?php
<<<<<<< HEAD

namespace App\ViewComposers;

use App\Repositories\Contracts\CategoryRepositoryInterface;
=======
namespace App\ViewComposers;

use App\Repositories\Contracts\AttributeRepositoryInterface;
use App\Repositories\Contracts\BannerRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Str;
>>>>>>> dece221f309a6888873a1349df77751a0356c316
use Illuminate\View\View;

class ClientViewComposer
{
    /** Binding data to view
     *
<<<<<<< HEAD
     * @param View $view
=======
     * @param  View  $view
>>>>>>> dece221f309a6888873a1349df77751a0356c316
     *
     * @return View
     * @throws \Exception
     * */
    protected $categoryRepository;

<<<<<<< HEAD
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
=======
    protected $productRepository;
    protected $attributeRepository;

    protected $bannerRepository;

    public function __construct(
        CategoryRepositoryInterface  $categoryRepository,
        ProductRepositoryInterface   $productRepository,
        AttributeRepositoryInterface $attributeRepository,
        BannerRepositoryInterface    $bannerRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
        $this->bannerRepository = $bannerRepository;
>>>>>>> dece221f309a6888873a1349df77751a0356c316
    }


    public function compose(View $view)
    {
<<<<<<< HEAD
        $categories = $this->categoryRepository->queryList(['parent_id_null' => true])->get();
        $view->with('categories', $categories);
=======
        //hàm with('children') nạp danh mục con cho mỗi danh mục cha

        $categories = $this->categoryRepository->queryList(['parent_id_null'=> true])->get();
        foreach ($categories as $category) {
            $category->products_sum_quantity = $this->calculateQuantity($category);
        }

        $sort = request('sort', 'asc');
        $products = $this->productRepository->queryList(['price' => request('price'), 'sort' => $sort])->paginate(8);

        $attributes = $this->attributeRepository->queryList([])->get();

        $banners = $this->bannerRepository->queryList([])->get();



        //viết theo kiểu đệ quy tìm danh mục con trong danh mục con
        $menu = [];
        foreach ($categories as $category){
            if (count($category->childrens ) > 0){

              $menu[Str::slug($category->name)] =  $this->childs($category->childrens);

            }
            else {
                $menu[Str::slug($category->name)] = $category->name;
            }
        }
        $view->with('categories', $categories);
        $view->with('products', $products);
        $view->with('attributes', $attributes);
        $view->with('banners', $banners);
    }

    public function childs($categories){
        $menus = [];
        foreach ($categories as $category){

            if (count($category->childrens ) > 0){
                $menus[Str::slug($category->name)] =  $this->childs($category->childrens);
            }
            else {
                $menus[Str::slug($category->name)] = $category->name;
            }
        }
        return $menus;
    }

    public function calculateQuantity($category)
    {
        $totalQuantity = $category->products->sum('quantity');

        foreach ($category->childrens as $child) {
            $totalQuantity = $totalQuantity + $this->calculateQuantity($child);
        }

        return $totalQuantity;
>>>>>>> dece221f309a6888873a1349df77751a0356c316
    }


}
