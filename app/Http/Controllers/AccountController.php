<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientProfileRequest;
use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Booking_detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::count();
        $status = Booking::where('status',1)->count();
        return view('layouts.client.myaccount.dashboard',compact('bookings','status'));
    }

    //mybooking
    public function indexMyBooking()
    {
        $bookings = Booking::orderBy('created_at', 'desc')->where('user_id',Auth::user()->id)->paginate(10);
        return view('layouts.client.myaccount.mybooking', compact('bookings'));
    }


    //wishlist
    public function showWishList(){
        return view('layouts.client.myaccount.wishlist');
        
    }

    public function addWishList($id){
        $room = Room::find($id);

        $wishlist = session()->get('wishlist',[]);

        if(isset($wishlist[$id])){
            return back();
        }else{
            $wishlist[$id] = [
                'name' => $room->name,
                'description' => $room->description,
                'roomtype' => $room->roomtype->name,
                'hotel' => $room->hotel->address,
                'price' => $room->roomtype->price,
                'image' => $room->image,
            ];
            session()->put('wishlist',$wishlist);
            return back();
        }
    }

    public function deleteWishList($id){
        if($id){
            $wishlist = session()->get('wishlist');
            if($wishlist[$id]){
                unset($wishlist[$id]);
                session()->put('wishlist',$wishlist);
            }
            return back();
        }
    }

    //profile
    public function profile(){
        return view('layouts.client.myaccount.profile');
    }

    public function postProfile(ClientProfileRequest $request, User $user){
        if($request->name){
            $user->name=$request->name;
        }
        if($request->email){
            $user->email=$request->email;
        }
        if($request->phone){
            $user->phone=$request->phone;
        }
        if($request->gender){
            $user->gender=$request->gender;
        }
        if($request->address){
            $user->address=$request->address;
        }
        if($request->password){
            $user->password=Hash::make($request->password);
        }
        if($request->image){
            Storage::delete('public/images/'.$user->image);
            $image = $request->image->getClientOriginalName();
            $request = $request->image->storeAs('public/images',$image);
            $user->image=$image;
        }
        $user->save();
        return back()->with('msg','Cập nhật thông tin thành công');
    }
}
