@extends ('layouts.backend')
@section('content')

@if (session('msg'))
<p class="alert alert-success">{{ session('msg') }}</p>
@endif
<div class="row">
    <div class="col-6">
        @can('create', App\Models\Hotel::class)
        <p><a href="{{route('admin.hotels.create')}}" class="btn btn-primary">Thêm mới</a></p>
        @endcan

    </div>

    <div class="col-6 text-right">
        <p><a href="{{route('admin.hotels.showsoftdelete')}}" class="btn btn-warning ">Thùng rác</a></p>
    </div>
</div>
<form action="{{route('admin.hotels.destroy')}}" method="post" class="form-all">
    @csrf
    @method('DELETE')
    <table id="datatable" class="table table-bordered">
        <thead>
            <tr>
                @can('delete',App\Models\Hotel::class)
                <th width="10%">Delete</th>
                @endcan
                <th>ID</th>
                <th>Tên</th>
                <th>Địa chỉ</th>
                <th>Mô tả</th>
                <th width="15%">Thời gian</th>
                @can('update',App\Models\Hotel::class)
                <th width="7%">Sửa</th>
                @endcan
            </tr>

        </thead>
        <tfoot>
            <tr>
                @can('delete',App\Models\Hotel::class)
                <th><button type="submit" class="btn btn-danger delete-all">Xóa tất cả</button></th>
                @endcan
                <th>ID</th>
                <th>Tên</th>
                <th>Địa chỉ</th>
                <th>Mô tả</th>
                <th>Thời gian</th>
                @can('update',App\Models\Hotel::class)
                <th>Sửa</th>
                @endcan
            </tr>
        </tfoot>

        <tbody>
            @foreach ($hotels as $hotel)
            <tr>
                @can('delete',App\Models\Hotel::class)
                <td><input type="checkbox" class="" name="destroy[{{$hotel->id}}]" value="{{$hotel->id}}" ></td>
                @endcan
                <td>{{$hotel->id}}</td>
                <td>{{$hotel->name}}</td>
                <td>{{$hotel->address}}</td>
                <td>{{$hotel->description}}</td>
                <td>{{$hotel->created_at}}</td>
                @can('update',App\Models\Hotel::class)
                <td><a href="{{route('admin.hotels.edit', $hotel->id)}}" class="btn btn-warning">Sửa</a></td>
                @endcan
            </tr>
            @endforeach
        </tbody>
    </table>

</form>

@include('parts.backend.delete')
@endsection
@section('scripts')
{{-- <script>
    $(document).ready(function () {
        $('#datatable').DataTable({
            ajax: '{{route('admin.hotels.data')}}' ,
            processing: true,
            serverSide: true,
            "columns": [
                { "data": "destroy" },
                { "data": "id" },
                { "data": "name" },
                { "data": "address" },
                { "data": "description" },
                { "data": "created_at" },
                { "data": "edit" },
                { "data": "delete" }

            ]
        });
    });


</script> --}}
@endsection