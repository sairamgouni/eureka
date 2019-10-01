<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 user-scalable=no">
    <title>Teledirect Group &rsaquo; Log In</title>
    <link href="{{asset('assets/login-assets/css/icons.css')}}" rel="stylesheet">
    <link rel="icon" href="{{asset('assets/login-assets/img/ico/tlogofvicon.png')}}" type="image/png">
    <link rel="stylesheet" href="{{asset('assets/login-assets/css/app.css')}}">
    <link rel="stylesheet" id="dashicons-css" href="{{asset('assets/login-assets/css/dashicons.min.css')}}" type="text/css" media="all">
    <link rel='stylesheet' id='login-css'  href="{{asset('assets/login-assets/css/login.min.css')}}" type='text/css' media='all' />
    <style>
        .body_css{
            background: #fefefe none repeat scroll 0 0;
            color: #0a0a0a;
            font-family: "Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;
            font-weight: normal;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body class="body_css">
<div class="main">
    <div id="particles-js" style="position: relative">
        <img src="{{asset('assets/login-assets/img/eureka-logo-horizontal.svg')}}" alt="" class="logo" style="top: -51px;height: 200px;width: 200px">

    </div>

    <div class="row login-cont">
        <div class="content form op2">

            <div id="loginfrm">

                <form method="POST" name="login-form" id="login-"  action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group row">
                         <p>
                        <label for="user_login">
                            <input type="text" name="email" id="user_login" class="input" value="" size="20"
                                   placeholder="Email" required/>
                        </label>
                    </p>

                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                <p class="submit" style="width:1000px;text-align:center;">
                    <input type="submit" name="fp_submit" id="fp_submit" value="Get New Password"/>
                </p>

                        </div>
                    </div>

                </form>
            </div>




            <div class="clear"></div>
            <footer>
                <p class="account-copyright"><span>Copyright © <?php echo date("Y"); ?> </span><span>Teledirectgroup</span>. <span>All rights reserved.</span></p>
            </footer>
        </div>

        <!-- Important javascript libs(put in all pages) -->
        <script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
        <script>
            window.jQuery || document.write('<script src="{site_url}js/libs/jquery-2.1.1.min.js">\x3C/script>')
        </script>
        <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script>
            window.jQuery || document.write('<script src="js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')
        </script>
        <!-- Bootstrap plugins -->
        <script src="{{asset('assets/login-assets/js/bootstrap/bootstrap.js')}}"></script>
        <!-- Form plugins -->
    {{-- <script src="{{asset('assets/login-assets/plugins/jquery.validate.js')}}"></script> --}}

    <!-- Top particles background -->
        <script src="{{asset('assets/login-assets/js/pages/particles.js')}}"></script>
        <script src="{{asset('assets/login-assets/js/pages/app.js')}}"></script>
{{-- <script src="{{asset('assets/login-assets/js/pages/login.js')}}"></script> --}}
{{-- <script src="{{ asset(mix('js/manifest.js')) }}"></script>
<script src="{{ asset(mix('js/vendor.js')) }}"></script>
<script src="{{asset(mix('js/app.js'))}}"></script> --}}
</body>
</html>
