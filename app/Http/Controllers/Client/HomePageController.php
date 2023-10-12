<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){
        return view('client.home-page.index');
    }

    public function show(){
        return view('client.product.list');
    }

    public function showDetail(){
        return view('client.product.detail');
    }

    public function showCart(){
        return view('client.checkouts.cart');
    }

    public function showCheckout(){
        return view('client.checkouts.checkout');
    }

    public function showContact(){
        return view('client.contacts.contact');
    }
}

