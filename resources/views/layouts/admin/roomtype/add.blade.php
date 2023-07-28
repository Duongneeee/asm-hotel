@extends('layouts.backend')
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="">Tên loại phòng</label>
                <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" placeholder="Tên..." value="{{old('name')}}">
                @error('name')
                <div  class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>
        </div>



        <div class="col-6">
            <div class="mb-3">
                <label for="">Giá</label>
                <input type="number" name="price" class="form-control {{$errors->has('price')?'is-invalid':''}}" placeholder="Giá..." value="{{old('price')}}">
                @error('price')
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
        
    </div>
    
    <div class="col-12">
    <button type="submit" class="btn btn-primary">lưu lại</button>
    <a href="{{route('admin.roomtypes.index')}}" class="btn btn-danger">Huỷ</a>
    </div>
</form>
@endsection
