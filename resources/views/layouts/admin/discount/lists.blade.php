@extends ('layouts.backend')
@section('content')

@if (session('msg'))
    <p class="alert alert-success">{{ session('msg') }}</p>
@endif
<div class="row">
    <div class="col-6">
        @can('create',App\Models\Discount::class)
        <p><a href="{{route('admin.discounts.create')}}" class="btn btn-primary">Thêm mới</a></p>
        @endcan
    </div>
    <div class="col-6 text-right">
        <p><a href="{{route('admin.discounts.showsoftdelete')}}" class="btn btn-warning ">Thùng rác</a></p>
    </div>
</div>
<form action="{{route('admin.discounts.destroy')}}" method="post" class="form-all">
    @csrf
    @method('DELETE')
    <table id="datatable" class="table table-bordered">
        <thead>
            <tr>
                @can('delete',App\Models\Discount::class)
                <th>Delete</th>
                @endcan
                <th>ID</th>
                <th>Mã giảm giá</th>
                <th>Start</th>
                <th>End</th>
                <th>Giá giảm</th>
                <th>Đơn vị</th>
                <th>Thời gian</th>
                @can('update',App\Models\Discount::class)
                <th>Sửa</th>
                @endcan
            </tr>

        </thead>
        <tfoot>
            <tr>
                @can('delete',App\Models\Discount::class)
                <th><button type="submit" class="btn btn-danger delete-all">Xóa tất cả</button></th>
                @endcan
                <th>ID</th>
                <th>Mã giảm giá</th>
                <th>Start</th>
                <th>End</th>
                <th>Giá giảm</th>
                <th>Đơn vị</th>
                <th>Thời gian</th>
                @can('update',App\Models\Discount::class)
                <th>Sửa</th>
                @endcan


            </tr>
        </tfoot>

        <tbody>
            @foreach ($discounts as $discount)
                <tr>
                    @can('delete',App\Models\Discount::class)
                    <td><input type="checkbox" name="destroy[{{$discount->id}}]" value="{{$discount->id}}" ></td>
                    @endcan
                    <td>{{$discount->id}}</td>
                    <td>{{$discount->code}}</td>
                    <td>{{$discount->start}}</td>
                    <td>{{$discount->end}}</td>
                    <td>{{$discount->price}}</td>
                    <td>{{$discount->value}}</td>
                    <td>{{$discount->created_at}}</td>
                    @can('update',App\Models\Discount::class)
                    <td><a href="{{route('admin.discounts.edit', $discount->id)}}" class="btn btn-warning">Sửa</a></td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>
</form>
@include('layouts.admin.custom_paginate',['items'=>$discounts]);
@include('parts.backend.delete')
@endsection
@section('scripts')

@endsection