<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
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
        return view('layouts.client.index', compact('roomtypes', 'banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function roomList($id)
    {
        $rooms = Room::where('roomtype_id', $id)->orderBy('created_at', 'desc')->get();
        $roomtype = Roomtype::find($id);
        $banners = Banner::all();
        return view('layouts.client.roomlists', compact('rooms', 'roomtype', 'banners'));
    }

    public function roomDetail($id)
    {
        $room = Room::find($id);
        return view('layouts.client.roomdetail', compact('room'));
    }

    public function roomBooking($id)
    {
        $datetimes = Booking::select('checkin', 'checkout')->get();

        $bookedDates = $datetimes->map(function ($datetime) {
            return [
                'checkin' => date('Y-m-d H:i', strtotime($datetime->checkin)),
                'checkout' => date('Y-m-d H:i', strtotime($datetime->checkout)),
            ];
        });

        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
        }
        return view('layouts.client.booking', compact('id', 'bookedDates'));
    }

    public function postRoomBooking(ClientBookingReuqest $request, $id)
    {
        $booking = new Booking();
        $paymentMethod = $request->paymentMethod;
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

        return $this->payment($request, $paymentMethod, $booking->id);
    }

    public function payment($request, $paymentMethod, $id)
    {
        $booking_detail = Booking_detail::where('booking_id', $id)->get();
        $booking_detail->load('booking', 'room');
        $booking = Booking::where('id', $id)->first();
        $productname = null;
        foreach ($booking_detail as $item) {
            $item->price = $item->room->roomtype->price;
            $item->save();
            $productname = $item->room->name;
        }

        $amount = Booking_detail::where('booking_id', $id)->sum('price');

        if ($request->code_discount) {
            if ($booking->discount->code == $request->code_discount) {
                if ($booking->discount->value == 0) {
                    $booking->amount =  $amount  - $booking->discount->price;
                    $booking->save();
                } else {
                    $booking->amount = $amount - ($amount * $booking->discount->price);
                    $booking->save();
                }
            }
        } else {
            $booking->amount =  $amount;
            $booking->save();
        }

        if ($paymentMethod === 'pay_now') {

            \Stripe\Stripe::setApiKey(config('stripe.sk'));


            // $totalprice = $request->get('total');
            $two0 = "00";
            $total = "$booking->amount$two0";

            $session = \Stripe\Checkout\Session::create([
                'line_items'  => [
                    [
                        'price_data' => [
                            'currency'     => 'USD',
                            'product_data' => [
                                "name" => $productname,
                            ],
                            'unit_amount'  => $total,
                        ],
                        'quantity'   => 1,
                    ],

                ],
                'mode'        => 'payment',
                'success_url' => route('client.success'),
                'cancel_url'  => route('client.pending'),
            ]);

            Mail::to($request->email)->send(new sendMailBooking($booking_detail));
            return redirect()->away($session->url);
        } else {
            Mail::to($request->email)->send(new sendMailBooking($booking_detail));
            return redirect()->route('client.pending');
        }
    }

    public function successBooking()
    {
        $booking = Booking::latest()->first();
        $booking->status = 1;
        $booking->save();
        return view('layouts.client.myaccount.success');
    }

    public function pendingBooking()
    {
        $booking = Booking::latest()->first();
        $booking->status = 0;
        $booking->save();
        return view('layouts.client.myaccount.success');
    }

    public function cart()
    {
        return view('layouts.client.cart');
    }

    public function addToCart($id)
    {
        $room = Room::find($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            return back()->with('msg', 'Giỏ hàng đã tồn tại');
        } else {
            $cart[$id] = [
                'id' => $id,
                'name' => $room->name,
                'description' => $room->description,
                'nameRoom' => $room->roomtype->name,
                'price' => $room->roomtype->price,
                'image' => $room->image,
            ];

            session()->put('cart', $cart);
            return back()->with('msg', 'Thêm vào giỏ hàng thành công');
        }
    }

    public function cartRemove($id)
    {

        if ($id) {
            $cart = session()->get('cart');
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return back();
        }
    }

    public function cartAdd(Request $request)
    {


        $booking = new Booking();
        $paymentMethod = $request->paymentMethod;
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


        foreach (session('cart') as $cart) {
            $booking->rooms()->attach($cart['id']);
        }

        return $this->paymentCart($request, $paymentMethod, $booking->id);
    }

    public function paymentCart($request, $paymentMethod, $id)
    {
        $booking_details = Booking_detail::where('booking_id', $id)->get();

        $booking_details->load('room', 'booking');

        foreach ($booking_details as $booking_detail) {
            $booking_detail->price = $booking_detail->room->roomtype->price;
            $booking_detail->save();
        }


        $booking = Booking::where('id', $id)->first();
        $amount = Booking_detail::where('booking_id', $id)->sum('price');
        $number = Booking_detail::where('booking_id', $id)->count();

        if ($request->code_discount) {
            if ($booking->discount->code == $request->code_discount) {
                if ($booking->discount->value == 0) {
                    $booking->amount =  $amount  - ($booking->discount->price*$number);
                    $booking->save();
                } else {
                    $booking->amount = $amount - ($amount * $booking->discount->price);
                    $booking->save();
                }
            }
        } else {
            $booking->amount =  $amount;
            $booking->save();
        }

        if ($paymentMethod === 'pay_now') {

            \Stripe\Stripe::setApiKey(config('stripe.sk'));

            $productname = $booking_detail->room->name;
            // $totalprice = $request->get('total');
            $productItems = [];

            \Stripe\Stripe::setApiKey(config('stripe.sk'));

            foreach (session('cart') as $id => $details) {

                $product_name = $details['name'];
                if ($request->code_discount) {
                    
                        if ($booking->discount->value == 0) {
                            $total = $details['price'] - $booking->discount->price;
                        } else {
                            $total = $details['price'] - ($details['price'] * $booking->discount->price);
                        }
                } else {
                    $total = $details['price'];
                }
                

                $two0 = "00";
                $unit_amount = "$total$two0";

                $productItems[] = [
                    'price_data' => [
                        'product_data' => [
                            'name' => $product_name,
                        ],
                        'currency'     => 'USD',
                        'unit_amount'  => $unit_amount,
                    ],
                    'quantity' => 1,
                ];
            }



            $checkoutSession = \Stripe\Checkout\Session::create([
                'line_items'            => [$productItems],
                'mode'                  => 'payment',
                'allow_promotion_codes' => true,
                'metadata'              => [
                    'user_id' => "0001",
                ],
                // 'customer_email' => "cairocoders-ednalan@gmail.com", //$user->email,
                'success_url' => route('client.success'),
                'cancel_url'  => route('client.pending'),

            ]);

            Mail::to($request->email)->send(new sendMailBooking($booking_details));
            session()->forget('cart');
            return redirect()->away($checkoutSession->url);
        } else {
            session()->forget('cart');
            Mail::to($request->email)->send(new sendMailBooking($booking_details));
            return redirect()->route('client.pending');
        }
    }
}
