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
            <th>Thời gian</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </tfoot>
</table>
@include('parts.backend.delete')
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('#datatable').DataTable({
            ajax: '{{route('admin.users.data')}}' ,
            processing: true,
            serverSide: true,
            "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "phone" },
                { "data": "address" },
                { "data": "created_at" },
                { "data": "edit" },
                { "data": "delete" }

            ]
        });
});
</script>
@endsection
