<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<!-- Mirrored from htmldesigntemplates.com/html/nepayatri/bootstrap4/dashboard-history.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Aug 2023 08:46:22 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nepayatri - Tour & Travel Multipurpose Template</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('client/frontend/images/favicon.png')}}">

    <link href="{{asset('client/frontend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('client/frontend/css/default.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('client/frontend/css/style.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('client/frontend/css/plugin.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('client/frontend/css/dashboard.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('client/frontend/css/icons.css')}}" rel="stylesheet" type="text/css">

    <link rel="stylesheet"
        href="{{asset('client/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css')}}">
</head>

<body>

    <div id="preloader">
        <div id="status"></div>
    </div>


    <div id="container-wrapper">

        <div id="dashboard">

            <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>
            @include('parts.frontend.dashboard.header')
            @include('parts.frontend.dashboard.sidebar')
           
            <div class="dashboard-content">
                @yield('content')
            </div>


            @include('parts.frontend.dashboard.footer')

        </div>

    </div>


    <div id="back-to-top">
        <a href="#"></a>
    </div>


    <script src="{{asset('client/frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('client/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('client/frontend/js/plugin.js')}}"></script>
    <script src="{{asset('client/frontend/js/jpanelmenu.min.js')}}"></script>
    <script src="{{asset('client/frontend/js/dashboard-custom.js')}}"></script>
    <script>
        (function(){var js = "window['__CF$cv$params']={r:'7f4f308229062483',t:'MTY5MTc0MzM5MS42NjcwMDA='};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='{{asset('client/cdn-cgi/challenge-platform/h/b/scripts/jsd/7186c00a/invisible.js')}}',document.getElementsByTagName('head')[0].appendChild(_cpo);";var _0xh = document.createElement('iframe');_0xh.height = 1;_0xh.width = 1;_0xh.style.position = 'absolute';_0xh.style.top = 0;_0xh.style.left = 0;_0xh.style.border = 'none';_0xh.style.visibility = 'hidden';document.body.appendChild(_0xh);function handler() {var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;if (_0xi) {var _0xj = _0xi.createElement('script');_0xj.innerHTML = js;_0xi.getElementsByTagName('head')[0].appendChild(_0xj);}}if (document.readyState !== 'loading') {handler();} else if (window.addEventListener) {document.addEventListener('DOMContentLoaded', handler);} else {var prev = document.onreadystatechange || function () {};document.onreadystatechange = function (e) {prev(e);if (document.readyState !== 'loading') {document.onreadystatechange = prev;handler();}};}})();
    </script>
</body>

<!-- Mirrored from htmldesigntemplates.com/html/nepayatri/bootstrap4/dashboard-history.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Aug 2023 08:46:22 GMT -->

</html>