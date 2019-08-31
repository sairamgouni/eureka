<!DOCTYPE html>
<html lang="en">
<head>

    <title>Home</title>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/Bootstrap/dist/css/bootstrap-reboot.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/Bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/Bootstrap/dist/css/bootstrap-grid.css')}}">

    <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fonts.min.css')}}">

    <!-- Main Font -->
    <script src="{{asset('assets/js/webfontloader.min.js')}}"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>

</head>
<body class="page-has-left-panels page-has-right-panels">


<!-- Preloader -->

<div id="hellopreloader">
    <div class="preloader">
        <svg width="45" height="45" stroke="#fff">
            <g fill="none" fill-rule="evenodd" stroke-width="2" transform="translate(1 1)">
                <circle cx="22" cy="22" r="6" stroke="none">
                    <animate attributeName="r" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite"
                             values="6;22"/>
                    <animate attributeName="stroke-opacity" begin="1.5s" calcMode="linear" dur="3s"
                             repeatCount="indefinite" values="1;0"/>
                    <animate attributeName="stroke-width" begin="1.5s" calcMode="linear" dur="3s"
                             repeatCount="indefinite" values="2;0"/>
                </circle>
                <circle cx="22" cy="22" r="6" stroke="none">
                    <animate attributeName="r" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite"
                             values="6;22"/>
                    <animate attributeName="stroke-opacity" begin="3s" calcMode="linear" dur="3s"
                             repeatCount="indefinite" values="1;0"/>
                    <animate attributeName="stroke-width" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite"
                             values="2;0"/>
                </circle>
                <circle cx="22" cy="22" r="8">
                    <animate attributeName="r" begin="0s" calcMode="linear" dur="1.5s" repeatCount="indefinite"
                             values="6;1;2;3;4;5;6"/>
                </circle>
            </g>
        </svg>

        <div class="text">Loading ...</div>
    </div>
</div>

<!-- ... end Preloader -->


{{--<!-- Fixed Sidebar Left -->--}}


<!-- Ve render area -->
<div id="app"></div>

<!-- Window-popup-CHAT for responsive min-width: 768px -->

<div class="ui-block popup-chat popup-chat-responsive" tabindex="-1" role="dialog"
     aria-labelledby="popup-chat-responsive" aria-hidden="true">

    <div class="modal-content">
        <div class="modal-header">
            <span class="icon-status online"></span>
            <h6 class="title">Chat</h6>
            <div class="more">
                <svg class="olymp-three-dots-icon">
                    <use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                </svg>
                <svg class="olymp-little-delete js-chat-open">
                    <use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-little-delete"></use>
                </svg>
            </div>
        </div>
        <div class="modal-body">
            <div class="mCustomScrollbar">
                <ul class="notification-list chat-message chat-message-field">
                    <li>
                        <div class="author-thumb">
                            <img src="assets/img/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
                        </div>
                        <div class="notification-event">
                            <span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="assets/img/author-page.jpg" alt="author" class="mCS_img_loaded">
                        </div>
                        <div class="notification-event">
                            <span class="chat-message-item">Don’t worry Mathilda!</span>
                            <span class="chat-message-item">I already bought everything</span>
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">Yesterday at 8:29pm</time></span>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="assets/img/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
                        </div>
                        <div class="notification-event">
                            <span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
                        </div>
                    </li>
                </ul>
            </div>

            <form class="need-validation">

                <div class="form-group label-floating is-empty">
                    <label class="control-label">Press enter to post...</label>
                    <textarea class="form-control" placeholder=""></textarea>
                    <div class="add-options-message">
                        <a href="#" class="options-message">
                            <svg class="olymp-computer-icon">
                                <use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                            </svg>
                        </a>
                        <div class="options-message smile-block">

                            <svg class="olymp-happy-sticker-icon">
                                <use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-happy-sticker-icon"></use>
                            </svg>

                            <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat1.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat2.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat3.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat4.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat5.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat6.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat7.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat8.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat9.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat10.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat11.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat12.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat13.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat14.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat15.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat16.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat17.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat18.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat19.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat20.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat21.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat22.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat23.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat24.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat25.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat26.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat27.png" alt="icon">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>

<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->


<a class="back-to-top" href="#">
    <img src="{{asset('assets/svg-icons/back-to-top.svg')}}" alt="arrow" class="back-icon">
</a>


<!-- JS Scripts -->
<script src="{{asset('assets/js/jquery-3.2.1.js')}}"></script>
<script src="{{asset('assets/js/jquery.appear.js')}}"></script>
<script src="{{asset('assets/js/jquery.mousewheel.js')}}"></script>
<script src="{{asset('assets/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/js/jquery.matchHeight.js')}}"></script>
<script src="{{asset('assets/js/svgxuse.js')}}"></script>
<script src="{{asset('assets/js/imagesloaded.pkgd.js')}}"></script>
<script src="{{asset('assets/js/Headroom.js')}}"></script>
<script src="{{asset('assets/js/velocity.js')}}"></script>
<script src="{{asset('assets/js/ScrollMagic.js')}}"></script>
<script src="{{asset('assets/js/jquery.waypoints.js')}}"></script>
<script src="{{asset('assets/js/jquery.countTo.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/material.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/js/smooth-scroll.js')}}"></script>
<script src="{{asset('assets/js/selectize.js')}}"></script>
<script src="{{asset('assets/js/swiper.jquery.js')}}"></script>
<script src="{{asset('assets/js/moment.js')}}"></script>
<script src="{{asset('assets/js/daterangepicker.js')}}"></script>
<script src="{{asset('assets/js/simplecalendar.js')}}"></script>
<script src="{{asset('assets/js/fullcalendar.js')}}"></script>
<script src="{{asset('assets/js/isotope.pkgd.js')}}"></script>
<script src="{{asset('assets/js/ajax-pagination.js')}}"></script>
<script src="{{asset('assets/js/Chart.js')}}"></script>
<script src="{{asset('assets/js/chartjs-plugin-deferred.js')}}"></script>
<script src="{{asset('assets/js/circle-progress.js')}}"></script>
<script src="{{asset('assets/js/loader.js')}}"></script>
<script src="{{asset('assets/js/run-chart.js')}}"></script>
<script src="{{asset('assets/js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('assets/js/jquery.gifplayer.js')}}"></script>
<script src="{{asset('assets/js/mediaelement-and-player.js')}}"></script>
<script src="{{asset('assets/js/mediaelement-playlist-plugin.min.js')}}"></script>
<script src="{{asset('assets/js/ion.rangeSlider.js')}}"></script>
<script src="{{asset('assets/js/base-init.js')}}"></script>
<script defer src="{{asset('assets/fonts/fontawesome-all.js')}}"></script>
<script src="{{asset('assets/Bootstrap/dist/js/bootstrap.bundle.js')}}"></script>

@yield('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });

    let APP={
        baseUrl:"{{url('/')}}",
        assetUrl:"{{asset('/')}}"
    }
</script>
<script src="{{ asset(mix('js/manifest.js')) }}"></script>
<script src="{{ asset(mix('js/vendor.js')) }}"></script>
<script src="{{asset(mix('js/app.js'))}}"></script>

</body>
</html>
