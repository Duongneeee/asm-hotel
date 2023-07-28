<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking_detail;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class Booking_detailController extends Controller
{
    public function index(){
        return view('layouts.admin.booking_detail.lists');
    }

    public function loadData()
    {

        $booking_details = Booking_detail::select(['id', 'price', 'amount', 'room_id', 'booking_id','created_at'])->latest();

        return DataTables::of($booking_details)
            ->addColumn('edit', function ($booking_detail) {
                return '<a href="' . route('admin.bookings.edit', $booking_detail->id) . '" class="btn btn-warning">Sửa</a>';
            })
            ->addColumn('delete', function ($booking_detail) {
                return '<a href="" class="btn btn-danger delete-action">Xóa</a>';
            })

            ->addColumn('destroy', function ($booking_detail) {
                return '<input type="checkbox" name="destroy[' . $booking_detail->id . ']" value="' . $booking_detail->id . '" >';
            })

            ->editColumn('created_at', function ($booking_detail) {
                return Carbon::parse($booking_detail->created_at)->format('d-m-Y H:i:s');
            })

            ->editColumn('room_id', function ($booking_detail) {
                return $booking_detail->room->name;
            })

            ->editColumn('booking_id', function ($booking_detail) {
                return $booking_detail->booking->name;
            })

            ->editColumn('price', function ($booking_detail) {
                return number_format($booking_detail->price) . 'đ';
            })

            ->editColumn('amount', function ($booking_detail) {
                return number_format($booking_detail->amount). 'đ';
            })
            ->rawColumns(['edit', 'delete', 'destroy'])
            ->toJson();
    }
}
