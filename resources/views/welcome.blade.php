<!doctype html>
<!-- <html lang="{{ config('app.locale') }}" > -->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CobroFacil.app</title>


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
                width:100%;height:100%;
                background-size: cover;
                -moz-background-size: cover;
                -webkit-background-size: cover;
                -o-background-size: cover;
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
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <img src="images/company-logo.png" style="height: 60px;position:fixed;margin-top: 2%;padding-left: 2%">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}" style="font-size: 18px;color: black">HOME</a>
                    @else
                        <a href="{{ url('/login') }}" style="font-size: 18px;color: black;">LOGIN</a>
                        <!-- <a href="{{ url('/register') }}">Register</a> -->
                    @endif
                </div>
            @endif

            <div class="content>
                <div class="title m-b-md" style="font-size: 45px;">
                            <!-- <br>    
                            &nbsp;&nbsp;&nbsp;<img style="width:900px;" src="{{ asset('images/tpfmc_logo.svg') }}" >&nbsp;&nbsp;&nbsp;
                            <br> -->
                            <div style="color: black;font-weight: normal;font-size: 100px">Prueba Técnica
</div><br><div style="font-size: 24px;color: black;text-align: center"><b>Ahead Technology</b>
<br><b>Desarrollado por: J.Reyes-Sztayzel</b></div>
                
                </div>

                <div class="links">
                    
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div align="right" style="color: white;font-weight: bold">&#9400; &nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <br>
                    <!-- <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a> -->
                </div>
            </div>
        </div>
    </body>
</html>
