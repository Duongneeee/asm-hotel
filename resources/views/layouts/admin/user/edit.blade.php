@extends('layouts.backend')
@section('content')
<form action="" method="POST">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="">Tên người dùng</label>
                <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}"
                    placeholder="Tên..." value="{{old('name') ?? $user->name}}">
                @error('name')
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
                    placeholder="Email..." value="{{old('email') ?? $user->email}}">
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control {{$errors->has('password')?'is-invalid':''}}"
                    placeholder="Mật khẩu..." value="{{old('password')}}">
                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="">Phone</label>
                <input type="text" name="phone" class="form-control {{$errors->has('phone')?'is-invalid':''}}"
                    placeholder="Số điện thoại..." value="{{old('phone') ?? $user->phone}}">
                @error('phone')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="">Gender</label>
                <select name="gender" id="" class="form-control {{$errors->has('gender')?'is-invalid':''}}">
                    <option value="0" {{old('gender')==0 || $user->gender == 0? 'selected':false}}>Trống</option>
                    <option value="1" {{old('gender')==1 || $user->gender == 1? 'selected':false}}>Nam</option>
                    <option value="2" {{old('gender')==2 || $user->gender == 2? 'selected':false}}>Nữ</option>
                    <option value="3" {{old('gender')==3 || $user->gender == 3? 'selected':false}}>Khác</option>
                </select>
                @error('gender')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control {{$errors->has('address')?'is-invalid':''}}"
                    placeholder="Địa chỉ..." value="{{old('address') ?? $user->address}}">
                @error('address')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="mb-3">
                <label for="">Role</label>
                <select name="role_id" id="" class="form-control {{$errors->has('role_id')?'is-invalid':''}}">
                    <option value="0" {{old('role_id') == 0  || $user->role_id == 0? 'selected':false}}>Trống</option>
                    <option value="1" {{old('role_id') == 1  || $user->role_id == 1? 'selected':false}}>Admin</option>
                </select>
                @error('role_id')
                <div class="invalid-feedback">
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