@extends ('layouts.backend')
@section('content')

@if (session('msg'))
    <p class="alert alert-success">{{ session('msg') }}</p>
@endif
<p><a href="{{route('admin.users.create')}}" class="btn btn-success">Thêm mới</a></p>
<table id="datatable" class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th>Role</th>
            <th>Thời gian</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>

    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th>Role</th>
            <th>Thời gian</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </tfoot>

    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->created_at}}</td>
                <td><a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-warning">Sửa</a></td>
                <td><a href="{{route('admin.users.delete', $user->id)}}" class="btn btn-danger delete-action">Xóa</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@include('layouts.admin.custom_paginate',['items'=>$users]);
@include('parts.backend.delete')
@endsection
@section('scripts')

@endsection
