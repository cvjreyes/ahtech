<?php if(Auth::guest()): ?>

<?php else: ?>
    
    <div class="modal fade" id="editpipeModal" style="top:20%"; 
     tabindex="-1" role="dialog" 
     aria-labelledby="editpipeModalLabel">
   <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">Add equipment estimate</div> -->
                <?php if(count($errors) >0 ): ?>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

                <script type="text/javascript">
              

                </script>
                <div class="panel-body">


                        <?php $__currentLoopData = $epipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


         <!--           Form::model($item, ['method' => 'PATCH','route' => ['indexequi.update', $item->id]]) -->
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/updatepipe')); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         
               
             <!--       <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/editequi/')); ?>"> -->
                        <?php echo csrf_field(); ?>


                       
                            <button type="button" class="close" data-dismiss="modal"" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            

                       
                            <br>

                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="display:none;">Id</th>
                                    <th style="font-size: 14px;font-weight: bold;">Area</th>
                                    <th style="font-size: 14px;font-weight: bold;">Diameter</th>
                                    <th style="font-size: 14px;font-weight: bold;">Line Number</th>
                                    <th style="font-size: 14px;font-weight: bold;">Tag</th>
                                
                                </tr>
                            </thead>
                            <tbody class="resultbody">
                                <tr>
                                    <td style="display:none;"><?php echo Form::text('id', null, array('class' => 'id')); ?></td>
                                    <td>
                                        <?php echo Form::select('units_id', [null => 'Select Area...'] + $units, null, array('class' => 'units_id', 'style'=>'height:31px;font-size: 14px;font-weight: normal;')); ?>

                                    </td>
                                    
                                    <td>
                                       <?php echo Form::select('diameters_id', [null => 'Select Diameter...'] + $diameters, null, array('class' => 'diameters_id', 'style'=>'height:31px;font-size: 14px;font-weight: normal;')); ?>

                                    </td>

                                    <td>
                                       <?php echo Form::text('line_number', null, array('placeholder' => 'Line Number','style' => 'width: 100px;font-size: 14px;font-weight: normal;','class' => 'line_number')); ?>                                       
                                    </td>
                                    <td>
                                       <?php echo Form::text('pdms_linenumber', null, array('placeholder' => 'Tag','style' => 'width: 250px;font-size: 14px;font-weight: normal;','class' => 'pdms_linenumber')); ?>                                       
                                    </td>
                                </tr>

                            </tbody>

                        </table>  
                        
                        <center>
                
                        
                        <input type="submit" class="btn btn-lg btn-primary" style="padding: 8px 16px;font-size: 12px;" value="Modify">
                        <input type="submit" class="btn btn-lg btn-default" style="padding: 8px 16px;font-size: 12px;"data-dismiss="modal" value="Cancel">

                        </center>
                  

                        
                        </form>
                </div>
            </div>
        </div>

    </div><!-- First Row End -->
</div>

    <?php echo Form::close(); ?>


<?php endif; ?>