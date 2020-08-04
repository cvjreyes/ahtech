<?php $__env->startSection('content'); ?>




<?php $sum_per_equi = DB::select("SELECT SUM(total_progress) as sum_per_equi FROM pequis_view"); ?>
<?php $sum_per_civil = DB::select("SELECT SUM(total_progress) as sum_per_civil FROM pcivils_view"); ?> 


<?php 


                          $pipemanager=DB::select("SELECT * FROM `pmanagers` WHERE name='pipe'");
                          $equimanager=DB::select("SELECT * FROM `pmanagers` WHERE name='equi'");
                          $civilmanager=DB::select("SELECT * FROM `pmanagers` WHERE name='civil'"); 
                          $selmanager=DB::select("SELECT * FROM `pmanagers` WHERE name='elect'");
                          $sitmanager=DB::select("SELECT * FROM `pmanagers` WHERE name='inst'"); 
                          $totaldb=DB::select("SELECT SUM(weight) AS total FROM pmanagers");

                          $total= $totaldb[0]->total; 

                          $est_pipelines=$pipemanager[0]->quantity;
                          $multiplier=$pipemanager[0]->multiplier;
                          $pipeweight=$pipemanager[0]->weight;
                          $pipepercentage=($pipeweight*100)/$total;

                          $pd_pipelines=$est_pipelines*$multiplier;
                          $total_pipelines=(100*$pd_pipelines)/$pipeweight;

                          $equiweight=$equimanager[0]->weight;
                          $equipercentage=($equiweight*100)/$total;
                          $total_equi=($equiweight*$total_pipelines)/100;

                          $civilweight=$civilmanager[0]->weight;
                          $civilpercentage=($civilweight*100)/$total;
                          $total_civil=($civilweight*$total_pipelines)/100;

                          $selweight=$selmanager[0]->weight;
                          $selpercentage=($selweight*100)/$total;
                          $total_sel=($selweight*$total_pipelines)/100;

                          $sitweight=$sitmanager[0]->weight;
                          $sitpercentage=($sitweight*100)/$total;
                          $total_sit=($sitweight*$total_pipelines)/100;


                          $pequis_view=DB::select("SELECT SUM(`equisview`.`est_hours`) as `mult_estimated` FROM `equisview`");
                          $sum_equi=$pequis_view[0]->mult_estimated;
                          $per_model_equi=$total_equi/$sum_equi;




                      ?>

<br>


