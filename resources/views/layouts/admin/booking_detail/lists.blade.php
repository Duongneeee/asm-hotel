@extends ('layouts.backend')
@section('content')

@if (session('msg'))
    <p class="alert alert-success">{{ session('msg') }}</p>
@endif
{{-- <div class="row">
    <div class="col-6">
        <p><a href="{{route('admin.bookings.create')}}" class="btn btn-primary">Thêm mới</a></p>
    </div>
    <div class="col-6 text-right">
        <p><a href="{{route('admin.bookings.showsoftdelete')}}" class="btn btn-warning ">Thùng rác</a></p>
    </div>
</div> --}}
<form action="{{route('admin.bookings.destroy')}}" method="post" class="form-all">
    @csrf
    @method('DELETE')
    <table id="datatable" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Giá</th>
                <th>Thành tiền</th>
                <th>Tên phòng</th>
                <th>Người đặt</th>     
            </tr>

        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Giá</th>
                <th>Thành tiền</th>
                <th>Tên phòng</th>
                <th>Người đặt</th>

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
            ajax: '{{route('admin.booking_details.data')}}' ,
            processing: true,
            serverSide: true,
            "columns": [
                { "data": "id" },
                { "data": "price" },
                { "data": "amount" },
                { "data": "room_id" },
                { "data": "booking_id" },
                

            ]
        });
    });


</script>
@endsection