@extends('layouts.backend')
@section('content')

@if (session('msg'))
<p class="alert alert-success">{{session('msg')}}</p>
@endif
<div class="row">
    <div class="col-6">
        <p><a href="{{route('admin.roles.create')}}" class="btn btn-primary">Thêm mới</a></p>
    </div>
    <div class="col-6 text-right">
        <p><a href="{{route('admin.roles.index')}}" class="btn btn-warning ">Danh sách</a></p>
    </div>
</div>
<form action="{{route('admin.roles.force_delete')}}" method="post" class="form-all">
    @csrf
    @method('DELETE')
    <table id="datatable" class="table table-bordered">
        <thead>
            <tr>
                @can('forcedelete',App\Models\Role::class)
                <th>Delete</th>
                @endcan
                <th>ID</th>
                <th>Tên</th>
                <th>Permission</th>
                <th>Thời gian</th>
                @can('restore',App\Models\Role::class)
                <th>khôi phục</th>
                @endcan
            </tr>
    
        </thead>
        <tfoot>
            <tr>
                @can('forcedelete',App\Models\Role::class)
                <th><button type="submit" class="btn btn-danger delete-all">Xóa tất cả</button></th>
                @endcan
                <th>ID</th>
                <th>Tên</th>
                <th>Permission</th>
                <th>Thời gian</th>
                @can('restore',App\Models\Role::class)
                <th>Khôi phục</th>
                @endcan
            </tr>
        </tfoot>
        <tbody>
            @foreach ($roles as $role)
            <tr>
                @can('forcedelete',App\Models\Role::class)
                <td><input type="checkbox" name="destroy[{{$role->id}}]" value="{{$role->id}}"></td>
                @endcan
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>{{$role->permissions}}</td>
                <td>{{$role->created_at}}</td>
                @can('restore',App\Models\Role::class)
                <td><a href="{{route('admin.roles.restore', $role->id)}}" class="btn btn-primary">Khôi phục</a></td>
                @endcan
            </tr>
            @endforeach

        </tbody>
    </table>
    
</form>

@include('parts.backend.delete')
@endsection
@section('scripts')
@endsection