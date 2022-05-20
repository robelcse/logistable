<header class="main-nav">

      <div class="sidebar-user text-center">
      <a class="setting-primary" href="{{ url('user',Auth::user()->id)}}"><i data-feather="settings"></i></a>
        <img class="img-90 rounded-circle" src="{{ asset('/assets/images/dashboard/1.png') }}" alt="">
        <div class="badge-bottom">
        </div><a href="user-profile.html">
          <h6 class="mt-3 f-14 f-w-600"></h6>
        </a>
        <p class="mb-0 font-roboto">{{ Auth::user()->name}}</p>
      </div>
      <nav>
        <div class="main-navbar">
          <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
          <div id="mainnav">
            <ul class="nav-menu custom-scrollbar">
              <li class="back-btn">
               
              </li>
              <li><a class="nav-link menu-title link-nav {{ Request::is('dashboard') ? 'actitve' : '' }}" href="{{ url('dashboard')}}"><i data-feather="home"></i><span>Dashboard</span></a></li>
              <li><a class="nav-link menu-title link-nav {{ Request::is('web-shop*') ? 'actitve' : '' }}" href="{{ url('web-shop')}}"><i data-feather="shopping-cart"></i><span>Shops</span></a></li>
              <li><a class="nav-link menu-title link-nav {{ Request::is('products*') ? 'actitve' : '' }}" href="{{ url('products')}}"><i data-feather="box"></i><span>Products</span></a></li>
              <li><a class="nav-link menu-title link-nav {{ Request::is('orders*') ? 'actitve' : '' }}" href="{{ url('orders')}}"><i data-feather="shopping-bag"></i><span>Orders</span></a></li>

              <li><a class="nav-link menu-title link-nav {{ Request::is('customers*')  ? ' actitve' : '' }}" href="{{ url('customers')}}"><i data-feather="users"></i><span>Customers</span></a></li>

              <li><a class="nav-link menu-title link-nav {{ Request::is('shipings*')  ? ' actitve' : '' }}" href="{{ url('shipings')}}"><i data-feather="briefcase"></i><span>Shiping</span></a></li>

              <li><a class="nav-link menu-title link-nav {{ Request::is('cupons*')  ? ' actitve' : '' }}" href="{{ url('coupons')}}"><i data-feather="gift"></i><span>Cupon</span></a></li>

             <li class="custom_hover"><a class="nav-link menu-title link-nav btn-primary-light" href="{{ route('integrations')}}"><i data-feather="anchor"></i><span>Integration</span></a></li>
             <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="book-open"></i><span>Learning</span></a>
                <ul class="nav-submenu menu-content">
                  <li><a href="#">Learning List</a></li>
                  <li><a href="#">Detailed Course</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
      </nav>
    </header>