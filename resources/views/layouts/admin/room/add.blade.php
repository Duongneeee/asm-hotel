@extends('layouts.backend')
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="">Tên phòng</label>
                <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" placeholder="Tên..." value="{{old('name')}}">
                @error('name')
                <div  class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3 ">
                <label for="">Hình ảnh</label>
                <input type="file" name="image" class="form-control {{$errors->has('image')?'is-invalid':''}}" value="{{old('image')}}">
                @error('image')
                <div  class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="mb-3">
                <label for="">Mô tả</label>
                <textarea name="description" class="form-control {{$errors->has('description')?'is-invalid':''}}" id="" cols="30" rows="10">{{old('description')}}</textarea>
                @error('description')
                <div  class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="">Trạng thái</label>
                <select name="status" id="" class="form-control {{$errors->has('status')?'is-invalid':''}}">
                    <option value="0" {{old('status') == 0 ? 'selected':false}}>Còn phòng</option>
                    <option value="1" {{old('status') == 1 ? 'selected':false}}>Hết phòng</option>
                </select>
                @error('status')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="">Khách sạn</label>
                <select name="hotel_id" id="" class="form-control {{$errors->has('hotel_id')?'is-invalid':''}}">
                    <option value="">Trống</option>
                    @foreach ($hotels as $hotel)
                    <option value="{{$hotel->id}}" {{old('hotel_id') == $hotel->id ? 'selected':false}}>{{$hotel->address}}</option>
                    
                    @endforeach
                </select>
                @error('hotel_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="">Loại phòng</label>
                <select name="roomtype_id" id="" class="form-control {{$errors->has('roomtype_id')?'is-invalid':''}}">
                    <option value="">Trống</option>
                    @foreach ($roomtypes as $roomtype)
                    <option value="{{$roomtype->id}}" {{old('roomtype_id') == $roomtype->id ? 'selected':false}}>{{$roomtype->name}}</option>
                    @endforeach
                </select>
                @error('roomtype_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        
    </div>
    
    <div class="col-12">
    <button type="submit" class="btn btn-primary">lưu lại</button>
    <a href="{{route('admin.rooms.index')}}" class="btn btn-danger">Huỷ</a>
    </div>
</form>
@endsection
