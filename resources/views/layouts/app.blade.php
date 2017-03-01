<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        
        <!-- Title -->
        <title>{{ config('app.name','Laravel') }}</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/plugins/materialize/css/materialize.min.css') }}"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('assets/plugins/material-preloader/css/materialPreloader.min.css') }}" rel="stylesheet"> 
        <link href="{{ asset('assets/plugins/select2/css/select2.css') }}" rel="stylesheet"> 
       
            
        <!-- Theme Styles -->
        <link href="{{ asset('assets/css/alpha.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>
        
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
<body>
    @include('layouts.loader')
    <div class="mn-content fixed-sidebar fixed-sidebar-on-hidden">
        @include('layouts.settings')

        <main class="mn-inner">
            @yield('content')
        </main>
    </div>
    <div id="chpass" class="modal">
        <div class="modal-content">
            <h4>Change Password</h4>
            <form action="{{ url('changePassword') }}" method="POST" id="formPwd">
            {{ method_field('PUT')}}
            {{ csrf_field() }}
            <div class="row">
                <div class="col s12 input-field">
                    <input placeholder="" name="old_password" id="old_password" type="password" class="validate {{ $errors->has('old_password') ? ' invalid' : '' }}">
                    <label for="old_password" data-error="{{ $errors->first('old_password') }}">Old Password</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 input-field">
                    <input placeholder="" name="new_password" id="new_password" type="password" class="validate {{ $errors->has('new_password') ? ' invalid' : '' }}">
                    <label for="new_password" data-error="{{ $errors->first('new_password') }}">New Password</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 input-field">
                    <input placeholder="" name="confirm_password" id="confirm_password" type="password" class="validate {{ $errors->has('confirm_password') ? ' invalid' : '' }}">
                    <label for="confirm_password" data-error="{{ $errors->first('confirm_password') }}">Confirm Password</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a type="submit" class="waves-effect waves-light btn blue m-b-xs" href="javascript:document.getElementById('formPwd').submit()">Submit</a>
        </div>
        </form>
    </div>
    <!-- Scripts -->
        <script src="{{ asset('assets/plugins/jquery/jquery-2.2.0.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/materialize/js/materialize.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/material-preloader/js/materialPreloader.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-blockui/jquery.blockui.js') }}"></script>
        <script src="{{ asset('assets/js/alpha.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/form_elements.js') }}"></script>
        <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/form-select2.js') }}"></script>
        @yield('script')
        @if($errors->has('pwd'))
        <script>
               Materialize.toast('Wrong Password !', 4000);
        </script>
        @endif
</body>
</html>
