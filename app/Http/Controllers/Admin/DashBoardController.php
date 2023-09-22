<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $earningsMonth = Booking::whereYear('created_at',$year)->whereMonth('created_at',$month)->sum('amount');
        $earningsYear = Booking::whereYear('created_at',$year)->sum('amount');
        return view('layouts.admin.dashboard',compact('earningsMonth','earningsYear'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
