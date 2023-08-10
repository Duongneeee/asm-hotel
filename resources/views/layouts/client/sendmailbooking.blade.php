<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Tektur:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container font-all">
        <div class="row mb-3">
            <h1 class="text-center">Thank You Bạn</h1>
        </div>
        <div class="row ">
            <div class="col-6 mb-3">
                <h3>Thông tin thanh toán:</h3>
            </div>

            <div class="col-6 mb-3">
                <h3>Phương thức thanh toán:</h3>
            </div>

            <div class="col-12 mb-3">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Người đặt</td>
                            <td>Phòng</td>
                            <td>Checkin</td>
                            <td>Checkout</td>
                            <td>price</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($booking_detail as $item)
                            
                        @endforeach
                        <tr>
                            <td>{{$item->booking->name}}</td>
                            <td>{{$item->room->name}}</td>
                            <td>{{$item->booking->checkin}}</td>
                            <td>{{$item->booking->checkout}}</td>
                            <td>{{$item->price}}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <style>
        .font-all {
            font-family: 'Tektur', cursive;
        }
    </style>
</body>

</html>