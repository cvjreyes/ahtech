<?php if(Auth::guest()): ?>

<?php else: ?>
    
    <div class="modal fade" id="editpipeModal" style="top:20%"; 
     tabindex="-1" role="dialog" 
     aria-labelledby="editpipeModalLabel">
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


                        <?php $__currentLoopData = $epipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


         <!--           Form::model($item, ['method' => 'PATCH','route' => ['indexequi.update', $item->id]]) -->
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/updatepipe')); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         
               
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
                                    <th>PDMS Linenumber</th>
                                    <th>Calculation Note</th>
                                
                                </tr>
                            </thead>
                            <tbody class="resultbody">
                                <tr>
                                    <td style="display:none;"><?php echo Form::text('id', null, array('class' => 'id')); ?></td>
                                    <td>
                                        <?php echo Form::select('units_id', [null => 'Select Area...'] + $units, null, array('class' => 'units_id', 'style'=>'height:31px','disabled')); ?>

                                    </td>
                                    
                                    <td>
                                        <?php echo Form::text('pdms_linenumber', null, array('placeholder' => '-','class' => 'pdms_linenumber','disabled')); ?>

                                    </td>
                                    
                                    
                                    <td>
                                       <?php echo Form::text('calc_notes', null, array('placeholder' => 'Calculation Note','class' => 'calc_notes')); ?>                                       
                                    </td>
                                </tr>

                            </tbody>

                        </table>  
                        
                        <center>
                
                        <input type="submit" class="btn btn-lg btn-primary" value="Modify">
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