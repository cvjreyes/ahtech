<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


    <title><?php echo e(config('app.name', 'TechnipFMC.app')); ?></title>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">




    
</head>
<body>
<!--    <div id="fixhead" style="width:100%;background-color: #f5f8fa; position: fixed;z-index: 1;">  -->
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" >
    <div style="position:fixed;width: 15%;font-size:16px;margin-left: 40%;margin-top: 15%">
        
        <center><strong><div id="messages">
        <?php if($message = Session::get('success')): ?>

        <br>


        <div class="alert alert-success"> 
            <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
            <p><img src="<?php echo e(asset('images/plan-icon.png')); ?>" style="width:50px" ><br><?php echo e($message); ?></p>
        </div>

    <?php endif; ?>

        <?php if($message = Session::get('warning')): ?>
        <br>
        <br>

        <div class="alert alert-warning"> 
            <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
            <p><img src="<?php echo e(asset('images/warning-icon.png')); ?>" style="width:50px" ><br><?php echo e($message); ?></p>
        </div>

    <?php endif; ?>

        <?php if($message = Session::get('danger')): ?>
        <br>
        <br>

                <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a> 
                    <p><img src="<?php echo e(asset('images/error-icon.png')); ?>" style="width:50px" ><br><?php echo e($message); ?></p>
                </div>

            <?php endif; ?>
        </div>
</strong></center>
    </div>
            <div class="container">

                <div class="navbar-header" style="margin-top: 0px">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">



                            <img src="<?php echo e(asset('images/tpfmc_logo.png')); ?>" style="width:150px;padding-bottom: 0px;" >

                        <!-- <?php echo e(config('app.name', 'Laravel')); ?> -->
                    </a>
                   
                </div>

                <div style="width: 1300px" class="collapse navbar-collapse" id="app-navbar-collapse">  <!-- tamaño menu-->
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                           <!--  <li><a href="<?php echo e(route('register')); ?>">Register</a></li> -->

                        <?php else: ?>

                            
                          

                            <li id="s99"><a href="<?php echo e(route('home')); ?>" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'"><img src="<?php echo e(asset('images/home-icon.png')); ?>" style="width:20px" ></a></li>
                            <li id="s0"  style="font-size: 13px" class="dropdown"><a href="<?php echo e(route('equipments')); ?>" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'">Equipments</a></li>
                            <li id="s1" style="font-size: 13px"><a href="<?php echo e(route('civils')); ?>" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'">Civil</a></li>
                            <li id="s2" style="font-size: 13px"><a href="pipes" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'">Piping</a></li>
                            <!--  <li id="s4" style="font-size: 13px"><a href="ldlpipes" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'">LDL</a></li> -->
                            
                            <li id="s3" style="font-size: 13px"><a href="delecdistboardsdatatable" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'">Electrical</a></li>
                            <li id="s3" style="font-size: 13px"><a href="delecdistboardsdatatable" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'">Instrumentation</a></li>
                             <li id="s0" style="font-size: 13px"><a href="<?php echo e(route('dashboard')); ?>" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'"><strong>Dashboard</strong></a></li>
                             
                           <li id="s98"><a href="<?php echo e(route('pmanager')); ?>" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'"><img src="<?php echo e(asset('images/config-icon.png')); ?>" style="width:20px" ></a></li>
                           

                           <!--  <li class="dropdown">

                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Charts <span class="caret"></span>
                                </a>
                                 <ul class="dropdown-menu" role="menu">
                                   <li>  
                                 
                                        <a data-toggle="modal" data-target="#glineequiModal">Equipments</a>                              
                                        <a data-toggle="modal" data-target="#glinecivilModal">Civil</a>
                                    
                                </li>
                                 </ul>    



                      
                            </li> -->

                                <li id="s00"><a href=""><strong>800111-PHOENIX</strong></a></li>
                              <li id="s00"><a href=""><img src="<?php echo e(asset('images/total_logo.png')); ?>" style="width:80px;"></a></li>
                            
                             
                            
                            <li class="dropdown">
                            
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(route('home')); ?>">
                                            Home
                                        </a>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <b>Logout<b>
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>

                                </ul>
                            </li>


                        <?php endif; ?>
                    </ul>

                </div>


                
            </div>
        </nav>

        <?php echo $__env->yieldContent('content'); ?>
    
    </div>


</body>
</html>
