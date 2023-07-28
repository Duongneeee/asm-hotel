@extends('layouts.backend')
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="">Tên </label>
                <input type="" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}"
                    placeholder="Tên..." value="{{old('name') ?? $booking->name}}">
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3 ">
                <label for="">Số điện thoại</label>
                <input type="text" name="phone" class="form-control {{$errors->has('phone')?'is-invalid':''}}"
                    value="{{old('phone') ?? $booking->phone}}">
                @error('phone')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control {{$errors->has('email')?'is-invalid':''}}"
                    value="{{old('email') ?? $booking->email}}">
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="">Checkin</label>
                <input type="datetime-local" name="checkin"
                    class="form-control {{$errors->has('checkin')?'is-invalid':''}}" value="{{old('checkin') ?? $booking->checkin}}">
                @error('checkin')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="">Checkout</label>
                <input type="datetime-local" name="checkout"
                    class="form-control {{$errors->has('checkout')?'is-invalid':''}}" value="{{old('checkout') ?? $booking->checkout}}">
                @error('checkout')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="">Mã giảm giá</label>
                <select name="discount_id" id="" class="form-control {{$errors->has('discount_id')?'is-invalid':''}}">\
                    <option value="">Trống</option>
                    @foreach ($discounts as $discount)
                    <option value="{{$discount->id}}" {{old('discount_id')==$discount->id || $booking->discount_id == $discount->id ?
                        'selected':false}}>{{$discount->code}}</option>
                    @endforeach
                </select>
                @error('discount_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="mb-3 ">
                <label for="">Room</label>
                <div class="row">
                    @foreach ($rooms as $room)
                    <div class="col-3">
                        <div class=" mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="rooms[]" value="{{$room->id}}" {{
                                in_array($room->id, old('rooms', $booking->rooms->pluck('id')->toArray())) ? 'checked' : '' }} id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{$room->name}}
                            </label>
                        </div>
                    </div>
                    
                    @endforeach
                </div>
                @error('rooms')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>



        {{-- <div class="col-6">
            <div class="mb-3">
                <label for="">Loại phòng</label>
                <select name="roomtype_id" id="" class="form-control {{$errors->has('roomtype_id')?'is-invalid':''}}">
                    <option value="">Trống</option>
                    @foreach ($roomtypes as $roomtype)
                    <option value="{{$roomtype->id}}" {{old('roomtype_id')==$roomtype->id ?
                        'selected':false}}>{{$roomtype->name}}</option>
                    @endforeach
                </select>
                @error('roomtype_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div> --}}

    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">lưu lại</button>
        <a href="{{route('admin.bookings.index')}}" class="btn btn-danger">Huỷ</a>
    </div>
</form>
@endsection