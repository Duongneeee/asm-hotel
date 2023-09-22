@extends('layouts.frontendashboard')
@section('content')
<div class="list-outer">
    <div class="list-item-1">
        @if (session('wishlist'))
        @foreach (session('wishlist') as $id => $wishlist)
        <div class="row">
            <div class="col-md-4">
                <div class="list-image1">
                    <img src="{{asset('storage/images/'.$wishlist['image'])}}" alt="images" />
                </div>
            </div>
            <div class="col-md-8">
                
                <div class="list-content">
                    <div class="list-rating">
                        <div class="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                        
                        <span class="limited mar-left-15"><a href="{{route('client.add-to-cart',$id)}}" class="text-white">Add to cart</a></span>
                        <i class="flaticon-like"></i>
                    </div>
                    <h3><a href="#">{{$wishlist['name']}}</a></h3>
                    <p><i class="flaticon-location-pin"></i> {{$wishlist['hotel']}}</p>
                    <p class="price">From <span>{{number_format($wishlist['price'])}}VNĐ</span> / night</p>

                    <div>
                        <form action="{{route('client.accounts.delete-wishlist',$id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn"><i class="fa fa-times"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>

</div>
@endsection