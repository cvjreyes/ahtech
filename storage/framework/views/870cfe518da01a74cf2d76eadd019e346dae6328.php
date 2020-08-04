<?php if(Auth::guest()): ?>

<?php else: ?>



<?php $__env->startSection('content'); ?>
                                        <center><h3 style="margin-top: 3%">Create Line Panel</h3>
                                           
                                        </center>

                <div class="panel-body">

                   <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/ldlpipes')); ?>">
                        <?php echo csrf_field(); ?>

                    
                       
                            <br>

                    <table border class="table table-striped">
                          
                                <tr style="background-color: #F5F8FA;text-align: center">
                                    
                                    <th style="text-align: center;" rowspan="2">Unit</th>
                                    <th style="text-align: center;" rowspan="2">Section</th>
                                    <th style="text-align: center;">Diameter</th>
                                    <th style="text-align: center;">Fluid</th>
                                    <th style="text-align: center;">Line</th>
                                    <th style="text-align: center;">Piping</th>
                                    <th style="text-align: center;" colspan="2">Location</th>
                                    <th style="text-align: center;" colspan="2">Fluid</th>
                        
                                </tr>
                                <tr>
                                    <th style="text-align: center;font-weight: normal">DN</th>
                                    <th style="text-align: center;font-weight: normal">Code</th>
                                    <th style="text-align: center;font-weight: normal">Number</th>
                                    <th style="text-align: center;font-weight: normal">Spec</th>
                                    <th style="text-align: center;font-weight: normal">From</th>
                                    <th style="text-align: center;font-weight: normal">To</th>
                                    <th style="text-align: center;font-weight: normal">Description</th>
                                    <th style="text-align: center;font-weight: normal">PHA</th>
                                <tr>
                                <tr>
                                    <td>
                                       <select id=units_id class="form-control m-bot15" name="units_id">
                                                <option value="NULL">Select Unit...</option>
                                                <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($unit->id); ?>"><?php echo e($unit->name); ?></option>    
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </select>
                                    </td>
                                    <td>
                                        <?php echo Form::text('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <select id=diameters_id class="form-control m-bot15" name="diameters_id">
                                                <option value="NULL">Select Diameter...</option>
                                                <?php $__currentLoopData = $diameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diameter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($unit->id); ?>"><?php echo e($diameter->dn); ?></option>    
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </select>
                                    </td>
                                    <td>
                                         <select id=fluids_id class="form-control m-bot15" name="fluids_id">
                                                <option value="NULL">Select Fluid...</option>
                                                <?php $__currentLoopData = $fluids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fluid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($fluid->id); ?>"><?php echo e($fluid->code); ?></option>    
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </select>
                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <select id=specs_id class="form-control m-bot15" name="specs_id">
                                                <option value="NULL">Select Specification...</option>
                                                <?php $__currentLoopData = $specs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($spec->id); ?>"><?php echo e($spec->name); ?></option>    
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </select>
                                    </td>
                                    <td>
                                      
                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <select id=flu_descs_id class="form-control m-bot15" name="flu_descs_id">
                                                <option value="NULL">Select Description...</option>
                                                <?php $__currentLoopData = $flu_descs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flu_desc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($flu_desc->id); ?>"><?php echo e($flu_desc->name); ?></option>    
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </select>
                                    </td>
                                    <td>
                                        <select id=flu_phas_id class="form-control m-bot15" name="flu_phas_id">
                                                <option value="NULL">Select PHA...</option>
                                                <?php $__currentLoopData = $flu_phas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flu_pha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($flu_pha->id); ?>"><?php echo e($flu_pha->name); ?></option>    
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </select>
                                    </td>

                                <tr>

                                <tr>
                                    <td colspan="10">
                                </tr>

                                <tr style="background-color: #F5F8FA">
                                    
                                    <th style="text-align: center;">Density</th>
                                    <th style="text-align: center;" colspan="2">Operation Conditions</th>
                                    <th style="text-align: center;" colspan="2">Design Conditions</th>
                                    <th style="text-align: center;" colspan="2">ALT 1 - Operation Conditions</th>
                                    <th style="text-align: center;" colspan="2">ALT 1 - Design Conditions</th>

                                </tr>

                                <tr>
                                    <th style="text-align: center;font-weight: normal">KG/M3</th>
                                    <th style="text-align: center;font-weight: normal">Press Bar G</th>
                                    <th style="text-align: center;font-weight: normal">Temp ºC</th>
                                    <th style="text-align: center;font-weight: normal">Press Bar G</th>
                                    <th style="text-align: center;font-weight: normal">Temp ºC</th>
                                    <th style="text-align: center;font-weight: normal">Press Bar G</th>
                                    <th style="text-align: center;font-weight: normal">Temp ºC</th>
                                    <th style="text-align: center;font-weight: normal">Press Bar G</th>
                                    <th style="text-align: center;font-weight: normal">Temp ºC</th>
                
                                <tr>

                                <tr>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    
                                <tr>

                                <tr>
                                    <td colspan="10">
                                </tr>

                                <tr style="background-color: #F5F8FA">
                                    
                                    <th style="text-align: center;" colspan="2">ALT 2 - Operation Conditions</th>
                                    <th style="text-align: center;" colspan="2">ALT 2 - Design Conditions</th>
                                    <th style="text-align: center;">Design Condition</th>
                                    <th style="text-align: center;" colspan="2">Wall Thickness</th>
                                    <th style="text-align: center;" colspan="3">Insulation</th>
                        
                                </tr>
                                <tr>
                                    <th style="text-align: center;font-weight: normal">Press Bar G</th>
                                    <th style="text-align: center;font-weight: normal">Temp ºC</th>
                                    <th style="text-align: center;font-weight: normal">Press Bar G</th>
                                    <th style="text-align: center;font-weight: normal">Temp ºC</th>
                                    <th style="text-align: center;font-weight: normal">Tº Flex ºC</th>
                                    <th style="text-align: center;font-weight: normal">SCH</th>
                                    <th style="text-align: center;font-weight: normal">COR MM</th>
                                    <th style="text-align: center;font-weight: normal">Code</th>
                                    <th style="text-align: center;font-weight: normal">Lim</th>
                                    <th style="text-align: center;font-weight: normal">THX MM</th>
                                <tr>
                                <tr>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <select id=ins_codes_id class="form-control m-bot15" name="flu_phas_id">
                                                <option value="NULL">Select Code...</option>
                                                <?php $__currentLoopData = $ins_codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ins_code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($ins_code->id); ?>"><?php echo e($ins_code->code); ?></option>    
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </select>
                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>

                                </tr>

                                <tr>
                                    <td colspan="10">
                                </tr>

                                <tr style="background-color: #F5F8FA">
                                    
                                    <th style="text-align: center;" colspan="2">Tracing</th>
                                    <th style="text-align: center;" rowspan="2">Tº Main ºC</th>
                                    <th style="text-align: center;" colspan="2">Paint</th>
                                    <th style="text-align: center;" colspan="3">Test Pressure</th>
                        
                                </tr>
                                <tr>
                                    <th style="text-align: center;font-weight: normal">Size</th>
                                    <th style="text-align: center;font-weight: normal">Nº</th>
                                    <th style="text-align: center;font-weight: normal">1</th>
                                    <th style="text-align: center;font-weight: normal">2</th>
                                    <th style="text-align: center;font-weight: normal">TYP</th>
                                    <th style="text-align: center;font-weight: normal">Min Bar G</th>
                                    <th style="text-align: center;font-weight: normal">Max Bar G</th>

                                <tr>
                                <tr>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>


                                </tr>

                                    <tr>
                                    <td colspan="10">
                                </tr>

                                <tr style="background-color: #F5F8FA">
                                    
                                    <th style="text-align: center;" colspan="3">Authority Control</th>
                                    <th style="text-align: center;" rowspan="2">Cancelled</th>
                                    <th style="text-align: center;" rowspan="2">Review</th>
                                    <th style="text-align: center;" rowspan="2">PID</th>
                                    <th style="text-align: center;" rowspan="2">Notes</th>
                                    <th style="text-align: center;" colspan="3">Safety Accesories</th>
                        
                                </tr>
                                <tr>
                                    <th style="text-align: center;">PHA</th>
                                    <th style="text-align: center;">Group</th>
                                    <th style="text-align: center;">Category</th>


                                    <th style="text-align: center;font-weight: normal">Requirement</th>
                                    <th style="text-align: center;font-weight: normal">Accesory</th>
                                    <th style="text-align: center;font-weight: normal">Notes</th>
                                <tr>
                                <tr>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('est_qty[]', null, array('class' => 'form-control','required')); ?>

                                    </td>

                                <tr>

                                <tr>
                                    <td colspan="10">
                                </tr>


                    </table>  

                    <br><br>
                        <center><input id="add_btn" type="button" class="btn btn-lg btn-info add" value="Add New (+)">  
                        <input type="submit" class="btn btn-lg btn-primary" value="Create and Close">
                        <input onclick="self.close();" type="submit" class="btn btn-lg btn-default" data-dismiss="modal" value="Close">

                        <!--  /* Evento que se ejecuta cada vez que se selecciona un elemento en el 
                                                select del área */ -->
                                     

                        </center>

                        
                        </form>
                </div>
            
<?php $__env->stopSection(); ?>            
<?php endif; ?>
<?php echo $__env->make('layouts.onlyldl', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>