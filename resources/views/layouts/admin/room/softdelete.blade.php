@extends('layouts.backend')
@section('content')

@if (session('msg'))
<p class="alert alert-success">{{session('msg')}}</p>
@endif
<div class="row">
    <div class="col-6">
        @can('create',App\Models\Room::class)
        <p><a href="{{route('admin.rooms.create')}}" class="btn btn-primary">Thêm mới</a></p>
        @endcan
    </div>
    <div class="col-6 text-right">
        <p><a href="{{route('admin.rooms.index')}}" class="btn btn-warning ">Danh sách</a></p>
    </div>
</div>
<form action="{{route('admin.rooms.force_delete')}}" method="post" class="form-all">
    @csrf
    @method('DELETE')
    <table id="datatable" class="table table-bordered">
        <thead>
            <tr>
                @can('forcedelete',App\Models\Room::class)
                <th>Delete</th>
                @endcan
                <th>ID</th>
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Khách sạn</th>
                <th>Loại phòng</th>
                <th>Thời gian</th>
                @can('restore',App\Models\Room::class)
                <th>Khôi phục</th>
                @endcan
            </tr>
    
        </thead>
        <tfoot>
            <tr>
                @can('forcedelete',App\Models\Room::class)
                <th><button type="submit" class="btn btn-danger delete-all">Xóa tất cả</button></th>
                @endcan
                <th>ID</th>
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Khách sạn</th>
                <th>Loại phòng</th>
                <th>Thời gian</th>
                @can('restore',App\Models\Room::class)
                <th>Khôi phục</th>
                @endcan
    
            </tr>
        </tfoot>

        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    @can('forcedelete',App\Models\Room::class)
                    <td><input type="checkbox" name="destroy[{{$room->id}}]" value="{{$room->id}}" ></td>
                    @endcan
                    <td>{{$room->id}}</td>
                    <td>{{$room->name}}</td>
                    <td><img src="{{asset('storage/images/' . $room->image)}}" width="100" height="100"></td>
                    <td>{{$room->description}}</td>
                    <td>{{$room->status}}</td>
                    <td>{{$room->hotel->name}}</td>
                    <td>{{$room->roomtype->name}}</td>
                    <td>{{$room->created_at}}</td>
                    @can('restore',App\Models\Room::class)
                    <td><a href="{{route('admin.rooms.restore', $room->id)}}" class="btn btn-primary">Khôi phục</a></td>
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