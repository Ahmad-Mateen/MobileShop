<div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
    <div class="d-flex align-items-center p-3">
        <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4">Mobile
            Store</a>
        <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
    </div>
    <ul class="sidebar-menu p-3 m-0 mb-0">
        <li class="sidebar-menu-item active">
            <a href="#">
                <i class="ri-dashboard-line sidebar-menu-item-icon"></i>
                Dashboard
            </a>
        </li>
        <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Banner</li>
        <li class="sidebar-menu-item has-dropdown">
            <a href="#">
                <i class="ri-pages-line sidebar-menu-item-icon"></i>
                Banners
                <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
            </a>
            <ul class="sidebar-dropdown-menu">
                <li class="sidebar-dropdown-menu-item">
                    <a href="{{route('admin.banner.index')}}">
                        Banners
                    </a>
                </li>
                <li class="sidebar-dropdown-menu-item">
                    <a href="{{route('admin.banner.create')}}">
                        Add Banner
                    </a>
                </li>

            </ul>
        </li>
        {{-- Catageory --}}
        <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Shop</li>
        <li class="sidebar-menu-item has-dropdown">
            <a href="#">
                <i class="ri-pages-line sidebar-menu-item-icon"></i>
                Catageory
                <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
            </a>
            <ul class="sidebar-dropdown-menu">
                <li class="sidebar-dropdown-menu-item">
                    <a href="{{route('admin.category.index')}}">
                        Catageory
                    </a>
                </li>
                <li class="sidebar-dropdown-menu-item">
                    <a href="{{route('admin.category.create')}}">
                        Add Catageory
                    </a>
                </li>

            </ul>
        </li>
      {{-- Catageory end --}}
      {{-- brand --}}

      <li class="sidebar-menu-item has-dropdown">
          <a href="#">
              <i class="ri-pages-line sidebar-menu-item-icon"></i>
              Brand
              <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
          </a>
          <ul class="sidebar-dropdown-menu">
              <li class="sidebar-dropdown-menu-item">
                  <a href="{{route('admin.banner.index')}}">
                      Brands
                  </a>
              </li>
              <li class="sidebar-dropdown-menu-item">
                  <a href="{{route('admin.banner.create')}}">
                      Add Brand
                  </a>
              </li>

          </ul>
      </li>
    {{-- brand end --}}

      {{-- Product --}}
        <li class="sidebar-menu-item has-dropdown">
            <a href="#">
                <i class="ri-pages-line sidebar-menu-item-icon"></i>
                Products
                <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
            </a>
            <ul class="sidebar-dropdown-menu">
                <li class="sidebar-dropdown-menu-item">
                    <a href="{{route('admin.product.index')}}">
                        Products
                    </a>
                </li>
                <li class="sidebar-dropdown-menu-item">
                    <a href="{{route('admin.product.create')}}">
                        Add Product
                    </a>
                </li>

            </ul>
        </li>
        {{-- Users --}}
        <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Users</li>
        <li class="sidebar-menu-item has-dropdown">
            <a href="{{route('admin.user.index')}}">
                <i class="ri-pages-line sidebar-menu-item-icon"></i>
                Users
                <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
            </a>
            <ul class="sidebar-dropdown-menu">
                <li class="sidebar-dropdown-menu-item">
                    <a href="{{route('admin.user.index')}}">
                        Users
                    </a>
                </li>
                <li class="sidebar-dropdown-menu-item">
                    <a href="{{route('admin.user.create')}}">
                        Add User
                    </a>
                </li>

            </ul>
        </li>
       
</div>


<div class="sidebar-overlay"></div>
