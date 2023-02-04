 
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-6">
                        <div class="welcome-note">
                            <span class="popover--text" data-toggle="popover"
                                data-content="Welcome to Bigshop ecommerce template."><i
                                    class="icofont-info-square"></i></span>
                            <span class="text">Welcome to {{\App\Models\Settings::value('title')}}</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="language-currency-dropdown d-flex align-items-center justify-content-end">
                            <!-- Language Dropdown -->
                            <div class="language-dropdown">
                                <div class="dropdown">
                                    <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenu1"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        English
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                        <a class="dropdown-item" href="#">Bangla</a>
                                        <a class="dropdown-item" href="#">Arabic</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Currency Dropdown -->
                            <div class="currency-dropdown">
                                <div class="dropdown">
                                    <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        $ USD
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                        <a class="dropdown-item" href="#">৳ BDT</a>
                                        <a class="dropdown-item" href="#">€ Euro</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Menu -->
        <div class="bigshop-main-menu">
            <div class="container">
                <div class="classy-nav-container breakpoint-off">
                    <nav class="classy-navbar" id="bigshopNav">  

                        <!-- Nav Brand -->
                        <a href="/" class="nav-brand"><img src="{{asset(get_setting('logo'))}}" alt="logo"></a>

                        <!-- Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Close -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{route('userhome')}}">Home</a>
                                    </li>
                                    <li><a href="{{route('shop')}}">Shop</a>
                                       
                                    </li>
                                    <li><a href="#">Pages</a>
                                        <div class="megamenu">
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="{{route('about.us')}}">- About Us</a></li>
                                                <li><a href="{{route('contact.us')}}">- Contact</a></li>
                                                <li><a href="{{route('user.auth')}}">- Login &amp; Register</a></li>
                                            </ul>
                                            
                                            
                                        </div>
                                    </li>
                                    <li><a href="{{route('about.us')}}">About Us</a></li>
                                    <li><a href="{{route('contact.us')}}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Hero Meta -->
                        <div class="hero_meta_area ml-auto d-flex align-items-center justify-content-end">
                            <!-- Search -->
                            <div class="search-area">
                                <div class="search-btn"><i class="icofont-search"></i></div>
                                <!-- Form -->
                                <form action="{{route('search')}}" method="get">
                                <div class="search-form d-flex">
                                    <input type="search" id="search_text" name="query" class="form-control" placeholder="Search">
                                    <button type="submit" class="btn btn-primary btn-sm" style="padding-bottom:5px;">Search</button>
                                </div>
                                </form>
                            </div>

                            <!-- Wishlist -->
                            <div class="wishlist-area">
                                <a href="{{route('wishlist')}}" class="wishlist-btn" id="wishlist_counter"><i class="icofont-heart"></i></a>
                            </div>

                            <!-- Cart -->
                            <div class="cart-area">
                                <div class="cart--btn"><i class="icofont-cart"></i> <span class="cart_quantity">{{\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count()}}</span>
                                </div>

                                <!-- Cart Dropdown Content -->
                                <div class="cart-dropdown-content">
                                    <ul class="cart-list">
                                        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                                            
                                       
                                        <li>
                                            <div class="cart-item-desc">
                                                <a href="#" class="image">
                                                    <img src="{{$item->model->photo}}" class="cart-thumb" alt="">
                                                </a>
                                                <div>
                                                    <a href="{{route('product.detail',$item->model->slug)}}">{{$item->name}}</a>
                                                    <p>{{$item->qty}}x - <span class="price">{{number_format($item->price,2)}}</span></p>
                                                </div>
                                            </div>
                                            <span class="cart_delete dropdown-product-remove" data-id="{{$item->rowId}}"><i class="icofont-bin"></i></span>
                                        </li>  
                                         @endforeach

                                    </ul>
                                    <div class="cart-pricing my-4">
                                        <ul>
                                            <li>
                                                <span>Sub Total:</span>
                                                <span>${{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span>
                                            </li>
                                            <!-- <li>
                                               <span>Shipping:</span>
                                                <span>$30.00</span>
                                            </li>-->
                                            <li>
                                                <span>Total:</span>
                                                @if(session()->has('coupon'))
                                                    <span>${{number_format((float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())-\Illuminate\Support\Facades\Session::get('coupon')['value'],2)}}</span>
                                                @else
                                                   <span>${{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="cart-box d-flex">
                                        <a href="{{route('cart')}}" class="btn btn-success btn-sm ">Cart</a>&nbsp;
                                         <a href="{{route('checkout1')}}" class="btn btn-primary btn-sm">Checkout</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Account -->
                            <div class="account-area">
                                <div class="user-thumbnail">
                                  <!-- user avatar part-->
                           
                               <img src="{{asset('backend\assets\images\avatar1.jpg')}}" alt="">
                            
                                </div>
                                <ul class="user-meta-dropdown">
                                    @auth

                                    @php
                                      $first_name=explode(' ',auth()->user()->full_name);  
                                    @endphp

                                    <li class="user-title"><span>Hello</span>&nbsp;<b>{{$first_name[0]}}</b></li>
                                    <li><a href="{{route('user.dashboard')}}">My Account</a></li>
                                    <li><a href="{{route('user.order')}}">Orders List</a></li>
                                    <li><a href="{{route('wishlist')}}">Wishlist</a></li>
                                    <li><a href="{{route('user.logout')}}"><i class="icofont-logout"></i> Logout</a></li>

                                    @else  
                                    <li><a href="{{route('user.auth')}}">Login & Register</a></li>
                                    
                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
   