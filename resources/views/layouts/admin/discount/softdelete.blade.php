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
                @can('forceDelete',App\Models\Discount::class)
                <th>Delete</th>
                @endcan
                <th>ID</th>
                <th>Mã giảm giá</th>
                <th>Start</th>
                <th>End</th>
                <th>Giá giảm</th>
                <th>Đơn vị</th>
                <th>Thời gian</th>
                @can('update',App\Models\Discount::class)
                <th>khôi phục</th>
                @endcan
            </tr>
    
        </thead>
        <tfoot>
            <tr>
                @can('forceDelete',App\Models\Discount::class)
                <th><button type="submit" class="btn btn-danger delete-all">Xóa tất cả</button></th>
                @endcan
                <th>ID</th>
                <th>Mã giảm giá</th>
                <th>Start</th>
                <th>End</th>
                <th>Giá giảm</th>
                <th>Đơn vị</th>
                <th>Thời gian</th>
                @can('restore',App\Models\Discount::class)
                <th>Khôi phục</th>
                @endcan
    
            </tr>
        </tfoot>
        <tbody>
            @foreach ($discounts as $discount)
                <tr>
                    @can('forceDelete',App\Models\Discount::class)
                    <td><input type="checkbox" name="destroy[{{$discount->id}}]" value="{{$discount->id}}" ></td>
                    @endcan
                </form>
                    <td>{{$discount->id}}</td>
                    <td>{{$discount->code}}</td>
                    <td>{{$discount->start}}</td>
                    <td>{{$discount->end}}</td>
                    <td>{{$discount->price}}</td>
                    <td>{{$discount->value}}</td>
                    <td>{{$discount->created_at}}</td>
                    @can('restore',App\Models\Discount::class)
                    {{-- <td><a href="{{route('admin.discounts.restore', $discount->id)}}" class="btn btn-primary">Khôi phục</a></td> --}}
                    <form action="{{route('admin.discounts.restore', $discount->id)}}" method="POST">
                        @csrf
                        <td><button type="submit" class="btn btn-primary">Khôi phục</button></td>
                    </form>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>
    


@include('parts.backend.delete')
@endsection
@section('scripts')

@endsection