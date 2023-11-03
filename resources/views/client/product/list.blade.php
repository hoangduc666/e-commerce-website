@extends('client.layout.index')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">@lang('public.home')</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
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
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">@lang('public.filter by price')</span>
                </h5>
                <div class="bg-light p-4 mb-30">
                    <form action="{{ route('product.show') }}">
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" name="price" class="custom-control-input"
                                   @if(empty(request('price'))) value="" checked @endif id="price-all">
                            <label class="custom-control-label" for="price-all">@lang('public.all price')</label>
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
                        <button class="btn btn-outline-primary">@lang('public.search')</button>
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
                                            data-toggle="dropdown">@lang('public.sorting')
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('product.show', ['sort' => 'latest']) }}">@lang('public.latest')</a>
                                        <a class="dropdown-item" href="{{ route('product.show', ['sort' => 'asc']) }}">@lang('public.prices gradually increase')</a>
                                        <a class="dropdown-item" href="{{ route('product.show', ['sort' => 'desc']) }}">@lang('public.prices gradually decrease')</a>

                                        <a class="dropdown-item" href="#">@lang('public.best rating')</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($products as $pro)
                        <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                @if(count($pro->discounts) > 0)
                                   @foreach($pro->discounts as $key => $dis)
                                       @if(\Carbon\Carbon::parse($dis->pivot->expiration_date) >= \Carbon\Carbon::now())
                                            <div class="custom-control custom-control-inline p-1 mr-0">
                                                <span class="bg-danger" style="width: 50px; height: 20px; border-radius: 4px; color: white;padding: 2px 0 25px 10px">{{$discount->percent_off}}%</span>
                                            </div>
                                       @endif
                                   @endforeach
                                @endif
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
                                    <a class="h6 text-decoration-none text-truncate" href="{{route('product.detail',['slug' => $pro->slug])}}" style="word-wrap: break-word; white-space: normal;">{{$pro->name}}</a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5>${{$pro->price_new}}</h5>
                                        @if($pro->price_new !== $pro->price)
                                            <h6 class="text-muted ml-2">
                                                <del>${{$pro->price}}</del>
                                            </h6>
                                        @endif
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
