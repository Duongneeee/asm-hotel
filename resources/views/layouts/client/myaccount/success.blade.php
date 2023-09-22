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
            <div class="col-lg-12 col-12">
                <div class="price-tabmain">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="booking" role="tabpanel"
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
                                    @if ($booking)
                                    <table>
                                        <tr>
                                            <td>Booking Number</td>
                                            <td>{{$booking->id}}</td>
                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{$booking->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email Address</td>
                                            <td>{{$booking->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>Street Address and number</td>
                                            <td>{{$booking->address}}</td>
                                        </tr>

                                        <tr>
                                            <td>Checkin</td>
                                            <td>{{$booking->checkin}}</td>
                                        </tr>
                                        <tr>
                                            <td>Checkout</td>
                                            <td>{{$booking->checkout}}</td>
                                        </tr>
                                        <tr>
                                            <td>Price</td>
                                            <td>{{number_format($booking->amount)}}VNĐ</td>
                                        </tr>
                                        @if (!empty($payment->responseCode))
                                        @if ($payment->responseCode==00)
                                        <tr>
                                            <td>Bank</td>
                                            <td>{{$payment->bank}}</td>
                                        </tr>
                                        <tr>
                                            <td>Date Payment</td>
                                            <td>{{$payment->date}}</td>
                                        </tr>

                                        <tr>
                                            <td>payment code</td>
                                            <td>{{$payment->txnRef}}</td>
                                        </tr>
                                        @endif
                                        @endif
                                    </table>
                                    @endif
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection