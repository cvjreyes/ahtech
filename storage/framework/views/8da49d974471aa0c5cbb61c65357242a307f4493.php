<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>" >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TechnipFMC.app</title>

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
                background: url('images/refinery1.png') no-repeat center center fixed;
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
		<img src="images/tpfmc_logo-bn.gif" style="height: 60px;position:fixed;margin-top: 2%;padding-left: 2%">
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(Auth::check()): ?>
                        <a href="<?php echo e(url('/home')); ?>" style="font-size: 18px;color: white">HOME</a>
                    <?php else: ?>
                        <a href="<?php echo e(url('/login')); ?>" style="font-size: 18px;color: white;border: 1;">LOGIN</a>
                        <!-- <a href="<?php echo e(url('/register')); ?>">Register</a> -->
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="content>
                <div class="title m-b-md" style="font-size: 45px;">
                            <!-- <br>    
                            &nbsp;&nbsp;&nbsp;<img style="width:900px;" src="<?php echo e(asset('images/tpfmc_logo.svg')); ?>" >&nbsp;&nbsp;&nbsp;
                            <br> -->
                            <div style="color: white;font-weight: normal;font-size: 100px">3D Progress Control v1.1</div><br><div style="font-size: 24px;color: white;text-align: center">Copyright 2018 TechnipFMC plc - Developed by: J.Reyes-Sztayzel</div>
                
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