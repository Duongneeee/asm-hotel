@extends('layouts.frontend')
@section('content')
<section class="breadcrumb-outer text-center">
    <div class="container">
        <div class="breadcrumb-content">
            <h2 class="white">Cart</h2>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="overlay"></div>
</section>


<section id="cart-main" class="cart-main bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart-inner">
                    <div class="cart-table-list">
                        <div class="order-list">
                            <table class="shop_table rt-checkout-review-order-table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="product-name">Room Name</th>
                                        <th class="product-name">Room Type</th>
                                        <th class="product-name">Hotel</th>
                                        <th class="product-price">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total=0;
                                    @endphp
                                    @if (session('cart'))
                                    @foreach (session('cart') as $id => $cart)
                                    @php
                                        $total +=$cart['price'];
                                    @endphp
                                    <tr>
                                        <td>
                                            <form action="{{route('client.cart-remove',$id)}}" method="post"
                                                class="myForm">
                                                @csrf
                                                @method('DELETE')
                                                <a href="" class="submitLink"><i class="fa fa-times"></i></a>
                                            </form>
                                        </td>
                                        <td class="cart_item">
                                            <span class="product-name">{{$cart['name']}}</span>
                                        </td>
                                        <td class="cart_item">
                                            <span class="product-name">{{$cart['roomtype']}}</span>
                                        </td>
                                        <td class="cart_item">
                                            <span class="product-name">{{$cart['hotel']}}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="rt-Price-amount"><span>{{number_format($cart['price'])}}</span>VNĐ</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                    <tr>
                                        <td colspan="6" class="actions">
                                            <form action="{{route('client.booking-discount')}}" method="post" class="myForm">
                                                @csrf
                                                <div class="coupon">
                                                    <label for="coupon_code">Coupon:</label>
                                                    <input type="hidden" name="price" value="{{$total}}">
                                                    <input type="text" name="code_discount" class="input-text"
                                                        id="coupon_code" value placeholder="Coupon code" />
                                                    <button class="btn btn-red submitLink" 
                                                        value="Apply coupon">Apply coupon</button>
                                                        @error('code_discount')
                                                            <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="checkout-order">
                        <h4 class="mar-bottom-20">Cart Totals</h4>
                        <div class="order-list">
                            <table class="shop_table rt-checkout-review-order-table">
                                {{-- <thead>
                                    <tr>
                                        <th class="product-name">Total</th>
                                        <th class="product-total"></th>
                                    </tr>
                                </thead> --}}
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th width="20%">Total</th>
                                        <td>
                                            <span class="rt-Price-amount"><span>{{number_format($total)}}</span>VNĐ</span>
                                        </td>
                                    </tr>
                                    <tr class="rt-shipping-totals shipping">
                                        <th>Coupon</th>
                                        <td data-title="Shipping"> <span class="rt-Price-amount">{{session('discount')?number_format(session('discount')['discountPrice']).session('discount')['value']:false}}</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td>
                                            <strong><span class="rt-Price-amount"><span>{{session('discount')?number_format(session('discount')['amount']):$total}}</span>VNĐ</span></strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    
                    <div class="col-lg-12 col-12">
                        <div class="price-tabmain">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="customer" role="tabpanel"
                                    aria-labelledby="pills-customer-tab">
                                    <div class="booking-box">
                                        <div class="customer-information">
                                            <h3>Let us know who you are</h3>
                                            <form action="{{route('client.cart-post')}}" method="POST" class="myForm">
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
        
                                                    <input type="hidden" name="amount" value="{{session('discount')?session('discount')['amount']:$total}}">
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
                            </div>
                        </div>
                    </div>

                    {{-- <div class="checkout-place-order">
                      
                        <a href="#" class="biz-btn biz-btn1">Proceed to Checkout</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection