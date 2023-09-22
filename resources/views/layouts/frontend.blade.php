<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<!-- Mirrored from htmldesigntemplates.com/html/nepayatri/bootstrap4/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Aug 2023 08:42:09 GMT -->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Nepayatri - Tour & Travel Multipurpose Template</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('client/frontend/images/favicon.png')}}" />

    <link href="{{asset('client/frontend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('client/frontend/css/default.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('client/frontend/css/style.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{asset('client/frontend/css/color/color-default.css')}}" />

    <link href="{{asset('client/frontend/css/plugin.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('client/frontend/fonts/flaticon.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{asset('client/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('client/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css')}}" />
</head>

<body>

    <div id="preloader">
        <div id="status"></div>
    </div>


    @include('parts.frontend.header')




    @yield('content')


@include('parts.frontend.footer')
<script>
    const submitLinks = document.querySelectorAll(".submitLink"); // Chọn tất cả các thẻ <a> có lớp "submitLink"
    submitLinks.forEach(link => {
        link.addEventListener("click", function(event) {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>
    
            // Gửi form khi người dùng nhấp vào liên kết
            const form = this.closest(".myForm"); // Tìm form gần nhất với lớp "myForm"
            if (form) {
                form.submit();
            }
        });
    });

</script>