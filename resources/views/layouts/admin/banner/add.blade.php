@extends('layouts.backend')
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="mb-3 ">
                <label for="">Hình ảnh</label>
                <input type="file" name="image" class="form-control {{$errors->has('image')?'is-invalid':''}}"
                    value="{{old('image')}}">
                @error('image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>


    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">lưu lại</button>
        <a href="{{route('admin.discounts.index')}}" class="btn btn-danger">Huỷ</a>
    </div>
</form>
@endsection