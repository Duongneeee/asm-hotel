@extends ('layouts.backend')
@section('content')

@if (session('msg'))
    <p class="alert alert-success">{{ session('msg') }}</p>
@endif
<div class="row">
    <div class="col-6">
        @can('create',App\Models\Booking::class)
        <p><a href="{{route('admin.bookings.create')}}" class="btn btn-primary">Thêm mới</a></p>
        @endcan
    </div>
    {{-- <div class="col-6 text-right">
        <p><a href="{{route('admin.bookings.showsoftdelete')}}" class="btn btn-warning ">Thùng rác</a></p>
    </div> --}}
</div>
<form action="{{route('admin.bookings.destroy')}}" method="post" class="form-all">
    @csrf
    @method('DELETE')
    <table id="datatable" class="table table-bordered">
        <thead>
            <tr>
                @can('delete',App\Models\Booking::class)
                <th>Delete</th>
                @endcan
                <th>ID</th>
                <th>Tên</th>
                <th>SĐT</th>
                <th>Email</th>
                <th>Checkin</th>
                <th>Checkout</th>
                <th>User_id</th>
                <th>Mã giảm giá</th>
                @can('update',App\Models\Booking::class)
                <th>Sửa</th>
                @endcan
            </tr>

        </thead>
        <tfoot>
            <tr>
                @can('delete',App\Models\Booking::class)
                <th><button type="submit" class="btn btn-danger delete-all">Xóa tất cả</button></th>
                @endcan
                <th>ID</th>
                <th>Tên</th>
                <th>SĐT</th>
                <th>Email</th>
                <th>Checkin</th>
                <th>Checkout</th>
                <th>User_id</th>
                <th>Mã giảm giá</th>
                @can('update',App\Models\Booking::class)
                <th>Sửa</th>
                @endcan


            </tr>
        </tfoot>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    @can('delete',App\Models\Booking::class)
                    <td><input type="checkbox" name="destroy[{{$booking->id}}]" value="{{$booking->id}}" ></td>
                    @endcan
                    <td>{{$booking->id}}</td>
                    <td>{{$booking->name}}</td>
                    <td>{{$booking->phone}}</td>
                    <td>{{$booking->email}}</td>
                    <td>{{$booking->checkin}}</td>
                    <td>{{$booking->checkout}}</td>
                    <td>{{$booking->user_id}}</td>
                    <td>@if ($booking->discount_id)
                        {{$booking->discount->code}}
                    @else
                        
                    @endif</td>
                    @can('update',App\Models\Booking::class)
                    <td><a href="{{route('admin.bookings.edit', $booking->id)}}" class="btn btn-warning">Sửa</a></td>
                    @endcan

                </tr>
            @endforeach
        </tbody>
    </table>

</form>

@include('layouts.admin.custom_paginate',['items'=>$bookings]);

@include('parts.backend.delete')
@endsection
@section('scripts')

@endsection