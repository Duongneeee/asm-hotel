<header class="main_header_area">
    <div class="header-content">
        <div class="container">
            <div class="links links-left">
                <ul>
                    <li>
                        <a href="#"><i class="fa fa-phone-alt"></i> (000)999-898-888</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope-open"></i> <span class="__cf_email__"
                                data-cfemail="1e777078715e507b6e7f677f6a6c77307d7173">[email&#160;protected]</span></a>
                    </li>
                </ul>
            </div>
            <div class="links links-right pull-right">
                <ul>
                    <li>
                        <ul class="social-links">
                            <li>
                                <a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </li>
                    @if (Auth::user())
                    @if (Auth::user()->role->name == 'Admin')
                    <li>
                        <a href="{{route('admin.dashboard')}}" {{--data-toggle="modal" data-target="#login" --}}
                            id="login-button"><i class="fa fa-sign-in-alt"></i>
                            Admin</a>
                    </li>
                    @endif
                    <li>
                        <form method="POST" action="{{ route('logout')}}" class="myForm">
                            @csrf

                            <a href="" {{--data-toggle="modal" data-target="#register" --}} class="submitLink"><i
                                    class="fa fa-sign-out-alt"></i>
                                Logout</a>
                        </form>
                    </li>
                    @else
                    <li>
                        <a href="{{route('login')}}" {{--data-toggle="modal" data-target="#login" --}}
                            id="login-button"><i class="fa fa-sign-in-alt"></i>
                            Login</a>
                    </li>
                    <li>
                        <a href="{{route('register')}}" {{--data-toggle="modal" data-target="#register" --}}><i
                                class="fa fa-sign-out-alt"></i>
                            Register</a>
                    </li>
                    @endif

                    <li>
                        <div class="header_sidemenu">
                            <div class="menu">
                                <div class="close-menu">
                                    <i class="fa fa-times white"></i>
                                </div>
                                <div class="m-contentmain">
                                    <div class="m-logo mar-bottom-30">
                                        <img src="{{asset('client/frontend/images/logo-white.png')}}" alt="m-logo" />
                                    </div>
                                    <div class="content-box mar-bottom-30">
                                        <h3 class="white">Get In Touch</h3>
                                        <p class="white">
                                            We must explain to you how all seds this mistakens idea off denouncing
                                            pleasures and praising pain was born and I will give you a
                                            completed accounts..
                                        </p>
                                        <a href="#" class="biz-btn biz-btn1">Consultation</a>
                                    </div>
                                    <div class="contact-info">
                                        <h4 class="white">Contact Info</h4>
                                        <ul>
                                            <li><i class="fa fa-map-marker-alt"></i> Travel 26, Old Brozon Mall,
                                                Newyrok NY 10005</li>
                                            <li><i class="fa fa-phone-alt"></i>555 626-0234</li>
                                            <li><i class="fa fa-envelope-open"></i><a
                                                    href="https://htmldesigntemplates.com/cdn-cgi/l/email-protection"
                                                    class="__cf_email__"
                                                    data-cfemail="50232520203f22241024223126353c7e333f3d">[email&#160;protected]</a>
                                            </li>
                                            <li><i class="fa fa-clock"></i> Week Days: 09.00 to 18.00 Sunday: Closed
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="mhead">
                                <span class="menu-ham"><i class="fa fa-bars white"></i></span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="header_menu affix-top">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-flex">

                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{route('index')}}">
                            <img src="{{asset('client/frontend/images/logo-black.png')}}" alt="image" />
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav" id="responsive-menu">
                            <li class="dropdown submenu active">
                                <a href="{{route('index')}}" class="dropdown-toggle" {{--data-toggle="dropdown" --}}
                                    role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                            </li>
                            {{-- <li class="submenu dropdown">
                                <a href="index-flights.html" class="dropdown-toggle" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">Flights <i
                                        class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index-flights.html">Flight Home</a></li>
                                    <li><a href="flightlist.html">Flight Grid</a></li>
                                    <li><a href="flightlist-1.html">Flight List</a></li>
                                    <li><a href="flight-single.html">Flight Detail</a></li>
                                    <li><a href="flight-booking.html">Booking</a></li>
                                    <li><a href="flight-confirm.html">Thank You</a></li>
                                </ul>
                            </li>
                            <li class="submenu dropdown">
                                <a href="index-hotel.html" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Hotel <i class="fa fa-angle-down"
                                        aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index-hotel.html">Hotel Home</a></li>
                                    <li class="submenu dropdown">
                                        <a href="hotellist-1.html.html" class="dropdown-toggle" data-toggle="dropdown"
                                            role="button" aria-haspopup="true" aria-expanded="false">Hotel Lists<i
                                                class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="hotellist-1.html">Hotel List 1</a></li>
                                            <li><a href="hotellist-2.html">Hotel List 2</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu dropdown">
                                        <a href="hotelsingle-1.html" class="dropdown-toggle" data-toggle="dropdown"
                                            role="button" aria-haspopup="true" aria-expanded="false">Hotel Detail<i
                                                class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="hotelsingle-1.html">Hotel Single 1</a></li>
                                            <li><a href="hotelsingle-2.html">Hotel Single 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="hotel-booking.html">Hotel Booking</a></li>
                                </ul>
                            </li>
                            <li class="submenu dropdown">
                                <a href="index-cars.html" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Cars <i class="fa fa-angle-down"
                                        aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index-cars.html">Cars Home</a></li>
                                    <li><a href="car-grid-view.html">Cars Grid</a></li>
                                    <li><a href="car-list-view.html">Cars List</a></li>
                                    <li><a href="car-detail.html">Cars Detail</a></li>
                                    <li><a href="car-booking.html">Cars Booking</a></li>
                                </ul>
                            </li>
                            <li class="submenu dropdown">
                                <a href="index-cruise.html" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Cruise <i class="fa fa-angle-down"
                                        aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index-cruise.html">Cruise Home</a></li>
                                    <li><a href="cruise-grid-view.html">Cruise Grid</a></li>
                                    <li><a href="cruise-list-view.html">Cruise List</a></li>
                                    <li><a href="cruise-detail.html">Cruise Detail</a></li>
                                    <li><a href="cruise-booking.html">Cruise Booking</a></li>
                                </ul>
                            </li>
                            <li class="submenu dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Pages <i class="fa fa-angle-down"
                                        aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="submenu dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                            aria-haspopup="true" aria-expanded="false">Tour <i class="fa fa-angle-right"
                                                aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="tourlist-1.html">Tour List 1</a></li>
                                            <li><a href="tourlist-2.html">Tour List 2</a></li>
                                            <li><a href="tourlist-3.html">Tour List 3</a></li>
                                            <li><a href="toursinge-1.html">Tour Single 1</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu dropdown">
                                        <a href="service.html" class="dropdown-toggle" data-toggle="dropdown"
                                            role="button" aria-haspopup="true" aria-expanded="false">Service<i
                                                class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="service.html">Service</a></li>
                                            <li><a href="service-detail.html">Service Detail</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu dropdown">
                                        <a href="about.html" class="dropdown-toggle" data-toggle="dropdown"
                                            role="button" aria-haspopup="true" aria-expanded="false">About Us <i
                                                class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="about1.html">About Us 1</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu dropdown">
                                        <a href="events.html" class="dropdown-toggle" data-toggle="dropdown"
                                            role="button" aria-haspopup="true" aria-expanded="false">Events<i
                                                class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="events.html">Events One</a></li>
                                            <li><a href="events1.html">Events Two</a></li>
                                            <li><a href="events-detail.html">Events Detail</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu dropdown">
                                        <a href="gallery.html" class="dropdown-toggle" data-toggle="dropdown"
                                            role="button" aria-haspopup="true" aria-expanded="false">Gallery<i
                                                class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="gallery.html">Gallery 1</a></li>
                                            <li><a href="gallery1.html">Gallery 2</a></li>
                                            <li><a href="gallery2.html">Gallery Masonry</a></li>
                                            <li><a href="gallery3.html">Gallery Lightbox</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu dropdown">
                                        <a href="contact.html" class="dropdown-toggle" data-toggle="dropdown"
                                            role="button" aria-haspopup="true" aria-expanded="false">Contact Us <i
                                                class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="contact.html">Contact Us</a></li>
                                            <li><a href="contact1.html">Contact Us 1</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu dropdown">
                                        <a href="404.html" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                            aria-haspopup="true" aria-expanded="false">Error<i class="fa fa-angle-right"
                                                aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="404.html">Error Page 1</a></li>
                                            <li><a href="404-1.html">Error Page 2</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu dropdown">
                                        <a href="comingsoon.html" class="dropdown-toggle" data-toggle="dropdown"
                                            role="button" aria-haspopup="true" aria-expanded="false">Comming Soon<i
                                                class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="comingsoon.html">Coming Soon 1</a></li>
                                            <li><a href="comingsoon-1.html">Coming Soon 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="hotel-booking.html">Booking</a></li>
                                    <li><a href="confirmation.html">Confirmation</a></li>
                                    <li><a href="testimonial.html">Testimonials</a></li>
                                    <li><a href="pricing.html">Pricing</a></li>
                                    <li><a href="terms.html">Terms</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                </ul>
                            </li>
                            <li class="submenu dropdown">
                                <a href="blog-home.html" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Blogs <i class="fa fa-angle-down"
                                        aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="blog-home.html">Blog Homepage</a></li>
                                    <li><a href="blog-list.html">Blog List</a></li>
                                    <li><a href="blog-grid.html">Blog Grid</a></li>
                                    <li><a href="blog-full.html">Blog Fullwidth</a></li>
                                    <li><a href="blog-left.html">Blog Left</a></li>
                                    <li><a href="blog-list.html">Blog Right</a></li>
                                    <li><a href="blog-masonry.html">Blog Masonry</a></li>
                                    <li class="submenu dropdown">
                                        <a href="blog-single.html" class="dropdown-toggle" data-toggle="dropdown"
                                            role="button" aria-haspopup="true" aria-expanded="false">Blog Single <i
                                                class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="blog-single.html">Blog Single</a></li>
                                            <li><a href="single-full.html">Blog Single Full</a></li>
                                            <li><a href="single-left.html">Blog Single Left</a></li>
                                            <li><a href="blog-single.html">Blog Single Right</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>--}}
                            <li class="submenu dropdown">
                                <a href="dashboard.html" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Dashboard<i class="fa fa-angle-down"
                                        aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="">Dashboard</a></li>
                                    <li><a href="{{route('client.accounts.profile')}}">User Profile</a></li>
                                    <li><a href="{{route('client.accounts.show-wishlist')}}">User Wishlist</a></li>
                                    <li><a href="dashboard-messages.html">User Messages</a></li>
                                    <li><a href="{{route('client.accounts.mybooking')}}">Booking History</a></li>
                                </ul>
                            </li>
                            {{-- <li class="submenu dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Shop<i class="fa fa-angle-down"
                                        aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="shop.html">Shop Home</a></li>
                                    <li><a href="shop-list.html">Shop List</a></li>
                                    <li><a href="shop-detail.html">Shop Single</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="login.html">Account</a></li>
                                    <li><a href="forgot-password.html">Forgot Password</a></li>
                                </ul>
                            </li> --}}
                            <li class="dropdown">
                                <a href="#search1" class="mt_search"><i class="fa fa-search"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="{{route('client.cart')}}" class="mt_cart"><i
                                        class="fa fa-shopping-cart"></i><span
                                        class="number-cart">{{session('cart')?count(session('cart')):0}}</span></a>
                            </li>
                        </ul>
                    </div>

                    <div id="slicknav-mobile"></div>
                </div>
            </div>

        </nav>
    </div>

</header>