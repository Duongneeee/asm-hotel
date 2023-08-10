<div class="db-left">
    <div class="db-left-1">
        
        <h4>@if (Auth::user()){{Auth::user()->name}}@endif</h4>
        <p>@if (Auth::user()){{Auth::user()->address}} @endif</p>
        
    </div>
    <div class="db-left-2">
        <ul>
            <li>
                <a href="{{route('client.accounts.index')}}"><img src="{{asset('frontend/images/icon/db1.png')}}" alt="" /> All</a>
            </li>
            <li>
                <a href="{{route('client.accounts.mybooking')}}"><img src="{{asset('frontend/images/icon/db2.png')}}" alt="" /> My Bookings</a>
            </li>
            <li>
                <a href="db-new-booking.html"><img src="{{asset('frontend/images/icon/db3.png')}}" alt="" /> New Booking</a>
            </li>
            <li>
                <a href="db-event.html"><img src="{{asset('frontend/images/icon/db4.png')}}" alt="" /> Event</a>
            </li>
            <li>
                <a href="db-activity.html"><img src="{{asset('frontend/images/icon/db5.png')}}" alt="" /> Activity</a>
            </li>
            <li>
                <a href="db-profile.html"><img src="{{asset('frontend/images/icon/db7.png')}}" alt="" /> Profile</a>
            </li>
            <li>
                <a href="#"><img src="{{asset('frontend/images/icon/db6.png')}}" alt="" /> Payments</a>
            </li>

            <li>
            <form method="POST" action="{{ route('logout')}}" class="my-form">
                @csrf
                <a class="submit-link"><img src="{{asset('frontend/images/icon/db8.png')}}" alt=""/> Logout</a>
            </form>
        </li>
        </ul>
    </div>
</div>