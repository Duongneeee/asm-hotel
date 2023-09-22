<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('layouts.admin.banner.lists',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.banner.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            ['image'=> 'required|image|mimes:jpeg,jpg,png,gif'],

            [
                'image.required'=> 'Hình ảnh không được bỏ trống!',
                'image.image'=> 'Phải là hình ảnh!',
                'image.mimes'=> 'Hình ảnh không đúng định dạng!'
            ]
        );

        $banner = new Banner();
        $image = $request->image->getClientOriginalName();
        $banner->image = $image;
        $request->image->storeAs('public/images', $image);
        $banner->save();

        return redirect()->route('admin.banners.index')->with('msg', 'Thêm thành công');
        
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($request->destroy) {
            Banner::destroy($request->destroy);
            return redirect()->route('admin.banners.index')->with('msg', 'Xóa thành công');
        }
        return redirect()->route('admin.banners.index')->with('msg', 'Không có dữ liệu để xóa');
    }
}
