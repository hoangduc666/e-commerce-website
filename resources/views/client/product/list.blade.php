@extends('client.layout.index')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span>
                </h5>
                <div class="bg-light p-4 mb-30">
                    <form action="{{ route('product.show') }}">
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" name="price" class="custom-control-input"
                                   @if(empty(request('price'))) value="" checked @endif id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" name="price" class="custom-control-input"
                                   @if(request('price') =='0-100') checked @endif  id="price-1" value="0-100">
                            <label class="custom-control-label" for="price-1">$0 - $100</label>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" name="price" class="custom-control-input" id="price-2"
                                   @if(request('price') =='100-500') checked @endif  value="100-500">
                            <label class="custom-control-label" for="price-2">$100 - $500</label>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" name="price" class="custom-control-input" id="price-3"
                                   @if(request('price') =='500-1000') checked @endif  value="500-1000">
                            <label class="custom-control-label" for="price-3">$500 - $1000</label>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" name="price" class="custom-control-input" id="price-4"
                                   @if(request('price') =='1000') checked @endif  value="1000">
                            <label class="custom-control-label" for="price-4">$1000+</label>
                        </div>
                        <button class="btn btn-outline-primary">Search</button>
                    </form>
                </div>
                <!-- Price End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                            data-toggle="dropdown">Sorting
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('product.show', ['sort' => 'latest']) }}">Latest</a>
                                        <a class="dropdown-item" href="{{ route('product.show', ['sort' => 'asc']) }}">Prices gradually increase</a>
                                        <a class="dropdown-item" href="{{ route('product.show', ['sort' => 'desc']) }}">Prices gradually decrease</a>

                                        <a class="dropdown-item" href="#">Best Rating</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100" src="{{asset('client/img/product-6.jpg')}}" alt="">
                                    <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square" href=""><i
                                                class="fa fa-shopping-cart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i
                                                class="fa fa-sync-alt"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4" >
                                    <a class="h6 text-decoration-none text-truncate" href="" style="word-wrap: break-word; white-space: normal;">{{$product->name}}</a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5>${{$product->price}}</h5>
                                        <h6 class="text-muted ml-2">
                                            <del>$123</del>
                                        </h6>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small>(99)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

    <!-- Shop Previous -->
    <div class="col-12">
        {{ $products->links('client.product.custom-paginate') }}
    </div>

@endsection
