<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function showCart(){
        return view('client.checkouts.cart');
    }
    public function addProductCart($slug)
    {
        $product = $this->productRepository->detailBySlug($slug);
        $cart = session()->get('cart', []);
        $quantity = request()->get('quantity');
        if(isset($cart[$slug])) {
            $cart[$slug]['quantity']+= $quantity;
        } else {
            $cart[$slug] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->media,
                "alt_text" => $product->alt_text,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
        }
    }

    public function deleteProduct(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Sản phẩm đã được xoá thành công.');
        }
    }
}
