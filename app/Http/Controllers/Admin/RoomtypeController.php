<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomtypeRequest;
use App\Models\Roomtype;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class RoomtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomtypes = Roomtype::orderBy('id','desc')->paginate(4);
        return view('layouts.admin.roomtype.lists', compact('roomtypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.roomtype.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomtypeRequest $request)
    {
        $image = $request->image->getClientOriginalName();
        $roomtype = new Roomtype();
        $roomtype->name = $request->name;
        $roomtype->price = $request->price;
        $roomtype->description = $request->description;
        $roomtype->image = $image;
        $request->image->storeAs('public/images', $image);
        $roomtype->save();


        return redirect()->route('admin.roomtypes.index')->with('msg', 'Thêm thành công');
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
    public function edit(Roomtype $roomtype)
    {
        return view('layouts.admin.roomtype.edit', compact('roomtype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomtypeRequest $request, Roomtype $roomtype)
    {

        $roomtype->name = $request->name;
        $roomtype->price = $request->price;
        $roomtype->description = $request->description;
        if ($request->image) {
            $image = $request->image->getClientOriginalName();
            $roomtype->image = $image;
            $request->image->storeAs('public/images', $image);
        }

        $roomtype->save();

        return redirect()->route('admin.roomtypes.index')->with('msg', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        if ($request->destroy) {
            $ids = $request->destroy;
            foreach ($ids as $id) {
                $roomtype = Roomtype::find($id);
                if (!$roomtype->relatedDataExists()) {
                    $roomtype->delete();
                }else{
                    return redirect()->route('admin.roomtypes.index')->with('msg', 'Dữ liệu liên kết '.$roomtype->name.' vẫn còn không thể xóa được');
                }
            }
            return redirect()->route('admin.roomtypes.index')->with('msg', 'Xóa thành công');
            // Roomtype::destroy($request->destroy);
            // return redirect()->route('admin.roomtypes.index')->with('msg', 'Xóa thành công');
        }
        return redirect()->route('admin.roomtypes.index')->with('msg', 'Không có dữ liệu để xóa');
    }


    public function showSoftDelete()
    {
        $roomtypes = RoomType::onlyTrashed()->orderBy('id','desc')->get();
        return view('layouts.admin.roomtype.softdelete',compact('roomtypes'));
    }

    public function restore($id)
    {
        $roomtype = Roomtype::onlyTrashed()->where('id', $id)->first();
        if (!empty($roomtype)) {
            $roomtype->restore();
            return back()->with('msg', 'Khôi phục thành công');
        }
    }

    public function forceDelete(Request $request)
    {
        $ids = $request->destroy;
        $roomtype = Roomtype::onlyTrashed()->whereIn('id', $ids);
        if (!empty($roomtype)) {
            $roomtype->forceDelete();
            return back()->with('msg', 'Xóa vĩnh viễn thành công');
        }
    }
}
