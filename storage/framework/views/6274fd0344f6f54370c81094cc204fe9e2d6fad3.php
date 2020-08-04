<?php if(Auth::guest()): ?>

<?php else: ?>
    
    <div class="modal fade" id="uploadfromtieModal" style="top:20%"; 
     tabindex="-1" role="dialog" 
     aria-labelledby="uploadfromtieModalLabel">
   <div class="row">
        <div class="col-md-3 col-md-offset-4">
            <div class="panel panel-default">
       
                <?php if(count($errors) >0 ): ?>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
                <div class="panel-body">


                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>


        
                   <form style="background-color: #F5F8FA" method="POST" action="<?php echo e(route('subirrev')); ?>" accept-charset="UTF-8" enctype="multipart/form-data">
                      <?php echo e(csrf_field()); ?>


                    <?php echo Form::text('tray', null, array('class' => 'tray','style' => 'display:none','readonly')); ?>


                    <?php echo Form::text('pathfrom', null, array('class' => 'pathfrom','style' => 'display:none','readonly')); ?>


                    <?php echo Form::text('requestbydesign', null, array('class' => 'requestbydesign','style' => 'display:none','readonly')); ?>

                    <?php echo Form::text('requestbylead', null, array('class' => 'requestbylead','style' => 'display:none','readonly')); ?>


                    

                      <br><center><label for="archivo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo Form::text('filename', null, array('placeholder' => 'filename','class' => 'filename','style' => 'border:2px;width: 100%;font-size: 18px;font-weight: bold;background: #F5F8FA;border:0px;','readonly',)); ?></label></center><br>

                      

                      <center>
                         <table>

                         <tr> 
                          <td><a class="btn btn-xs btn-primary"><b>PDF</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td><input border="0" type="file" accept="application/pdf" style="width: 100%" class="btn btn-sm btn-default" data-pathfrom="design" name="tie" required></td>
                          
                         </tr>

                       </table>
                       <br>
                        <tr>
                            <input type="radio" name="tiechk" value="2" required> Approved
                            <input type="radio" name="tiechk" value="3" required> Rejected
                            
                          </tr>
                          
                       <br>

                      <br>
                      <div style="background: #FFFF34;border-radius: 6px;display: none">
                        <font size="3" style="font-weight: bold;background: #FFFF34" color="black">***WARNING!*** This action will replace the current(s) file(s). Take appropriate precautions.</font><br>
                        <font size="2" style="background: #FFFF34" color="black">If you are not sure of this action, click cancel and contact your supervisor.</font>
                      </div>
                      <br><br>
                       <input type="submit" class="btn btn-lg btn-info" style="padding: 8px 16px;font-size: 12px;" value="Upload">
                       <input type="submit" class="btn btn-lg btn-default" data-dismiss="modal" style="padding: 8px 16px;font-size: 12px;" value="Cancel">
                    </center>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

    <?php echo Form::close(); ?>


<?php endif; ?>