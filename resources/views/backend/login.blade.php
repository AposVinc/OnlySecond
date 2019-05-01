<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="/TecnologieDelWeb/template/back-end/apple-iconn.png">
    <link rel="shortcut icon" href="/TecnologieDelWeb/template/back-end/faviconn.ico">

    <link rel="stylesheet" href="/TecnologieDelWeb/template/back-end/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/TecnologieDelWeb/template/back-end/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/TecnologieDelWeb/template/back-end/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/TecnologieDelWeb/template/back-end/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/TecnologieDelWeb/template/back-end/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="/TecnologieDelWeb/template/back-end/assets/css/style.css">
    <link rel="stylesheet" href="/TecnologieDelWeb/template/back-end/assets/css/isa.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">

<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.html">
                    <img class="align-content" src="images/logo.png" alt="">
                </a>
            </div>
            <div class="login-form">
                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Password">
                    </div>

                    @if ($message_error_be = $errors->first('login_be_error_message'))
                        <div class="isa_error">
                            {{ $message_error_be }}
                        </div>
                    @endif

                    <div>
                        <label class="pull-right">
                            <a href="#">Forgotten Password?</a>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30"> Sign in </button>

                    <br><br>
                    <a href="{{ url('/welcome') }}" class="btn btn-primary btn-flat m-b-30 m-t-30">Return to Home</a>

                </form>

            </div>
        </div>
    </div>
</div>


<script src="/TecnologieDelWeb/template/back-end/vendors/jquery/dist/jquery.min.js"></script>
<script src="/TecnologieDelWeb/template/back-end/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="/TecnologieDelWeb/template/back-end/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/TecnologieDelWeb/template/back-end/assets/js/main.js"></script>


</body>

</html>


<!--




<a href="{{ route('admin.login.submit') }}" class="btn btn-success btn-flat m-b-30 m-t-30">Sing in</a>
<button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">
                         Sign in
                    </button>

                    <button type="submit" href="{{ url('/welcome') }}" class="btn btn-success btn-flat m-b-30 m-t-30">
                        Return to Home
                    </button>

-->

