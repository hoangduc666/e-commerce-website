@extends('client.layout.index')
@section('content')
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($banners as $key => $banner)
                            <li data-target="#header-carousel" data-slide-to="{{$key === 0 ? 'active' : ''}}"></li>
                        @endforeach
                    </ol>
                    <div id="carouselExample" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($banners as $key => $banner)
                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                    <a href="#">
                                        <img src="{{ $banner->image_path }}" alt="{{ $banner->alt_text }}" class="d-block w-100">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
            </div>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">
            @foreach($categories as $category)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <a class="text-decoration-none" href="">
                        <div class="cat-item d-flex align-items-center mb-4">
                            <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                <img class="img-fluid" src="{{asset('client/img/product-5.jpg')}}" alt="">
                            </div>
                            <div class="flex-fill pl-3">
                                <h6>{{$category->name}}</h6>
                                <small class="text-body">{{ $category->products_sum_quantity }} Products</small>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Categories End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured Products</span>
        </h2>
        <div class="row px-xl-5">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('client/img/product-1.jpg')}}" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">{{$product->name}}</a>
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
    <!-- Products End -->


    <!-- Offer Start -->
{{--    <div class="container-fluid pt-5 pb-3">--}}
{{--        <div class="row px-xl-5">--}}
{{--            <div class="col-md-6">--}}
{{--                <div class="product-offer mb-30" style="height: 300px;">--}}
{{--                    <img class="img-fluid" src="{{asset('client/img/bg-hp.jpg')}}" alt="">--}}
{{--                    <div class="offer-text">--}}
{{--                        <h6 class="text-white text-uppercase">Save 20%</h6>--}}
{{--                        <h3 class="text-white mb-3">Special Offer</h3>--}}
{{--                        <a href="" class="btn btn-primary">Shop Now</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-6">--}}
{{--                <div class="product-offer mb-30" style="height: 300px;">--}}
{{--                    <img class="img-fluid" src="{{asset('client/img/bg-w.webp')}}" alt="">--}}
{{--                    <div class="offer-text">--}}
{{--                        <h6 class="text-white text-uppercase">Save 20%</h6>--}}
{{--                        <h3 class="text-white mb-3">Special Offer</h3>--}}
{{--                        <a href="" class="btn btn-primary">Shop Now</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Recent Products</span>
        </h2>
        <div class="row px-xl-5">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('client/img/product-2.jpg')}}" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">{{$product->name}}</a>
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
    <!-- Products End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="{{asset('client/img/vendor-1.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('client/img/vendor-2.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('client/img/vendor-3.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('client/img/vendor-4.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('client/img/vendor-5.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('client/img/vendor-6.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('client/img/vendor-7.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('client/img/vendor-8.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
