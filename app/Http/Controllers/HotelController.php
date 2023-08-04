<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::orderBy('id', 'DESC')->get();
        return view('layouts.admin.hotel.lists',compact('hotels'));
    }

    // public function loadData()
    // {
    //     $hotels = Hotel::select(['id', 'name','address','description', 'created_at'])->latest();

    //     return DataTables::of($hotels)
    //         ->addColumn('edit', function ($hotel) {
    //             return '<a href="' . route('admin.hotels.edit', $hotel->id) . '" class="btn btn-warning">Sửa</a>';
    //         })
    //         ->addColumn('delete', function ($hotel) {
    //             return '<a href="" class="btn btn-danger delete-action">Xóa</a>';
    //         })

    //         ->addColumn('destroy', function ($hotel) {
    //             return '<input type="checkbox" name="destroy['.$hotel->id.']" value="'.$hotel->id.'" >';
    //         })

    //         ->editColumn('created_at', function ($hotel) {
    //             return Carbon::parse($hotel->created_at)->format('d-m-Y H:i:s');
    //         })
    //         ->rawColumns(['edit', 'delete','destroy'])
    //         ->toJson();
    // }

    // public function loadDataSoftDelete()
    // {
    //     $hotels = Hotel::select(['id', 'name','address','description', 'created_at'])->onlyTrashed()->latest();

    //     return DataTables::of($hotels)
    //         ->addColumn('restore', function ($hotel) {
    //             return '<a href="'.route('admin.hotels.restore', $hotel->id).'" class="btn btn-primary">Khôi phục</a>';
    //         })

    //         ->addColumn('destroy', function ($hotel) {
    //             return '<input type="checkbox" name="destroy['.$hotel->id.']" value="'.$hotel->id.'" >';
    //         })

    //         ->editColumn('created_at', function ($hotel) {
    //             return Carbon::parse($hotel->created_at)->format('d-m-Y H:i:s');
    //         })
    //         ->rawColumns(['restore','destroy'])
    //         ->toJson();
    // }

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
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->description = $request->description;
        $hotel->save();

        return redirect()->route('admin.hotels.index')->with('msg','Thêm thành công');
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
        return view('layouts.admin.hotel.edit',compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HotelRequest $request, Hotel $hotel)
    {
        
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->description = $request->description;
        $hotel->save();

        return redirect()->route('admin.hotels.index')->with('msg','Cập nhật thành công');
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
                    return redirect()->route('admin.hotels.index')->with('msg','Dữ liệu liên kết '.$hotel->name.' vẫn còn không thể xóa được');
                }
                $hotel->delete();
            }

            return redirect()->route('admin.hotels.index')->with('msg','Xóa thành công');

        }
        return redirect()->route('admin.hotels.index')->with('msg','Không có dữ liệu để xóa');
    }

    public function showSoftDelete(){
        $hotels = Hotel::onlyTrashed()->orderBy('id','desc')->get();
        return view('layouts.admin.hotel.softDelete',compact('hotels'));
    }

    public function restore($id){
        $hotel = Hotel::onlyTrashed()->where('id',$id)->first();
        if(!empty($hotel)){
            $hotel->restore();
            return back()->with('msg','Khôi phục thành công');
        }
        
        
    }

    public function forceDelete(Request $request){
        $ids = $request->destroy;
        $hotel = Hotel::onlyTrashed()->whereIn('id',$ids);
        if(!empty($hotel)){
            $hotel->forceDelete();
            return back()->with('msg','Xóa vĩnh viễn thành công');
        }
    }
}
