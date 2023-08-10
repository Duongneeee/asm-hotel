@extends('layouts.frontend')
@section('content')
<div class="dashboard">
    @include('parts.frontend.siderbaraccount')
    <div class="db-cent">
        <div class="db-cent-1">
            
            <p>Hi Jana Novakova,</p>
            <h4>Welcome to your dashboard</h4>

            
        </div>

        <div class="db-cent-3">
            <div class="db-cent-table db-com-table">
                <div class="db-title">
                    <h3><img src="{{asset('frontend/images/icon/dbc5.png')}}" alt="" /> My Bookings</h3>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                        alteration in some form</p>
                </div>
                <table class="bordered responsive-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Arrival</th>
                            <th>Departure</th>
                            <th>Amount</th>
                            <th>Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $key => $booking)
                        <tr>
                            <td>{{$key}}</td>
                            <td>{{$booking->name}}</td>
                            <td>{{$booking->phone}}</td>
                            <td><span class="db-tab-hi">{{$booking->address}}</td>
                            <td>{{$booking->checkin}}</td>
                            <td>{{$booking->checkout}}</td>
                            <td>{{$booking->amount}}$</td>
                            @if ($booking->status == 1)
                            <td><a href="#" class="db-success">Success</a></td>
                            @else
                            <td><a href="#" class="db-not-success">Pending</a>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="db-pagi">
                <ul class="pagination">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a>
                    </li>
                    <li class="active"><a href="#!">1</a>
                    </li>
                    <li class="waves-effect"><a href="#!">2</a>
                    </li>
                    <li class="waves-effect"><a href="#!">3</a>
                    </li>
                    <li class="waves-effect"><a href="#!">4</a>
                    </li>
                    <li class="waves-effect"><a href="#!">5</a>
                    </li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    @include('parts.frontend.notifications')
</div>
@endsection