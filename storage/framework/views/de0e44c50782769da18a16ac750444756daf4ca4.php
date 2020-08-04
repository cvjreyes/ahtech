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


        <?php echo $__env->yieldContent('content'); ?>
    
    </div>


</body>
</html>
