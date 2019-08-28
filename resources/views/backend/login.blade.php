<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="it">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - Only Second</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{URL::asset("images/backend/gear.png")}}">
    <link rel="shortcut icon" href="{{URL::asset("images/backend/gear.ico")}}">

    <link rel="stylesheet" href="{{ URL::asset('vendor/backend/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('vendor/backend/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('vendor/backend/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('vendor/backend/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('vendor/backend/selectFX/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('vendor/backend/jqvmap/dist/jqvmap.min.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('css/backend/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/backend/isa.css') }}"> <!-- aggiunta non ricordo per cosa -->

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!--css tabella liste-->
    <link rel="stylesheet" href="{{ URL::asset('vendor/backend/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('vendor/backend/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
</head>

<body class="bg-dark">

<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a>
                    <img class="align-content" src="{{URL::asset('images/logo/lungo-O-bianca.png')}}" alt="">
                </a>
            </div>
            <div class="login-form">
                <form method="POST" action="{{ route('Admin.LoginPost') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    </div>

                    @if ($message_error_be = $errors->first('login_be_error_message'))
                        <div class="isa_error">
                            {{ $message_error_be }}
                        </div>
                    @endif

                    &emsp;

                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30"> Sign in </button>

                    <br><br>
                    <a href="{{ route('Home') }}" class="btn btn-primary btn-flat m-b-30 m-t-30">Return to Home</a>

                </form>

            </div>
        </div>
    </div>
</div>

<script src="{{ URL::asset('vendor/backend/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ URL::asset('vendor/backend/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ URL::asset('vendor/backend/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/backend/main.js') }}"></script>

</body>

</html>


<!--


<a href="{{ route('Admin.LoginPost') }}" class="btn btn-success btn-flat m-b-30 m-t-30">Sing in</a>
<button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">
    Sign in
</button>

<button type="submit" href="{{ url('/welcome') }}" class="btn btn-success btn-flat m-b-30 m-t-30">
    Return to Home
</button>

-->

