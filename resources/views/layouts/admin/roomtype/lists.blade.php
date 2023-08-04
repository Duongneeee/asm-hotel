@extends ('layouts.backend')
@section('content')

@if (session('msg'))
<p class="alert alert-success">{{ session('msg') }}</p>
@endif
<div class="row">
    <div class="col-6">
        @can('create',App\Models\Roomtype::class)
        <p><a href="{{route('admin.roomtypes.create')}}" class="btn btn-primary">Thêm mới</a></p>
        @endcan
    </div>
    <div class="col-6 text-right">
        <p><a href="{{route('admin.roomtypes.showsoftdelete')}}" class="btn btn-warning ">Thùng rác</a></p>
    </div>
</div>
<form action="{{route('admin.roomtypes.destroy')}}" method="post" class="form-all">
    @csrf
    @method('DELETE')
    <table id="datatable" class="table table-bordered">
        <thead>
            <tr>
                @can('delete',App\Models\Roomtype::class)
                <th width="10%">Delete</th>
                @endcan
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
                <th width="15%">Thời gian</th>
                @can('update',App\Models\Roomtype::class)
                <th width="7%">Sửa</th>
                @endcan
            </tr>

        </thead>
        <tfoot>
            <tr>
                @can('delete',App\Models\Roomtype::class)
                <th><button type="submit" class="btn btn-danger delete-all">Xóa tất cả</button></th>
                @endcan
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
                <th>Thời gian</th>
                @can('update',App\Models\Roomtype::class)
                <th>Sửa</th>
                @endcan

            </tr>
        </tfoot>
        <tbody>
            @foreach ($roomtypes as $roomtype)
            <tr>
                @can('delete',App\Models\Roomtype::class)
                <td><input type="checkbox" name="destroy[{{$roomtype->id}}]" value=" {{$roomtype->id}}" ></td>
                @endcan
                <td>{{$roomtype->id}}</td>
                <td>{{$roomtype->name}}</td>
                <td>{{$roomtype->price}}</td>
                <td><img src="{{asset('storage/images/' . $roomtype->image)}}" width="100" height="100"></td>
                <td>{{$roomtype->created_at}}</td>
                @can('update',App\Models\Roomtype::class)
                <td><a href="{{route('admin.roomtypes.edit', $roomtype->id)}}" class="btn btn-warning">Sửa</a></td>
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