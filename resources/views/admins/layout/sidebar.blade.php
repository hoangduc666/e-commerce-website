<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{url('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Manage</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{url('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->guard('admin')->user()->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                {{--   home   --}}
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link active">
                        <i class="fa fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>


                {{-- account  --}}
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Account Manage
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        @if(Auth::guard('admin')->user()->can('admin.index'))
                            <li class="nav-item">
                                <a href="{{ route('admin.index') }}"
                                   class="nav-link @if('admin.index' == request()->route()->getName()) active @endif"
                                   style="display: flex;align-items: center;gap: 10px">
                                    <i class='fas fa-user-cog'></i>
                                    <p>Admin</p>
                                </a>
                            </li>
                        @endif
                        @if(Auth::guard('admin')->user()->can('user.index'))
                            <li class="nav-item">
                                <a href="{{route('user.index')}}"
                                   class="nav-link @if('user.index'== request()->route()->getName()) active @endif"
                                   style="display: flex;align-items: center;gap: 10px">
                                    <i class='fas fa-user-alt'></i>
                                    <p>User</p>
                                </a>
                            </li>
                        @endif
                        {{--                        <li class="nav-item">--}}
                        {{--                            <a href="./index3.html" class="nav-link">--}}
                        {{--                                <i class="far fa-circle nav-icon"></i>--}}
                        {{--                                <p>Dashboard v3</p>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                    </ul>
                </li>


                {{--  product manage   --}}

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class='fas fa-store'></i>
                        <p>
                            Product Manage
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        @if(Auth::guard('admin')->user()->can('category.index'))
                            <li class="nav-item">
                                <a href="{{route('category.index')}}"
                                   class="nav-link @if('category.index' == request()->route()->getName()) active @endif"
                                   style="display: flex;align-items: center;gap: 10px">
                                    <i class="fa fa-list-alt"></i>
                                    <p>Category</p>
                                </a>
                            </li>
                        @endif
                        @if(Auth::guard('admin')->user()->can('product.index'))
                            <li class="nav-item">
                                <a href="{{route('product.index')}}"
                                   class="nav-link @if('product.index'== request()->route()->getName()) active @endif"
                                   style="display: flex;align-items: center;gap: 10px">
                                    {{--                                    <i class='fas fa-archive'></i>--}}
                                    <i class="fas fa-tags"></i>
                                    <p>Product</p>
                                </a>
                            </li>
                        @endif
                        @if(Auth::guard('admin')->user()->can('attribute.index'))
                            <li class="nav-item">
                                <a href="{{route('attribute.index')}}"
                                   class="nav-link @if('attribute.index'== request()->route()->getName()) active @endif"
                                   style="display: flex;align-items: center;gap: 10px">
                                    <i class='fas fa-sliders-h'></i>
                                    <p>Attribute</p>
                                </a>
                            </li>
                        @endif
                        @if(Auth::guard('admin')->user()->can('banner.index'))
                            <li class="nav-item">
                                <a href="{{route('banner.index')}}"
                                   class="nav-link @if('banner.index'== request()->route()->getName()) active @endif"
                                   style="display: flex;align-items: center;gap: 10px">
                                    <i class="fa fa-image"></i>
                                    <p>Banner</p>
                                </a>
                            </li>
                        @endif
                        @if(Auth::guard('admin')->user()->can('discount.index'))
                            <li class="nav-item">
                                <a href="{{route('discount.index')}}"
                                   class="nav-link @if('discount.index'== request()->route()->getName()) active @endif"
                                   style="display: flex;align-items: center;gap: 10px">
                                    <i class="fas fa-percent" ></i>
                                    <p>Discount</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
</aside>
