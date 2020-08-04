<?php if(Auth::guest()): ?>

<?php else: ?>
 <div class="modal fade" id="createequiModal";
     tabindex="-1" role="dialog" data-backdrop="static" 
     aria-labelledby="createequiModalLabel">
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

        <?php $sum_per_equi = DB::select("SELECT SUM(total_progress) as sum_per_equi FROM pequis_view"); ?>



                <div class="panel-body">

                   <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/equipments')); ?>">
                        <?php echo csrf_field(); ?>

                    
                        <div class="modal-header" style="background-color: #F5F8FA;border-radius: 4px;">
                            <button onclick="location.href='<?php echo e(url('equipments')); ?>'" type="button" class="close" data-dismiss="modal"" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                           

                        </div>
                            <br>

                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    
                                    <th>Area</th>
                                    <th>Type</th>
                                    <th>Estimated Quantity</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="resultbody">
                             
                                <tr>
                                    
                                    <td>
                                        <?php echo Form::select('units_id[]', [null => 'Select Area...'] + $units, null, array( 'style'=>'height:31px','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::select('tequis_id[]', [null => 'Select Type...'] + $tequis , null, array('style'=>'height:31px','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('placeholder' => 'Quantity','class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <input type="button" class="btn btn-danger delete" value="x">
                                    </td>
                                </tr>

                            </tbody>
                        </table>   
                        <center><input id="add_btn" type="button" class="btn btn-lg btn-info add" value="Add New (+)">  
                        <input type="submit" class="btn btn-lg btn-primary" value="Create">
                        <input onclick="location.href='<?php echo e(url('equipments')); ?>'" type="submit" class="btn btn-lg btn-default" data-dismiss="modal" value="Cancel">

                        <!--  /* Evento que se ejecuta cada vez que se selecciona un elemento en el 
                                                select del área */ -->
                                     

                        </center>

                        
                        </form>
                </div>
            </div>
        </div>

    </div><!-- First Row End -->
</div> <!-- Container End -->


<?php endif; ?>