@extends('layouts.backend')
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="">Tên role</label>
                <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" placeholder="Tên..." value="{{old('name')}}">
                @error('name')
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
