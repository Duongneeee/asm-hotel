<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

</head>

<body>
    <section class="vh-100" style="background-color: #fdccbc;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <p><span class="h2">Shopping Cart </span></p>
                    @php $total = 0 @endphp
                    <a href="{{route('index')}}" class="btn btn-light btn-lg me-2 mb-3">Continue shopping</a>


                    @if (session('cart'))
                    @foreach (session('cart') as $id =>$detail)
                    @php $total += $detail['price'] @endphp
                    <div class="card mb-4">
                        <tr class="card-body p-4" data-id="{{ $id }}">

                            <div class="row align-items-center">
                                <div class="col-md-2" data-th="Image">
                                    <img src="{{asset('storage/images/'.$detail['image'])}}" class="img-fluid"
                                        alt="Generic placeholder image">
                                </div>
                                <div class="col-md-2 d-flex justify-content-center">
                                    <div data-th="Name">
                                        <p class="small text-muted mb-4 pb-2">Name room</p>
                                        <p class="lead fw-normal mb-0">{{ $detail['name']}}</p>
                                    </div>
                                </div>

                                <div class="col-md-2 d-flex justify-content-center">
                                    <div data-th="NameRoom">
                                        <p class="small text-muted mb-4 pb-2">Name Roomtype</p>
                                        <p class="lead fw-normal mb-0">{{ $detail['nameRoom']}}</p>
                                    </div>
                                </div>

                                <div class="col-md-2 d-flex justify-content-center">
                                    <div data-th="Description">
                                        <p class="small text-muted mb-4 pb-2">Description</p>
                                        <p class="lead fw-normal mb-0">{{ $detail['description']}}</p>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex justify-content-center">
                                    <div data-th="Price">
                                        <p class="small text-muted mb-4 pb-2">Price</p>
                                        <p class="lead fw-normal mb-0">${{ $detail['price']}}</p>
                                    </div>
                                </div>

                                <div class="col-md-2 d-flex justify-content-center">
                                    <div data-th="">
                                        <form action="{{route('client.cart-remove',$id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <p class="small text-muted mb-4 pb-2">Delete</p>
                                            <button type="submit" class="btn btn-danger btn-sm cart_remove">Delete</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </tr>
                    </div>
                    @endforeach
                    @endif

                    <div class="card mb-5">
                        <div class="card-body p-4">

                            <div class="float-end">
                                <p class="mb-0 me-5 d-flex align-items-center">
                                    <span class="small text-muted me-2">Order total:</span> <span
                                        class="lead fw-normal">${{ $total }}</span>
                                </p>
                            </div>

                        </div>
                    </div>

                    @if (session('cart'))
                    <p><span class="h2"> Thông tin đặt phòng</span></p>

                    <form action="{{route('client.cart-post')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Full name</label>
                                    <input type="text" name="name" class="form-control" >
                                    @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                  </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" >
                                    @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                  </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" >
                                    @error('phone')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                  </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">City</label>
                                    <input type="text" name="address" class="form-control" >
                                    @error('address')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                  </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Checkin</label>
                                    <input type="datetime-local" name="checkin" class="form-control" >
                                    @error('checkin')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                  </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Checkout</label>
                                    <input type="datetime-local" name="checkout" class="form-control" >
                                    @error('checkout')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                  </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Discount</label>
                                    <input type="text" name="code_discount" class="form-control" >
                                    @error('code_discount')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                  </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paymentMethod" id="flexRadioDefault1" value="pay_now" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Thanh toán ngay
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paymentMethod" id="flexRadioDefault2" value="pay_later">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                          Thanh toán sau
                                        </label>
                                      </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">booking</button>
                        </div>
                    </form>
                    @endif

                    

                </div>
            </div>
        </div>
    </section>

    <style>
        body{
            background-color: #fdccbc;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>
{{-- <script type="text/javascript">
    $(".cart_remove").click(function (e) {
                            e.preventDefault();

                        var ele = $(this);


                        $.ajax({
                            url: '{{ route('client.cart-remove') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                },
                        success: function (response) {
                            window.location.reload();
                }
            });
    });
</script> --}}

</html>