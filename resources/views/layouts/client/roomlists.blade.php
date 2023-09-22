@extends('layouts.frontend')
@section('content')
<section class="breadcrumb-outer text-center">
    <div class="container">
        <div class="breadcrumb-content">
            <h2 class="white">@if (!empty($hotel->address))
                {{$hotel->address}}
                @endif Hotel </h2>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@if (!empty($hotel->address) )
                        {{$hotel->address}}
                        @endif Hotel</li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="overlay"></div>
</section>

<section class="list">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-8 col-12">
                <div class="trend-box">
                    @if (session('msg'))
                    <div class="list-results display-flex space-between ">
                        <div class="list-results-sort pull-left">
                            <p class="mar-0 text-danger">{{session('msg')}}</p>
                        </div>
                    </div>
                    @endif


                    <div class="row">
                        @foreach ($rooms as $room)
                        <div class="col-lg-6 col-md-6 col-12 mar-bottom-30">
                            <div class="trend-item">
                                <div class="ribbon ribbon-top-left"><span>25% OFF</span></div>
                                <div class="trend-image">
                                    <img src="{{asset('storage/images/'.$room->image)}}" alt="image" />
                                    <div class="trend-tags">
                                        <form action="{{route('client.accounts.add-wishlist',$room->id)}}" method="post" class="myForm">
                                            @csrf
                                            <a href="#" class="submitLink"><i class="flaticon-like"></i></a>
                                        </form>
                                    </div>
                                    <div class="trend-price">
                                        <p class="price">From <span>{{number_format($room->roomtype->price)}}VNĐ</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="trend-content">
                                    <p>{{--<i class="flaticon-location-pin"></i>--}}{{$room->roomtype->name}}</p>
                                    <h4><a href="{{route('client.detail-room',$room->id)}}">Phòng {{$room->name}}</a>
                                    </h4>
                                    <div class="rating mar-bottom-15">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                    <span class="mar-left-5">38 Reviews</span>
                                    <div class="row">
                                        <div class="col-6"><a href="{{route('client.booking-room',$room->id)}}"
                                                class="biz-btn-black">Book now</a></div>

                                        <div class="col-6"><a href="{{route('client.add-to-cart',$room->id)}}"
                                                class="biz-btn-black text-right">Add to cart</a></div>
                                    </div>

                                    <p>

                                    </p>
                                    {{-- <p class="mar-0">{{$room->roomtype->name}}</p> --}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @include('layouts.client.custom_paginate',['items'=>$rooms])
            </div>
            <div class="col-lg-4 col-12">
                <div class="list-sidebar">
                    <div class="sidebar-item">
                        <form class="filter-box myForm" action="{{route('client.room-search')}}" method="POST">
                            @csrf
                            <h3 class="white">Find The Places</h3>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="white">Your Destination</label>
                                        <div class="input-box">
                                            <i class="flaticon-placeholder"></i>
                                            <select class="niceSelect" name="address">
                                                <option value="">Where are you going?</option>
                                                @foreach ($hotels as $hotel)
                                                <option value="{{$hotel->id}}">{{$hotel->address}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="white">Check In</label>
                                        <div class="input-box">
                                            <i class="flaticon-calendar"></i>
                                            <input id="date-range0" type="text" name="checkin"
                                                placeholder="yyyy-mm-dd" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="white">Check Out</label>
                                        <div class="input-box">
                                            <i class="flaticon-calendar"></i>
                                            <input id="date-range1" type="text" name="checkout"
                                                placeholder="yyyy-mm-dd" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="white">Adult</label>
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
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="white">Children</label>
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
                                <div class="col-12">
                                    <div class="form-group mar-top-15">
                                        <a class="biz-btn submitLink text-white">Search</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-item">
                        <div class="map-box mar-0">
                            <i class="fa fa-map-marker"></i>
                            <a href="#">Show on Map</a>
                        </div>
                    </div>
                    <div class="sidebar-item">
                        <h3>Star Rating</h3>
                        <div class="pretty p-default p-thick p-pulse p-curve">
                            <input type="checkbox" />
                            <div class="state">
                                <label>
                                    <div class="star-rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse p-curve">
                            <input type="checkbox" />
                            <div class="state">
                                <label>
                                    <div class="star-rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse p-curve">
                            <input type="checkbox" />
                            <div class="state">
                                <label>
                                    <div class="star-rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse p-curve">
                            <input type="checkbox" />
                            <div class="state">
                                <label>
                                    <div class="star-rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse p-curve">
                            <input type="checkbox" />
                            <div class="state">
                                <label>
                                    <div class="star-rating">
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-item">
                        <h3>Price Range(VNĐ)</h3>
                        <div class="range-slider">
                            <div data-min="0" data-max="2000" data-unit="$" data-min-name="min_price"
                                data-max-name="max_price"
                                class="range-slider-ui ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                aria-disabled="false">
                                <span class="min-value">0 VNĐ</span>
                                <span class="max-value">2000 VNĐ</span>
                                <div class="ui-slider-range ui-widget-header ui-corner-all full"
                                    style="left: 0%; width: 100%"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    {{-- <div class="sidebar-item">
                        <h3>Guest Rating</h3>
                        <div class="guest-btn">
                            <ul>
                                <li><a href="#">3+</a></li>
                                <li><a href="#">3.5+</a></li>
                                <li><a href="#">4+</a></li>
                                <li><a href="#">4.5+</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-item">
                        <h3>Meals</h3>
                        <div class="pretty p-default p-thick p-pulse">
                            <input type="checkbox" />
                            <div class="state">
                                <label> Breakfast Included<span class="number">749</span> </label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse">
                            <input type="checkbox" checked />
                            <div class="state">
                                <label> All-inclusive<span class="number">630</span> </label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse">
                            <input type="checkbox" />
                            <div class="state">
                                <label> Breakfast & dinner included<span class="number">58</span> </label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse">
                            <input type="checkbox" />
                            <div class="state">
                                <label> Kitchen Utilities<span class="number">29</span> </label>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-item">
                        <h3>Facilities</h3>
                        <div class="pretty p-default p-thick p-pulse">
                            <input type="checkbox" />
                            <div class="state">
                                <label> Parking<span class="number">749</span> </label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse">
                            <input type="checkbox" checked />
                            <div class="state">
                                <label> Restaurant<span class="number">630</span> </label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse">
                            <input type="checkbox" />
                            <div class="state">
                                <label> Pet Friendly<span class="number">58</span> </label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse">
                            <input type="checkbox" />
                            <div class="state">
                                <label> Room Service<span class="number">29</span> </label>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-item">
                        <h3>Property Type</h3>
                        <div class="pretty p-default p-thick p-pulse">
                            <input type="checkbox" />
                            <div class="state">
                                <label> Hotels<span class="number">749</span> </label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse">
                            <input type="checkbox" checked />
                            <div class="state">
                                <label> Apartments<span class="number">630</span> </label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse">
                            <input type="checkbox" />
                            <div class="state">
                                <label> Bed and Breakfasts<span class="number">58</span> </label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse">
                            <input type="checkbox" />
                            <div class="state">
                                <label> Resorts<span class="number">29</span> </label>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-item">
                        <h3>City</h3>
                        <div class="pretty p-default p-thick p-pulse">
                            <input type="checkbox" />
                            <div class="state">
                                <label> Amsterdam<span class="number">749</span> </label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse">
                            <input type="checkbox" checked />
                            <div class="state">
                                <label> Rotterdam<span class="number">630</span> </label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse">
                            <input type="checkbox" />
                            <div class="state">
                                <label> Valkenburg<span class="number">58</span> </label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse">
                            <input type="checkbox" />
                            <div class="state">
                                <label> Eindhoven<span class="number">29</span> </label>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>


@endsection