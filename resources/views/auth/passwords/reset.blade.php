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
        <img src="{{asset('assets/login-assets/img/eureka-logo-horizontal.svg')}}" alt="" class="logo" style="top: -51px;">
        <div style="text-align: center;
                          color: #fff;
                          position: absolute;
                          top: 44%;
                          margin-top: 50px;
                          width: 100%;
                          font-size: 16px;
                          font-weight: bold; ">
            EUREKA
        </div>
    </div>

    <div class="row login-cont">
        <div class="content form op2">

            <div id="loginfrm">
                <form method="POST" name="login-form" id="login-" action="{{ route('password.reset.submit') }}">
                    <h3>Reset Password</h3>

                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        @if ($errors->has('email'))
                            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email"/>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        @if ($errors->has('password'))
                            <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                        @endif
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"/>
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                        @endif
                        <input type="password_confirmation" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password"/>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-default submit">Reset Password</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> Larashop Admin Panel</h1>
                            <p>©2017 All Rights Reserved.</p>
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
