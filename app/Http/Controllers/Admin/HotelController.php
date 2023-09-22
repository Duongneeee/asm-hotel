<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelRequest;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::orderBy('id', 'DESC')->paginate(4);
        return view('layouts.admin.hotel.lists', compact('hotels'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.hotel.add');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(HotelRequest $request)
    {
        $hotel = new Hotel();
        $hotel->address = $request->address;
        $hotel->description = $request->description;
        $image = $request->image->getClientOriginalName();
        $request->image->storeAs('public/images', $image);
        $hotel->image = $image;
        $hotel->save();

        return redirect()->route('admin.hotels.index')->with('msg', 'Thêm thành công');
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
    public function edit(Hotel $hotel)
    {
        return view('layouts.admin.hotel.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HotelRequest $request, Hotel $hotel)
    {

        $hotel->address = $request->address;
        $hotel->description = $request->description;
        if ($request->image) {
            Storage::delete('public/images/' . $hotel->image);
            $image = $request->image->getClientOriginalName();
            $request->image->storeAs('public/images', $image);
            $hotel->image = $image;
        }

        $hotel->save();

        return redirect()->route('admin.hotels.index')->with('msg', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($request->destroy) {
            $ids = $request->destroy;
            foreach ($ids as $id) {
                $hotel = Hotel::find($id);
                if ($hotel->relatedDataExists()) {
                    return redirect()->route('admin.hotels.index')->with('msg', 'Dữ liệu liên kết ' . $hotel->name . ' vẫn còn không thể xóa được');
                }
                $hotel->delete();
            }

            return redirect()->route('admin.hotels.index')->with('msg', 'Xóa thành công');
        }
        return redirect()->route('admin.hotels.index')->with('msg', 'Không có dữ liệu để xóa');
    }

    public function showSoftDelete()
    {
        $hotels = Hotel::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('layouts.admin.hotel.softDelete', compact('hotels'));
    }

    public function restore($id)
    {
        $hotel = Hotel::onlyTrashed()->where('id', $id)->first();
        if (!empty($hotel)) {
            $hotel->restore();
            return back()->with('msg', 'Khôi phục thành công');
        }
    }

    public function forceDelete(Request $request)
    {
        $ids = $request->destroy;
        $hotel = Hotel::onlyTrashed()->whereIn('id', $ids);
        if (!empty($hotel)) {
            $hotel->forceDelete();
            return back()->with('msg', 'Xóa vĩnh viễn thành công');
        }
    }
}
