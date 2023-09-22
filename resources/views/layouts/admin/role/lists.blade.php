@extends ('layouts.backend')
@section('content')

@if (session('msg'))
<p class="alert alert-success">{{ session('msg') }}</p>
@endif
<div class="row">
    <div class="col-6">
        <p><a href="{{route('admin.roles.create')}}" class="btn btn-primary">Thêm mới</a></p>
    </div>
    <div class="col-6 text-right">
        <p><a href="{{route('admin.roles.showsoftdelete')}}" class="btn btn-warning ">Thùng rác</a></p>
    </div>
</div>
<form action="{{route('admin.roles.destroy')}}" method="post" class="form-all">
    @csrf
    @method('DELETE')
    <table id="datatable" class="table table-bordered">
        <thead>
            <tr>
                <th>Delete</th>
                <th>ID</th>
                <th>Tên</th>
                <th>Permission</th>
                <th>Thời gian</th>
                <th>Sửa</th>
                <th>Phân quyền</th>
            </tr>

        </thead>
        <tfoot>
            <tr>
                <th><button type="submit" class="btn btn-danger delete-all">Xóa tất cả</button></th>
                <th>ID</th>
                <th>Tên</th>
                <th>Permission</th>
                <th>Thời gian</th>
                <th>Sửa</th>
                <th>Phân quyền</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($roles as $role)
            <tr>
                <td><input type="checkbox" name="destroy[{{$role->id}}]" value="{{$role->id}}"></td>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>{{$role->permissions}}</td>
                <td>{{$role->created_at}}</td>
                <td><a href="{{route('admin.roles.edit', $role->id)}}" class="btn btn-warning">Sửa</a></td>
                <td><a href="{{route('admin.roles.permission', $role->id)}}" class="btn btn-primary">Phân quyền</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</form>
@include('layouts.admin.custom_paginate',['items'=>$roles]);
@include('parts.backend.delete')
@endsection
@section('scripts')

@endsection