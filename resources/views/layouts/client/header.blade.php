<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">



    </div>
    <div class="offcanvas__nav__option">
        <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
        <a href="#"><img src="img/icon/heart.png" alt=""></a>
        <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
        <div class="price">$0.00</div>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__text">
        <p>Free shipping, 30-day return or refund guarantee.</p>
    </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p style="padding-top: 5px">Free shipping, 30-day return or refund guarantee.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">
                            <!-- Authentication Links -->
                            @guest

                                    <a class="nav-link" style="margin-right: 5px" href="{{ route('auth.loginform') }}">{{ __('Login') }}</a>

                                    <a class="nav-link" href="{{ route('auth.register') }}">{{ __('Register') }}</a>

                            @else


                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>


                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <a href="{{ route('listOrder', Auth::user()->id) }}" class="dropdown-item">Đơn hàng</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" style="background: lightslategrey !important; color: #000000 !important">
                                            @csrf

                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </div>
                        <div class="header__top__hover">

                            @can('is_admin')
                            <a href="{{ route('admin.index') }}"><span>Admin </span></a>
                            @endcan


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="./index.html"><img src="{{asset('img/logo.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/shop">Shop</a></li>
                        {{-- <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="/login">Login</a></li>
                                <li><a href="/register">Register</a></li>
                                <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li> --}}
                        <li><a href="/contact">Contacts</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    <a href="javscript:" class="search-switch"><img src="{{asset('img/icon/search.png')}}" alt=""></a>

                    <style>
                        .main_menu #search_input_box {
  position: fixed;
  left: 50%;
  -webkit-transform: translateX(-50%);
  -moz-transform: translateX(-50%);
  -ms-transform: translateX(-50%);
  -o-transform: translateX(-50%);
  transform: translateX(-50%);
  width: 100%;
  max-width: 1140px;
  z-index: 999;
  text-align: center;
  background: #ffffffbe;
}

/* line 60, ../../01 cl html template/03_jun 2019/188_Aranoz shop_html/sass/_menu.scss */
.main_menu #search_input_box ::placeholder {
  color: rgb(0, 0, 0);
}

@media (max-width: 991px) {
  /* line 46, ../../01 cl html template/03_jun 2019/188_Aranoz shop_html/sass/_menu.scss */
  .main_menu #search_input_box {
    margin-top: 15px;
  }
}

/* line 70, ../../01 cl html template/03_jun 2019/188_Aranoz shop_html/sass/_menu.scss */
.main_menu #search_input_box .form-control {
  background: transparent;
  border: 0;
  color: #000000;
  font-weight: 400;
  font-size: 15px;
  padding: 0;
}

/* line 79, ../../01 cl html template/03_jun 2019/188_Aranoz shop_html/sass/_menu.scss */
.main_menu #search_input_box .btn {
  width: 0;
  height: 0;
  padding: 0;
  border: 0;
}

/* line 86, ../../01 cl html template/03_jun 2019/188_Aranoz shop_html/sass/_menu.scss */
.main_menu #search_input_box .ti-close {
  color: rgb(0, 0, 0);
  font-weight: 600;
  cursor: pointer;
  padding: 10px;
  padding-right: 0;
}
                    </style>
                    <a href="#"><img src="{{asset('img/icon/heart.png')}}" alt=""></a>
                    <a href="/shoppingCart"><img src="{{asset('img/icon/cart.png')}}" alt=""> <span>0</span></a>
                    <div class="price">$0.00</div>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
<!-- Header Section End -->
