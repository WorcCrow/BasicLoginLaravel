<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale = 1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap');
        body{
            background:url("{{ asset('images/background2.jpg') }}");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size:cover;
            font-family: Roboto;
        }

        .logo{
            position:absolute;
            width:200px;
            height:200px;
            border-radius:100px;
            padding:5px;
        }

        .form-body{
            max-width: 500px;
            padding:20px;
            padding-top:40px!important;
            margin:auto;
            margin-top:20px;
            background:rgba(255,0,0,0.1);
            border-radius:5px;
        }

        .form-body input {
            background-color: rgba(0,0,0,0.5);
            color: white;
            border: none;
        }

        .form-body input:focus{
            background-color:rgba(0,0,0,0.5);
            color:white;
            border:none;
            outline:none;
            box-shadow:none;
        }

        .sign-in{
            background-color:rgba(0,0,0,0.8);
            color:white;
            border:none;
        }
        .sign-up{
            background-color:rgba(0,0,0,0.5);
            color:white;
            border:none;
        }

        .loader 
        {
                position:relative;
                width: 200px;
                height: 200px;
                border-radius: 50%;
                background: linear-gradient(45deg,transparent,
                transparent 40%, #ff0000);
                animation: animate 4s linear infinite;
        }
        @keyframes animate
        {
            0%
            { transform: rotate(0deg);
            filter:hue-rotate(0deg);
            }
            100%
            {
            transform: rotate(360deg);
                filter:hue-rotate(360deg);
            }
        }
        }
        .loader:before
        {
                content: '';
                top: 6px;
                left: 6px;
                background: #000;
                border-radius:50%;
                z-index: 1000;
        }
        .loader:after
        {
                content: '';
                top:0px;
                left:0px;
                background:linear-gradient(45deg,transparent,
                transparent 40%, #e5f403);
                border-radius:50%;
                z-index: 1000;
                z-index:1;
                filter: blur(30px);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="container col-12 col-md-6">
            </div>
            <div class="container col-12 col-md-6">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="mb-4 row justify-content-center" style="position:relative">
                            <div class="loader"></div>
                            <img class="logo" src="{{ asset('images/logo.png') }}">
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="text-end">
                            <small class="mb-1">
                                <a href="forgot-password.html">I forgot my password</a>
                            </small>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <input type="submit" class="btn sign-in" value="Sign In">
                            <a href="{{ route('register') }}" class="btn sign-up">Sign Up</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
