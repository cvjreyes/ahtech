<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


    <title><?php echo e(config('app.name')); ?></title>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>" >

    <link href="<?php echo e(asset('css/dropzone.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/dropzone.js')); ?>"></script>



    
</head>
<body>
<!--    <div id="fixhead" style="width:100%;background-color: #f5f8fa; position: fixed;z-index: 1;">  -->
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" style="width: 100%">
    <div style="position:fixed;width: 20%;font-size:16px;opacity: 0.9;margin-top: 2%;margin-left: 40%">
        
        <center><div id="messages">
        <?php if($message = Session::get('success')): ?>

        <br>


        <div class="alert alert-success"> 
            <a href="#" class="close" data-dismiss="alert" aria-label="close" style="font-size: 16px">x</a>
            <p><img src="<?php echo e(asset('images/plan-icon.png')); ?>" style="width:30px" ><br><?php echo e($message); ?></p>
        </div>

    <?php endif; ?>

        <?php if($message = Session::get('warning')): ?>
        <br>
        <br>

        <div class="alert alert-warning"> 
            <a href="#" class="close" data-dismiss="alert" aria-label="close" style="font-size: 16px">x</a>
            <p><img src="<?php echo e(asset('images/warning-icon.png')); ?>" style="width:50px" ><br><?php echo e($message); ?></p>
        </div>

    <?php endif; ?>

        <?php if($message = Session::get('danger')): ?>
        <br>
        <br>

                <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close" style="font-size: 16px">x</a> 
                    <p><img src="<?php echo e(asset('images/error-icon.png')); ?>" style="width:50px" ><br><?php echo e($message); ?></p>
                </div>

            <?php endif; ?>
        </div>
</center>

<script type="text/javascript">
    
    setTimeout(function() {
    $('#messages').fadeOut('slow');
}, 2000);

</script>
    </div>
            <div class="container" style="">

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



                            <img src="<?php echo e(asset('images/tpfmc_logo.svg')); ?>" style="width:150px;padding-bottom: 0px;" >

                            


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

                            
                             <?php if(auth()->check() && auth()->user()->hasRole('Pipe')): ?>
                             <li id="s99"><a href="<?php echo e(route('home')); ?>" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'"><img src="<?php echo e(asset('images/home-icon.png')); ?>" style="width:20px" ></a></li>

                            <li id="s2" class="dropdown" style="font-size: 13px">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'">Piping <span class="caret"></a>
                            <ul class="dropdown-menu" role="menu">
                                <li style="font-size: 13px">
                                <a href="<?php echo e(route('epipes')); ?>">Estimated</a>
                                <a href="<?php echo e(route('pipes')); ?>">Modelled</a>
                                <a href="<?php echo e(route('glinepipetotal')); ?>">Progress Curve</a>
                <!--                 <a href="<?php echo e(route('glinepipe')); ?>">Progress Curve by Area</a> -->
                                <!-- <a href="<?php echo e(route('filterpipes')); ?>">Filter</a> -->
