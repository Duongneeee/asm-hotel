<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Roomtype;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::orderBy('id','desc')->paginate(4);
        return view('layouts.admin.room.lists',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = Hotel::all();
        $roomtypes = Roomtype::all();
        return view('layouts.admin.room.add', compact('hotels', 'roomtypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {
        $image = $request->image->getClientOriginalName();
        $room = new Room();
        $room->name = $request->name;
        $room->image = $image;
        $room->description = $request->description;
        $room->status = $request->status;
        $room->hotel_id = $request->hotel_id;
        $room->roomtype_id = $request->roomtype_id;
        $request->image->storeAs('public/images', $image);
        $room->save();

        return redirect()->route('admin.rooms.index')->with('msg', 'Thêm thành công');
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
    public function edit(Room $room)
    {
        $hotels = Hotel::all();
        $roomtypes = Roomtype::all();
        return view('layouts.admin.room.edit', compact('room', 'hotels', 'roomtypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomRequest $request, Room $room)
    {
        $room->name = $request->name;
        if ($request->image) {
            $image = $request->image->getClientOriginalName();
            $room->image = $image;
            $request->image->storeAs('public/images', $image);
        }
        $room->description = $request->description;
        $room->status = $request->status;
        $room->hotel_id = $request->hotel_id;
        $room->roomtype_id = $request->roomtype_id;
        $room->save();

        return redirect()->route('admin.rooms.index')->with('msg', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($request->destroy) {
            Room::destroy($request->destroy);
            return redirect()->route('admin.rooms.index')->with('msg', 'Xóa thành công');
        }
        return redirect()->route('admin.rooms.index')->with('msg', 'Không có dữ liệu để xóa');
    }

    


    public function showSoftDelete()
    {
        $rooms = Room::onlyTrashed()->orderBy('id','desc')->get();
        return view('layouts.admin.room.softdelete',compact('rooms'));
    }

    public function restore($id)
    {
        $room = Room::onlyTrashed()->where('id', $id)->first();
        if (!empty($room)) {
            $room->restore();
            return back()->with('msg', 'Khôi phục thành công');
        }
    }

    public function forceDelete(Request $request)
    {
        if ($request->destroy) {
                    Room::withTrashed()->whereIn('id', $request->destroy)->forceDelete();
                    return back()->with('msg', 'Xóa vĩnh viễn thành công');
                }
                return back()->with('msg', 'Không có dữ liệu để xóa');
    }
}
