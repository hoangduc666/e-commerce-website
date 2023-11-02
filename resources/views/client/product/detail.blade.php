@extends('client.layout.index')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
<<<<<<< HEAD
=======
                    <span class="breadcrumb-item active">Shop Detail</span>
>>>>>>> dece221f309a6888873a1349df77751a0356c316
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

<<<<<<< HEAD
=======

>>>>>>> dece221f309a6888873a1349df77751a0356c316
    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="img-fluid w-100" src="{{asset('client/img/product-1.jpg')}}" alt="">
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid" src="{{asset('client/img/product-5.jpg')}}" alt="">
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid" src="{{asset('client/img/bg-w.webp')}}" alt="">
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid" src="{{asset('client/img/bg-hp.jpg')}}" alt="">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

<<<<<<< HEAD

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                        <h3>{{$product->name}}</h3>
=======
            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>Product Name Goes Here</h3>
>>>>>>> dece221f309a6888873a1349df77751a0356c316
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
<<<<<<< HEAD
                            <small class="fas fa-star-half-alt"></small>`
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(99 @lang('public.reviews'))</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">${{$product->price}}</h3>
                    <p class="mb-4">{!! strip_tags(Str::limit($product->description,500)) !!}</p>
                    @if(count($product->attributes) > 0)
                        @foreach($product->attributes->groupBy('name') as $key => $attributes)
                            <div class="d-flex mb-4" id="parent-product">
                                <strong class="text-dark mr-3">{{ \Illuminate\Support\Str::ucfirst($key) }}:</strong>
                                <form>
                                    @foreach($attributes as $keyAttr => $attribute)
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="{{ $key }}-{{$attribute->id}}" name="{{ $key }}">
                                            <label class="custom-control-label" for="{{ $key }}-{{$attribute->id}}">{{$attribute->value}}</label>
                                        </div>
                                    @endforeach
                                </form>
                            </div>
                        @endforeach
                    @endif



=======
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(99 Reviews)</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">$150.00</h3>
                    <p class="mb-4">Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit
                        clita ea. Sanc ipsum et, labore clita lorem magna duo dolor no sea
                        Nonumy</p>
                    <div class="d-flex mb-3">
                        <strong class="text-dark mr-3">Ram:</strong>
                        <form>
                            @foreach($attributes as $attribute)
                                @if($attribute->name === 'ram')
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" data-id="{{$attribute->id}}" name="size">
                                        <label class="custom-control-label" for="size-1">{{$attribute->value}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </form>
                    </div>
                    <div class="d-flex mb-4">
                        <strong class="text-dark mr-3">Colors:</strong>
                        <form>
                            @foreach($attributes as $attribute)
                                @if($attribute->name === 'colors')
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" data-id="{{$attribute->id}}" name="color">
                                        <label class="custom-control-label" >{{$attribute->value}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </form>
                    </div>
                    <div class="d-flex mb-4">
                        <strong class="text-dark mr-3">Storage:</strong>
                        <form>
                            @foreach($attributes as $attribute)
                                @if($attribute->name === 'storage')
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" data-id="{{$attribute->id}}" name="color">
                                        <label class="custom-control-label" >{{$attribute->value}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </form>
                    </div>
>>>>>>> dece221f309a6888873a1349df77751a0356c316
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-secondary border-0 text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
<<<<<<< HEAD
                        <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>@lang('public.add to cart')</button>
                        <div><button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>@lang('public.coming soon')</button></div>
                    </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">@lang('public.share on'):</strong>
=======
                        <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To
                            Cart</button>
                    </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
>>>>>>> dece221f309a6888873a1349df77751a0356c316
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
<<<<<<< HEAD

=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
<<<<<<< HEAD
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">@lang('public.description')</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">@lang('public.information')</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">@lang('public.reviews') (0)</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
{{--                            <h4 class="mb-3">Product Description</h4>--}}
                                <p>{!! $product->description !!}</p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
{{--                            <h4 class="mb-3">Additional Information</h4>--}}
=======
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Product Description</h4>
                            @foreach($products as $product)
                                <p>{!! $product->description !!}</p>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Additional Information</h4>
>>>>>>> dece221f309a6888873a1349df77751a0356c316
                            <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row">
                                <div class="col-md-6">
<<<<<<< HEAD
{{--                                    <h4 class="mb-4">1 review for "Product Name"</h4>--}}
                                    <div class="media mb-4">
                                        <img src="{{asset('client/img/user.jpg')}}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
=======
                                    <h4 class="mb-4">1 review for "Product Name"</h4>
                                    <div class="media mb-4">
                                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
>>>>>>> dece221f309a6888873a1349df77751a0356c316
                                        <div class="media-body">
                                            <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                            <div class="text-primary mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-4">Leave a review</h4>
                                    <small>Your email address will not be published. Required fields are marked *</small>
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Your Rating * :</p>
                                        <div class="text-primary">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <label for="message">Your Review *</label>
                                            <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Your Name *</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Your Email *</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
<<<<<<< HEAD
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">@lang('public.related products')</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach($products as $pro)
=======
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">You May Also Like</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                   @foreach($products as $product)
>>>>>>> dece221f309a6888873a1349df77751a0356c316
                        <div class="product-item bg-light">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{asset('client/img/product-9.jpg')}}" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
<<<<<<< HEAD
                                <a class="h6 text-decoration-none text-truncate" href="">{{$pro->name}}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>{{$pro->price}}</h5><h6 class="text-muted ml-2"><del>$123</del></h6>
=======
                                <a class="h6 text-decoration-none text-truncate" href="">{{$product->name}}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>{{$product->price}}</h5><h6 class="text-muted ml-2"><del>$123</del></h6>
>>>>>>> dece221f309a6888873a1349df77751a0356c316
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
<<<<<<< HEAD
                    @endforeach
=======
                   @endforeach
>>>>>>> dece221f309a6888873a1349df77751a0356c316
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
<<<<<<< HEAD
@endsection

=======

@endsection
>>>>>>> dece221f309a6888873a1349df77751a0356c316
