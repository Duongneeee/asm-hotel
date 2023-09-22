@extends('layouts.frontendashboard')
@section('content')
<div class="dashboard-form mar-bottom-30">
    <form action="{{route('client.accounts.add-profile',Auth::user()->id)}}" method="post"
        enctype="multipart/form-data">
        @csrf
        @if (session('msg'))
        <p class="alert alert-success">{{session('msg')}}</p>
        @endif
        <div class="row">

            <div class="col-lg-4 col-md-12 padding-right-30">
                <div class="dashboard-list-box">
                    <h4 class="gray">Profile Details</h4>
                    <div class="dashboard-list-box-static">

                        <div class="edit-profile-photo">
                            <img src="{{asset('client/frontend/images/user-avatar.jpg')}}" alt />
                            <div class="change-photo-btn">
                                <div class="photoUpload">
                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                    <input type="file" class="upload" name="image" />
                                </div>
                            </div>
                        </div>
                        @error('image')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="edit-profile-photo">
                            <img src="{{asset('storage/images/'.Auth::user()->image)}}" alt />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-12 padding-left-30">
                <div class="dashboard-list-box margin-top-0">
                    <h4 class="gray">Your</h4>
                    <div class="dashboard-list-box-static">

                        <div class="my-profile">
                            <label>Your Name *</label>
                            <input value="{{Auth::user()?Auth::user()->name:old('name')}}" name="name" type="text" />
                            <label>Phone Number *</label>
                            <input value="{{Auth::user()?Auth::user()->phone:old('phone')}}" name="phone" type="text" />
                            <label>Email Address *</label>
                            <input value="{{Auth::user()?Auth::user()->email:old('email')}}" name="email" type="text" />
                            <label>Address *</label>
                            <input value="{{Auth::user()?Auth::user()->address:old('address')}}" name="address"
                                type="text" />
                            <label for="">Gender</label>
                            <select name="gender" id="">
                                <option value="" selected>Trống</option>
                                <option value="Nam" {{Auth::user()?Auth::user()->gender ==
                                    'Nam'?'selected':false:false}}>Nam</option>
                                <option value="Nữ" {{Auth::user()?Auth::user()->gender ==
                                    'Nữ'?'selected':false:false}}>Nữ</option>
                                <option value="Khác" {{Auth::user()?Auth::user()->gender ==
                                    'Khác'?'selected':false:false}}>Khác</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-12">
                <label>Current Password</label>
                <input type="password" placeholder="*********" name="current_password" />
                @error('current_password')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="col-md-4 col-12">
                <label>New Password</label>
                <input type="password" name="password" />
                @error('password')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="col-md-4 col-12">
                <label>Re-enter Password</label>
                <input type="password" name="password_confirmation" />
                @error('password_confirmation')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="col-12">
                <div class="form-btn mar-top-15">
                    <button class="biz-btn biz-btn1">SAVE CHANGE</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection