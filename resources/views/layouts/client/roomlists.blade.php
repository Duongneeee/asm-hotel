@extends('layouts.frontend')
@section('content')
<div>
    <div class="slider fullscreen">
        <ul class="slides">
            @foreach ($banners as $banner)
            <li> <img src="{{asset('storage/images/'.$banner->image)}}" alt="">
                <!-- random image -->
                <div class="caption center-align slid-cap">
                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                    <h2>This is our big Tagline!</h2>
                    <p>Mauris non placerat nulla. Sed vestibulum quam mauris, et malesuada tortor venenatis
                        at.Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor
                        ut
                        imperdiet a, pellentesque id mi.</p> 
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="inn-body-section pad-bot-55">
    <div class="container">
        <div class="row">
            <div class="page-head">

                <h2>{{$roomtype->name}}</h2>
                <div class="head-title">
                    <div class="hl-1"></div>
                    <div class="hl-2"></div>
                    <div class="hl-3"></div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                    laoreet.</p>
            </div>
            <!--ROOM SECTION-->
            @foreach ($rooms as $room)
            <div class="room">
                <div class="ribbon ribbon-top-left"><span>Featured</span>
                </div>
                <!--ROOM IMAGE-->
                <div class="r1 r-com"><img src="{{asset('storage/images/'.$room->image)}}" alt="" />
                </div>
                <!--ROOM RATING-->
                <div class="r2 r-com">
                    <h4>{{$room->name}}</h4>
                    <div class="r2-ratt"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <img
                            src="images/h-trip.png" alt="" /> <span>Excellent 4.5 / 5</span> </div>
                    <ul>
                        <li>Max Adult : 3</li>
                        <li>Max Child : 1</li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <!--ROOM AMINITIES-->
                <div class="r3 r-com">
                    <ul>
                        <li>Ironing facilities</li>
                        <li>Tea/Coffee maker</li>
                        <li>Air conditioning</li>
                        <li>Flat-screen TV</li>
                        <li>Wake-up service</li>
                    </ul>
                </div>
                <!--ROOM PRICE-->
                <div class="r4 r-com">
                    <p>Price for 1 night</p>
                    <p><span class="room-price-1">{{$room->roomtype->price}}</span> <span class="room-price">$:
                            7000</span>
                    </p>
                    <p>Non Refundable</p>
                </div>
                <!--ROOM BOOKING BUTTON-->
                <div class="r5 r-com">
                    <div class="r2-available">Available</div>
                    <p>Price for 1 night</p> <a href="{{route('client.detail-room',$room->id)}}"
                        class="inn-room-book">Detail</a>
                </div>
            </div>
            @endforeach
            <!--END ROOM SECTION-->
            <!--ROOM SECTION-->
            {{-- <div class="room">
                <div class="ribbon ribbon-top-left"><span>Featured</span>
                </div>
                <!--ROOM IMAGE-->
                <div class="r1 r-com"><img src="images/room/2.jpg" alt="" />
                </div>
                <!--ROOM RATING-->
                <div class="r2 r-com">
                    <h4>Mini Suite</h4>
                    <div class="r2-ratt"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <img
                            src="images/h-trip.png" alt="" /> <span>Excellent 4.2 / 5</span> </div>
                    <ul>
                        <li>Max Adult : 2</li>
                        <li>Max Child : 2</li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <!--ROOM AMINITIES-->
                <div class="r3 r-com">
                    <ul>
                        <li>Ironing facilities</li>
                        <li>Tea/Coffee maker</li>
                        <li>Air conditioning</li>
                        <li>Flat-screen TV</li>
                        <li>Wake-up service</li>
                    </ul>
                </div>
                <!--ROOM PRICE-->
                <div class="r4 r-com">
                    <p>Price for 1 night</p>
                    <p><span class="room-price-1">4000</span> <span class="room-price">$: 4500</span>
                    </p>
                    <p>Non Refundable</p>
                </div>
                <!--ROOM BOOKING BUTTON-->
                <div class="r5 r-com">
                    <div class="r2-available">Available</div>
                    <p>Price for 1 night</p> <a href="room-details.html" class="inn-room-book">Book</a>
                </div>
            </div>
            <!--END ROOM SECTION-->
            <!--ROOM SECTION-->
            <div class="room">
                <!--<div class="ribbon ribbon-top-left"><span>Featured</span></div>
                -->
                <!--ROOM IMAGE-->
                <div class="r1 r-com"><img src="images/room/3.jpg" alt="" />
                </div>
                <!--ROOM RATING-->
                <div class="r2 r-com">
                    <h4>Ultra Deluxe</h4>
                    <div class="r2-ratt"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <img
                            src="images/h-trip.png" alt="" /> <span>Excellent 3.9 / 5</span> </div>
                    <ul>
                        <li>Max Adult : 4</li>
                        <li>Max Child : 2</li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <!--ROOM AMINITIES-->
                <div class="r3 r-com">
                    <ul>
                        <li>Ironing facilities</li>
                        <li>Tea/Coffee maker</li>
                        <li>Air conditioning</li>
                        <li>Flat-screen TV</li>
                        <li>Wake-up service</li>
                    </ul>
                </div>
                <!--ROOM PRICE-->
                <div class="r4 r-com">
                    <p>Price for 1 night</p>
                    <p><span class="room-price-1">3500</span> <span class="room-price">$: 4000</span>
                    </p>
                    <p>Non Refundable</p>
                </div>
                <!--ROOM BOOKING BUTTON-->
                <div class="r5 r-com">
                    <div class="r2-available">Available</div>
                    <p>Price for 1 night</p> <a href="room-details-1.html" class="inn-room-book">Book</a>
                </div>
            </div>
            <!--END ROOM SECTION-->
            <!--ROOM SECTION-->
            <div class="room">
                <!--<div class="ribbon ribbon-top-left"><span>Best Room</span></div>-->
                <!--ROOM IMAGE-->
                <div class="r1 r-com"><img src="images/room/4.jpg" alt="" />
                </div>
                <!--ROOM RATING-->
                <div class="r2 r-com">
                    <h4>Luxury Room</h4>
                    <div class="r2-ratt"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <img
                            src="images/h-trip.png" alt="" /> <span>Excellent 4.0 / 5</span> </div>
                    <ul>
                        <li>Max Adult : 5</li>
                        <li>Max Child : 2</li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <!--ROOM AMINITIES-->
                <div class="r3 r-com">
                    <ul>
                        <li>Ironing facilities</li>
                        <li>Tea/Coffee maker</li>
                        <li>Air conditioning</li>
                        <li>Flat-screen TV</li>
                        <li>Wake-up service</li>
                    </ul>
                </div>
                <!--ROOM PRICE-->
                <div class="r4 r-com">
                    <p>Price for 1 night</p>
                    <p><span class="room-price-1">3000</span> <span class="room-price">$: 3500</span>
                    </p>
                    <p>Non Refundable</p>
                </div>
                <!--ROOM BOOKING BUTTON-->
                <div class="r5 r-com">
                    <div class="r2-available">Available</div>
                    <p>Price for 1 night</p> <a href="room-details.html" class="inn-room-book">Book</a>
                </div>
            </div>
            <!--END ROOM SECTION-->
            <!--ROOM SECTION-->
            <div class="room">
                <div class="ribbon ribbon-top-left"><span>Special</span>
                </div>
                <!--ROOM IMAGE-->
                <div class="r1 r-com"><img src="images/room/5.jpg" alt="" />
                </div>
                <!--ROOM RATING-->
                <div class="r2 r-com">
                    <h4>Premium Room</h4>
                    <div class="r2-ratt"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <img
                            src="images/h-trip.png" alt="" /> <span>Excellent 4.5 / 5</span> </div>
                    <ul>
                        <li>Max Adult : 5</li>
                        <li>Max Child : 2</li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <!--ROOM AMINITIES-->
                <div class="r3 r-com">
                    <ul>
                        <li>Ironing facilities</li>
                        <li>Tea/Coffee maker</li>
                        <li>Air conditioning</li>
                        <li>Flat-screen TV</li>
                        <li>Wake-up service</li>
                    </ul>
                </div>
                <!--ROOM PRICE-->
                <div class="r4 r-com">
                    <p>Price for 1 night</p>
                    <p><span class="room-price-1">4000</span> <span class="room-price">$: 5000</span>
                    </p>
                    <p>Non Refundable</p>
                </div>
                <!--ROOM BOOKING BUTTON-->
                <div class="r5 r-com">
                    <div class="r2-available">Available</div>
                    <p>Price for 1 night</p> <a href="room-details-block.html" class="inn-room-book">Book</a>
                </div>
            </div>
            <!--END ROOM SECTION-->
            <!--ROOM SECTION-->
            <div class="room">
                <!--<div class="ribbon ribbon-top-left"><span>Featured</span></div>-->
                <!--ROOM IMAGE-->
                <div class="r1 r-com"><img src="images/room/6.jpg" alt="" />
                </div>
                <!--ROOM RATING-->
                <div class="r2 r-com">
                    <h4>Normal Room</h4>
                    <div class="r2-ratt"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <img
                            src="images/h-trip.png" alt="" /> <span>Excellent 3.5 / 5</span> </div>
                    <ul>
                        <li>Max Adult : 4</li>
                        <li>Max Child : 4</li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <!--ROOM AMINITIES-->
                <div class="r3 r-com">
                    <ul>
                        <li>Ironing facilities</li>
                        <li>Tea/Coffee maker</li>
                        <li>Air conditioning</li>
                        <li>Flat-screen TV</li>
                        <li>Wake-up service</li>
                    </ul>
                </div>
                <!--ROOM PRICE-->
                <div class="r4 r-com">
                    <p>Price for 1 night</p>
                    <p><span class="room-price-1">2000</span> <span class="room-price">$: 2500</span>
                    </p>
                    <p>Non Refundable</p>
                </div>
                <!--ROOM BOOKING BUTTON-->
                <div class="r5 r-com">
                    <div class="r2-available">Available</div>
                    <p>Price for 1 night</p> <a href="room-details.html" class="inn-room-book">Book</a>
                </div>
            </div> --}}
            <!--END ROOM SECTION-->
        </div>
    </div>
</div>1
@endsection