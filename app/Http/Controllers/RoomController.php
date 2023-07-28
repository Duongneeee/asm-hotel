<?php

namespace App\Http\Controllers;

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

        return view('layouts.admin.room.lists');
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

    public function loadData()
    {

        $rooms = Room::select(['id', 'name', 'image', 'description', 'status', 'hotel_id', 'roomtype_id', 'created_at'])->latest();

        return DataTables::of($rooms)
            ->addColumn('edit', function ($room) {
                return '<a href="' . route('admin.rooms.edit', $room->id) . '" class="btn btn-warning">Sửa</a>';
            })
            ->addColumn('delete', function ($room) {
                return '<a href="" class="btn btn-danger delete-action">Xóa</a>';
            })

            ->addColumn('destroy', function ($room) {
                return '<input type="checkbox" name="destroy[' . $room->id . ']" value="' . $room->id . '" >';
            })

            ->editColumn('created_at', function ($room) {
                return Carbon::parse($room->created_at)->format('d-m-Y H:i:s');
            })

            ->editColumn('image', function ($room) {
                return '<img src="' . asset('storage/images/' . $room->image) . '" width="100" height="100">';
            })
            ->editColumn('hotel_id', function ($room) {
                return $room->hotel->name;
            })

            ->editColumn('roomtype_id', function ($room) {
                return $room->roomtype->name;
            })

            ->editColumn('price', function ($room) {
                return number_format($room->price) . 'đ';
            })
            ->rawColumns(['edit', 'delete', 'destroy', 'image'])
            ->toJson();
    }

    public function loadDataSoftDelete()
    {
        $rooms = Room::select(['id', 'name', 'image', 'description', 'status', 'hotel_id', 'roomtype_id', 'created_at'])->onlyTrashed()->latest();

        return DataTables::of($rooms)
            ->addColumn('restore', function ($room) {
                return '<a href="' . route('admin.rooms.restore', $room->id) . '" class="btn btn-primary">Khôi phục</a>';
            })

            ->addColumn('destroy', function ($room) {
                return '<input type="checkbox" name="destroy[' . $room->id . ']" value="' . $room->id . '" >';
            })

            ->editColumn('created_at', function ($room) {
                return Carbon::parse($room->created_at)->format('d-m-Y H:i:s');
            })
            ->editColumn('image', function ($room) {
                return '<img src="' . asset('storage/images/' . $room->image) . '" width="100" height="100">';
            })

            ->editColumn('hotel_id', function ($room) {
                return $room->hotel->name;
            })

            ->editColumn('roomtype_id', function ($room) {
                return $room->roomtype->name;
            })

            ->editColumn('price', function ($room) {
                return number_format($room->price) . 'đ';
            })
            ->rawColumns(['restore', 'destroy', 'image'])
            ->toJson();
    }

    public function showSoftDelete()
    {
        return view('layouts.admin.room.softdelete');
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
