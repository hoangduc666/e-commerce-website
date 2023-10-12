<div class="container-fluid mb-30" style="background-color: grey!important;">
    <div class="row px-xl-5">
{{--        <div class="col-lg-3 d-none d-lg-block">--}}
{{--            <a class="btn d-flex align-items-center justify-content-between bg-primary w-100 h-100" data-toggle="collapse"--}}
{{--               href="#navbar-vertical" style="height: 65px; padding: 0 30px;">--}}
{{--                <h5 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>@lang('public.categories')</h5>--}}
{{--                <i class="fa fa-angle-down text-dark"></i>--}}
{{--            </a>--}}
{{--            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">--}}
{{--                <div class="navbar-nav w-100">--}}
{{--                    @foreach($categories as $category)--}}
{{--                        @if(count($category->childrens) > 0)--}}
{{--                            <div class="nav-item dropdown dropright">--}}
{{--                                <a href="#" class="nav-link dropdown-toggle"--}}
{{--                                   data-toggle="dropdown">{{ $category->name }}--}}
{{--                                    <i class="fa fa-angle-right float-right mt-1"></i>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">--}}
{{--                                        @include('client.layout.menu', ['childs' => $category->childrens])--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @else--}}
{{--                            <a href="" class="nav-item nav-link">{{ $category->name }}</a>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}

{{--                    @foreach($categories as $category)--}}
{{--                        @if(count($category->childrens) > 0)--}}
{{--                            <div class="nav-item dropdown dropright">--}}
{{--                                <a href="#" class="nav-link dropdown-toggle"--}}
{{--                                   data-toggle="dropdown">--}}
{{--                                    @lang('public.categories.'.$category->slug)--}}
{{--                                    <span>--}}
{{--                                        @if($category->slug == 'dien-thoai')--}}
{{--                                            <img style="width: 20px"--}}
{{--                                                 src="https://cellphones.com.vn/media/icons/menu/icon-cps-3.svg">--}}
{{--                                        @endif--}}
{{--                                        @if($category->slug == 'laptop')--}}
{{--                                            <img style="width: 20px"--}}
{{--                                                 src="https://cdn2.cellphones.com.vn/x/media/icons/menu/icon-cps-380.svg">--}}
{{--                                        @endif--}}
{{--                                        @if($category->slug == 'dong-ho')--}}
{{--                                            <img style="width: 20px"--}}
{{--                                                 src="https://cellphones.com.vn/media/icons/menu/icon-cps-610.svg">--}}
{{--                                        @endif--}}
{{--                                        @if($category->slug == 'am-thanh')--}}
{{--                                            <img style="width: 20px"--}}
{{--                                                 src="https://cellphones.com.vn/media/icons/menu/icon-cps-220.svg">--}}
{{--                                        @endif--}}
{{--                                    </span>--}}
{{--                                    <i class="fa fa-angle-right float-right mt-1"></i>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">--}}
{{--                                    @include('client.layout.menu',  ['childs' => $category->childrens])--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @else--}}
{{--                            <a href="" class="nav-item nav-link">@lang('public.categories.'.$category->slug)</a>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}


{{--                </div>--}}
{{--            </nav>--}}
{{--        </div>--}}
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <span class="h1 text-uppercase text-dark bg-light px-2">HYPEBEAST</span>
                    <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse" style="background-color: grey">
                    <div class="navbar-nav mr-auto py-0">
{{--                        <a href="{{route('home.index')}}" class="nav-item nav-link active">@lang('public.home')</a>--}}
{{--                        <a href="{{route('product.show')}}" class="nav-item nav-link">@lang('public.product')</a>--}}
{{--                        <div class="nav-item dropdown">--}}
{{--                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">@lang('public.pages') <i--}}
{{--                                    class="fa fa-angle-down mt-1"></i></a>--}}
{{--                            <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">--}}
{{--                                <a href="{{route('product.showCart')}}" class="dropdown-item">@lang('public.shopping cart')</a>--}}
{{--                                <a href="{{route('product.showCheckout')}}" class="dropdown-item">@lang('public.checkout')</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <a href="{{route('product.showContact')}}" class="nav-item nav-link">@lang('public.contact')</a>--}}
{{--                        @foreach($categories as $category)--}}
{{--                            <a href="#" class="nav-item nav-link active">--}}
{{--                                @if($category->slug == 'dien-thoai')--}}
{{--                                    <img style="width: 30px; color: white"--}}
{{--                                         src="https://cellphones.com.vn/media/icons/menu/icon-cps-3.svg">--}}
{{--                                @endif--}}
{{--                                @if($category->slug == 'laptop')--}}
{{--                                    <img style="width: 30px; color: white"--}}
{{--                                         src="https://cdn2.cellphones.com.vn/x/media/icons/menu/icon-cps-380.svg">--}}
{{--                                @endif--}}
{{--                                @if($category->slug == 'dong-ho')--}}
{{--                                    <img style="width: 30px; color: white"--}}
{{--                                         src="https://cellphones.com.vn/media/icons/menu/icon-cps-610.svg">--}}
{{--                                @endif--}}
{{--                                @if($category->slug == 'am-thanh')--}}
{{--                                    <img style="width: 30px; color: white"--}}
{{--                                         src="https://cellphones.com.vn/media/icons/menu/icon-cps-220.svg">--}}
{{--                                @endif--}}
{{--                                @lang('public.categories.' .$category->slug)--}}
{{--                                    <i class="fa fa-angle-down float-right mt-2 px-2"></i>--}}

{{--                            </a>--}}
{{--                        @endforeach--}}

{{--                        @foreach($categories as $category)--}}
{{--                            <div class="nav-item dropdown">--}}
{{--                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">--}}
{{--                                    @if($category->slug == 'dien-thoai')--}}
{{--                                        <img style="width: 30px; color: white"--}}
{{--                                             src="https://cellphones.com.vn/media/icons/menu/icon-cps-3.svg">--}}
{{--                                    @endif--}}
{{--                                    @if($category->slug == 'laptop')--}}
{{--                                        <img style="width: 30px; color: white"--}}
{{--                                             src="https://cdn2.cellphones.com.vn/x/media/icons/menu/icon-cps-380.svg">--}}
{{--                                    @endif--}}
{{--                                    @if($category->slug == 'dong-ho')--}}
{{--                                        <img style="width: 30px; color: white"--}}
{{--                                             src="https://cellphones.com.vn/media/icons/menu/icon-cps-610.svg">--}}
{{--                                    @endif--}}
{{--                                    @if($category->slug == 'am-thanh')--}}
{{--                                        <img style="width: 30px; color: white"--}}
{{--                                             src="https://cellphones.com.vn/media/icons/menu/icon-cps-220.svg">--}}
{{--                                    @endif--}}
{{--                                    @lang('public.categories.' .$category->slug)--}}
{{--                                    <i class="fa fa-angle-down float-right mt-2 px-2"></i>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">--}}
{{--                                    <div class="container">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-lg-6">--}}
{{--                                                <h5>@lang('public.categories.' .$category->slug)</h5>--}}
{{--                                                @if(count($category->childrens) > 0)--}}
{{--                                                    <ul style="list-style: none">--}}
{{--                                                        @foreach($category->childrens as $child)--}}
{{--                                                            <li>--}}
{{--                                                                <a href="{{ $child->link }}" style="text-decoration: none; color: black; width: 200px; display: inline-block">{{ $child->name }}</a>--}}
{{--                                                            </li>--}}
{{--                                                        @endforeach--}}
{{--                                                    </ul>--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}


                        @foreach($categories as $category)
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    @if(\Illuminate\Support\Str::slug($category->name,'_') == 'dien_thoai')
                                        <img style="width: 30px; color: white" src="https://cellphones.com.vn/media/icons/menu/icon-cps-3.svg">
                                    @endif
                                    @if(\Illuminate\Support\Str::slug($category->name,'_') == 'laptop')
                                        <img style="width: 30px; color: white" src="https://cdn2.cellphones.com.vn/x/media/icons/menu/icon-cps-380.svg">
                                    @endif
                                    @if(\Illuminate\Support\Str::slug($category->name,'_') == 'dong_ho')
                                        <img style="width: 30px; color: white" src="https://cellphones.com.vn/media/icons/menu/icon-cps-610.svg">
                                    @endif
                                    @if(\Illuminate\Support\Str::slug($category->name,'_') == 'am_thanh')
                                        <img style="width: 30px; color: white" src="https://cellphones.com.vn/media/icons/menu/icon-cps-220.svg">
                                    @endif
                                        @lang('public.categories.'.\Illuminate\Support\Str::slug($category->name,'_'))
                                    <i class="fa fa-angle-down float-right mt-2 px-2"></i>
                                </a>
                                <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h5>@lang('public.categories.'.\Illuminate\Support\Str::slug($category->name,'_'))</h5>
                                                @if(count($category->childrens) > 0)
                                                    <ul style="list-style: none">
                                                        @foreach($category->childrens as $child)
                                                            <li>
                                                                <a class="" href="{{ $child->link }}" style="text-decoration: none; color: black; width: 200px; display: inline-block">@lang('public.categories.'.\Illuminate\Support\Str::slug($child->name,'_'))</a>
                                                            </li>
                                                            @if(count($child->childrens) > 0)
                                                                <ul>
                                                                    @foreach($child->childrens as $grandchild)
                                                                        <li>
                                                                            <a href="{{ $grandchild->link }}" style="text-decoration: none; color: black; width: 200px; display: inline-block">@lang('public.categories.'.\Illuminate\Support\Str::slug($grandchild->name ,'_'))</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                        <a href="" class="btn px-0">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle"
                                  style="padding-bottom: 2px;">0</span>
                        </a>
                        <a href="" class="btn px-0 ml-3">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle"
                                  style="padding-bottom: 2px;">0</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

