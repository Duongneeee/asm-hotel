@extends ('layouts.backend')
@section('content')

@if (session('msg'))
    <p class="alert alert-success">{{ session('msg') }}</p>
@endif
<div class="row">
    <div class="col-6">
        <p><a href="{{route('admin.banners.create')}}" class="btn btn-primary">Thêm mới</a></p>
    </div>
    {{-- <div class="col-6 text-right">
        <p><a href="{{route('admin.banners.showsoftdelete')}}" class="btn btn-warning ">Thùng rác</a></p>
    </div> --}}
</div>
<form action="{{route('admin.banners.destroy')}}" method="post" class="form-all">
    @csrf
    @method('DELETE')
    <table id="datatable" class="table table-bordered">
        <thead>
            <tr>
                
                <th width=15%>Delete</th>
                <th>ID</th>
                <th>Image</th>
            </tr>

        </thead>
        <tfoot>
            <tr>
                <th><button type="submit" class="btn btn-danger delete-all">Xóa tất cả</button></th>
                <th>ID</th>
                <th>image</th>

            </tr>
        </tfoot>

        <tbody>
            @foreach ($banners as $banner)
                <tr>
                    <td><input type="checkbox" name="destroy[{{$banner->id}}]" value="{{$banner->id}}" ></td>
                    <td>{{$banner->id}}</td>
                    <td><img src="{{asset('storage/images/'.$banner->image)}}" width="300"></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</form>

@include('parts.backend.delete')
@endsection
@section('scripts')

@endsection