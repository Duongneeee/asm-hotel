@extends('layouts.backend')
@section('content')

@if (session('msg'))
<p class="alert alert-success">{{session('msg')}}</p>
@endif
<div class="row">
    <div class="col-6">
        @can('create',App\Models\Roomtype::class)
        <p><a href="{{route('admin.roomtypes.create')}}" class="btn btn-primary">Thêm mới</a></p>
        @endcan
    </div>
    <div class="col-6 text-right">
        <p><a href="{{route('admin.roomtypes.index')}}" class="btn btn-warning ">Danh sách</a></p>
    </div>
</div>
<form action="{{route('admin.roomtypes.force_delete')}}" method="post" class="form-all">
    @csrf
    @method('DELETE')
    <table id="datatable" class="table table-bordered">
        <thead>
            <tr>
                @can('forcedelete',App\Models\Hotel::class)
                <th>Delete</th>
                @endcan
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
                <th>Thời gian</th>
                @can('restore',App\Models\Hotel::class)
                <th>khôi phục</th>
                @endcan
            </tr>
    
        </thead>
        <tfoot>
            <tr>
                @can('forcedelete',App\Models\Roomtype::class)
                <th><button type="submit" class="btn btn-danger delete-all">Xóa tất cả</button></th>
                @endcan
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Hình Ảnh</th>
                <th>Thời gian</th>
                @can('restore',App\Models\Roomtype::class)
                <th>Khôi phục</th>
                @endcan
            </tr>
        </tfoot>

        <tbody>
            @foreach ($roomtypes as $roomtype)
            <tr>
                @can('forcedelete',App\Models\Roomtype::class)
                <td><input type="checkbox" name="destroy[{{$roomtype->id}}]" value=" {{$roomtype->id}}" ></td>
                @endcan
                <td>{{$roomtype->id}}</td>
                <td>{{$roomtype->name}}</td>
                <td>{{$roomtype->price}}</td>
                <td><img src="{{asset('storage/images/' . $roomtype->image)}}" width="100" height="100"></td>
                <td>{{$roomtype->created_at}}</td>
                @can('restore',App\Models\Roomtype::class)
                <td><a href="{{route('admin.roomtypes.restore', $roomtype->id)}}" class="btn btn-primary">Khôi phục</a></td>
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