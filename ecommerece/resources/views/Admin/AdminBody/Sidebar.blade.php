@php
//Into the prefix area whatever route we create will affect
$prefix = Request::route()->getPrefix();
//Current route we will get
$route = Route::current()->getName();
// dd($prefix);
//dd($route);
@endphp





<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Advance</b> Ecommerece</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
                <a href="
                {{ url('admin/dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ $prefix == '/brand' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Brands</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'all.brands' ? 'active' : '' }}"><a href="{{ route('all.brands') }}"><i
                                class="ti-more"></i>All Brands</a></li>
                    <li class="{{ $route == 'add.newbrands' ? 'active' : '' }}"><a
                            href="{{ route('add.newbrands') }}"><i class="ti-more"></i>Add Brands</a></li>

                </ul>
            </li>

            <li class="treeview {{ $prefix == '/category' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'all.category' ? 'active' : '' }}"><a href="{{ route('all.category') }}"><i
                                class="ti-more"></i>Category</a></li>
                    <li class="{{ $route == 'add.newcategory' ? 'active' : '' }}"><a
                            href="{{ route('add.newcategory') }}"><i class="ti-more"></i>Add Category</a></li>

                    <li class="{{ $route == 'all.subcategory' ? 'active' : '' }}"><a
                            href="{{ route('all.subcategory') }}"><i class="ti-more"></i>Sub Category</a></li>
                    <li class="{{ $route == 'add.subcategory' ? 'active' : '' }}"><a
                            href="{{ route('add.subcategory') }}"><i class="ti-more"></i>Add Sub Category</a></li>

                    <li class="{{ $route == 'all.sub_category' ? 'active' : '' }}"><a
                            href="{{ route('all.sub_category') }}"><i class="ti-more"></i>All Sub Category</a></li>
                    <li class="{{ $route == 'add.sub_category' ? 'active' : '' }}"><a
                            href="{{ route('add.sub_category') }}"><i class="ti-more"></i>Add Sub-Category</a></li>

                </ul>
            </li>


            <li class="treeview {{ $prefix == '/product' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'manage.product' ? 'active' : '' }}"><a
                            href="{{ route('manage.product') }}"><i class="ti-more"></i>All Products</a></li>
                    <li class="{{ $route == 'add.product' ? 'active' : '' }}"><a href="{{ route('add.product') }}"><i
                                class="ti-more"></i>Add Products</a></li>
                    <li class="{{ $route == 'manage.product' ? 'active' : '' }}"><a
                            href="{{ route('manage.product') }}"><i class="ti-more"></i>Manage Products</a></li>

                </ul>
            </li>


            <li class="treeview {{ $prefix == '/slider' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Sliders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'all.sliders' ? 'active' : '' }}"><a href="{{ route('all.sliders') }}"><i
                                class="ti-more"></i>All Sliders</a></li>
                    <li class="{{ $route == 'add.slider' ? 'active' : '' }}"><a href="{{ route('add.slider') }}"><i
                                class="ti-more"></i>Add Slider</a></li>


                </ul>
            </li>


            <li class="treeview {{ $prefix == '/cupon' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Coupons</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'all.coupons' ? 'active' : '' }}"><a href="{{ route('all.coupons') }}"><i
                                class="ti-more"></i>All Coupons</a></li>
                    <li class="{{ $route == 'add.coupons' ? 'active' : '' }}"><a href="{{ route('add.coupons') }}"><i
                                class="ti-more"></i>Add Coupons</a></li>


                </ul>
            </li>

            <li class="treeview {{ $prefix == '/shipping' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Area of Shipping</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'all.division' ? 'active' : '' }}"><a
                            href="{{ route('all.division') }}"><i class="ti-more"></i>Available Division</a></li>
                    <li class="{{ $route == 'add.division' ? 'active' : '' }}"><a
                            href="{{ route('add.division') }}"><i class="ti-more"></i>Add Division</a></li>

                    <li class="{{ $route == 'all.district' ? 'active' : '' }}"><a
                            href="{{ route('all.district') }}"><i class="ti-more"></i>Available District</a></li>
                    <li class="{{ $route == 'add.district' ? 'active' : '' }}"><a
                            href="{{ route('add.district') }}"><i class="ti-more"></i>Add District</a></li>



                    <li class="{{ $route == 'all.states' ? 'active' : '' }}"><a href="{{ route('all.states') }}"><i
                                class="ti-more"></i>Available States</a></li>
                    <li class="{{ $route == 'add.state' ? 'active' : '' }}"><a href="{{ route('add.state') }}"><i
                                class="ti-more"></i>Add State</a></li>


                </ul>
            </li>

            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview {{ $prefix == '/orders' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>All Orders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'pending.orders' ? 'active' : '' }}"><a
                            href="{{ route('pending.orders') }}"><i class="ti-more"></i>Pending Orders</a></li>
                    <li class="{{ $route == 'confirm.orders' ? 'active' : '' }}"><a
                            href="{{ route('confirm.orders') }}"><i class="ti-more"></i>Confirm Orders</a></li>
                    <li class="{{ $route == 'process.orders' ? 'active' : '' }}"><a
                            href="{{ route('process.orders') }}"><i class="ti-more"></i>Orders In Process</a></li>
                    <li class="{{ $route == 'picked.orders' ? 'active' : '' }}"><a
                            href="{{ route('picked.orders') }}"><i class="ti-more"></i>Picked Orders</a></li>
                    <li class="{{ $route == 'shipped.orders' ? 'active' : '' }}"><a
                            href="{{ route('shipped.orders') }}"><i class="ti-more"></i>Shipped Orders</a></li>
                    <li class="{{ $route == 'deliverd.orders' ? 'active' : '' }}"><a
                            href="{{ route('deliverd.orders') }}"><i class="ti-more"></i>Deliverd Orders</a></li>
                    <li class="{{ $route == 'cancel.orders' ? 'active' : '' }}"><a
                            href="{{ route('cancel.orders') }}"><i class="ti-more"></i>Cancel Orders</a></li>



                </ul>
            </li>
        </ul>
    </section>

</aside>
