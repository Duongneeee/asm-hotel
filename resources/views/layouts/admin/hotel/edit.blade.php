@extends('layouts.backend')
@section('content')
<form action="" method="POST">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="">Tên người dùng</label>
                <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" placeholder="Tên..." value="{{old('name') ?? $hotel->name}}">
                @error('name')
                <div  class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>
        </div>



        <div class="col-6">
            <div class="mb-3">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control {{$errors->has('address')?'is-invalid':''}}" placeholder="Địa chỉ..." value="{{old('address')?? $hotel->address}}">
                @error('address')
                <div  class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="">Mô tả</label>
                <textarea name="description" class="form-control" id="" cols="30" rows="10">{{old('description') ?? $hotel->description}}</textarea>
                @error('description')
                <div  class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>
        </div>

        
        
    </div>
    
    <div class="col-12">
    <button type="submit" class="btn btn-primary">lưu lại</button>
    <a href="{{route('admin.hotels.index')}}" class="btn btn-danger">Huỷ</a>
    </div>
</form>
@endsection