<br><br>



    <div class="row">
        <div class="container-fluid" style="height: 60%;width: 80%">
            <div class="panel panel-default">
      
                <div class="panel-heading" style="background-color: #ffffff;"><h4>Project Manager</h4></div>

                                       
                                    
                </br>
                     <center>

                    <html>
                      <head>

                        </script>



                      </head>
  <body>
                      <form id="summary" class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/updatepmanager')); ?>">
                        <?php echo e(csrf_field()); ?>

                        
                      <center><button onclick="mySubmit()" type="button" class="btn btn-default btn-lg">Refresh&nbsp;&nbsp;<img src="<?php echo e(asset('images/refresh-icon.png')); ?>" style="width:30px" ></button><h3><b>Project Configuration</b></h3></center></br><div class="panel panel-default" id="chart_div1" style="width: 800px; height: 570px">



                      <script type="text/javascript">
                        function mySubmit() {
                                   var theForm = document.forms['summary'];
                                     if (!theForm) {
                                         theForm = document.summary;
                                     }
                                     theForm.submit();
                          }

                      </script>
               
                        <table border="1" bordercolor="#D6D4D3" class="table table-striped" style="width:100%;font-size: 14px;font-weight: normal;background-color: #FFFFFF">
                            <thead>
                                <tr>

                                 <th style="height: 50px;font-size: 18px;font-weight: normal;margin-left: 100%">Estimated PipeLines:&nbsp;     
                                        <?php echo Form::number('est_pipelines', $est_pipelines, array('placeholder' => 'Quantity','style'=>'width:100px;height:30px','class' => 'est_pipelines','required')); ?>

                      
                                    </th>
                                    <th style="height: 50px;font-size: 18px;font-weight: normal;margin-left: 100%">Weighted Weight:&nbsp;     
                                        <?php echo Form::number('multiplier', $multiplier, array('placeholder' => 'Required','class' => 'multiplier','style'=>'width:100px;height:30px','required')); ?>

                                   
                                    </th>                   
                                </tr>
                            </thead>

                        </table>
              
                        <table border="1" bordercolor="#D6D4D3" class="table table-striped"  style="width:100%;font-size: 14px;font-weight: normal;background-color: #FFFFFF">
                            <thead>
                                <tr>
                                  <th colspan="5"><h4><b>Hours Budget</b></h4></th>
                                </tr>
                               
                            </thead>
                            <tbody class="resultbody" >
                                <tr>
                                    <td style="text-align:center;">STU:&nbsp;     
                                        <?php echo Form::number('pd_pipe', $pipeweight, array('placeholder' => 'Required','class' => 'pd_pipe','style'=>'width:80px;height:30px','required')); ?><br><div style="text-align: center;font-weight: bold"><?php echo round($pipepercentage); ?>% </div>
                                    
                                    </td>
                                    <td>EQP:&nbsp; 
                                        <?php echo Form::number('pd_equi', $equiweight, array('placeholder' => 'Required','class' => 'pd_equi','style'=>'width:80px;height:30px','required')); ?><br><div style="text-align: center;font-weight: bold"><?php echo round($equipercentage); ?>% </div>
                                    
                                    </td>
                                    <td>SOE:&nbsp; 
                                        <?php echo Form::number('pd_civil', $civilweight, array('placeholder' => 'Required','class' => 'pd_civil','style'=>'width:80px;height:30px','required')); ?><br><div style="text-align: center;font-weight: bold"><?php echo round($civilpercentage); ?>% </div>
                                    
                                    </td>
                                    <td>SEL:&nbsp; 
                                        <?php echo Form::number('pd_sel', $selweight, array('placeholder' => 'Readonly','class' => 'pd_sel','style'=>'width:80px;height:30px','required')); ?><br><div style="text-align: center;font-weight: bold"><?php echo round($selpercentage); ?>% </div>
                                      
                                    </td>
                                    <td>SIT:&nbsp; 
                                        <?php echo Form::number('pd_sit', $sitweight, array('placeholder' => 'Readonly','class' => 'pd_sit','style'=>'width:80px;height:30px','required')); ?><br><div style="text-align: center;font-weight: bold"><?php echo round($sitpercentage); ?>% </div>
                                     
                                    </td>
                                </tr>

                                  
                            </tbody>

                        </table>  

                         <table border="1" bordercolor="#D6D4D3"  class="table table-striped"  style="width:100%;font-size: 14px;font-weight: normal;background-color: #FFFFFF">
                            <thead>
                                <tr>
                                  <th colspan="5"><h4><b>Types</b></h4></th>
                                </tr>
                                
                            </thead>
                            <tbody class="resultbody" style="margin-left: 40%">
                                <tr>
                                    
                                    <td style="">
                                        <button onclick="location.href='<?php echo e(url('typesequi')); ?>'" type="button" class="btn btn-default btn-lg">EQP&nbsp;&nbsp;<img src="<?php echo e(asset('images/equi-icon.png')); ?>" style="width:50px" ></button>
                                    </td>
                                    <td>
                                        <button onclick="location.href='<?php echo e(url('typesequi')); ?>'" type="button" class="btn btn-default btn-lg">SOE&nbsp;&nbsp;<img src="<?php echo e(asset('images/stru-icon.png')); ?>" style="width:50px" ></button>
                                    </td>
                                
                                    <td>
                                        <button onclick="location.href='<?php echo e(url('typesequi')); ?>'" type="button" class="btn btn-default btn-lg">SEL&nbsp;&nbsp;<img src="<?php echo e(asset('images/elec-icon.png')); ?>" style="width:50px" ></button>
                                    </td>
                                    <td>
                                        <button onclick="location.href='<?php echo e(url('typesequi')); ?>'" type="button" class="btn btn-default btn-lg">SIT&nbsp;&nbsp;<img src="<?php echo e(asset('images/inst-icon.png')); ?>" style="width:50px" ></button>
                                    </td>
                                    
                                </tr>


                            </tbody>

                        </table> 
                          
                     </div>

                     <?php if($message = Session::get('warning')): ?>
                          <br>
                          <br>

                                  <div class="alert alert-warning"> 
                                      <p><?php echo e($message); ?></p>
                                  </div>

                              <?php endif; ?>

                    
                        
                      <center><div class="panel panel-default" id="chart_div1" style="width: 800px; height: 100px"> 
            
                          
                          
                     </div>

                          </form>

                          </br>
                              
                        <center><h4>Summary</h4><div class="panel panel-default" id="chart_div1" style="width: 800px; height: 170px"> 
            
                    <!-- Cálculos resumen -->

                      


                        <table class="table table-striped" style="width:100%;font-size: 14px;font-weight: normal">
                            <thead>
                                <tr>
                                    <th>Piping</th>
                                    <th>Equipment</th>
                                    <th>Civil</th>
                                    <th>Electricity</th>
                                    <th>Instrumentation</th>
                                
                                </tr>
                            </thead>
                            <tbody class="resultbody">
                                <tr>
                                    <td>    
                                        <?php echo round($total_pipelines); ?>
                                    </td>
                                    <td>
                                        <?php echo round($total_equi); ?>
                                    </td>
                                    <td>
                                        <?php echo round($total_civil); ?>
                                    </td>
                                    <td>
                                        <?php echo round($total_sel); ?>
                                    </td>
                                    <td>
                                        <?php echo round($total_sit); ?>
                                    </td>
                                </tr>
                                <div id="summary">
                                <tr>
                                    <td>    
                                        <?php echo Form::number('total_pipelines', round($total_pipelines*100)/100, array('placeholder' => 'Required','class' => 'total_pipelines','heigth'=>'3px' ,'style'=>'width:100px','disabled')); ?>

                                    </td>
                                    <td>
                                        <?php echo round($per_model_equi*100)/100;echo "%";?>
                                    </td>
                                    <td>
                                        <?php echo Form::number('total_civil', round($total_civil*100)/100, array('placeholder' => 'Required','class' => 'total_civil','style'=>'width:100px','disabled')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('total_sel', round($total_sel*100)/100, array('placeholder' => 'Readonly','class' => 'total_sel','style'=>'width:100px','disabled')); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::number('total_sit', round($total_sit*100)/100, array('placeholder' => 'Readonly','class' => 'total_sit','style'=>'width:100px','disabled')); ?>

                                    </td>
                                </tr>
                              </div>
                            </tbody>

                        </table>  
  </body>
</html>
                  </tr>


<div class="panel-body">
                    
                </div>
            </div>
        </div>
    </div>
    

</div>



<?php echo $__env->make('common.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>