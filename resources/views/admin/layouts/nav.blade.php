<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Main</div>

        <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="none" subitem-border="true">
            <li class="{{ request()->is('/admin') ? 'active' : '' }}">
                <a href="/admin">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="none" subitem-border="true">
            <li
                class="pcoded-hasmenu 
            {{ request()->is('admin/categories/*') || request()->is('admin/categories') ? 'pcoded-trigger' : '' }}
            ">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-folder" aria-hidden="true"></i></span>
                    <span class="pcoded-mtext">Categories</span>
                    {{-- <span
                        class="pcoded-badge label label-warning">NEW</span> --}}
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{ request()->is('admin/categories') ? 'active' : '' }}">
                        <a href="/admin/categories">
                            <span class="pcoded-mtext">All Categories</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/categories/order') ? 'active' : '' }}">
                        <a href="{{ route('proCategory.order.view') }}">
                            <span class="pcoded-mtext">Category Order</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="none" subitem-border="true">
            <li class="{{ request()->is('/admin/sub-categories') ? 'active' : '' }}">
                <a href="/admin/sub-categories">
                    <span class="pcoded-micon"><i class="feather icon-folder"></i></span>
                    <span class="pcoded-mtext">Sub Categories</span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="none" subitem-border="true">
            <li class="{{ request()->is('/admin/brands') ? 'active' : '' }}">
                <a href="/admin/brands">
                    <span class="pcoded-micon"><i class="feather icon-folder"></i></span>
                    <span class="pcoded-mtext">Brands</span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="none" subitem-border="true">
            <li
                class="pcoded-hasmenu 
            {{ request()->is('admin/main-banners') || request()->is('admin/sub-banners') ? 'pcoded-trigger' : '' }}
            ">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-folder" aria-hidden="true"></i></span>
                    <span class="pcoded-mtext">Banners</span>
                    {{-- <span
                        class="pcoded-badge label label-warning">NEW</span> --}}
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{ request()->is('admin/main-banners') ? 'active' : '' }}">
                        <a href="{{ route('main_banner.index') }}">
                            <span class="pcoded-mtext">Main Banners</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/sub-banners') ? 'active' : '' }}">
                        <a href="{{ route('sub_banner.index') }}">
                            <span class="pcoded-mtext">Sub Banners</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        {{-- <hr>
        <div class="pcoded-navigatio-lavel">Products & Stock</div> --}}
        <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="none" subitem-border="true">
            <li
                class="pcoded-hasmenu 
            {{ request()->is('product-categories') || request()->is('hs-codes') || request()->is('products') || request()->is('add-new-product') || request()->is('stock/find') ? 'pcoded-trigger' : '' }}
            ">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-folder" aria-hidden="true"></i></span>
                    <span class="pcoded-mtext">Products</span>
                    {{-- <span
                        class="pcoded-badge label label-warning">NEW</span> --}}
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{ request()->is('admin/products/create') ? 'active' : '' }}">
                        <a href="/admin/products/create">
                            <span class="pcoded-mtext">Add new Product</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/products') ? 'active' : '' }}">
                        <a href="/admin/products">
                            <span class="pcoded-mtext">Product List</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="none" subitem-border="true">
            <li
                class="pcoded-hasmenu 
            {{ request()->is('admin/orders/*') ? 'pcoded-trigger' : '' }}
            ">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-folder" aria-hidden="true"></i></span>
                    <span class="pcoded-mtext">Orders</span>
                    {{-- <span
                        class="pcoded-badge label label-warning">NEW</span> --}}
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{ request()->is('admin/orders/all') ? 'active' : '' }}">
                        <a href="/admin/orders/all">
                            <span class="pcoded-mtext">All Orders</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/orders/pending') ? 'active' : '' }}">
                        <a href="/admin/orders/pending">
                            <span class="pcoded-mtext">Processing List</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/orders/despatched') ? 'active' : '' }}">
                        <a href="/admin/orders/despatched">
                            <span class="pcoded-mtext">Despatched</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/orders/canceled') ? 'active' : '' }}">
                        <a href="/admin/orders/canceled">
                            <span class="pcoded-mtext">Canceled</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/orders/returned') ? 'active' : '' }}">
                        <a href="/admin/orders/returned">
                            <span class="pcoded-mtext">Returned</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/orders/completed') ? 'active' : '' }}">
                        <a href="/admin/orders/completed">
                            <span class="pcoded-mtext">Completed</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>


        <hr>

        <div class="pcoded-navigatio-lavel">Settings</div>
        <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="none" subitem-border="true">
            <li
                class="pcoded-hasmenu {{ request()->is('admin/settings') ? 'pcoded-trigger' : '' }}">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="fa fa-cog"></i></span>
                    <span class="pcoded-mtext">Settings</span>
                    {{-- <span
                        class="pcoded-badge label label-warning">NEW</span> --}}
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{ request()->is('admin/settings') ? 'active' : '' }}">
                        <a href="/admin/settings">
                            <span class="pcoded-mtext">General</span>
                        </a>
                    </li>

                </ul>
                {{-- <ul class="pcoded-submenu">
                    <li class="{{ request()->is('settings/view-duties') ? 'active' : '' }}">
                        <a href="/settings/view-duties">
                            <span class="pcoded-mtext">Custom Duties</span>
                        </a>
                    </li>

                </ul> --}}
                {{-- <ul class="pcoded-submenu">
                    <li class="">
                        <a href="index-1.htm">
                            <span class="pcoded-mtext">Currency Rates</span>
                        </a>
                    </li>

                </ul> --}}
                {{-- <ul class="pcoded-submenu">
                    <li class="">
                        <a href="/suppliers">
                            <span class="pcoded-mtext">Suppliers</span>
                        </a>
                    </li>

                </ul>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="/stores">
                            <span class="pcoded-mtext">Store Locations</span>
                        </a>
                    </li>

                </ul> --}}
            </li>
            <li class="{{ request()->is('admin/customers') ? 'active' : '' }}">
                <a href="/admin/customers">
                    <span class="pcoded-micon"><i class="fa fa-users"></i></span>
                    <span class="pcoded-mtext">Customers</span>
                </a>
            </li>
            {{-- <li class="{{ request()->is('user-groups') ? 'active' : '' }}">
                <a href="/user-groups">
                    <span class="pcoded-micon"><i class="fa fa-cogs"></i></span>
                    <span class="pcoded-mtext">User Roles</span>
                </a>
            </li> --}}

        </ul>
    </div>
    <p class="ml-2" style="font-size: 10px;color: #f5f5f56b">Developed by greenguardexpress.lk
    </p>
</nav>
