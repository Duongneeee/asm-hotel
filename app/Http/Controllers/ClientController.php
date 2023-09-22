<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Banner;
use App\Models\Booking;
use App\Models\Comment;
use App\Models\Payment;
use App\Models\Discount;
use App\Models\Roomtype;
use Illuminate\Http\Request;
use App\Mail\sendMailBooking;
use App\Models\Booking_detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\BookingRequest;
use Illuminate\Contracts\Session\Session;
use App\Http\Requests\ClientBookingReuqest;
use App\Http\Requests\ClientDiscountRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session()->forget('discount');
        $roomtypes = Roomtype::orderBy('created_at', 'desc')->get();
        $hotels = Hotel::orderBy('created_at', 'desc')->limit(7)->get();
        $selectHotel = Hotel::get();
        $banners = Banner::all();
        return view('layouts.client.index', compact('roomtypes', 'banners', 'hotels', 'selectHotel'));
    }

   
    // show phòng theo id hotel
    public function roomList($id)
    {
        $rooms = Room::where('hotel_id', $id)->orderBy('created_at', 'desc')->paginate(4);
        $hotel = Hotel::find($id);
        $hotels = Hotel::get();
        return view('layouts.client.roomlists', compact('hotel', 'rooms', 'hotels'));
    }

    //chi tiết của 1 phòng
    public function roomDetail($id)
    {
        $room = Room::find($id);
        $comments = Comment::all();
        return view('layouts.client.roomdetail', compact('room','comments'));
    }

    // tìm kiếm phòng
    public function roomSearch(Request $request)
    {
        if ($request->adult <= 2) {
            if ($request->children <= 3) {
                $roomtypeId = Roomtype::where('name', 'single room')->first();
            } else {
                $roomtypeId = Roomtype::where('name', 'double room')->first();
            }
        } else {
            $roomtypeId = Roomtype::where('name', 'double room')->first();
        }

        $roomId = Booking_detail::join('bookings', 'booking_details.booking_id', '=', 'bookings.id')
            ->whereBetween('checkin', [$request->checkin, $request->checkout])
            ->orWhereBetween('checkout', [$request->checkin, $request->checkout])->pluck('room_id');

        // $roomId = Booking_detail::whereIn('booking_id',$bookingId)->pluck('room_id');


        $rooms = Room::whereNotIn('id', $roomId)->where('hotel_id', $request->address)->where('roomtype_id', $roomtypeId->id)->orderBy('created_at', 'desc')->get();
        $hotel = Hotel::find($request->address);
        $hotels = Hotel::get();
        return view('layouts.client.roomlists', compact('hotel', 'rooms', 'hotels'));
    }

    
    //Xử lí khi ap mã giảm giá
    public function discount(ClientDiscountRequest $request)
    {

        $discount = Discount::where('code', $request->code_discount)->first();
        if ($discount) {
            if ($discount->value == 0) {
                $amount = $request->price - $discount->price;
                $value = 'VNĐ';
            } else {
                $amount = $request->price - ($request->price * ($discount->price / 100));
                $value = '%';
            }

            if ($discount) {
                session()->flash('discount', [
                    'discountId' => $discount->id,
                    'discountPrice' => $discount->price,
                    'amount' => $amount,
                    'value' => $value
                ]);
            }
        }

        return back();
    }

    // Booking phòng
    public function roomBooking($id)
    {
        $room = Room::find($id);
        return view('layouts.client.booking', compact('room'));
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
        $booking->address = $request->address;
        $booking->checkin = $request->checkin;
        $booking->checkout = $request->checkout;
        $booking->amount = $request->amount;
        if ($request->discount_id != null) {
            $booking->discount_id = $request->discount_id;
        }
        $booking->save();

        $booking->rooms()->attach($id);

        return $this->payment($request, $paymentMethod, $booking->id);
    }

    // xử lý thanh toán
    public function payment($request, $paymentMethod, $id)
    {
        $booking = Booking::where('id', $id)->first();
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('client.success', $booking->id);
        $vnp_TmnCode = "JX4A2KRB"; //Mã website tại VNPAY 
        $vnp_HashSecret = "LCMNRDZUXFELVZLNLLRJXLYCEUHSVJJZ"; //Chuỗi bí mật

        $vnp_TxnRef = rand(00, 99999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Noi dung thanh toan';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $booking->amount * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($paymentMethod) && $paymentMethod == 'pay_now') {
            $booking->status_payment = 1;
            $booking->save();
            header('Location: ' . $vnp_Url);
            die();
        } else {
            // echo json_encode($returnData);
            $booking->status_payment = 0;
            $booking->save();
            return redirect()->route('client.success',$booking->id);
        }

        // vui lòng tham khảo thêm tại code demo
    }

    // show thông tin đặt phong thành công
    public function successBooking(Request $request, $id)
    {
        $booking = Booking::find($id);

        $payment = new Payment();
        if ($booking->status_payment == 1) {
            $payment->price = $request->vnp_Amount;
            $payment->bank = $request->vnp_BankCode;
            $payment->bankTranNo = $request->vnp_BankTranNo;
            $payment->cardType = $request->vnp_CardType;
            $payment->date = Carbon::createFromTimestamp($request->vnp_PayDate);
            $payment->responseCode = $request->vnp_ResponseCode;
            $payment->transactionNo = $request->vnp_TransactionNo;
            $payment->transactionStatus = $request->vnp_TransactionStatus;
            $payment->txnRef = $request->vnp_TxnRef;
            $payment->save();
        }

        return view('layouts.client.myaccount.success', compact('booking','payment'));
    }


    //giỏi hàng
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
                'roomtype' => $room->roomtype->name,
                'hotel' => $room->hotel->address,
                'price' => $room->roomtype->price,
                'image' => $room->image,
            ];

            session()->put('cart', $cart);
            return back()->with('msg', 'Thêm vào giỏ hàng thành công');
        }
        
    }

    // xóa giỏi hàng
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

    //thêm vào giỏi hàng
    public function cartAdd(ClientBookingReuqest $request)
    {


        $booking = new Booking();
        $paymentMethod = $request->paymentMethod;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        if (Auth::user()) {
            $booking->user_id = Auth::user()->id;
        }
        $booking->address = $request->address;
        $booking->checkin = $request->checkin;
        $booking->checkout = $request->checkout;
        $booking->amount = $request->amount;
        if ($request->discount_id != null) {
            $booking->discount_id = $request->discount_id;
        }
        $booking->save();

        foreach (session('cart') as $cart) {
            $booking->rooms()->attach($cart['id']);
        }

        session()->forget('cart');

        return $this->payment($request, $paymentMethod, $booking->id);
    }


}
