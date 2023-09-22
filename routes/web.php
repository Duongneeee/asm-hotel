<?php

use App\Models\Role;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\Booking;
use App\Models\Discount;
use App\Models\Roomtype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\RoomtypeController;
use App\Http\Controllers\Admin\Booking_detailController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Client\CommentController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[ClientController::class,'index'])->name('index');

Route::prefix('client')->name('client.')->group(function(){
    Route::get('/room/{id}',[ClientController::class,'roomList'])->name('room');

    Route::get('/detail-room/{id}',[ClientController::class,'roomDetail'])->name('detail-room');

    Route::post('/room-search',[ClientController::class,'roomSearch'])->name('room-search');

    Route::get('/booking-room/{id}',[ClientController::class,'roomBooking'])->name('booking-room');

    Route::post('/booking-discount',[ClientController::class,'discount'])->name('booking-discount');

    Route::post('/booking-room/{id}',[ClientController::class,'postRoomBooking'])->name('post-booking-room');

    Route::get('/success/{id}',[ClientController::class,'successBooking'])->name('success');

    Route::get('/pending',[ClientController::class,'pendingBooking'])->name('pending');

    Route::get('/add-to-cart/{id}',[ClientController::class,'addToCart'])->name('add-to-cart');

    Route::get('/cart',[ClientController::class,'cart'])->name('cart');

    Route::delete('/cart-remove/{id}',[ClientController::class,'cartRemove'])->name('cart-remove');

    Route::post('/cart-post',[ClientController::class,'cartAdd'])->name('cart-post');

    //comments
    Route::post('/comments',[CommentController::class,'store'])->name('store-comment');
    

    Route::prefix('accounts')->name('accounts.')->middleware('auth')->group(function(){

        Route::get('/',[AccountController::class,'index'])->name('index');

        Route::get('/mybooking',[AccountController::class,'indexMyBooking'])->name('mybooking');

        Route::get('/wishlist',[AccountController::class,'showWishList'])->name('show-wishlist');

        Route::post('/add-wishlist/{id}',[AccountController::class,'addWishList'])->name('add-wishlist');

        Route::delete('/delete-wishlist/{id}',[AccountController::class,'deleteWishList'])->name('delete-wishlist');

        Route::get('/profile',[AccountController::class,'profile'])->name('profile');

        Route::post('/profile/{user}',[AccountController::class,'postProfile'])->name('add-profile');

    });

});

