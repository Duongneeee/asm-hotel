<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts =Discount::orderBy('id','desc')->paginate(10);
        return view('layouts.admin.discount.lists',compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.discount.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscountRequest $request)
    {
        $discount = new Discount;
        $discount->code = $request->code;
        $discount->start = $request->start;
        $discount->end = $request->end;
        $discount->price = $request->price;
        $discount->value = $request->value;
        $discount->save();
        return redirect()->route('admin.discounts.index')->with('msg', 'thêm thành công');
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
    public function edit(Discount $discount)
    {
        return view('layouts.admin.discount.edit', compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscountRequest $request, Discount $discount)
    {
        $discount->code = $request->code;
        $discount->start = $request->start;
        $discount->end = $request->end;
        $discount->price = $request->price;
        $discount->value = $request->value;
        $discount->save();
        return redirect()->route('admin.discounts.index')->with('msg', 'cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($request->destroy) {
            Discount::destroy($request->destroy);
            return redirect()->route('admin.discounts.index')->with('msg', 'Xóa thành công');
        }
        return redirect()->route('admin.discounts.index')->with('msg', 'Không có dữ liệu để xóa');
    }

    

    

    public function showSoftDelete()
    {
        $discounts = Discount::onlyTrashed()->orderBy('id','desc')->get();
        return view('layouts.admin.discount.softdelete',compact('discounts'));
    }

    public function restore($id)
    {
        $discount = Discount::onlyTrashed()->where('id', $id)->first();
        if (!empty($discount)) {
            $discount->restore();
            return back()->with('msg', 'Khôi phục thành công');
        }
    }

    public function forceDelete(Request $request)
    {
        if ($request->destroy) {
            $ids = $request->destroy;
            $discount = Discount::onlyTrashed()->whereIn('id', $ids);
            if (!empty($discount)) {
                $discount->forceDelete();
                return back()->with('msg', 'Xóa vĩnh viễn thành công');
            }
        }else{
            return back()->with('msg', 'Không có dữ liệu để xóa');
        }
    }
}
