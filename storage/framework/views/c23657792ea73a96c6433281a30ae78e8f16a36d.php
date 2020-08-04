<?php if(Auth::guest()): ?>

<?php else: ?>

    <div class="modal fade" id="delcivilModal" style="top:20%;" 
     tabindex="-1" role="dialog" 
     aria-labelledby="delcivilModalLabel">
   <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">Add civil estimate</div> -->
                <?php if(count($errors) >0 ): ?>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
                <div class="panel-body">
       

                        <?php $__currentLoopData = $ecivils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


         <!--           Form::model($item, ['method' => 'PATCH','route' => ['indexcivil.update', $item->id]]) -->
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/deletecivil')); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         
               
             <!--       <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/editcivil/')); ?>"> -->
                        <?php echo csrf_field(); ?>

                    
                       
                            <button type="button" class="close" data-dismiss="modal"" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                         

                     
                        <center>
                        <br>
                            <h4 class="modal-title" style='margin: 0 auto; padding-top: 0px; text-align: center; width: 400px;font-size: 20px;font-weight: bold;'>Are you sure you want to delete the following civil?</h4>
                            <br>
                           

                        </center>
                   <center>     
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="display:none;">Id</th>
                                    <th style="font-size: 14px;font-weight: bold;">Area</th>
                                    <th style="font-size: 14px;font-weight: bold;">Type</th>
                                    <th style="font-size: 14px;font-weight: bold;">Tag</th>
                                    <th style="font-size: 14px;font-weight: bold;">Quantity</th>
                                
                                </tr>
                            </thead>
                            <tbody class="resultbody">
                                <tr>
                                    <td style="display:none;"><?php echo Form::text('id', null, array('class' => 'id')); ?></td>
                                    <td>
                                        <?php echo Form::select('units_id[]', [null => 'Select Area...'] + $units, null, array('class' => 'units_id', 'style'=>'height:34px;font-size: 14px;font-weight: normal;','disabled')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::select('tcivils_id[]', [null => 'Select Type...'] + $tcivils , null, array('class' => 'tcivils_id','style'=>'width: 150px;height:34px;font-size: 14px;font-weight: normal;','disabled')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::text('tag[]', null, array('placeholder' => 'Tag','class' => 'tag','style' => 'width: 200px;font-size: 14px;font-weight: normal;','disabled')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('placeholder' => 'Qty','class' => 'est_qty','style' => 'width: 100px;font-size: 14px;font-weight: normal;','disabled')); ?>

                                    </td>

                        
                                </tr>

                            </tbody>

                        </table>  
                        </center>
                        <center>
                
                        <input type="submit" class="btn btn-lg btn-danger" style="padding: 8px 16px;font-size: 12px;" value="Remove">
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