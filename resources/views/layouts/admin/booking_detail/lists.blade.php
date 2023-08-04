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
        <tbody>
            @foreach ($booking_details as $booking_detail)
                <tr>
                    <td>{{$booking_detail->id}}</td>
                    <td>{{$booking_detail->price}}</td>
                    <td>{{$booking_detail->amount}}</td>
                    <td>{{$booking_detail->room->name}}</td>
                    <td>{{$booking_detail->booking->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
</form>

@include('parts.backend.delete')
@endsection
@section('scripts')

@endsection