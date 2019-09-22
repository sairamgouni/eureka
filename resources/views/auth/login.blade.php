<!DOCTYPE html>
<html lang="en-US">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 user-scalable=no">
    <title>Teledirect Group &rsaquo; Log In</title>
    <link href="{{asset('assets/login-assets/css/icons.css')}}" rel="stylesheet">
    <link rel="icon" href="{{asset('assets/login-assets/img/ico/tlogofvicon.png')}}" type="image/png">
    <link rel="stylesheet" href="{{asset('assets/login-assets/css/app.css')}}">
    <link rel="stylesheet" id="dashicons-css" href="{{asset('assets/login-assets/css/dashicons.min.css')}}"
          type="text/css" media="all">
    <link rel='stylesheet' id='login-css' href="{{asset('assets/login-assets/css/login.min.css')}}" type='text/css'
          media='all'/>
    <style>
        .body_css {
            background: #fefefe none repeat scroll 0 0;
            color: #0a0a0a;
            font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
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
        <img src="{{asset('assets/login-assets/img/eureka-logo-horizontal.svg')}}" alt="" class="logo" style="top: 51px;height: 200px;width: 200px">
    </div>

    <div class="row login-cont">
        <div class="content form op2">

            <div id="loginfrm">
                <form method="POST" name="login-form" id="login-" action="{{route('admin.login') }}">
                    @csrf
                    <span class="error-msg"
                          style="display:none">Please enter your email | Please enter your password</span>
                    <p class="userlogin1">
                        <label for="user_login">
                            <input type="text" id="email" type="email"
                                   class="input @error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email" autofocus size="20"
                                   placeholder="Username"/>
                        </label>
                        @error('email')
                        <span class="invalid-feedback" role="alert" style="color:red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </p>
                    <p class="passwrd1">
                        <label for="user_pass">
                            <input id="password" type="password" @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" class="input" value="" size="20"
                            placeholder="Password" /></label>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </p>
                    <p class="forgetmenot1">
                        <label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox"
                                                       value="forever"/> Remember Me</label></p>
                    <p class="submit1">
                        <input type="hidden" id="action" name="action" value="login">
                        <input type="submit" name="wp-submit" id="real_submit" class="btn" value="Login"/>
                        <input type="hidden" name="redirect_to" value=""/>
                        <input type="hidden" name="testcookie" value="1"/>
                        <span id="response_submit" style="display:none">
                                <a href="" class="btn btn-default pull-right">Checking... <img width="25"
                                                                                               src="{{asset('assets/login-assets/img/loading.gif')}}"/></a>
                                </span>
                    </p>
                    <p>

{{--                        <a href="{{route('password.reset')}}" title="Password Lost and Found"--}}
{{--                           class="frgt-password" style="cursor:pointer">Forgot password?</a>--}}

                    </p>
                </form>
            </div>
            <div class="panel-footer gray-lighter-bg bt" id="response_note" style="display:none;">
            </div>
            <div id="forgetfrm" style="display:none">
                <!-- forget password -->
                <form name="lostpasswordform" id="lostpasswordform" method="post">
                    <span class="error-msg" style="display:none">Please enter your email or username</span>
                    <p>
                        <label for="user_login">
                            <input type="text" name="user_login" id="user_login" class="input" value="" size="20"
                                   placeholder="Email or Username"/>
                        </label>
                    </p>
                    <input type="hidden" name="redirect_to" value=""/>
                    <p class="submit" style="width:1000px;text-align:center;">
                        <input type="submit" name="fp_submit" id="fp_submit" value="Get New Password"/>
                    </p>
                </form>
                <p id="nav"><a href="" class="login-rvt">Log in</a></p>
                <!-- End of forget password -->
            </div>

            <div id="resetpwd" style="display:none">
                <form name="fresetpassform" id="fresetpassform" action="#" method="post" autocomplete="off">

                    <span class="error-msg" style="display:none">Please enter your new password</span>

                    <p>
                        <label for="pass1" id="confm_pass1">
                            <input type="password" name="fpass1" id="fpass1" class="input" size="20" value=""
                                   autocomplete="off" placeholder="New Password"/></label>
                    </p>
                    <p>
                        <label for="pass2" id="confm_pass">
                            <input type="password" name="fpass2" id="fpass2" class="input" size="20" value=""
                                   autocomplete="off" placeholder="Confirm new password"/></label>
                    </p>
                    <p class="submit" style="width:1000px;text-align:center;">
                        <input type="submit" name="fwp-submit" id="fwp-submit" value="Reset Password"/></p>
                </form>
            </div>
            <div class="clear"></div>
            <footer>
                <p class="account-copyright">
                    <span>Copyright © <?php echo date("Y"); ?> </span><span>Teledirectgroup</span>. <span>All rights reserved.</span>
                </p>
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
