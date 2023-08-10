@extends('layouts.frontend')
@section('content')
<div class="dashboard">
    @include('parts.frontend.siderbaraccount')
    <div class="db-cent">
        <div class="db-cent-1">
            @if (Auth::user())
            <p>Hi Jana Novakova,</p>
            <h4>Welcome to your dashboard</h4>
            @endif
        </div>
        <div class="db-cent-3">
            <div class="db-cent-table db-com-table">
                <div class="db-title">
                    <h3><img src="{{asset('frontend/images/icon/dbc5.png')}}" alt="" /> Make New Booking</h3>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                        alteration in some form</p>
                </div>
                <div class="book-form inn-com-form db-form">
                    <form action="{{route('client.post-booking-room',$id)}}" method="POST" class="col s12">
                        @csrf
                        <div class="row">
                            <div class="input-field col s6">
                                <p>Full name</p>
                                <input type="text" class="validate" placeholder="Full name" name="name"
                                    value="{{Auth::user()?Auth::user()->name : old('name','')}}">
                                {{-- <label>Full Name</label> --}}
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="input-field col s6">
                                <p>Email</p>
                                <input type="text" class="validate" placeholder="Email" name="email"
                                    value="{{Auth::user()?Auth::user()->email : old('email','')}}">
                                {{-- <label>Email</label> --}}
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <p>Phone</p>
                                <input type="text" class="validate" placeholder="Phone" name="phone"
                                    value="{{Auth::user()?Auth::user()->phone : old('phone','')}}">
                                {{-- <label>Phone</label> --}}
                                @error('phone')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="input-field col s6">
                                <p>City</p>
                                <input type="text" placeholder="City" name="address" class="validate">
                                {{-- <label>Cty</label> --}}
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6">
                                <p>adults</p>
                                <select>
                                    <option value="" disabled selected>No of adults</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="1">4</option>
                                </select>
                            </div>
                            <div class="input-field col s6">
                                <p>childrens</p>
                                <select>
                                    <option value="" disabled selected>No of childrens</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="1">4</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <p for="from">Checkin</p>
                                <input type="datetime-local" {{--id="from" --}} id="checkin" name="checkin">
                                @error('checkin')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="input-field col s6">
                                <p for="to">Checkout</p>
                                <input type="datetime-local" {{--id="to" --}} id="checkout" name="checkout">
                                @error('checkout')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <p>Discount</p>
                                <input type="text" placeholder="Code discount" name="code_discount" class="validate">
                                @error('code_discount')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="flexRadioDefault1" value="pay_now" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                      Thanh toán ngay
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="flexRadioDefault2" value="pay_later">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                      Thanh toán sau
                                    </label>
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="submit" value="submit" class="form-btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="db-righ">
        <h4>Notifications(18)</h4>
        <ul>
            <li>
                <a href="#!"> <img src="{{asset('frontend/images/icon/dbr1.jpg')}}" alt="">
                    <h5>Joseph, write a review</h5>
                    <p>All the Lorem Ipsum generators on the</p> <span>2 hours ago</span>
                </a>
            </li>
            <li>
                <a href="#!"> <img src="{{asset('frontend/images/icon/dbr2.jpg')}}" alt="">
                    <h5>14 New Messages</h5>
                    <p>All the Lorem Ipsum generators on the</p> <span>4 hours ago</span>
                </a>
            </li>
            <li>
                <a href="#!"> <img src="{{asset('frontend/images/icon/dbr3.jpg')}}" alt="">
                    <h5>Ads expairy soon</h5>
                    <p>All the Lorem Ipsum generators on the</p> <span>10 hours ago</span>
                </a>
            </li>
            <li>
                <a href="#!"> <img src="{{asset('frontend/images/icon/dbr4.jpg')}}" alt="">
                    <h5>Post free ads - today only</h5>
                    <p>All the Lorem Ipsum generators on the</p> <span>12 hours ago</span>
                </a>
            </li>
            <li>
                <a href="#!"> <img src="{{asset('frontend/images/icon/dbr5.jpg')}}" alt="">
                    <h5>listing limit increase</h5>
                    <p>All the Lorem Ipsum generators on the</p> <span>14 hours ago</span>
                </a>
            </li>
            <li>
                <a href="#!"> <img src="{{asset('frontend/images/icon/dbr6.jpg')}}" alt="">
                    <h5>mobile app launch</h5>
                    <p>All the Lorem Ipsum generators on the</p> <span>18 hours ago</span>
                </a>
            </li>
            <li>
                <a href="#!"> <img src="{{asset('frontend/images/icon/dbr7.jpg')}}" alt="">
                    <h5>Setting Updated</h5>
                    <p>All the Lorem Ipsum generators on the</p> <span>20 hours ago</span>
                </a>
            </li>
            <li>
                <a href="#!"> <img src="{{asset('frontend/images/icon/dbr8.jpg')}}" alt="">
                    <h5>Increase listing viewers</h5>
                    <p>All the Lorem Ipsum generators on the</p> <span>2 days ago</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<style>
    ::placeholder {
        color: #727070;
    }
</style>


@endsection