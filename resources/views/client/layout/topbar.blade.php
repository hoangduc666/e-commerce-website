<div class="container-fluid">
    <div class="row bg-secondary py-1 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center h-100">
                <a class="text-body mr-3" href="">@lang('public.about')</a>
                <a class="text-body mr-3" href="">@lang('public.contact')</a>
                <a class="text-body mr-3" href="">@lang('public.help')</a>
                <a class="text-body mr-3" href="">@lang('public.faqs')</a>
            </div>
        </div>


        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                @if (!auth()->check())
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">
                        @lang('public.my account')
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{route('user.showLoginForm')}}"> @lang('public.sign in')</a>
                        <a class="dropdown-item" href="#"> @lang('public.sign up')</a>
                    </div>
                </div>
                @endif
                <div class="btn-group mx-2">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">
                        @if(app()->getLocale() == 'en')
                            <span class="flag-icon flag-icon-us"></span> English
                        @endif
                        @if(app()->getLocale() == 'vi')
                            <span class="flag-icon flag-icon-vn"></span> VietNam
                        @endif
                        @if(app()->getLocale() == 'ja')
                            <span class="flag-icon flag-icon-jp"></span> Japan
                        @endif
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach(config('localization') as $key => $localzation)
                            <a class="dropdown-item" type="button" href="{{ route('user.change-language', ['lange' => $key]) }}">
                                <span class="{{ $localzation['icon'] ?? '' }}"></span> {{$localzation['name'] ?? ''}}
                            </a>
                        @endforeach
{{--                        <a class="dropdown-item" type="button" href="{{ route('user.change-language', ['lange' => 'en']) }}">--}}
{{--                            <span class="flag-icon flag-icon-us"></span> English--}}
{{--                        </a>--}}
{{--                        <a class="dropdown-item" type="button" href="{{ route('user.change-language', ['lange' => 'vi']) }}">--}}
{{--                            <span class="flag-icon flag-icon-vn"></span> VietNam--}}
{{--                        </a>--}}
                    </div>
                </div>

                    <div class="btn-group mx-2">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">
                            @lang('public.usd')
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button"> @lang('public.eur')</button>
                            <button class="dropdown-item" type="button"> @lang('public.gbp')</button>
                            <button class="dropdown-item" type="button"> @lang('public.cad')</button>
                        </div>
                    </div>

                    @if(auth()->check())
                        <div class="btn-group mx-2">
                            <a class="nav-link" href="{{route('user.logout')}}">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </div>
                    @endif
            </div>
            <div class="d-inline-flex align-items-center d-block d-lg-none">
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-heart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle"
                          style="padding-bottom: 2px;">0</span>
                </a>
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-shopping-cart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle"
                          style="padding-bottom: 2px;">0</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary bg-dark px-2">HYPEBEAST</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4 col-6 text-right">
            <p class="m-0">@lang('public.customer service')</p>
            <h5 class="m-0">+012 345 6789</h5>
        </div>
    </div>
</div>