Route::prefix('admin')->middleware(['auth','verified'])->name('admin.')->group(function(){

    Route::get('/dashboard',[DashBoardController::class,'index'])->name('dashboard');
    Route::prefix('users')->name('users.')->middleware('can:users')->group(function(){
        Route::get('/',[UserController::class,'index'])->name('index');
        Route::get('/data',[UserController::class,'loadData'])->name('data');
        Route::get('/create',[UserController::class,'create'])->name('create');
        Route::post('/create',[UserController::class,'store'])->name('store');
        Route::get('/edit/{user}',[UserController::class,'edit'])->name('edit');
        Route::post('/edit/{user}',[UserController::class,'update'])->name('update');
        Route::delete('/delete/{user}',[UserController::class,'destroy'])->name('delete');
    });

    Route::prefix('hotels')->name('hotels.')->middleware('can:hotels')->group(function(){

        Route::get('/',[HotelController::class,'index'])->name('index');

        Route::get('/create',[HotelController::class,'create'])->name('create')->can('create',Hotel::class);

        Route::post('/create',[HotelController::class,'store'])->name('store')->can('create',Hotel::class);

        Route::get('/edit/{hotel}',[HotelController::class,'edit'])->name('edit')->can('update',Hotel::class);

        Route::post('/edit/{hotel}',[HotelController::class,'update'])->name('update')->can('update',Hotel::class);

        Route::delete('/destroy',[HotelController::class,'destroy'])->name('destroy')->can('delete',Hotel::class);

        Route::get('/softdelete',[HotelController::class,'showSoftDelete'])->name('showsoftdelete');

        Route::get('/restore/{id}',[HotelController::class,'restore'])->name('restore')->can('restore',Hotel::class);

        Route::delete('/force_delete',[HotelController::class,'forceDelete'])->name('force_delete')->can('forcedelete',Hotel::class);
    });

    Route::prefix('roomtypes')->name('roomtypes.')->middleware('can:roomtypes')->group(function(){

        Route::get('/',[RoomtypeController::class,'index'])->name('index');

        Route::get('/create',[RoomtypeController::class,'create'])->name('create')->can('create',Roomtype::class);

        Route::post('/create',[RoomtypeController::class,'store'])->name('store')->can('create',Roomtype::class);;

        Route::get('/edit/{roomtype}',[RoomtypeController::class,'edit'])->name('edit')->can('update',Roomtype::class);;

        Route::post('/edit/{roomtype}',[RoomtypeController::class,'update'])->name('update')->can('update',Roomtype::class);;

        Route::delete('/destroy',[RoomtypeController::class,'destroy'])->name('destroy')->can('delete',Roomtype::class);;

        Route::get('/softdelete',[RoomtypeController::class,'showSoftDelete'])->name('showsoftdelete');

        Route::get('/restore/{id}',[RoomtypeController::class,'restore'])->name('restore')->can('restore',Roomtype::class);;

        Route::delete('/force_delete',[RoomtypeController::class,'forceDelete'])->name('force_delete')->can('forcedelete',Roomtype::class);;
    });

    Route::prefix('rooms')->name('rooms.')->middleware('can:rooms')->group(function(){

        Route::get('/',[RoomController::class,'index'])->name('index');

        Route::get('/create',[RoomController::class,'create'])->name('create')->can('create',Room::class);

        Route::post('/create',[RoomController::class,'store'])->name('store')->can('create',Room::class);

        Route::get('/edit/{room}',[RoomController::class,'edit'])->name('edit')->can('update',Room::class);

        Route::post('/edit/{room}',[RoomController::class,'update'])->name('update')->can('update',Room::class);

        Route::delete('/destroy',[RoomController::class,'destroy'])->name('destroy')->can('delete',Room::class);

        Route::get('/softdelete',[RoomController::class,'showSoftDelete'])->name('showsoftdelete');

        Route::get('/restore/{id}',[RoomController::class,'restore'])->name('restore')->can('restore',Room::class);

        Route::delete('/force_delete',[RoomController::class,'forceDelete'])->name('force_delete')->can('forcedelete',Room::class);
    });

    Route::prefix('discounts')->name('discounts.')->middleware('can:discounts')->group(function(){

        Route::get('/',[DiscountController::class,'index'])->name('index');

        Route::get('/create',[DiscountController::class,'create'])->name('create')->can('create',Discount::class);

        Route::post('/create',[DiscountController::class,'store'])->name('store')->can('create',Discount::class);

        Route::get('/edit/{discount}',[DiscountController::class,'edit'])->name('edit')->can('update',Discount::class);

        Route::post('/edit/{discount}',[DiscountController::class,'update'])->name('update')->can('update',Discount::class);

        Route::delete('/destroy',[DiscountController::class,'destroy'])->name('destroy')->can('delete',Discount::class);

        Route::get('/softdelete',[DiscountController::class,'showSoftDelete'])->name('showsoftdelete');

        Route::post ('/restore/{id}',[DiscountController::class,'restore'])->name('restore')->can('restore',Discount::class);

        Route::delete('/force_delete',[DiscountController::class,'forceDelete'])->name('force_delete')->can('forcedelete',Discount::class);;
    });

    Route::prefix('bookings')->name('bookings.')->middleware('can:bookings')->group(function(){

        Route::get('/',[BookingController::class,'index'])->name('index');

        Route::get('/create',[BookingController::class,'create'])->name('create')->can('create',Booking::class);

        Route::post('/create',[BookingController::class,'store'])->name('store')->can('create',Booking::class);

        Route::get('/edit/{booking}',[BookingController::class,'edit'])->name('edit')->can('update',Booking::class);

        Route::post('/edit/{booking}',[BookingController::class,'update'])->name('update')->can('update',Booking::class);

        Route::delete('/destroy',[BookingController::class,'destroy'])->name('destroy')->can('delete',Booking::class);

        Route::get('/softdelete',[BookingController::class,'showSoftDelete'])->name('showsoftdelete');

        Route::get('/restore/{id}',[BookingController::class,'restore'])->name('restore');

        Route::delete('/force_delete',[BookingController::class,'forceDelete'])->name('force_delete');
    });

    Route::prefix('booking_details')->name('booking_details.')->middleware('can:booking_details')->group(function(){

        Route::get('/',[Booking_detailController::class,'index'])->name('index');
       
    });

    Route::prefix('roles')->name('roles.')->middleware('can:roles')->group(function(){

        Route::get('/',[RoleController::class,'index'])->name('index');

        Route::get('/create',[RoleController::class,'create'])->name('create')->can('create',Role::class);

        Route::post('/create',[RoleController::class,'store'])->name('store')->can('create',Role::class);

        Route::get('/edit/{role}',[RoleController::class,'edit'])->name('edit')->can('update',Role::class);

        Route::post('/edit/{role}',[RoleController::class,'update'])->name('update')->can('update',Role::class);

        Route::delete('/destroy',[RoleController::class,'destroy'])->name('destroy')->can('delete',Role::class);

        Route::get('/softdelete',[RoleController::class,'showSoftDelete'])->name('showsoftdelete');

        Route::get('/restore/{id}',[RoleController::class,'restore'])->name('restore')->can('restore',Role::class);

        Route::delete('/force_delete',[RoleController::class,'forceDelete'])->name('force_delete')->can('forceDelete',Role::class);

        Route::get('/permission/{role}',[RoleController::class,'permission'])->name('permission')->can('roles.permission');

        Route::post('/permission/{role}',[RoleController::class,'postPermission'])->can('roles.permission');

    });

    Route::prefix('banners')->name('banners.')->group(function(){

        Route::get('/',[BannerController::class,'index'])->name('index');

        Route::get('/create',[BannerController::class,'create'])->name('create');

        Route::post('/create',[BannerController::class,'store'])->name('store');

        Route::get('/edit/{role}',[BannerController::class,'edit'])->name('edit');

        Route::post('/edit/{role}',[BannerController::class,'update'])->name('update');

        Route::delete('/destroy',[BannerController::class,'destroy'])->name('destroy');

    });
});



require __DIR__.'/auth.php';
