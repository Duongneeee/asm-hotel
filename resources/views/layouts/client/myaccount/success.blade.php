@extends('layouts.frontend')
@section('content')
    <div class="dashboard">
        @include('parts.frontend.siderbaraccount')
			<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi Jana Novakova,</p>
					<h4>Welcome to your dashboard</h4> </div>
				<div class="db-cent-2">
					<h1 class="text-center text-success">Đặt Phòng Thành Công</h1>
				</div>

                <div class="db-cent-2">
					<h1 class="text-center text-success"></h1>
				</div>

                <div class="db-cent-2">
					<h1 class="text-center text-success"></h1>
				</div>

                <div class="db-cent-2">
					<h1 class="text-center text-success"></h1>
				</div>

				
			</div>
			@include('parts.frontend.notifications')
		</div>
@endsection