@extends('layouts.backend')
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="">Mã giảm giá</label>
                <input type="text" name="code" class="form-control {{$errors->has('code')?'is-invalid':''}}" placeholder="Mã giảm giá..." value="{{old('code') ?? $discount->code}}">
                @error('code')
                <div  class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>
        </div>



        <div class="col-6">
            <div class="mb-3">
                <label for="">Thời gian bắt đầu</label>
                <input type="date" name="start" class="form-control {{$errors->has('start')?'is-invalid':''}}"  value="{{old('start') ?? $discount->start}}">
                @error('start')
                <div  class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="">Thời gian kết thúc</label>
                <input type="date" name="end" class="form-control {{$errors->has('end')?'is-invalid':''}}"  value="{{old('end') ?? $discount->end}}">
                @error('end')
                <div  class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3 ">
                <label for="">giá giảm</label>
                <input type="number" step="any" name="price" class="form-control {{$errors->has('price')?'is-invalid':''}}" placeholder="Giá giảm..." value="{{old('price') ?? $discount->price}}">
                @error('price')
                <div  class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="mb-3">
                <label for="">Đơn vị</label>
                <select name="value" id="" class="form-control {{$errors->has('value')?'is-invalid':''}}">
                    <option value="0" {{old('value') == 0 ||  $discount->value == 0 ? 'selected':false}}>Tiền</option>
                    <option value="1" {{old('value') == 1 ||  $discount->value == 1 ? 'selected':false}}>Phần trăm</option>
                </select>
                @error('value')
                <div  class="invalid-feedback">
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
