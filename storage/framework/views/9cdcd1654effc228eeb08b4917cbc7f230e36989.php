<?php if(Auth::guest()): ?>

<?php else: ?>

    <div class="modal fade" id="deltypescivilModal" style="top:20%;" 
     tabindex="-1" role="dialog" 
     aria-labelledby="deltypescivilModalLabel">
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
       

              


         <!--           Form::model($item, ['method' => 'PATCH','route' => ['indexcivil.update', $item->id]]) -->
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/deletetypescivil')); ?>">
                       
                         
               
             <!--       <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/editcivil/')); ?>"> -->
                        <?php echo csrf_field(); ?>

                    
                     
                        <center>
                        <br>
                            <h4 class="modal-title" style='margin: 0 auto; padding-top: 0px; text-align: center; width: 400px;font-size: 20px;font-weight: bold;'>Are you sure you want to delete the following type of civil?</h4>
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