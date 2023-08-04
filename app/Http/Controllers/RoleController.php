<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\RoleRequest;
use App\Models\Module;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'desc')->get();
        return view('layouts.admin.role.lists',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.role.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->save();

        return redirect()->route('admin.roles.index')->with('msg', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('layouts.admin.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {

        $role->name = $request->name;
        $role->save();

        return redirect()->route('admin.roles.index')->with('msg', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        if ($request->destroy) {
            $ids = $request->destroy;
            foreach ($ids as $id) {
                $role = Role::find($id);
                if (!$role->relatedDataExists()) {
                    $role->delete();
                } else {
                    return redirect()->route('admin.roles.index')->with('msg', 'Dữ liệu liên kết ' . $role->name . ' vẫn còn không thể xóa được');
                }
            }
            return redirect()->route('admin.roles.index')->with('msg', 'Xóa thành công');
            // Roomtype::destroy($request->destroy);
            // return redirect()->route('admin.roomtypes.index')->with('msg', 'Xóa thành công');
        }
        return redirect()->route('admin.roles.index')->with('msg', 'Không có dữ liệu để xóa');
    }

    

   

    public function showSoftDelete()
    {
        $roles = Role::onlyTrashed()->orderBy('id','desc')->get();
        return view('layouts.admin.role.softdelete',compact('roles'));
    }

    public function restore($id)
    {
        $role = Role::onlyTrashed()->where('id', $id)->first();
        if (!empty($role)) {
            $role->restore();
            return back()->with('msg', 'Khôi phục thành công');
        }
    }

    public function forceDelete(Request $request)
    {
        $ids = $request->destroy;
        $role = Role::onlyTrashed()->whereIn('id', $ids);
        if (!empty($role)) {
            $role->forceDelete();
            return back()->with('msg', 'Xóa vĩnh viễn thành công');
        }
    }

    public function permission(Role $role)
    {
        $modules = Module::all();
        $roleListArr = [
            'view' => 'Xem',
            'add' => 'Thêm',
            'edit' => 'Sửa',
            'delete' => 'Xóa',
            'restore' => 'Thùng rác',
            'forcedelete' => 'Xoá vĩnh viễn'
            // 'permission' => 'Phân quyền'
        ];

        $roleJson = $role->permissions;

        if (!empty($roleJson)) {
            $roleArr = json_decode($roleJson, true);
        }else{
            $roleArr = [];
        }

        
        return view('layouts.admin.role.permission', compact('modules', 'roleListArr','roleArr'));
    }

    public function postPermission(Request $request, Role $role)
    {


        if (!empty($request->roles)) {
            $roleArr = $request->roles;
        } else {
            $roleArr = [];
        }

        $roleJson = json_encode($roleArr);

        $role->permissions = $roleJson;
        $role->save();
        return back()->with('msg', 'Phần quyền thành công');
    }
}