<!--                                 <a href="<?php echo e(route('modeledequi')); ?>">Modelled</a>
                                <a href="<?php echo e(route('glineequi')); ?>">Line Progress</a>
                                <a href="<?php echo e(route('glineequitotal')); ?>">Line Progress by Areas</a> -->
                                <a href="<?php echo e(route('home')); ?>">Home</a>
                                </li>        
                            </ul>
                        </li>
                        <?php endif; ?>

                            <?php if(auth()->check() && auth()->user()->hasRole('Equi')): ?><li id="s0" class="dropdown" style="font-size: 13px">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'" >Equipment <span class="caret"></a>
                            <ul class="dropdown-menu" role="menu">
                                <li style="font-size: 13px">
                                <a href="<?php echo e(route('eequis')); ?>">Estimated</a>
                                <a href="<?php echo e(route('modeledequi')); ?>">Modelled</a>
                                <a href="<?php echo e(route('glineequitotal')); ?>">Progress Curve</a>
                                <!-- <a href="<?php echo e(route('glineequi')); ?>">Progress Curve by Area</a> -->
                                <a href="<?php echo e(route('typesequi')); ?>">Types</a>    
                                <a href="<?php echo e(route('home')); ?>">Home</a>
                                </li>        
                            </ul>
                        </li>
                            <?php endif; ?>

                           
                            
                            <!-- <li id="s0"  style="font-size: 13px" class="dropdown"><a href="<?php echo e(route('equipments')); ?>" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'">Equipments</a></li> -->

                         <!--    <li id="s2" style="font-size: 13px"><a href="pipes" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'">Piping</a></li> -->
                            
                            <?php if(auth()->check() && auth()->user()->hasRole('Civil')): ?>
                            <li id="s1" class="dropdown" style="font-size: 13px">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'" >Civil <span class="caret"></a>
                            <ul class="dropdown-menu" role="menu">
                                <li style="font-size: 13px">
                                <a href="<?php echo e(route('ecivils')); ?>">Estimated</a>
                                <a href="<?php echo e(route('modeledcivil')); ?>">Modelled</a>
                                <a href="<?php echo e(route('glineciviltotal')); ?>">Progress Curve</a>
                     <!--            <a href="<?php echo e(route('glinecivil')); ?>">Progress Curve by Area</a> -->
                                <a href="<?php echo e(route('typescivil')); ?>">Types</a>    
                                <a href="<?php echo e(route('home')); ?>">Home</a>
                                </li>        
                            </ul>
                        </li>
                            <?php endif; ?>

                            <?php if(auth()->check() && auth()->user()->hasRole('Inst')): ?>
                            <li id="s3" class="dropdown" style="font-size: 13px">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'" >Instrumentation <span class="caret"></a>
                            <ul class="dropdown-menu" role="menu">
                                <li style="font-size: 13px">
                                <a href="<?php echo e(route('einsts')); ?>">Estimated</a>
                                <a href="<?php echo e(route('modeledinst')); ?>">Modelled</a>
                                <a href="<?php echo e(route('glineinsttotal')); ?>">Progress Curve</a>
                               <!--  <a href="<?php echo e(route('glineinst')); ?>">Progress Curve by Area</a> -->
                                <a href="<?php echo e(route('typesinst')); ?>">Types</a>    
                                <a href="<?php echo e(route('home')); ?>">Home</a>
                                </li>        
                            </ul>
                        </li>
                            <?php endif; ?>

                            <?php if(auth()->check() && auth()->user()->hasRole('Elec')): ?>
                            <li id="s4" class="dropdown" style="font-size: 13px">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'" >Electrical <span class="caret"></a>
                            <ul class="dropdown-menu" role="menu">
                                <li style="font-size: 13px">
                                <a href="<?php echo e(route('eelecs')); ?>">Estimated</a>
                                <a href="<?php echo e(route('modeledelec')); ?>">Modelled</a>
                                <a href="<?php echo e(route('glineelectotal')); ?>">Progress Curve</a>
                       <!--          <a href="<?php echo e(route('glineelec')); ?>">Progress Curve by Area</a> -->
                                <a href="<?php echo e(route('typeselec')); ?>">Types</a>    
                                <a href="<?php echo e(route('home')); ?>">Home</a>
                                </li>        
                            </ul>
                        </li>
                            <?php endif; ?>

                         <?php if(auth()->check() && auth()->user()->hasRole('Isoctrl')): ?><li id="s0" class="dropdown" style="font-size: 13px">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'" >Iso Controller <span class="caret"></a>
                            <ul class="dropdown-menu" role="menu">
                                <li style="font-size: 13px">
                                <a href="<?php echo e(route('isostatus')); ?>">Status</a>
                                <a href="<?php echo e(route('hisoctrl')); ?>">History</a>
                                <a href="<?php echo e(route('design')); ?>">Design</a>
                                <a href="<?php echo e(route('stress')); ?>">Stress</a>
                                <a href="<?php echo e(route('supports')); ?>">Supports</a>    
                                <a href="<?php echo e(route('materials')); ?>">Materials</a>
                                <a href="<?php echo e(route('lead')); ?>">LDG/Isochecker</a>    
                                <a href="<?php echo e(route('iso')); ?>">LDE/Isocontrol</a>
                                </li>        
                            </ul>
                        </li>
                            <?php endif; ?>

                           
                            
                            <!--  <li id="s4" style="font-size: 13px"><a href="ldlpipes" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'">LDL</a></li>
                            
                            <li id="s3" style="font-size: 13px"><a href="delecdistboardsdatatable" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'">Electrical</a></li>
                            <li id="s3" style="font-size: 13px"><a href="delecdistboardsdatatable" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'">Instrumentation</a></li> -->
                             <!-- <li id="s0" style="font-size: 13px"><a href="<?php echo e(route('dashboard')); ?>" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'"><strong>Dashboard</strong></a></li> -->
                             
                          <!--  <li id="s98" style="font-size: 13px"><a href="<?php echo e(route('pmanager')); ?>" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'">Setup</a></li> -->

                         <!--   <li id="s98"><a href="<?php echo e(route('pmanager')); ?>" style="border-radius: 0px 0px 4px 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9';this.style.color='white'" onMouseOut="this.style.background='white';this.style.color='black'"><img src="<?php echo e(asset('images/config-icon.png')); ?>" style="width:20px" ></a></li> -->
                           

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
                        
                              <!-- <li id="s00" style="font-size: 13px"><a href=""><strong>000000-PROJECT</strong></a></li> -->
                              <!-- <li id="s00" style="font-size: 13px"><a href=""><strong>PROJECT LOGO</strong></a></li> -->
                               <li id="s00" style="font-size: 13px"><a href=""><strong><?php echo env('APP_NAMEPROJ') ?></strong></a></li> 
                               <li id="s00"><a href=""><img src="<?php echo e(asset('images/iquoxe_logo.png')); ?>" style="width:65px;"></a></li>
                            
                             
                         <li style="font-size: 13px" class="dropdown">
                            
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li style="font-size: 13px">
                                        <a href="<?php echo e(route('home')); ?>">
                                            Home
                                        </a>
                                        <a href="<?php echo e(route('password')); ?>">
                                            Change Password
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
