<?php

namespace App\Http\Controllers;

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
        return view('layouts.admin.roomtype.lists');
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

    public function loadData()
    {

        $roomtypes = Roomtype::select(['id', 'name', 'price', 'image', 'created_at'])->latest();

        return DataTables::of($roomtypes)
            ->addColumn('edit', function ($roomtype) {
                return '<a href="' . route('admin.roomtypes.edit', $roomtype->id) . '" class="btn btn-warning">Sửa</a>';
            })
            ->addColumn('delete', function ($roomtype) {
                return '<a href="" class="btn btn-danger delete-action">Xóa</a>';
            })

            ->addColumn('destroy', function ($roomtype) {
                return '<input type="checkbox" name="destroy[' . $roomtype->id . ']" value="' . $roomtype->id . '" >';
            })

            ->editColumn('created_at', function ($roomtype) {
                return Carbon::parse($roomtype->created_at)->format('d-m-Y H:i:s');
            })

            ->editColumn('image', function ($roomtype) {
                return '<img src="' . asset('storage/images/' . $roomtype->image) . '" width="100" height="100">';
            })

            ->editColumn('price', function ($roomtype) {
                return number_format($roomtype->price) . 'đ';
            })
            ->rawColumns(['edit', 'delete', 'destroy', 'image'])
            ->toJson();
    }

    public function loadDataSoftDelete()
    {
        $roomtypes = roomtype::select(['id', 'name', 'price', 'image', 'description', 'created_at'])->onlyTrashed()->latest();

        return DataTables::of($roomtypes)
            ->addColumn('restore', function ($roomtype) {
                return '<a href="' . route('admin.roomtypes.restore', $roomtype->id) . '" class="btn btn-primary">Khôi phục</a>';
            })

            ->addColumn('destroy', function ($roomtype) {
                return '<input type="checkbox" name="destroy[' . $roomtype->id . ']" value="' . $roomtype->id . '" >';
            })

            ->editColumn('created_at', function ($roomtype) {
                return Carbon::parse($roomtype->created_at)->format('d-m-Y H:i:s');
            })
            ->editColumn('image', function ($roomtype) {
                return '<img src="' . asset('storage/images/' . $roomtype->image) . '" width="100" height="100">';
            })

            ->editColumn('price', function ($roomtype) {
                return number_format($roomtype->price) . 'đ';
            })
            ->rawColumns(['restore', 'destroy', 'image'])
            ->toJson();
    }

    public function showSoftDelete()
    {
        return view('layouts.admin.roomtype.softdelete');
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
