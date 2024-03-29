<?php if(Auth::guest()): ?>

<?php else: ?>

    <div class="modal fade" id="deltypesequiModal" style="top:20%;" 
     tabindex="-1" role="dialog" 
     aria-labelledby="deltypesequiModalLabel">
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
       

              


         <!--           Form::model($item, ['method' => 'PATCH','route' => ['indexequi.update', $item->id]]) -->
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/deletetypesequi')); ?>">
                       
                         
               
             <!--       <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/editequi/')); ?>"> -->
                        <?php echo csrf_field(); ?>

                    
                       <div class="modal-header" style="background-color: #F5F8FA;border-radius: 4px;">
                            <button type="button" class="close" data-dismiss="modal"" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                         

                        </div>
                        <center>
                        <br>
                            <h4 class="modal-title">Are you sure you want to delete the following type of equipment?</h4>
                            <br>
                           

                        </center>
                   <center>     
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="display:none;">Id</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Hours</th>
                                
                                </tr>
                            </thead>
                            <tbody class="resultbody">
                                <tr>
                                    <td style="display:none;"><?php echo Form::text('id', null, array('class' => 'id')); ?></td>
                                    <td>
                                        <?php echo Form::text('code', null, array('placeholder' => 'Code','class' => 'code','maxlength' => '3','style' => 'text-transform: uppercase','disabled')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'name','disabled')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('hours', null, array('placeholder' => 'Hours','class' => 'hours','min' => '1','disabled')); ?>

                                    </td>
                    
                                </tr>

                            </tbody>

                        </table>  
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