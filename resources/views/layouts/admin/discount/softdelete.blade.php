@extends('layouts.backend')
@section('content')

@if (session('msg'))
<p class="alert alert-success">{{session('msg')}}</p>
@endif
<div class="row">
    <div class="col-6">
        <p><a href="{{route('admin.discounts.create')}}" class="btn btn-primary">Thêm mới</a></p>
    </div>
    <div class="col-6 text-right">
        <p><a href="{{route('admin.discounts.index')}}" class="btn btn-warning ">Danh sách</a></p>
    </div>
</div>
<form action="{{route('admin.discounts.force_delete')}}" method="post" class="form-all">
    @csrf
    @method('DELETE')
    <table id="datatable" class="table table-bordered">
        <thead>
            <tr>
                <th>Delete</th>
                <th>ID</th>
                <th>Mã giảm giá</th>
                <th>Start</th>
                <th>End</th>
                <th>Giá giảm</th>
                <th>Đơn vị</th>
                <th>Thời gian</th>
                <th>khôi phục</th>
            </tr>
    
        </thead>
        <tfoot>
            <tr>
                <th><button type="submit" class="btn btn-danger delete-all">Xóa tất cả</button></th>
                <th>ID</th>
                <th>Mã giảm giá</th>
                <th>Start</th>
                <th>End</th>
                <th>Giá giảm</th>
                <th>Đơn vị</th>
                <th>Thời gian</th>
                <th>Khôi phục</th>
    
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
        ajax: '{{route('admin.discounts.data_softdelete')}}' ,
        processing: true,
        serverSide: true,
        "columns": [
    { "data": "destroy" },  
    { "data": "id" },
    { "data": "code" },
    { "data": "start" },
    { "data": "end" },
    { "data": "price" },
    { "data": "value" },
    { "data": "created_at" },
    { "data": "restore" }

  ]
    });
});



</script>
@endsection