@extends ('layouts.backend')
@section('content')

@if (session('msg'))
<p class="alert alert-success">{{ session('msg') }}</p>
@endif
<div class="row">
    <div class="col-6">
        <p><a href="{{route('admin.roles.create')}}" class="btn btn-primary">Thêm mới</a></p>
    </div>
    <div class="col-6 text-right">
        <p><a href="{{route('admin.roles.showsoftdelete')}}" class="btn btn-warning ">Thùng rác</a></p>
    </div>
</div>
<form action="" method="post">
    @csrf
    <table id="" class="table table-bordered">
        <thead>
            <th width="25%">Module</th>
            <th>Quyền</th>
        </thead>
        <tbody>
            @if ($modules->count() > 0)
            @foreach ($modules as $module)
            <tr>
                <td>{{$module->title}}</td>
                <td>
                    <div class="row">
                        @if (!empty($roleListArr))
                        @foreach ($roleListArr as $roleName => $roleLabel)
                        <div class="col-2">
                            <label for="roles_{{$module->name}}_{{$roleName}}">
                                <input type="checkbox" name="roles[{{$module->name}}][]"
                                    id="roles_{{$module->name}}_{{$roleName}}" value="{{$roleName}}" {{isRole($roleArr,$module->name,$roleName) ? 'checked':false}}>
                                {{ $roleLabel }}
                            </label>
                        </div>
                        @endforeach
                        @endif

                        @if ($module->name =='roles')
                        <div class="col-2">
                            <label for="roles_{{$module->name}}_permission">
                                <input type="checkbox" name="roles[{{$module->name}}][]"
                                    id="roles_{{$module->name}}_permission" value="permission" {{isRole($roleArr,$module->name,'permission') ? 'checked':false}}>
                                Phân quyền
                            </label>
                        </div>
                        @endif

                    </div>
                </td>
            </tr>
            @endforeach
            @endif

        </tbody>
    </table>

    <button type="submit" class="btn btn-primary">Phân quyền</button>
</form>

@include('parts.backend.delete')
@endsection