@extends('layouts.frontendashboard')
@section('content')
<div class="dashboard-list-box">
    <div class="table-box">
        <table class="basic-table history-table">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Checkin</th>
                    <th>Checkout</th>
                    <th>Cost</th>
                    <th>Status payment</th>
                </tr>
            </thead>
            <tbody>
               @if ($bookings)
                   @foreach ($bookings as $booking)
                   <tr>
                    <td>{{$booking->id}}</td>
                    <td>{{$booking->name}}</td>
                    <td>{{$booking->checkin}}</td>
                    <td>{{$booking->checkout}}</td>
                    <td>{{number_format($booking->amount)}}VNĐ</td>
                    @if ($booking->status_payment == 0)
                    <td>Pending</td>
                    @else
                    <td>Success</td>
                    @endif
                </tr>
                   @endforeach
                   
               @endif
               
            </tbody>
        </table>
    </div>
</div>

    @include('layouts.client.custom_paginate', ['items' => $bookings])
@endsection