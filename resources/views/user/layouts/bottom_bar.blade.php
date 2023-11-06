<header class="header-nav hidden-lg hidden-md">
    <div class="container-nav-bar">
        <nav class="bottom-nav">
            <div class="bottom-nav-item">
                <a href="/">
                    <div class="bottom-nav-link {{ request()->is('/') ? 'active-tab' : null }}">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span>Home</span>
                    </div>
                </a>
            </div>
            <div class="bottom-nav-item">
                <a href="/categories">
                    <div class="bottom-nav-link {{ request()->is('categories') ? 'active-tab' : null }}"
                        id="show-verticalmenu">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                        <span>Categories</span>
                    </div>
                </a>
            </div>

            <div class="bottom-nav-item">
                <a href="/products/all/all">
                    <div class="bottom-nav-link {{ request()->is('products/*') ? 'active-tab' : null }}">
                        <i class="fa fa-list-ol" aria-hidden="true"></i>
                        <span>Products</span>
                    </div>
                </a>
            </div>
            <div class="bottom-nav-item">
                <a href="/cart">
                    <div class="bottom-nav-link {{ request()->is('cart') ? 'active-tab' : null }}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span>Cart</span>
                    </div>
                </a>
            </div>
            <div class="bottom-nav-item">
                <a href="/my-account">
                    <div
                        class="bottom-nav-link {{ request()->is('my-account') || request()->is('login') || request()->is('register') ? 'active' : null }}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>Account</span>
                    </div>
                </a>
            </div>
        </nav>
    </div>
</header>

