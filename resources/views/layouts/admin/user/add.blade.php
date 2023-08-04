@extends('layouts.backend')
@section('content')
<form action="" method="POST">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="">Tên người dùng</label>
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
                <label for="">Email</label>
                <input type="text" name="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" placeholder="Email..." value="{{old('email')}}">
                @error('email')
                <div  class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" placeholder="Mật khẩu..." value="{{old('password')}}">
                @error('password')
                <div  class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="">Phone</label>
                <input type="text" name="phone" class="form-control {{$errors->has('phone')?'is-invalid':''}}" placeholder="Số điện thoại..." value="{{old('phone')}}">
                @error('phone')
                <div  class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="">Gender</label>
                <select name="gender" id="" class="form-control {{$errors->has('gender')?'is-invalid':''}}">
                    <option value="0">Trống</option>
                    <option value="1">Nam</option>
                    <option value="2">Nữ</option>
                    <option value="3">Khác</option>
                </select>
                @error('gender')
                <div  class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control {{$errors->has('address')?'is-invalid':''}}" placeholder="Địa chỉ..." value="{{old('address')}}">
                @error('address')
                <div  class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="mb-3">
                <label for="">Role</label>
                <select name="role_id" id="" class="form-control {{$errors->has('role_id')?'is-invalid':''}}">
                    <option value="">Trống</option>
                    @foreach ($roles as $role)
                        <option value="{{$role->id}}" {{old('role_id') == $role->id ? 'selected':false}}>{{$role->name}}</option>
                    @endforeach
                </select>
                @error('role_id')
                <div  class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>
        </div>
        
    </div>
    
    <div class="col-12">
    <button type="submit" class="btn btn-primary">lưu lại</button>
    <a href="{{route('admin.users.index')}}" class="btn btn-danger">Huỷ</a>
    </div>
</form>
@endsection
