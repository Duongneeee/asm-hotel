@extends('layouts.frontend')
@section('content')
<section class="breadcrumb-outer text-center">
    <div class="container">
        <div class="breadcrumb-content">
            <h2 class="white">Hotel Booking</h2>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Hotel Booking</li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="overlay"></div>
</section>


<section class="booking">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="price-tabmain">
                    {{-- <div class="price-navtab d-flex justify-content-center mar-bottom-30">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-customer-tab" data-toggle="pill" href="#customer"
                                    role="tab" aria-controls="pills-customer" aria-selected="true"><i
                                        class="fa fa-check-circle"></i> Customer Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-payment-tab" data-toggle="pill" href="#payment" role="tab"
                                    aria-controls="pills-payment" aria-selected="false"><i
                                        class="fa fa-check-circle"></i> Payment Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-booking-tab" data-toggle="pill" href="#booking" role="tab"
                                    aria-controls="pills-booking" aria-selected="false"><i
                                        class="fa fa-check-circle"></i> Booking Info</a>
                            </li>
                        </ul>
                    </div> --}}
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="customer" role="tabpanel"
                            aria-labelledby="pills-customer-tab">
                            <div class="booking-box">
                                <div class="customer-information">
                                    <h3>Let us know who you are</h3>
                                    <form action="{{route('client.post-booking-room',$room->id)}}" method="POST" class="myForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" placeholder="Name..."
                                                        value="{{Auth::user()?Auth::user()->name : old('name','')}}" />
                                                        @error('name')
                                                            <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" name="address" placeholder="Address" />
                                                    @error('address')
                                                    <p class="text-danger">{{$message}}</p>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" placeholder="Email..."
                                                        value="{{Auth::user()?Auth::user()->email : old('email','')}}" />
                                                        @error('email')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" name="phone" placeholder="Phone..."
                                                        value="{{Auth::user()?Auth::user()->phone : old('phone','')}}" />
                                                        @error('phone')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Checkin</label>
                                                    <input type="datetime-local" name="checkin"
                                                        value="{{old('checkin')}}" />
                                                        @error('checkin')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Checout</label>
                                                    <input type="datetime-local" name="checkout"
                                                        value="{{old('checkout')}}" />
                                                        @error('checkout')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Special Requirements</label>
                                                    <textarea></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group ml-4">
                                                    <input class="form-check-input" type="radio" name="paymentMethod"
                                                    id="flexRadioDefault1" value="pay_now" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Payment Online
                                                </label>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="form-check-input" type="radio" name="paymentMethod"
                                                    id="flexRadioDefault2" value="pay_later">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    payment at the counter
                                                </label>
                                                </div>
                                            </div>

                                            <input type="hidden" name="amount" value="{{session('discount')?session('discount')['amount']:$room->roomtype->price}}">
                                            <input type="hidden" name="discount_id" value="{{session('discount')?session('discount')['discountId']:false}}">

                                            <div class="col-lg-12">
                                                <div class="form-btn">
                                                    <a href="" class="biz-btn biz-btn1 submitLink">Order</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="tab-pane fade" id="payment" role="tabpanel"
                            aria-labelledby="pills-payment-tab">
                            <div class="booking-box">
                                <div class="customer-information card-information">
                                    <h3>Your card information</h3>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="radio" /> Credit Card</div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="radio" /> Paypal</div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Card Holder Number</label>
                                                    <input type="text" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Card Number</label>
                                                    <input type="text" />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Expiry Month</label>
                                                    <input type="text" />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Expiry Year</label>
                                                    <input type="text" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>CVC</label>
                                                    <input type="text" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group"><input type="checkbox" /> By continuing, you
                                                    agree to the <a href="#">Terms and Conditions.</a></div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-btn">
                                                    <a href="#" class="biz-btn biz-btn1">CONFIRM BOOKING</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="tab-pane fade" id="booking" role="tabpanel"
                            aria-labelledby="pills-booking-tab">
                            <div class="booking-box">
                                <div class="booking-box-title">
                                    <i class="fa fa-check"></i>
                                    <div class="title-content">
                                        <h4 class="mar-bottom-10">Thank You. Your booking order is confirmed now.</h4>
                                        <p>A confirmation email has been sent to your provided email address.</p>
                                    </div>
                                </div>
                                <div class="travellers-info booking-border">
                                    <h4>Traveler Information</h4>
                                    <table>
                                        <tr>
                                            <td>Booking Number</td>
                                            <td>5784-BD245</td>
                                        </tr>
                                        <tr>
                                            <td>First Name</td>
                                            <td>Jessica</td>
                                        </tr>
                                        <tr>
                                            <td>Last Name</td>
                                            <td>Brown</td>
                                        </tr>
                                        <tr>
                                            <td>Email Address</td>
                                            <td>info#jessica.com</td>
                                        </tr>
                                        <tr>
                                            <td>Street Address and number</td>
                                            <td>353 Third floor Avenue</td>
                                        </tr>
                                        <tr>
                                            <td>Town/City</td>
                                            <td>Paris</td>
                                        </tr>
                                        <tr>
                                            <td>ZIP Code</td>
                                            <td>75800-875</td>
                                        </tr>
                                        <tr>
                                            <td>Country</td>
                                            <td>France</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="booking-border">
                                    <h4>Payment</h4>
                                    <p>
                                        This is the third time I've used Travelo Website and telling you the truth their
                                        services are always reliable and it ony takes few
                                        minutes to plan and finalize.
                                    </p>
                                    <a href="#">Payment is made by Credit Card via Paypal</a>
                                </div>
                                <div class="booking-border">
                                    <h4>View Booking Details</h4>
                                    <p>
                                        This is the third time I've used Travelo Website and telling you the truth their
                                        services are always reliable and it ony takes few
                                        minutes to plan and finalize.
                                    </p>
                                    <a href="#">https://www.travel.com/booking-details</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="booking-sidebar">
                    {{-- <div class="book-sidebar-title">
                        <div class="sidebar-videos about-slider">
                            <article class="post mar-bottom-20">
                                <div class="content-image">
                                    <a href="blog-single.html"><img src="images/destination1.jpg" alt /></a>
                                </div>
                                <div class="content-list mar-top-15">
                                    <div class="date mar-bottom-5">Jun 28, 2019</div>
                                    <h4 class="mar-0"><a href="blog-single.html">Takes on Baboon, and It Doesn’t Go Well
                                            for It</a></h4>
                                </div>
                            </article>
                            <article class="post mar-bottom-20">
                                <div class="content-image">
                                    <a href="blog-single.html"><img src="images/destination2.jpg" alt /></a>
                                </div>
                                <div class="content-list mar-top-15">
                                    <div class="date mar-bottom-5">Jun 28, 2019</div>
                                    <h4 class="mar-0"><a href="blog-single.html">Favorite Travel Essentials for a
                                            Stylish Summer</a></h4>
                                </div>
                            </article>
                        </div>
                    </div> --}}
                    <div class="sidebar-booking">
                        <h4>Booking Detail</h4>
                        <table>
                            <tr>
                                <td>Room</td>
                                <td>{{$room->name}}</td>
                            </tr>
                            <tr>
                                <td>Hotel</td>
                                <td>{{$room->hotel->address}}</td>
                            </tr>
                            <tr>
                                <td>Room Type</td>
                                <td>{{$room->roomtype->name}}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="sidebar-payment">
                        <h4>Payment</h4>

                        @php
                        $discount = session('discount');
                        @endphp
                        <table>
                            <tr>
                                <td>Price</td>
                                <td>{{number_format($room->roomtype->price)}}VNĐ</td>
                            </tr>
                            <tr>
                                <td>Price discount</td>
                                <td>{{$discount ? $discount['value'].$discount['discountPrice']:false}}</td>
                            </tr>

                            <tr>
                                <td class="weight-600">Amount</td>
                                <td class="weight-600">{{$discount ? number_format($discount['amount']):number_format($room->roomtype->price)}}VNĐ</td>
                            </tr>
                        </table>

                    </div>

                    <form action="{{route('client.booking-discount')}}" method="post" class="myForm">
                        <div class="row sidebar-payment">
                            @csrf
                            <input type="hidden" name="price" value="{{$room->roomtype->price}}">
                            <div class="form-group col-7">
                                <input type="text" name="code_discount" placeholder="discount" />
                                @error('code_discount')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="col-5">
                                <div class="form-btn">
                                    <a href="" class="biz-btn biz-btn1 submitLink">Add</a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection