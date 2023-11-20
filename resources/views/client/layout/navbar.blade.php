<div class="container-fluid mb-30" style="background-color: grey!important;">
    <div class="row px-xl-5">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <span class="h1 text-uppercase text-dark bg-light px-2">HYPEBEAST</span>
                    <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse"
                     style="background-color: grey">
                    <div class="navbar-nav mr-auto py-0">
                        @foreach($categories as $category)
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    @if(\Illuminate\Support\Str::slug($category->name,'_') == 'dien_thoai')
                                        <img style="width: 30px; color: white"
                                             src="https://cellphones.com.vn/media/icons/menu/icon-cps-3.svg">
                                    @endif
                                    @if(\Illuminate\Support\Str::slug($category->name,'_') == 'laptop')
                                        <img style="width: 30px; color: white"
                                             src="https://cdn2.cellphones.com.vn/x/media/icons/menu/icon-cps-380.svg">
                                    @endif
                                    @if(\Illuminate\Support\Str::slug($category->name,'_') == 'dong_ho')
                                        <img style="width: 30px; color: white"
                                             src="https://cellphones.com.vn/media/icons/menu/icon-cps-610.svg">
                                    @endif
                                    @if(\Illuminate\Support\Str::slug($category->name,'_') == 'am_thanh')
                                        <img style="width: 30px; color: white"
                                             src="https://cellphones.com.vn/media/icons/menu/icon-cps-220.svg">
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
                                                                <a class="" href="{{ $child->link }}"
                                                                   style="text-decoration: none; color: black; width: 200px; display: inline-block">@lang('public.categories.'.\Illuminate\Support\Str::slug($child->name,'_'))</a>
                                                            </li>
                                                            @if(count($child->childrens) > 0)
                                                                <ul>
                                                                    @foreach($child->childrens as $grandchild)
                                                                        <li>
                                                                            <a href="{{ $grandchild->link }}"
                                                                               style="text-decoration: none; color: black; width: 200px; display: inline-block">@lang('public.categories.'.\Illuminate\Support\Str::slug($grandchild->name ,'_'))</a>
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
                        <a href="{{route('product.showCart')}}" class="btn px-0 ml-3">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle"
                                  style="padding-bottom: 2px;">{{ count((array) session('cart')) }}</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

