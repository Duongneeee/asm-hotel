@extends('layouts.backend')
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="">Địa chỉ</label>
                <input type="text" name="address" class="form-control {{$errors->has('address')?'is-invalid':''}}" placeholder="Địa chỉ..." value="{{old('address')}}">
                @error('address')
                <div  class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="">Hình ảnh</label>
                <input type="file" name="image" class="form-control {{$errors->has('image')?'is-invalid':''}}">
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
    <a href="{{route('admin.hotels.index')}}" class="btn btn-danger">Huỷ</a>
    </div>
</form>
@endsection
