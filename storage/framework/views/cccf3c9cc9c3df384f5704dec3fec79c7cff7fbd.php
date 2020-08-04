<?php $__env->startSection('content'); ?>

   


<br>
<br>
<br>
<br><br>
  
 <table>  

    <div class="row" style="margin-left: 14%">
        <div class="col-md-5 col-md-offset-0" >
            <div class="panel panel-default">
                <!-- <div class="panel-heading" style="background-color: #ffffff;"><img src="<?php echo e(asset('images/tpfmc_logo.png')); ?>" style="width:200px;padding-top:10px"></div> -->
                <div class="panel-heading" style="background-color: #ffffff;"><h4>Real 3D Progress</h4></div>
                 




                <div class="panel-body">
                    <!-- You are logged in! -->
                    <div id="menu_sel" style="height: 60px;border-radius: 4px;transition:200ms;" onMouseOver="this.style.background='#B0BED9';" onMouseOut="this.style.background='white';"><a href="equipments" style="color:black;text-decoration:none;"><h4 style="padding-top: 10px" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='black'">&nbsp;&nbsp;<img src="<?php echo e(asset('images/equi-icon.png')); ?>" style="width:40px;height:40px">&nbsp;&nbsp;&nbsp;Equipments&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                     </h4></a></div>
                                      <div class="progress">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                          aria-valuemin="0" aria-valuemax="100" style="font-size: 16px;width:<?php echo $sum_per_equi[0]->sum_per_equi."%"; ?>;background-color: #533D7A">
                                            <span class="sr-only"></span><?php echo round($sum_per_equi[0]->sum_per_equi,2)."%"; ?>
                                          </div>
                                        </div>

                <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unitss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      
                    
  
                    <?php 

                    //$count_by_area=DB::select("SELECT count(equi_name) as count_by_area FROM dequis WHERE zone_name LIKE '%".$unitss->name."%'");

                    //echo $count_by_area[0]->count_by_area;

                    /*obtengo los valores en tabla modeled por area*/

                    DB::statement(DB::raw("SET @area = ".$unitss->name));
                    $total_per_area= DB::select(DB::raw("SELECT count(equi_name) as count,pequis.percentage as progress, pequis.name as status,  

                              (CASE
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQ/T') THEN 0
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQ/C') THEN 0
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQUI-C') THEN 0
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQUI-K') THEN 13
                                          WHEN (`dequis`.`zone_name` LIKE '%-EX/EQ') THEN 18
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQUI-S') THEN 5
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQ/E') THEN 14
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQUI-E') THEN 14
                                          WHEN (`dequis`.`zone_name` LIKE '%-EX/EQ-MO') THEN 17
                                          WHEN (`dequis`.`zone_name` LIKE '%/EQ-MO') THEN 17
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQUI-X') THEN 15
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQ/P') THEN 11
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQUI-P') THEN 11
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQUI-R') THEN 1
                                          ELSE 19
                                      END) AS `tequis_id`,
                                      
                                      (SELECT `tequis`.`name` FROM `tequis` WHERE (`tequis`.`id` = `tequis_id`)) AS `type_equi`,
                                      (SELECT `tequis`.`hours` FROM `tequis` WHERE (`tequis`.`id` = `tequis_id`)) AS `hours`,
                                      ((progress*count(equi_name)*(SELECT `tequis`.`hours` FROM `tequis` WHERE (`tequis`.`id` = `tequis_id`)))/100) as coef_progress, 
                                      (SELECT SUM(`equisview`.`est_hours`) AS `mult_estimated` FROM `equisview` WHERE site LIKE CONCAT('%', @area,'%') ) AS coef_estimated,
                                      (((progress*count(equi_name)*(SELECT `tequis`.`hours` FROM `tequis` WHERE (`tequis`.`id` = `tequis_id`)))/100)/(SELECT SUM(`equisview`.`est_hours`) AS `mult_estimated` FROM`equisview` WHERE `equisview`.`area` LIKE @area ))*100 as total_progress

                                      


                              FROM dequis JOIN pequis ON dequis.progress=pequis.percentage 


                              WHERE zone_name LIKE CONCAT('%', @area,'%') group by tequis_id,percentage,name,progress"));

                              /*totaliza el progreso por area*/

                              $total_equi=0;
                    ?>
                            

                            <?php $__currentLoopData = $total_per_area; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total_per_areas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <?php 

                                $suma_equi= $total_per_areas->total_progress; 
                                $total_equi=$total_equi+$suma_equi;


                              ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                              
                              <!-- Comprobar que el área tiene datos y/o está estimada -->
                             
                              <?php 

                                  $est_area=DB::select("SELECT DISTINCT units.name FROM eequis JOIN units WHERE units.id=eequis.units_id AND units.name="."'".$unitss->name."'"); 


                                  ?>

                              <?php if ($total_equi<>0 OR count($est_area)) { ?>

                                <center><div id="bar_equi" class="progress" style="width: 80%">
                                          <div style="position:absolute;z-index: 1;left:40%;font-size: 13px"><?php echo "Área ".$unitss->name.": ".round($total_equi,2)."%";?></div>
                                          <div class="progress-bar" role="progressbar" style="width:<?php echo $total_equi."%"; ?>;background-color: #B0BED9">

                                            <span class="sr-only"></span>
                                          </div>

                                        </div>
                              </center>

                                  


                             <?php } ?> 
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                     
               
                     

                      <!-- FIN para totalizar progreso por area CIVIL --> 
              

                    <div id="menu_sel" style="height: 60px;border-radius: 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9'" onMouseOut="this.style.background='white';"><a href="civils" style="color:black;text-decoration:none;"><h4 style="padding-top: 10px" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='black'">&nbsp;&nbsp;<img src="<?php echo e(asset('images/stru-icon.png')); ?>" style="width:40px;height:40px;">&nbsp;&nbsp;&nbsp;Civil&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        </h4></a></div>
                                      <div class="progress">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                          aria-valuemin="0" aria-valuemax="100" style="font-size: 16px;width:<?php echo $sum_per_civil[0]->sum_per_civil."%"; ?>;background-color: #533D7A">
                                            <span class="sr-only"></span><?php echo round($sum_per_civil[0]->sum_per_civil,2)."%"; ?>
                                          </div>
                                        </div>


                    <!-- Proceso para totalizar progreso por area CIVIL -->

                <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unitss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      
                    
  
                    <?php 

                    //$count_by_area=DB::select("SELECT count(equi_name) as count_by_area FROM dequis WHERE zone_name LIKE '%".$unitss->name."%'");

                    //echo $count_by_area[0]->count_by_area;

                    /*obtengo los valores en tabla modeled por area*/

                    DB::statement(DB::raw("SET @area = ".$unitss->name));
                    $total_per_area_civil= DB::select(DB::raw("SELECT count(item_name) as count,pcivils.percentage as progress, pcivils.name as status,  

                            (CASE
                                        WHEN (`dcivils`.`zone_name` LIKE '%-CS/EQUI-FOUNDATION') THEN 4
                                        WHEN (`dcivils`.`zone_name` LIKE '%-CS/STRU-FOUNDATION') THEN 2
                                        WHEN (`dcivils`.`zone_name` LIKE '%-EX/EQUI-FOUNDATION') THEN 9
                                        WHEN (`dcivils`.`zone_name` LIKE '%-EX/PR-FOUNDATION') THEN 8
                                        WHEN (`dcivils`.`zone_name` LIKE '%-EX/STRU-FOUNDATION') THEN 7
                                        WHEN (`dcivils`.`zone_name` LIKE '%-CS/PR-FOUNDATION') THEN 3
                                        WHEN (`dcivils`.`zone_name` LIKE '%-CS/STRUCTURES') THEN 0
                                        ELSE 9
                                    END) AS `tcivils_id`,
                                    
                                    (SELECT `tcivils`.`name` FROM `tcivils` WHERE (`tcivils`.`id` = `tcivils_id`)) AS `type_civi`,
                                    (SELECT `tcivils`.`hours` FROM `tcivils` WHERE (`tcivils`.`id` = `tcivils_id`)) AS `hours`,
                                    ((status_civil*count(item_name)*(SELECT `tcivils`.`hours` FROM `tcivils` WHERE (`tcivils`.`id` = `tcivils_id`)))/100) as coef_status_civil, 
                                    (SELECT SUM(`civilsview`.`est_hours`) AS `mult_estimated` FROM `civilsview` WHERE site LIKE CONCAT('%', @area,'%') ) AS coef_estimated,
                                    (((status_civil*count(item_name)*(SELECT `tcivils`.`hours` FROM `tcivils` WHERE (`tcivils`.`id` = `tcivils_id`)))/100)/(SELECT SUM(`civilsview`.`est_hours`) AS `mult_estimated` FROM`civilsview` WHERE `civilsview`.`area` LIKE @area ))*100 as total_status_civil
                                

                            FROM dcivils JOIN pcivils ON dcivils.status_civil=pcivils.percentage 


                            WHERE zone_name LIKE CONCAT('%', @area,'%') group by tcivils_id,percentage,name,status_civil"));

                              /*totaliza el progreso por area*/

                              $total_civil=0;
                    ?>
                            

                            <?php $__currentLoopData = $total_per_area_civil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total_per_area_civils): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <?php 

                                $suma_civil= $total_per_area_civils->total_status_civil; 
                                $total_civil=$total_civil+$suma_civil;


                              ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                              
                              <!-- <?php echo e($unitss->name); ?>: -->
                             

                              <?php if ($total_civil<>0) { ?>

                                <center><div id="bar_civil" class="progress" style="width: 80%">
                                          <div style="position:absolute;z-index: 1;left:40%;font-size: 13px"><?php echo "Área ".$unitss->name.": ".round($total_civil,2)."%";?></div>
                                          <div class="progress-bar" role="progressbar" style="width:<?php echo $total_civil."%"; ?>;background-color: #B0BED9">

                                            <span class="sr-only"></span>
                                          </div>

                                        </div>
                              </center>

                             <?php } ?> 
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                     
                 
                       

                      <!-- FIN para totalizar progreso por area CIVIL --> 



                      <!-- Proceso para totalizar progreso PIPING --> 


                    <div id="menu_sel" style="height: 60px;border-radius: 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9'" onMouseOut="this.style.background='white';"><a href="pipes" style="color:black;text-decoration:none;"><h4 style="padding-top: 10px"  onMouseOver="this.style.color='white'" onMouseOut="this.style.color='black'">&nbsp;&nbsp;<img src="<?php echo e(asset('images/pipe-icon.png')); ?>" style="width:40px;height:40px">&nbsp;&nbsp;&nbsp;Piping</h4></a></div>


                                        <?php 

                                          $sum_per_pipe = DB::select("SELECT * FROM total_ppipes_view"); 
                                          $sum_per_epipe = DB::select("SELECT SUM(hours) as ehrspipes FROM pipesview");

                                         ?>

                                        <div class="progress">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                          aria-valuemin="0" aria-valuemax="100" style="font-size: 16px;width:<?php echo round((($sum_per_pipe[0]->total_ppipehours)/($sum_per_pipe[0]->total_epipehours))*100,2)."%"; ?>; ?>;background-color: #533D7A">
                                            <span class="sr-only"></span><?php echo round((($sum_per_pipe[0]->total_ppipehours)/($sum_per_pipe[0]->total_epipehours))*100,2)."%"; ?>
                                          </div>
                                        </div>


                            
                            <!-- por Areas PIPING -->


                              <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unitss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php 

                             
                               $ppipes = DB::select("SELECT SUM(hours) AS epipeshours_area,SUM(ppipehours) as ppipeshours_area FROM ppipes_area WHERE area="."'".$unitss->name."'");

                            if ($ppipes[0]->epipeshours_area <>0){  

                               $total_pipe = (($ppipes[0]->ppipeshours_area)/($ppipes[0]->epipeshours_area))*100


                            ?>

                            <center><div id="bar_equi" class="progress" style="width: 80%">
                                          <div style="position:absolute;z-index: 1;left:40%;font-size: 13px"><?php echo "Área ".$unitss->name.": ".round($total_pipe,2)."%";?></div>
                                          <div class="progress-bar" role="progressbar" style="width:<?php echo $total_pipe."%"; ?>;background-color: #B0BED9">

                                            <span class="sr-only"></span>
                                          </div>

                                        </div>
                              </center>              

                             <?php } ?> 

                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <!-- fin progreso PIPING -->            

                    <div id="menu_sel" style="height: 60px;border-radius: 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9'" onMouseOut="this.style.background='white';"><a href="delecdistboardsdatatable" style="color:black;text-decoration:none;"><h4 style="padding-top: 10px"  onMouseOver="this.style.color='white'" onMouseOut="this.style.color='black'">&nbsp;&nbsp;<img src="<?php echo e(asset('images/elec-icon.png')); ?>" style="width:40px;height:40px">&nbsp;&nbsp;&nbsp;Electrical</h4></a></div> 


                                        <div class="progress">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                          aria-valuemin="0" aria-valuemax="100" style="width:80%; ?>;background-color: #533D7A">
                                            <span class="sr-only"></span>80%
                                          </div>
                                        </div>              

                    <div id="menu_sel" style="height: 60px;border-radius: 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9'" onMouseOut="this.style.background='white';"><a href="delecdistboardsdatatable" style="color:black;text-decoration:none;"><h4 style="padding-top: 10px"  onMouseOver="this.style.color='white'" onMouseOut="this.style.color='black'">&nbsp;&nbsp;<img src="<?php echo e(asset('images/inst-icon.png')); ?>" style="width:40px;height:40px">&nbsp;&nbsp;&nbsp;Instrumentation</h4></a></div> 


                                        <div class="progress">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="75"
                                          aria-valuemin="0" aria-valuemax="100" style="width:75%; ?>;background-color: #533D7A">
                                            <span class="sr-only"></span>75%
                                          </div>
                                        </div>   

                </div>
            </div>
        </div>
        <div class="col-md-5 col-md-offset-0" >
            <div class="panel panel-default">
                <!-- <div class="panel-heading" style="background-color: #ffffff;"><img src="<?php echo e(asset('images/tpfmc_logo.png')); ?>" style="width:200px;padding-top:10px"></div> -->
                <div class="panel-heading" style="background-color: #ffffff;"><h4>Contract 3D Progress</h4></div>
                 




                <div class="panel-body">
                    <!-- You are logged in! -->
                    <div id="menu_sel" style="height: 60px;border-radius: 4px;transition:200ms;" onMouseOver="this.style.background='#B0BED9';" onMouseOut="this.style.background='white';"><a href="equipments" style="color:black;text-decoration:none;"><h4 style="padding-top: 10px" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='black'">&nbsp;&nbsp;<img src="<?php echo e(asset('images/equi-icon.png')); ?>" style="width:40px;height:40px">&nbsp;&nbsp;&nbsp;Equipments&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                     </h4></a></div>
                                      <div class="progress">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                          aria-valuemin="0" aria-valuemax="100" style="font-size: 16px;width:<?php echo $sum_per_equi[0]->sum_per_equi."%"; ?>;background-color: #533D7A">
                                            <span class="sr-only"></span><?php echo round($sum_per_equi[0]->sum_per_equi,2)."%"; ?>
                                          </div>
                                        </div>

                <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unitss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      
                    
  
                    <?php 

                    //$count_by_area=DB::select("SELECT count(equi_name) as count_by_area FROM dequis WHERE zone_name LIKE '%".$unitss->name."%'");

                    //echo $count_by_area[0]->count_by_area;

                    /*obtengo los valores en tabla modeled por area*/

                    DB::statement(DB::raw("SET @area = ".$unitss->name));
                    $total_per_area= DB::select(DB::raw("SELECT count(equi_name) as count,pequis.percentage as progress, pequis.name as status,  

                              (CASE
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQ/T') THEN 0
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQ/C') THEN 0
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQUI-C') THEN 0
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQUI-K') THEN 13
                                          WHEN (`dequis`.`zone_name` LIKE '%-EX/EQ') THEN 18
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQUI-S') THEN 5
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQ/E') THEN 14
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQUI-E') THEN 14
                                          WHEN (`dequis`.`zone_name` LIKE '%-EX/EQ-MO') THEN 17
                                          WHEN (`dequis`.`zone_name` LIKE '%/EQ-MO') THEN 17
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQUI-X') THEN 15
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQ/P') THEN 11
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQUI-P') THEN 11
                                          WHEN (`dequis`.`zone_name` LIKE '%-EQUI-R') THEN 1
                                          ELSE 19
                                      END) AS `tequis_id`,
                                      
                                      (SELECT `tequis`.`name` FROM `tequis` WHERE (`tequis`.`id` = `tequis_id`)) AS `type_equi`,
                                      (SELECT `tequis`.`hours` FROM `tequis` WHERE (`tequis`.`id` = `tequis_id`)) AS `hours`,
                                      ((progress*count(equi_name)*(SELECT `tequis`.`hours` FROM `tequis` WHERE (`tequis`.`id` = `tequis_id`)))/100) as coef_progress, 
                                      (SELECT SUM(`equisview`.`est_hours`) AS `mult_estimated` FROM `equisview` WHERE site LIKE CONCAT('%', @area,'%') ) AS coef_estimated,
                                      (((progress*count(equi_name)*(SELECT `tequis`.`hours` FROM `tequis` WHERE (`tequis`.`id` = `tequis_id`)))/100)/(SELECT SUM(`equisview`.`est_hours`) AS `mult_estimated` FROM`equisview` WHERE `equisview`.`area` LIKE @area ))*100 as total_progress

                                      


                              FROM dequis JOIN pequis ON dequis.progress=pequis.percentage 


                              WHERE zone_name LIKE CONCAT('%', @area,'%') group by tequis_id,percentage,name,progress"));

                              /*totaliza el progreso por area*/

                              $total_equi=0;
                    ?>
                            

                            <?php $__currentLoopData = $total_per_area; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total_per_areas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <?php 

                                $suma_equi= $total_per_areas->total_progress; 
                                $total_equi=$total_equi+$suma_equi;


                              ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                              
                              <!-- Comprobar que el área tiene datos y/o está estimada -->
                             
                              <?php 

                                  $est_area=DB::select("SELECT DISTINCT units.name FROM eequis JOIN units WHERE units.id=eequis.units_id AND units.name="."'".$unitss->name."'"); 


                                  ?>

                              <?php if ($total_equi<>0 OR count($est_area)) { ?>

                                <center><div id="bar_equi" class="progress" style="width: 80%">
                                          <div style="position:absolute;z-index: 1;left:40%;font-size: 13px"><?php echo "Área ".$unitss->name.": ".round($total_equi,2)."%";?></div>
                                          <div class="progress-bar" role="progressbar" style="width:<?php echo $total_equi."%"; ?>;background-color: #B0BED9">

                                            <span class="sr-only"></span>
                                          </div>

                                        </div>
                              </center>

                                  


                             <?php } ?> 
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                     
               
                     

                      <!-- FIN para totalizar progreso por area CIVIL --> 
              

                    <div id="menu_sel" style="height: 60px;border-radius: 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9'" onMouseOut="this.style.background='white';"><a href="civils" style="color:black;text-decoration:none;"><h4 style="padding-top: 10px" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='black'">&nbsp;&nbsp;<img src="<?php echo e(asset('images/stru-icon.png')); ?>" style="width:40px;height:40px;">&nbsp;&nbsp;&nbsp;Civil&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        </h4></a></div>
                                      <div class="progress">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                          aria-valuemin="0" aria-valuemax="100" style="font-size: 16px;width:<?php echo $sum_per_civil[0]->sum_per_civil."%"; ?>;background-color: #533D7A">
                                            <span class="sr-only"></span><?php echo round($sum_per_civil[0]->sum_per_civil,2)."%"; ?>
                                          </div>
                                        </div>


                    <!-- Proceso para totalizar progreso por area CIVIL -->

                <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unitss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      
                    
  
                    <?php 

                    //$count_by_area=DB::select("SELECT count(equi_name) as count_by_area FROM dequis WHERE zone_name LIKE '%".$unitss->name."%'");

                    //echo $count_by_area[0]->count_by_area;

                    /*obtengo los valores en tabla modeled por area*/

                    DB::statement(DB::raw("SET @area = ".$unitss->name));
                    $total_per_area_civil= DB::select(DB::raw("SELECT count(item_name) as count,pcivils.percentage as progress, pcivils.name as status,  

                            (CASE
                                        WHEN (`dcivils`.`zone_name` LIKE '%-CS/EQUI-FOUNDATION') THEN 4
                                        WHEN (`dcivils`.`zone_name` LIKE '%-CS/STRU-FOUNDATION') THEN 2
                                        WHEN (`dcivils`.`zone_name` LIKE '%-EX/EQUI-FOUNDATION') THEN 9
                                        WHEN (`dcivils`.`zone_name` LIKE '%-EX/PR-FOUNDATION') THEN 8
                                        WHEN (`dcivils`.`zone_name` LIKE '%-EX/STRU-FOUNDATION') THEN 7
                                        WHEN (`dcivils`.`zone_name` LIKE '%-CS/PR-FOUNDATION') THEN 3
                                        WHEN (`dcivils`.`zone_name` LIKE '%-CS/STRUCTURES') THEN 0
                                        ELSE 9
                                    END) AS `tcivils_id`,
                                    
                                    (SELECT `tcivils`.`name` FROM `tcivils` WHERE (`tcivils`.`id` = `tcivils_id`)) AS `type_civi`,
                                    (SELECT `tcivils`.`hours` FROM `tcivils` WHERE (`tcivils`.`id` = `tcivils_id`)) AS `hours`,
                                    ((status_civil*count(item_name)*(SELECT `tcivils`.`hours` FROM `tcivils` WHERE (`tcivils`.`id` = `tcivils_id`)))/100) as coef_status_civil, 
                                    (SELECT SUM(`civilsview`.`est_hours`) AS `mult_estimated` FROM `civilsview` WHERE site LIKE CONCAT('%', @area,'%') ) AS coef_estimated,
                                    (((status_civil*count(item_name)*(SELECT `tcivils`.`hours` FROM `tcivils` WHERE (`tcivils`.`id` = `tcivils_id`)))/100)/(SELECT SUM(`civilsview`.`est_hours`) AS `mult_estimated` FROM`civilsview` WHERE `civilsview`.`area` LIKE @area ))*100 as total_status_civil
                                

                            FROM dcivils JOIN pcivils ON dcivils.status_civil=pcivils.percentage 


                            WHERE zone_name LIKE CONCAT('%', @area,'%') group by tcivils_id,percentage,name,status_civil"));

                              /*totaliza el progreso por area*/

                              $total_civil=0;
                    ?>
                            

                            <?php $__currentLoopData = $total_per_area_civil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total_per_area_civils): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <?php 

                                $suma_civil= $total_per_area_civils->total_status_civil; 
                                $total_civil=$total_civil+$suma_civil;


                              ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                              
                              <!-- <?php echo e($unitss->name); ?>: -->
                             

                              <?php if ($total_civil<>0) { ?>

                                <center><div id="bar_civil" class="progress" style="width: 80%">
                                          <div style="position:absolute;z-index: 1;left:40%;font-size: 13px"><?php echo "Área ".$unitss->name.": ".round($total_civil,2)."%";?></div>
                                          <div class="progress-bar" role="progressbar" style="width:<?php echo $total_civil."%"; ?>;background-color: #B0BED9">

                                            <span class="sr-only"></span>
                                          </div>

                                        </div>
                              </center>

                             <?php } ?> 
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                     
                 
                       

                      <!-- FIN para totalizar progreso por area CIVIL --> 



                      <!-- Proceso para totalizar progreso PIPING --> 


                    <div id="menu_sel" style="height: 60px;border-radius: 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9'" onMouseOut="this.style.background='white';"><a href="pipes" style="color:black;text-decoration:none;"><h4 style="padding-top: 10px"  onMouseOver="this.style.color='white'" onMouseOut="this.style.color='black'">&nbsp;&nbsp;<img src="<?php echo e(asset('images/pipe-icon.png')); ?>" style="width:40px;height:40px">&nbsp;&nbsp;&nbsp;Piping</h4></a></div>


                                        <?php 

                                          $sum_per_pipe = DB::select("SELECT * FROM total_ppipes_view"); 
                                          $sum_per_epipe = DB::select("SELECT SUM(hours) as ehrspipes FROM pipesview");

                                         ?>

                                        <div class="progress">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                          aria-valuemin="0" aria-valuemax="100" style="font-size: 16px;width:<?php echo round((($sum_per_pipe[0]->total_ppipehours)/($sum_per_pipe[0]->total_epipehours))*100,2)."%"; ?>; ?>;background-color: #533D7A">
                                            <span class="sr-only"></span><?php echo round((($sum_per_pipe[0]->total_ppipehours)/($sum_per_pipe[0]->total_epipehours))*100,2)."%"; ?>
                                          </div>
                                        </div>


                            
                            <!-- por Areas PIPING -->


                              <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unitss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php 

                             
                               $ppipes = DB::select("SELECT SUM(hours) AS epipeshours_area,SUM(ppipehours) as ppipeshours_area FROM ppipes_area WHERE area="."'".$unitss->name."'");

                            if ($ppipes[0]->epipeshours_area <>0){  

                               $total_pipe = (($ppipes[0]->ppipeshours_area)/($ppipes[0]->epipeshours_area))*100


                            ?>

                            <center><div id="bar_equi" class="progress" style="width: 80%">
                                          <div style="position:absolute;z-index: 1;left:40%;font-size: 13px"><?php echo "Área ".$unitss->name.": ".round($total_pipe,2)."%";?></div>
                                          <div class="progress-bar" role="progressbar" style="width:<?php echo $total_pipe."%"; ?>;background-color: #B0BED9">

                                            <span class="sr-only"></span>
                                          </div>

                                        </div>
                              </center>              

                             <?php } ?> 

                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <!-- fin progreso PIPING -->            

                    <div id="menu_sel" style="height: 60px;border-radius: 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9'" onMouseOut="this.style.background='white';"><a href="delecdistboardsdatatable" style="color:black;text-decoration:none;"><h4 style="padding-top: 10px"  onMouseOver="this.style.color='white'" onMouseOut="this.style.color='black'">&nbsp;&nbsp;<img src="<?php echo e(asset('images/elec-icon.png')); ?>" style="width:40px;height:40px">&nbsp;&nbsp;&nbsp;Electrical</h4></a></div> 


                                        <div class="progress">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                          aria-valuemin="0" aria-valuemax="100" style="width:80%; ?>;background-color: #533D7A">
                                            <span class="sr-only"></span>80%
                                          </div>
                                        </div>              

                    <div id="menu_sel" style="height: 60px;border-radius: 4px;transition:200ms" onMouseOver="this.style.background='#B0BED9'" onMouseOut="this.style.background='white';"><a href="delecdistboardsdatatable" style="color:black;text-decoration:none;"><h4 style="padding-top: 10px"  onMouseOver="this.style.color='white'" onMouseOut="this.style.color='black'">&nbsp;&nbsp;<img src="<?php echo e(asset('images/inst-icon.png')); ?>" style="width:40px;height:40px">&nbsp;&nbsp;&nbsp;Instrumentation</h4></a></div> 


                                        <div class="progress">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="75"
                                          aria-valuemin="0" aria-valuemax="100" style="width:75%; ?>;background-color: #533D7A">
                                            <span class="sr-only"></span>75%
                                          </div>
                                        </div>   

                </div>
            </div>
        </div>
    </div>

  </table> 

<?php echo $__env->make('common.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>