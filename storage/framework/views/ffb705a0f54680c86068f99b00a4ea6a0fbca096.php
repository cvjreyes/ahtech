<?php if(Auth::guest()): ?>

<?php else: ?>



<?php $__env->startSection('content'); ?>
    
  <script type="text/javascript">
                                
                                 window.onload = function() {

                                     document.getElementById("s2").style.fontWeight='bold';
                                     document.getElementById("s2").style.fontSize=10 + "pt";
                                     document.getElementById("s2").style.fontStyle="italic";;


                                 }

                            </script> 

  <script type="text/javascript">
                        function mySubmit() {
                                   var theForm = document.forms['glinepipe'];
                                     if (!theForm) {
                                         theForm = document.glinepipe;

                                     }
                                     theForm.submit();


                                    
                          }

                      </script>

   <div class="row">
      <div class="col-md-9" style="left: 12%" >
            <div class="panel panel-default">
         
                <?php if(count($errors) >0 ): ?>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
                <div class="panel-body" style="margin-top: 10%">


                        

                            
                        <center>
                          <form id="glinepipe" class="form-horizontal" role="form" method="POST" action="<?php echo e(url('glinepipe')); ?>">
                        <?php echo e(csrf_field()); ?>


               

                             <div id="linechart" class="linechart">

                                    <html>

                                    <h3>Progress Curve Piping</h3>
                                    <h4>3D Progress</h4>
                                    <h4><?php //echo $lineprogress[0]->area; ?></h4>


                                    <h3 style='background-color: #FCF8E3'>
                                        The area <?php echo $selected_area[0]->name; ?> does not contain modeled pipes!</h3>
                                        <br><h4><b>Please, check the model <br>and select another one...</b></h4>

                                  
                                  
                                    <?php echo Form::select('units_id[]', [null => 'Select Area...'] + $units, null, array( 'style'=>'height:31px','onchange'=>'mySubmit(this)','required')); ?>

                                    <br><br>    
                            </center>                                             

                         </form>

                        <center>

              
                        <button onclick="location.href='<?php echo e(url('pipes')); ?>'" type="button" class="btn btn-lg btn-primary">Main</button>

                          <script type="text/javascript">
    
                                      setTimeout(function() {
                                      $('#messages').fadeOut('slow');
                                  }, 10000);

                                  </script>

                        <div id="messages">
                         <?php if($message = Session::get('warning')): ?>
                          <br>
                          <br>

                                  <div class="alert alert-warning"> 
                                      <p><?php echo e($message); ?></p>
                                  </div>

                              <?php endif; ?>
                        </div>
                        </center>
                 
                </div>
            </div>
        </div>

    </div><!-- First Row End -->


    <?php $__env->stopSection(); ?>

<?php endif; ?>
<?php echo $__env->make('layouts.datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>