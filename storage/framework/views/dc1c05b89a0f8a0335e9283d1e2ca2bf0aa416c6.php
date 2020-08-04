<?php if(Auth::guest()): ?>

<?php else: ?>

    <div class="modal fade" id="delfilterpipesModal" style="top:20%;" 
     tabindex="-1" role="dialog" 
     aria-labelledby="delfilterpipesModalLabel">
   <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">Add equipment estimate</div> -->
                <?php if(count($errors) >0 ): ?>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
                <div class="panel-body">
       

                       
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/deletefilterpipes')); ?>">
                            
               
          
                        <?php echo csrf_field(); ?>

                    
                       
                            <button type="button" class="close" data-dismiss="modal"" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                         

                     
                        <center>
                        <br>
                            <h4 class="modal-title" style='font-size: 18px;background-color: #F1F1F1'>Are you sure you want to delete this filter?</h4>
                            <br>
                           

                        </center>
                   <center>     
                   
                        </center>
                        <center>
                
                        <input type="submit" class="btn btn-lg btn-danger" value="Remove">
                        <input type="submit" class="btn btn-lg btn-default" data-dismiss="modal" value="Cancel">


                        </center>
                        </form>
                </div>
            </div>
        </div>

    </div><!-- First Row End -->
</div>

    <?php echo Form::close(); ?>


<?php endif; ?>