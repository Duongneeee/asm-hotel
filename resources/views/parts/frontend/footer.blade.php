<footer>
    <div class="footer-upper pad-bottom-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-about">
                        <div class="footer-about-in mar-bottom-30">
                            <h3 class="white">Need Nepayatri Help?</h3>
                            <div class="footer-phone">
                                <div class="cont-icon"><i class="flaticon-call"></i></div>
                                <div class="cont-content mar-left-20">
                                    <p class="mar-0">Got Questions? Call us 24/7!</p>
                                    <p class="bold mar-0"><span>Call Us:</span> (888) 1234 56789</p>
                                </div>
                            </div>
                        </div>
                        <h3 class="white">Contact Info</h3>
                        <p>
                            PO Box: +47-252-254-2542<br />
                            Location: Collins Stree, Vicotria 80, Australia
                        </p>
                        <ul class="social-links">
                            <li>
                                <a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-links">
                        <h3 class="white">Company</h3>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Statement</a></li>
                            <li><a href="#">Feedbacks</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-links">
                        <h3 class="white">Support</h3>
                        <ul>
                            <li><a href="#">Account</a></li>
                            <li><a href="#">Legal</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Affiliate Program</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="footer-subscribe">
                        <h3 class="white">Mailing List</h3>
                        <p class="white">Sign up for our mailing list to get latest updates and offers</p>
                        <form>
                            <input type="email" placeholder="Your Email" />
                            <a href="#" class="biz-btn mar-top-15">Subscribe</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-payment pad-top-30 pad-bottom-30 bg-white">
        <div class="container">
            <div class="pay-main display-flex space-between">
                <div class="footer-logo pull-left">
                    <a href="index.html"><img src="{{asset('client/frontend/images/logo-black.png')}}"
                            alt="image" /></a>
                </div>
                <div class="footer-payment-nav pull-right">
                    <ul>
                        <li><img src="{{asset('client/frontend/images/payment/mastercard.png')}}" alt="image" />
                        </li>
                        <li><img src="{{asset('client/frontend/images/payment/paypal.png')}}" alt="image" /></li>
                        <li><img src="{{asset('client/frontend/images/payment/skrill.png')}}" alt="image" /></li>
                        <li><img src="{{asset('client/frontend/images/payment/visa.png')}}" alt="image" /></li>
                        <li>
                            <select>
                                <option>English (United States)</option>
                                <option>English (United States)</option>
                                <option>English (United States)</option>
                                <option>English (United States)</option>
                                <option>English (United States)</option>
                            </select>
                        </li>
                        <li>
                            <select>
                                <option>$ USD</option>
                                <option>$ USD</option>
                                <option>$ USD</option>
                                <option>$ USD</option>
                                <option>$ USD</option>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="copyright-text pull-left">
                <p class="mar-0">2020 Nepayatri. All rights reserved.</p>
            </div>
            <div class="footer-nav pull-right">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Contact us</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>


<div id="back-to-top">
    <a href="#"></a>
</div>


<div id="search1">
    <button type="button" class="close">×</button>
    <form>
        <input type="search" value placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>

<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog">
        <div class="login-content">
            <div class="login-title section-border">
                <h3>Login</h3>
            </div>
            <div class="login-form section-border">
                <form action="{{route('login')}}" method="POST" class="myForm">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Enter email address" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Enter password" />
                    </div>
                    <div class="form-btn">
                        <a href="" class="biz-btn biz-btn1 submitLink">LOGIN</a>
                    </div>
                </form>
                <div class="form-group form-checkbox">
                    <input type="checkbox" /> Remember Me
                    <a href="#">Forgot password?</a>
                </div>
            </div>
            <div class="login-social section-border">
                <p>or continue with</p>
                <a href="#" class="btn-facebook"><i class="fab fa-facebook" aria-hidden="true"></i> Facebook</a>
                <a href="#" class="btn-twitter"><i class="fab fa-twitter" aria-hidden="true"></i> Twitter</a>
            </div>
            <div class="sign-up">
                <p>Do not have an account?<a href="#">Sign Up</a></p>
            </div>
        </div>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
</div>
<div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog">
        <div class="login-content">
            <div class="login-title section-border">
                <h3>Register</h3>
            </div>
            <div class="login-form section-border">
                <form>
                    <div class="form-group">
                        <input type="text" placeholder="User Name" />
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Full Name" />
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="Email" />
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" />
                    </div>
                </form>
                <div class="form-btn">
                    <a href="#" class="biz-btn biz-btn1">REGISTER</a>
                </div>
                <div class="form-group form-checkbox">
                    <input type="checkbox" /> Remember Me
                    <a href="#">Forgot password?</a>
                </div>
            </div>
            <div class="login-social section-border">
                <p>or continue with</p>
                <a href="#" class="btn-facebook"><i class="fab fa-facebook" aria-hidden="true"></i> Facebook</a>
                <a href="#" class="btn-twitter"><i class="fab fa-twitter" aria-hidden="true"></i> Twitter</a>
            </div>
            <div class="sign-up">
                <p>Do not have an account?<a href="#">Sign Up</a></p>
            </div>
        </div>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
</div>

<script data-cfasync="false" src="{{asset('client/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}">
</script>
<script src="{{asset('client/frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('client/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('client/frontend/js/color-switcher.js')}}"></script>
<script src="{{asset('client/frontend/js/plugin.js')}}"></script>
<script src="{{asset('client/frontend/js/main.js')}}"></script>
<script src="{{asset('client/frontend/js/menu.js')}}"></script>
<script src="{{asset('client/frontend/js/custom-swiper2.js')}}"></script>
<script src="{{asset('client/frontend/js/custom-nav.js')}}"></script>
<script src="{{asset('client/frontend/js/custom-date.js')}}"></script>
<script>
    (function(){var js = "window['__CF$cv$params']={r:'7f4f2f0cd96320e9',t:'MTY5MTc0MzMzMi4xMTkwMDA='};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='{{asset('client/cdn-cgi/challenge-platform/h/b/scripts/jsd/7186c00a/invisible.js')}}',document.getElementsByTagName('head')[0].appendChild(_cpo);";var _0xh = document.createElement('iframe');_0xh.height = 1;_0xh.width = 1;_0xh.style.position = 'absolute';_0xh.style.top = 0;_0xh.style.left = 0;_0xh.style.border = 'none';_0xh.style.visibility = 'hidden';document.body.appendChild(_0xh);function handler() {var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;if (_0xi) {var _0xj = _0xi.createElement('script');_0xj.innerHTML = js;_0xi.getElementsByTagName('head')[0].appendChild(_0xj);}}if (document.readyState !== 'loading') {handler();} else if (window.addEventListener) {document.addEventListener('DOMContentLoaded', handler);} else {var prev = document.onreadystatechange || function () {};document.onreadystatechange = function (e) {prev(e);if (document.readyState !== 'loading') {document.onreadystatechange = prev;handler();}};}})();
</script>
</body>

<!-- Mirrored from htmldesigntemplates.com/html/nepayatri/bootstrap4/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Aug 2023 08:43:57 GMT -->


</html>