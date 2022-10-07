<ul class="navbar-nav" id="navbar-nav">
    <li class="menu-title"><span data-key="t-menu">Admin Part</span></li>

    {{-- Banners --}}
    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="sidebarDashboards">
            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Banners</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarDashboards">
            <ul class="nav nav-sm flex-column">

                <li class="nav-item">
                    <a href="{{ route('banners.index') }}" class="nav-link" data-key="t-ecommerce"> All banners </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('banners.create') }}" class="nav-link" data-key="t-ecommerce"> create banner </a>
                </li>
            </ul>
        </div>
    </li> <!-- end Banners Menu -->

    {{-- Brands --}}
    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="sidebarLayouts">
            <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Brands</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarLayouts">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{ route('brands.index') }}" target="_blank" class="nav-link" data-key="t-horizontal">All
                        Brands</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('brands.create') }}" target="_blank" class="nav-link" data-key="t-detached">Add
                        Brand</a>
                </li>
            </ul>
        </div>
    </li> <!-- end Brands Menu -->

    {{-- categories --}}
    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false"
            aria-controls="sidebarApps">
            <i class="ri-apps-2-line"></i> <span data-key="t-apps">Categories</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarApps">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link" data-key="t-calendar"> All Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories.create') }}" class="nav-link" data-key="t-chat"> Create Category </a>
                </li>

            </ul>
        </div>
    </li><!-- end categories Menu -->

    {{-- products --}}
    <li class="nav-item">
        <a class="nav-link menu-link" href="#product" data-bs-toggle="collapse" role="button" aria-expanded="false"
            aria-controls="product">
            <i class="ri-briefcase-4-line"></i> <span data-key="t-apps">products</span>
        </a>
        <div class="collapse menu-dropdown" id="product">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link" data-key="t-calendar"> All products
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.create') }}" class="nav-link" data-key="t-chat"> Create product </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('product-images.create')}}" class="nav-link" data-key="t-chat"> Create image products </a>
                </li>

            </ul>
        </div>
    </li><!-- end Products Menu -->

    {{-- users --}}
    <li class="nav-item">
        <a class="nav-link menu-link" href="#usersLayouts" data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="usersLayouts">
            <i class="ri-team-line"></i> <span data-key="t-layouts">Users</span>
        </a>
        <div class="collapse menu-dropdown" id="usersLayouts">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" target="_blank" class="nav-link" data-key="t-horizontal">All
                        users</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.create') }}" target="_blank" class="nav-link" data-key="t-detached">Add
                        user</a>
                </li>
            </ul>
        </div>
    </li> <!-- end users Menu -->

        {{-- Coupons --}}
        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarCoupons" data-bs-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="sidebarCoupons">
                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Coupons</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarCoupons">
                <ul class="nav nav-sm flex-column">
    
                    <li class="nav-item">
                        <a href="{{ route('coupon.index') }}" class="nav-link" data-key="t-ecommerce"> All Coupons </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('coupon.create') }}" class="nav-link" data-key="t-ecommerce"> create Coupon </a>
                    </li>
                </ul>
            </div>
        </li> <!-- end Coupons Menu -->
    

</ul>
