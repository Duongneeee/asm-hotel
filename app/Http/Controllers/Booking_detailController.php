<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking_detail;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class Booking_detailController extends Controller
{
    public function index(){
        $booking_details = Booking_detail::orderBy('id','desc')->get();
        return view('layouts.admin.booking_detail.lists',compact('booking_details'));
    }

}
