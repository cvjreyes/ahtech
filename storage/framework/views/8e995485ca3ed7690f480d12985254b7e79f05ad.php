<?php if(Auth::guest()): ?>

<?php else: ?>
    
    <div class="modal fade" id="editequiModal" style="top:20%"; 
     tabindex="-1" role="dialog" 
     aria-labelledby="editequiModalLabel">
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


                        <?php $__currentLoopData = $eequis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


         <!--           Form::model($item, ['method' => 'PATCH','route' => ['indexequi.update', $item->id]]) -->
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/updateequi')); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         
               
             <!--       <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/editequi/')); ?>"> -->
                        <?php echo csrf_field(); ?>


                        <!-- <div class="modal-header" style="background-color: #F5F8FA;border-radius: 4px;"> -->
                            <button type="button" class="close" data-dismiss="modal"" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            

                        <!-- </div> -->
                            <br>

                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="display:none;">Id</th>
                                    <th style="font-size: 14px;font-weight: bold;">Unit</th>
                                    <th style="font-size: 14px;font-weight: bold;">Area</th>
                                    <th style="font-size: 14px;font-weight: bold;">Type</th>
                                    <th style="font-size: 14px;font-weight: bold;">Tag</th>
                                
                                </tr>
                            </thead>
                            <tbody class="resultbody">
                                <tr>
                                    <td style="display:none;"><?php echo Form::text('id', null, array('class' => 'id')); ?></td>
                                    <td>
                                        <?php echo Form::select('units_id', [null => 'Select Unit...'] + $units, null, array('class' => 'units_id', 'style'=>'height:34px;font-size: 14px;font-weight: normal;','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::select('areas_id', [null => 'Select Area...'] + $areas, null, array('class' => 'areas_id', 'style'=>'height:34px;font-size: 14px;font-weight: normal;','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::select('tequis_id', [null => 'Select Type...'] + $tequis , null, array('class' => 'tequis_id','style'=>'width: 150px;height:34px;font-size: 14px;font-weight: normal;','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::text('tag', null, array('placeholder' => 'Tag','class' => 'tag','style' => 'width: 200px;font-size: 14px;font-weight: normal;background: #FAFAFA;border:0px;','readonly')); ?>

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