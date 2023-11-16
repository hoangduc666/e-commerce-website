<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function list()
    {
        $sort = request('sort', 'asc');
        $products = $this->productRepository->queryList(['price' => request('price'), 'sort' => $sort])->whereNull('parent_id')->paginate(8);
        return view('client.product.list', compact('products'));
    }

    public function detail(Request $request, $slug)
    {
        $product = $this->productRepository->detailBySlug($slug);
        if (!empty($request->storage) && !empty($request->colors)) {
            $a = Product::whereHas('attributes', function ($q) use ($request) {
                $q->where(function ($query) use ($request) {
                    $query->where('name', 'storage')->where('value', $request->storage);
                })
                    ->orWhere(function ($query) use ($request) {
                    $query->where('name', 'colors')->where('value', $request->colors);
                });
            })->get();
            dd($a);
        }


        $products = $this->productRepository->getParentProductAttribute($product->parent_id); // lẩy ra parent_id các sp tương tư
        return view('client.product.detail', compact('product', 'products'));
    }

    public function checkProductStock($slug) {
        $product = Product::where('slug', $slug)->firstOrFail();
        $hasStock = false;

        if (is_null($product->parent_id)) {
            $hasStock = Product::where('parent_id' , $product->id)
                ->where('quantity_in_stock', '>', 0)
                ->exists();
        }
        return response()->json(['hasStock' => $hasStock]);
    }
}

