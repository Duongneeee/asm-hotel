<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use App\Models\Discount;
use App\Models\Roomtype;
use Illuminate\Http\Request;
use App\Mail\sendMailBooking;
use App\Models\Booking_detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ClientBookingReuqest;
use App\Models\Banner;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomtypes = Roomtype::orderBy('created_at', 'desc')->get();
        $banners = Banner::all();
        return view('layouts.client.index', compact('roomtypes','banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function roomList($id)
    {
        $rooms = Room::where('roomtype_id', $id)->orderBy('created_at', 'desc')->get();
        $roomtype = Roomtype::find($id);
        $banners = Banner::all();
        return view('layouts.client.roomlists', compact('rooms', 'roomtype','banners'));
    }

    public function roomDetail($id)
    {
        $room = Room::find($id);
        return view('layouts.client.roomdetail', compact('room'));
    }

    public function roomBooking($id)
    {
        $datetimes = Booking::select('checkin','checkout')->get();

        $bookedDates = $datetimes->map(function($datetime){
            return [
                'checkin' => date('Y-m-d H:i', strtotime($datetime->checkin)),
                'checkout' => date('Y-m-d H:i', strtotime($datetime->checkout)),
            ];
        });

        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
        }
        return view('layouts.client.booking', compact('id','bookedDates'));
    }

    public function postRoomBooking(ClientBookingReuqest $request, $id)
    {
        $booking = new Booking();


        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        if (Auth::user()) {
            $booking->user_id = Auth::user()->id;
        }

        if ($request->code_discount) {
            $discount = Discount::where('code', $request->code_discount)->first();
            if ($discount) {
                $booking->discount_id = $discount->id;
            }
        }
        $booking->checkin = $request->checkin;
        $booking->checkout = $request->checkout;
        $booking->save();


        $booking->rooms()->attach($id);

        $booking_detail = Booking_detail::where('booking_id', $booking->id)->first();
        $booking_detail->price = $booking_detail->room->roomtype->price;
        if ($request->code_discount) {
            if ($booking->discount->code == $request->code_discount) {
                if ($booking->discount->value == 0) {
                    $booking_detail->amount = $booking_detail->room->roomtype->price - $booking->discount->price;
                } else {
                    $booking_detail->amount =$booking_detail->room->roomtype->price - ($booking_detail->room->roomtype->price * $booking->discount->price);
                }
            }
        }else{
        $booking_detail->amount = $booking_detail->room->roomtype->price;

        }
        $booking_detail->save();

        Mail::to($request->email)->send(new sendMailBooking($booking_detail));
        return back();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
