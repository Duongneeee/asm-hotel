@extends('layouts.frontend')
@section('content')
<section class="breadcrumb-outer text-center">
    <div class="container">
        <div class="breadcrumb-content">
            <h2 class="white">Hotel {{$room->roomtype->name}}</h2>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Hotel {{$room->roomtype->name}}</li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="overlay"></div>
</section>


<section class="hotel-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="single-content">
                    <div class="single-title mar-bottom-30">
                        <h2>Phòng {{$room->name}}</h2>
                        <div class="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                        <p><i class="flaticon-location-pin"></i> {{$room->hotel->address}}</p>
                    </div>
                    <div class="single-slider mar-bottom-30">
                        <div class="slider-1 slider-store">
                            <div class="detail-slider-item">
                                <img src="{{asset('client/frontend/images/detail-slider/slider1.jpg')}}" alt="image" />
                            </div>
                            <div class="detail-slider-item">
                                <img src="{{asset('client/frontend/images/detail-slider/slider2.jpg')}}" alt="image" />
                            </div>
                            <div class="detail-slider-item">
                                <img src="{{asset('client/frontend/images/detail-slider/slider3.jpg')}}" alt="image" />
                            </div>
                            <div class="detail-slider-item">
                                <img src="{{asset('client/frontend/images/detail-slider/slider4.jpg')}}" alt="image" />
                            </div>
                            <div class="detail-slider-item">
                                <img src="{{asset('client/frontend/images/detail-slider/slider5.jpg')}}" alt="image" />
                            </div>
                            <div class="detail-slider-item">
                                <img src="{{asset('client/frontend/images/detail-slider/slider6.jpg')}}" alt="image" />
                            </div>
                            <div class="detail-slider-item">
                                <img src="{{asset('client/frontend/images/detail-slider/slider7.jpg')}}" alt="image" />
                            </div>
                            <div class="detail-slider-item">
                                <img src="{{asset('client/frontend/images/detail-slider/slider8.jpg')}}" alt="image" />
                            </div>
                            <div class="detail-slider-item">
                                <img src="{{asset('client/frontend/images/detail-slider/slider9.jpg')}}" alt="image" />
                            </div>
                        </div>
                        <div class="slider-1 slider-thumbs">
                            <div class="detail-slider-item">
                                <img src="{{asset('client/frontend/images/detail-slider/slider1.jpg')}}" alt="image" />
                            </div>
                            <div class="detail-slider-item">
                                <img src="{{asset('client/frontend/images/detail-slider/slider2.jpg')}}" alt="image" />
                            </div>
                            <div class="detail-slider-item">
                                <img src="{{asset('client/frontend/images/detail-slider/slider3.jpg')}}" alt="image" />
                            </div>
                            <div class="detail-slider-item">
                                <img src="{{asset('client/frontend/images/detail-slider/slider4.jpg')}}" alt="image" />
                            </div>
                            <div class="detail-slider-item">
                                <img src="{{asset('client/frontend/images/detail-slider/slider5.jpg')}}" alt="image" />
                            </div>
                            <div class="detail-slider-item">
                                <img src="{{asset('client/frontend/images/detail-slider/slider6.jpg')}}" alt="image" />
                            </div>
                            <div class="detail-slider-item">
                                <img src="{{asset('client/frontend/images/detail-slider/slider7.jpg')}}" alt="image" />
                            </div>
                            <div class="detail-slider-item">
                                <img src="{{asset('client/frontend/images/detail-slider/slider8.jpg')}}" alt="image" />
                            </div>
                            <div class="detail-slider-item">
                                <img src="{{asset('client/frontend/images/detail-slider/slider9.jpg')}}" alt="image" />
                            </div>
                        </div>
                    </div>
                    <div class="description mar-bottom-30">
                        <h3>Description</h3>
                        <p>
                            Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print,
                            graphic or web designs. The passage is attributed to
                            an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's
                            De Finibus Bonorum et Malorum for use in a type
                            specimen book.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying
                            out print, graphic or web designs.
                        </p>
                        <p>
                            The passage is attributed to an unknown typesetter in the 15th century who is thought to
                            have scrambled parts of Cicero's De Finibus Bonorum
                            et Malorum for use in a type specimen book.
                        </p>
                        <div class="desc-box">
                            <h4>Departure & Return Location</h4>
                            <ul>
                                <li>John F.K. International Airport(Google Map)</li>
                            </ul>
                        </div>
                        <div class="desc-box">
                            <h4>Bedroom</h4>
                            <ul>
                                <li>4 Bedrooms</li>
                            </ul>
                        </div>
                        <div class="desc-box">
                            <h4>Departure Time</h4>
                            <ul>
                                <li>3 Hours Before Flight Time</li>
                            </ul>
                        </div>
                        <div class="desc-box">
                            <h4>Bathroom</h4>
                            <ul>
                                <li>6 Bathrooms</li>
                            </ul>
                        </div>
                        <div class="desc-box">
                            <h4>Price Includes</h4>
                            <ul>
                                <li><i class="fa fa-check"></i> Air Fares</li>
                                <li><i class="fa fa-check"></i> 3 Nights Hotel Accomodation</li>
                                <li><i class="fa fa-check"></i> Tour Guide</li>
                                <li><i class="fa fa-check"></i> Entrance Fees</li>
                            </ul>
                        </div>
                        <div class="desc-box">
                            <h4>Departure & Return Location</h4>
                            <ul>
                                <li><i class="fa fa-close"></i> Guide Service Fee</li>
                                <li><i class="fa fa-close"></i> Driver Service Fee</li>
                                <li><i class="fa fa-close"></i> Any Private Expenses</li>
                                <li><i class="fa fa-close"></i> Room Service Fees</li>
                            </ul>
                        </div>
                    </div>


                    <div class="single-review mar-bottom-30">
                        <h3>Average Reviews</h3>
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 col-12">
                                <div class="review-box">
                                    <p class="rating"><span>4.2</span>/5</p>
                                    <h4>Very Good</h4>
                                    <p class="mar-0">From 40 Reviews</p>
                                </div>
                            </div>
                            <div class="col-lg-8 col-sm-8 col-12">
                                <div class="review-progress">
                                    <div class="progress-item">
                                        <p>Cleanliness</p>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                                <span class="sr-only">70% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-item">
                                        <p>Facilities</p>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                                                <span class="sr-only">70% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-item">
                                        <p>Value for money</p>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                <span class="sr-only">70% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-item">
                                        <p>Service</p>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                <span class="sr-only">70% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-item">
                                        <p>Location</p>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                                                <span class="sr-only">70% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-comments single-box" id="comment-list">
                        <h3 class="mar-bottom-30">Showing {{$comments->count()}} verified guest comments</h3>
                        @foreach ($comments as $comment)
                        <div class="comment-box">
                            <div class="comment-image">
                                <img src="{{asset('storage/images/'.$comment->user->image)}}"  alt="image" />
                            </div>
                            <div class="comment-content">
                                <h4>{{$comment->user->name}}</h4>
                                <p class="comment-date">{{$comment->created_at}}</p>
                                {{-- <div class="comment-rate">
                                    <div class="rating mar-right-15">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                    <span class="comment-title">The worst hotel ever"</span>
                                </div> --}}
                                <p class="comment">
                                    {{$comment->content}}
                                </p>
                                <div class="comment-like">
                                    {{-- <div class="like-title">
                                        <a href="#" class="biz-btn biz-btn1">Reply</a>
                                    </div> --}}
                                    <div class="like-btn pull-right">
                                        <a href="#" class="like"><i class="fa fa-thumbs-up"></i> Like</a>
                                        <a href="#" class="disike"><i class="fa fa-thumbs-down"></i> Dislike</a>
                                        <a href="#" class="love"><i class="flaticon-like"></i> Love</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    @if (!empty(Auth::user()))
                    <div class="single-add-review pad-top-30">
                        <h3>Write a Review</h3>
                        <form action="{{route('client.store-comment')}}" method="POST" class="myForm">
                            @csrf
                            <div class="row">
                                {{-- <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" placeholder="Name" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" placeholder="Email" />
                                    </div>
                                </div> --}}
                                <input type="hidden" name="room_id" value="{{$room->id}}">
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="content" id="comment">Comment</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-btn">
                                        <a href="" class="biz-btn biz-btn1 submitLink" >Submit
                                            Review</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="list-sidebar">
                    <div class="sidebar-item">
                        <form class="filter-box">
                            <h3 class="white">Find The Places</h3>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="white">Your Destination</label>
                                        <div class="input-box">
                                            <i class="flaticon-placeholder"></i>
                                            <select class="niceSelect">
                                                <option value="1">Where are you going?</option>
                                                <option value="2">Argentina</option>
                                                <option value="3">Belgium</option>
                                                <option value="4">Canada</option>
                                                <option value="5">Denmark</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="white">Check In</label>
                                        <div class="input-box">
                                            <i class="flaticon-calendar"></i>
                                            <input id="date-range0" type="text" placeholder="yyyy-mmm-dd" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="white">Check Out</label>
                                        <div class="input-box">
                                            <i class="flaticon-calendar"></i>
                                            <input id="date-range1" type="text" placeholder="yyyy-mm-dd" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="white">Adult</label>
                                        <div class="input-box">
                                            <i class="flaticon-add-user"></i>
                                            <select class="niceSelect">
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
                                            <select class="niceSelect">
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
                                        <a href="#" class="biz-btn">Search</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-item">
                        <div class="map-box">
                            <i class="fa fa-map-marker"></i>
                            <a href="#">Show on Map</a>
                        </div>
                        <div class="location-rating sidebar-share clearfix">
                            <ul>
                                <li class="mar-top-13">
                                    <span class="location-box">4.5</span>
                                </li>
                                <li>
                                    <p>Exceptional</p>
                                    <span>Location rating score</span>
                                </li>
                            </ul>
                        </div>
                        <div class="location-features">
                            <ul>
                                <li><i class="fa fa-map-marker"></i> Better than 99% of properties in London</li>
                                <li><i class="fa fa-map-marker"></i> Exceptional Location - Inside city center</li>
                                <li><i class="fa fa-map-marker"></i> Popular Neighbourhood</li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-item">
                        <div class="sidebar-contact text-center">
                            <i class="fa fa-phone-alt"></i>
                            <h3><span>Book</span> by phone</h3>
                            <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                            <small>Monday to Friday 9.00am - 7.30pm</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection