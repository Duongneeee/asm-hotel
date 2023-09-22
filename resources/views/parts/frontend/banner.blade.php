<section class="banner">
    <div class="slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slide-inner">
                        <div class="slide-image"
                            style="background-image: url({{asset('client/frontend/images/slider/slider1.jpg')}})">
                        </div>
                        <div class="swiper-content">
                            <h1>Make you Free to <span>travel</span> with us</h1>
                            <p class="mar-bottom-20">Foresee the pain and trouble that are bound to ensue and equal
                                fail in their duty through weakness.</p>
                            <a href class="biz-btn">Explore More</a>
                            <a href class="biz-btn mar-left-10">Contact Us</a>
                        </div>
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-inner">
                        <div class="slide-image"
                            style="background-image: url({{asset('client/frontend/images/slider/slider7.jpg')}})">
                        </div>
                        <div class="swiper-content">
                            <h1><span>Sensation Ice Trip</span> Is Coming For Kids</h1>
                            <p class="mar-bottom-20">Find awesome hotel, tour, car and activities in London, Foresee
                                the pain and trouble</p>
                            <a href class="biz-btn">Find More</a>
                        </div>
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-inner">
                        <div class="slide-image"
                            style="background-image: url({{asset('client/frontend/images/slider/slider3.jpg')}})">
                        </div>
                        <div class="swiper-content">
                            <h1>Your <span>Adventure</span> Wonderful Travel Calls Fast</h1>
                            <p class="mar-bottom-20">Find awesome hotel, tour, car and activities in London to ensue
                                and equal fail in their duty</p>
                            <a href class="biz-btn">View More</a>
                        </div>
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>


<section class="banner-form">
    <div class="container">
        <div class="row display-flex">
            <div class="col-lg-7 col-sm-12">
                <div class="why-us-about">
                    <div class="why-about-inner">
                        <h3 class="mar-bottom-5 themecolor">About NepaYatri</h3>
                        <h2 class="bold">We're truely dedicated to make your travel experience as much as simple and
                            fun as possible</h2>
                        <p class="mar-0">
                            Aliquam erat volutpat. Curabitur tempor nibh quis arcu convallis, sed viverra quam
                            sollicitudin. Proin sed augue sed neque ultricies
                            condimentum. In ac ultrices lectus.<br />
                            Nullam ex elit, vestibulum ut urna non, tincidunt condimentum sem. Sed enim tortor,
                            accumsan at consequat et, tempus sit ame
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-sm-12">
                <div class="form-content">
                    <div class="tab-content">
                        <div id="travel" class="tab-pane in active">
                            <form action="{{route('client.room-search')}}" method="post" class="myForm">
                                @csrf
                                <div class="row filter-box filter-box1">
                                    <h3 class="form-title text-center">Find a Places</h3>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Your Destination</label>
                                            <div class="input-box">
                                                <i class="flaticon-placeholder"></i>
                                                <select class="niceSelect" name="address">
                                                    <option value="">Where are you going?</option>
                                                    @foreach ($selectHotel as $item)
                                                    <option value="{{$item->id}}">{{$item->address}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Check In</label>
                                            <div class="input-box">
                                                <i class="flaticon-calendar"></i>
                                                <input id="date-range0" type="text" name="checkin" placeholder="yyyy-mm-dd" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Check Out</label>
                                            <div class="input-box">
                                                <i class="flaticon-calendar"></i>
                                                <input id="date-range1" type="text" name="checkout" placeholder="yyyy-mm-dd" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Adult</label>
                                            <div class="input-box">
                                                <i class="flaticon-add-user"></i>
                                                <select class="niceSelect" name="adult">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Children</label>
                                            <div class="input-box">
                                                <i class="flaticon-add-user"></i>
                                                <select class="niceSelect" name="children">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 offset-sm-2">
                                        <div class="form-group mar-top-5 mar-bottom-0 text-center">
                                            <a href="" class="biz-btn biz-btn1 submitLink"><i class="fa fa-search"></i> Find
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>