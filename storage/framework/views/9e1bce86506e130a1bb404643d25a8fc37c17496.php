<?php if(Auth::guest()): ?>

<?php else: ?>
    
    <div class="modal fade" id="editmilestonespipeModal" style="top:20%"; 
     tabindex="-1" role="dialog" 
     aria-labelledby="editmilestonespipeModalLabel">
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
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/updatemilestonespipe')); ?>">
                     
                
               
             <!--       <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/editequi/')); ?>"> -->
                        <?php echo csrf_field(); ?>


                        <div class="modal-header" style="background-color: #F5F8FA;border-radius: 4px;">
                            <button type="button" class="close" data-dismiss="modal"" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            

                        </div>
                            <br>

                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="display:none;">Id</th>
                                    <th>Area</th>
                                    <th>Week</th>
                                    <th>Estimated (%)</th>
                                
                                </tr>
                            </thead>
                            <tbody class="resultbody">
                                <tr>
                                    <td style="display:none;"><?php echo Form::text('id', null, array('class' => 'id')); ?></td>
                                    <td>
                                        <?php echo Form::text('area', null, array('placeholder' => 'Area','class' => 'area','maxlength' => '3','style'=>'border:none', 'readonly')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::text('week', null, array('placeholder' => 'Week','class' => 'week','style'=>'border:none', 'readonly')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('estimated', null, array('placeholder' => 'Estimated','class' => 'estimated','step'=>'any','required')); ?>

                                    </td>
                    
                                </tr>

                            </tbody>

                        </table>  
                        
                        <center>
                
                        <input type="submit" class="btn btn-lg btn-primary" style="padding: 8px 16px;font-size: 12px;" value="Modify">
                        <input type="submit" class="btn btn-lg btn-default" data-dismiss="modal" style="padding: 8px 16px;font-size: 12px;" value="Cancel">

                        </center>
                  

                        
                        </form>
                </div>
            </div>
        </div>

    </div><!-- First Row End -->
</div>

    <?php echo Form::close(); ?>


<?php endif; ?>