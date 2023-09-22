<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking_detail;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class Booking_detailController extends Controller
{
    public function index(){
        $booking_details = Booking_detail::orderBy('id','desc')->paginate(10);
        return view('layouts.admin.booking_detail.lists',compact('booking_details'));
    }

}
