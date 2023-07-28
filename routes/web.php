<?php

use App\Http\Controllers\Booking_detailController;
use App\Models\Booking;
use App\Models\Discount;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\RoomtypeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::prefix('users')->name('users.')->group(function(){
        Route::get('/',[UserController::class,'index'])->name('index');
        Route::get('/data',[UserController::class,'loadData'])->name('data');
        Route::get('/create',[UserController::class,'create'])->name('create');
        Route::post('/create',[UserController::class,'store'])->name('store');
        Route::get('/edit/{user}',[UserController::class,'edit'])->name('edit');
        Route::post('/edit/{user}',[UserController::class,'update'])->name('update');
        Route::delete('/delete/{user}',[UserController::class,'destroy'])->name('delete');
    });

    Route::prefix('hotels')->name('hotels.')->group(function(){

        Route::get('/',[HotelController::class,'index'])->name('index');

        Route::get('/data',[HotelController::class,'loadData'])->name('data');

        Route::get('/create',[HotelController::class,'create'])->name('create');

        Route::post('/create',[HotelController::class,'store'])->name('store');

        Route::get('/edit/{hotel}',[HotelController::class,'edit'])->name('edit');

        Route::post('/edit/{hotel}',[HotelController::class,'update'])->name('update');

        Route::delete('/destroy',[HotelController::class,'destroy'])->name('destroy');

        Route::get('/data/softdelete',[HotelController::class,'loadDataSoftDelete'])->name('data_softdelete');

        Route::get('/softdelete',[HotelController::class,'showSoftDelete'])->name('showsoftdelete');

        Route::get('/restore/{id}',[HotelController::class,'restore'])->name('restore');

        Route::delete('/force_delete',[HotelController::class,'forceDelete'])->name('force_delete');
    });

    Route::prefix('roomtypes')->name('roomtypes.')->group(function(){

        Route::get('/',[RoomtypeController::class,'index'])->name('index');

        Route::get('/data',[RoomtypeController::class,'loadData'])->name('data');

        Route::get('/create',[RoomtypeController::class,'create'])->name('create');

        Route::post('/create',[RoomtypeController::class,'store'])->name('store');

        Route::get('/edit/{roomtype}',[RoomtypeController::class,'edit'])->name('edit');

        Route::post('/edit/{roomtype}',[RoomtypeController::class,'update'])->name('update');

        Route::delete('/destroy',[RoomtypeController::class,'destroy'])->name('destroy');

        Route::get('/data/softdelete',[RoomtypeController::class,'loadDataSoftDelete'])->name('data_softdelete');

        Route::get('/softdelete',[RoomtypeController::class,'showSoftDelete'])->name('showsoftdelete');

        Route::get('/restore/{id}',[RoomtypeController::class,'restore'])->name('restore');

        Route::delete('/force_delete',[RoomtypeController::class,'forceDelete'])->name('force_delete');
    });

    Route::prefix('rooms')->name('rooms.')->group(function(){

        Route::get('/',[RoomController::class,'index'])->name('index');

        Route::get('/data',[RoomController::class,'loadData'])->name('data');

        Route::get('/create',[RoomController::class,'create'])->name('create');

        Route::post('/create',[RoomController::class,'store'])->name('store');

        Route::get('/edit/{room}',[RoomController::class,'edit'])->name('edit');

        Route::post('/edit/{room}',[RoomController::class,'update'])->name('update');

        Route::delete('/destroy',[RoomController::class,'destroy'])->name('destroy');

        Route::get('/data/softdelete',[RoomController::class,'loadDataSoftDelete'])->name('data_softdelete');

        Route::get('/softdelete',[RoomController::class,'showSoftDelete'])->name('showsoftdelete');

        Route::get('/restore/{id}',[RoomController::class,'restore'])->name('restore');

        Route::delete('/force_delete',[RoomController::class,'forceDelete'])->name('force_delete');
    });

    Route::prefix('discounts')->name('discounts.')->group(function(){

        Route::get('/',[DiscountController::class,'index'])->name('index');

        Route::get('/data',[DiscountController::class,'loadData'])->name('data');

        Route::get('/create',[DiscountController::class,'create'])->name('create');

        Route::post('/create',[DiscountController::class,'store'])->name('store');

        Route::get('/edit/{discount}',[DiscountController::class,'edit'])->name('edit');

        Route::post('/edit/{discount}',[DiscountController::class,'update'])->name('update');

        Route::delete('/destroy',[DiscountController::class,'destroy'])->name('destroy');

        Route::get('/data/softdelete',[DiscountController::class,'loadDataSoftDelete'])->name('data_softdelete');

        Route::get('/softdelete',[DiscountController::class,'showSoftDelete'])->name('showsoftdelete');

        Route::get('/restore/{id}',[DiscountController::class,'restore'])->name('restore');

        Route::delete('/force_delete',[DiscountController::class,'forceDelete'])->name('force_delete');
    });

    Route::prefix('bookings')->name('bookings.')->group(function(){

        Route::get('/',[BookingController::class,'index'])->name('index');

        Route::get('/data',[BookingController::class,'loadData'])->name('data');

        Route::get('/create',[BookingController::class,'create'])->name('create');

        Route::post('/create',[BookingController::class,'store'])->name('store');

        Route::get('/edit/{booking}',[BookingController::class,'edit'])->name('edit');

        Route::post('/edit/{booking}',[BookingController::class,'update'])->name('update');

        Route::delete('/destroy',[BookingController::class,'destroy'])->name('destroy');

        Route::get('/data/softdelete',[BookingController::class,'loadDataSoftDelete'])->name('data_softdelete');

        Route::get('/softdelete',[BookingController::class,'showSoftDelete'])->name('showsoftdelete');

        Route::get('/restore/{id}',[BookingController::class,'restore'])->name('restore');

        Route::delete('/force_delete',[BookingController::class,'forceDelete'])->name('force_delete');
    });

    Route::prefix('booking_details')->name('booking_details.')->group(function(){

        Route::get('/',[Booking_detailController::class,'index'])->name('index');

        Route::get('/data',[Booking_detailController::class,'loadData'])->name('data');

       
    });
});
