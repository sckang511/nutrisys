<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nutrisys</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
                font-size: 28px;
                color: #ffd67f;
            }
            .title {
                font-size: 120px;
                color: #fff;
            }
            .subTitle {
                font-size: 40px;
                color: #fff;
            }
            .links > a {
                text-align: center;
                color: #fff;
                padding: 0 25px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body style="background-image: url('images/background/green.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover; margin: 20px;">
        <div class="flex-center position-ref full-height text-white bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="content">
                            <div class="title m-b-md">
                                Nutrisys
                            </div>
                            <h2 class="subTitle">How It Works?</h2>
                            <h5>We deliver a proven program and you'll learn how to eat healthier<br> to help keep yourself healthy every day!</h5>
                            <hr style="width: 60%;">
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="links" style="text-align: center;">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/home') }}">Home</a>
                                @else
                                    <a href="{{ route('login') }}">Login</a>
                                    <a href="{{ route('register') }}">Register</a>
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
