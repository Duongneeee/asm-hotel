@extends ('layouts.backend')
@section('content')

@if (session('msg'))
    <p class="alert alert-success">{{ session('msg') }}</p>
@endif
<div class="row">
    <div class="col-6">
        <p><a href="{{route('admin.hotels.create')}}" class="btn btn-primary">Thêm mới</a></p>
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
                <th>Delete</th>
                <th>ID</th>
                <th>Tên</th>
                <th>Địa chỉ</th>
                <th>Mô tả</th>
                <th>Thời gian</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>

        </thead>
        <tfoot>
            <tr>
                <th><button type="submit" class="btn btn-danger delete-all">Xóa tất cả</button></th>
                <th>ID</th>
                <th>Tên</th>
                <th>Địa chỉ</th>
                <th>Mô tả</th>
                <th>Thời gian</th>
                <th>Sửa</th>
                <th>Xóa</th>

            </tr>
        </tfoot>
    </table>

</form>

@include('parts.backend.delete')
@endsection
@section('scripts')
<script>
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


</script>
@endsection