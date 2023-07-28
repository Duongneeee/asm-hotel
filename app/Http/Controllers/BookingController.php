<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Booking_detail;
use App\Models\Discount;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.admin.booking.lists');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $discounts = Discount::all();
        $rooms = Room::all();
        return view('layouts.admin.booking.add',compact('discounts','rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingRequest $request)
    {
        $booking = new Booking();
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->checkin = $request->checkin;
        $booking->checkout = $request->checkout;
        $booking->user_id = 2;
        $booking->discount_id = $request->discount_id;
        $booking->save();


        $booking->rooms()->attach($request->rooms);
        return redirect()->route('admin.bookings.index')->with('msg','Thêm thành công');
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
    public function edit(Booking $booking)
    {
        $discounts = Discount::all();
        $rooms = Room::all();
        return view('layouts.admin.booking.edit',compact('booking','discounts','rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookingRequest $request, Booking $booking)
    {
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->checkin = $request->checkin;
        $booking->checkout = $request->checkout;
        $booking->user_id = 2;
        $booking->discount_id = $request->discount_id;
        $booking->save();


        $booking->rooms()->sync($request->rooms);
        return redirect()->route('admin.bookings.index')->with('msg','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if(!empty($request->destroy)){
            foreach ($request->destroy as $id){
                $booking = Booking::find($id);
                $booking->rooms()->detach();
                $booking->delete(); 

            }
            return redirect()->route('admin.bookings.index')->with('msg','Xóa thành công');
        }
        return redirect()->route('admin.bookings.index')->with('msg','Không có dữ liệu để xóa');
    }

    public function loadData()
    {

        $bookings = Booking::select(['id', 'name', 'phone', 'email', 'checkin','checkout','user_id','discount_id', 'created_at'])->latest();

        return DataTables::of($bookings)
            ->addColumn('edit', function ($booking) {
                return '<a href="' . route('admin.bookings.edit', $booking->id) . '" class="btn btn-warning">Sửa</a>';
            })
            ->addColumn('delete', function ($booking) {
                return '<a href="" class="btn btn-danger delete-action">Xóa</a>';
            })

            ->addColumn('destroy', function ($booking) {
                return '<input type="checkbox" name="destroy[' . $booking->id . ']" value="' . $booking->id . '" >';
            })

            ->editColumn('created_at', function ($booking) {
                return Carbon::parse($booking->created_at)->format('d-m-Y H:i:s');
            })

            ->editColumn('discount_id', function ($booking) {
                return $booking->discount->code;
            })

            ->editColumn('price', function ($booking) {
                return number_format($booking->price) . 'đ';
            })
            ->rawColumns(['edit', 'delete', 'destroy'])
            ->toJson();
    }

    public function loadDataSoftDelete()
    {
        $bookings = Booking::select(['id', 'name', 'phone', 'email', 'checkin','checkout','user_id','discount_id', 'created_at'])->onlyTrashed()->latest();

        return DataTables::of($bookings)
            ->addColumn('restore', function ($booking) {
                return '<a href="' . route('admin.bookings.restore', $booking->id) . '" class="btn btn-primary">Khôi phục</a>';
            })

            ->addColumn('destroy', function ($booking) {
                return '<input type="checkbox" name="destroy[' . $booking->id . ']" value="' . $booking->id . '" >';
            })

            ->editColumn('created_at', function ($booking) {
                return Carbon::parse($booking->created_at)->format('d-m-Y H:i:s');
            })

            ->editColumn('discount_id', function ($booking) {
                return $booking->discount->code;
            })

            ->editColumn('price', function ($booking) {
                return number_format($booking->price) . 'đ';
            })
            ->rawColumns(['restore', 'destroy'])
            ->toJson();
    }

    public function showSoftDelete()
    {
        return view('layouts.admin.booking.softdelete');
    }

    public function restore($id)
    {
        $booking = Booking::withTrashed()->find($id);
        if (!empty($booking)) {
            $booking->restore();
            $booking->rooms()->withTrashed()->restore();
            return back()->with('msg', 'Khôi phục thành công');
        }
    }

    public function forceDelete(Request $request)
    {
        if ($request->destroy) {
            $ids = $request->destroy;
            $booking = Booking::onlyTrashed()->whereIn('id', $ids);
            if (!empty($booking)) {
                $booking->forceDelete();
                return back()->with('msg', 'Xóa vĩnh viễn thành công');
            }
        }else{
            return back()->with('msg', 'Không có dữ liệu để xóa');
        }
    }
}
