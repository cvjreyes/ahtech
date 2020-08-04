<?php if(Auth::guest()): ?>

<?php else: ?>
 <div class="modal fade" id="createcivilModal";
     tabindex="-1" role="dialog" data-backdrop="static" 
     aria-labelledby="createcivilModalLabel">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">Add civil estimate</div> -->
                <?php if(count($errors) >0 ): ?>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

        <?php $sum_per_civil = DB::select("SELECT SUM(total_progress) as sum_per_civil FROM pcivils_view"); ?>



                <div class="panel-body">

                   <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/civils')); ?>">
                        <?php echo csrf_field(); ?>

                    
                        <div class="modal-header" style="background-color: #F5F8FA;border-radius: 4px;">
                            <button onclick="location.href='<?php echo e(url('civils')); ?>'" type="button" class="close" data-dismiss="modal"" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                           

                        </div>
                            <br>

                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    
                                    <th style="font-size: 14px;font-weight: bold;">Area</th>
                                    <th style="font-size: 14px;font-weight: bold;">Type</th>
                                    <th style="font-size: 14px;font-weight: bold;">Tag</th>
                                    <th style="font-size: 14px;font-weight: bold;">Quantity</th>
                                    <th style="font-size: 14px;font-weight: bold;"></th>
                                </tr>
                            </thead>
                            <tbody class="resultbody">
                             
                                <tr>
                                    
                                    <td>
                                        <?php echo Form::select('units_id[]', [null => 'Select Area...'] + $units, null, array( 'style'=>'height:34px;font-size: 14px;font-weight: normal;','rcivilred')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::select('tcivils_id[]', [null => 'Select Type...'] + $tcivils , null, array('style'=>'height:34px;font-size: 14px;font-weight: normal;','rcivilred')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::text('tag[]', null, array('placeholder' => 'Tag','class' => 'form-control','style' => 'font-size: 14px;font-weight: normal;','rcivilred')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('placeholder' => 'Qty','class' => 'form-control','style' => 'width: 70px;font-size: 14px;font-weight: normal;','rcivilred')); ?>

                                    </td>
                                    <td>
                                        <input type="button" class="btn btn-danger delete" value="x">
                                    </td>
                                </tr>

                            </tbody>
                        </table>   
                        <center><input id="add_btn" type="button" class="btn btn-lg btn-info add" style="padding: 8px 16px;font-size: 12px;" value="Add New (+)">  
                        <input type="submit" class="btn btn-lg btn-primary" style="padding: 8px 16px;font-size: 12px;" value="Create">
                        <input onclick="location.href='<?php echo e(url('civils')); ?>'" type="submit" class="btn btn-lg btn-default" style="padding: 8px 16px;font-size: 12px;" data-dismiss="modal" value="Cancel">

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