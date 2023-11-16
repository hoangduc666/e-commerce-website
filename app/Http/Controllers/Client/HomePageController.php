<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Contracts\BannerRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomePageController extends Controller
{
    protected $productRepository;
    protected $bannerRepository;
    protected $categoryRepository;
    public function __construct(
        ProductRepositoryInterface $productRepository,
        BannerRepositoryInterface $bannerRepository,
        CategoryRepositoryInterface $categoryRepository,
    )
    {
        $this->productRepository = $productRepository;
        $this->bannerRepository = $bannerRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index(){
        $sort = request('sort', 'asc');
        $products = $this->productRepository->queryList(['price' => request('price'), 'sort' => $sort])->where('parent_id','<>', null)->paginate(8);
        $banners = $this->bannerRepository->queryList([])->get();
        $categories = $this->categoryRepository->queryList(['parent_id_null'=> true])->get();
        foreach ($categories as $category) {
            $category->products_sum_quantity = $this->calculateQuantity($category);
        }
            return view('client.home-page.index',compact('products','banners','categories'));

    }


    public function changeLanguage($locale)
    {
        App::setLocale($locale);
        Session::put('locale', $locale);
        return redirect()->back();

    }
    protected function calculateQuantity($category)
    {
        $totalQuantity = $category->products->sum('quantity');

        foreach ($category->childrens as $child) {
            $totalQuantity = $totalQuantity + $this->calculateQuantity($child);
        }

        return $totalQuantity;
    }

    public function showCheckout(){
        return view('client.checkouts.checkout');
    }

    public function showContact(){
        return view('client.contacts.contact');
    }
}

