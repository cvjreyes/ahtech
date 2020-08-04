<?php $__env->startSection('content'); ?>
<br><br><br><br><br><br><br><br>

<?php if(Session::has('status')): ?>



  <div class="row">
        <div class="container-fluid" style="height: 60%;width: 80%">
            <br><br><br><br><br>
            <div class="panel panel-default">
  
               <div class="panel-body">

                <center><h1><?php echo e(Auth::user()->name); ?></h1>
                <h3><?php echo e(Session::get('status')); ?></h3>                
                </center>

                    
                </div>
            </div>
        </div>
    </div>
           

<?php endif; ?>


<!-- <h3>Opciones:</h3>
<ul>
    <li><a href="<?php echo e(url('user/profile')); ?>">Cambiar mi imagen de perfil</a></li>
    <li><a href="<?php echo e(url('user/password')); ?>">Cambiar mi password</a></li>
</ul>
 -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>