<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.admin.user.lists');
    }

    public function loadData()
    {
        $users = DB::table('users')->select(['id', 'name', 'email', 'phone','address', 'created_at'])->latest();

        return DataTables::of($users)
            ->addColumn('edit', function ($user) {
                return '<a href="' . route('admin.users.edit', $user->id) . '" class="btn btn-warning">Sửa</a>';
            })
            ->addColumn('delete', function ($user) {
                return '<a href="' . route('admin.users.delete', $user->id) . '" class="btn btn-danger delete-action">Xóa</a>';
            })

            ->editColumn('created_at', function ($user) {
                return Carbon::parse($user->created_at)->format('d-m-Y H:i:s');
            })
            ->rawColumns(['edit', 'delete'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.user.add');
    }

    public function data()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('admin.users.index')->with('msg','Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('layouts.admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request,User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->role_id = $request->role_id;
        if ($request->password) {
        $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('admin.users.index')->with('msg','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        DB::table('users')->delete($user->id);
        return redirect()->route('admin.users.index')->with('msg','Xóa thành công');
    }
}
