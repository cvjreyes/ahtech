<?php if(Auth::guest()): ?>

<?php else: ?>



<?php $__env->startSection('content'); ?>
    
 
  <script type="text/javascript">
                        function mySubmit() {
                                   var theForm = document.forms['glineprogresstotal'];
                                     if (!theForm) {
                                         theForm = document.glineprogresstotal;

                                     }
                                     theForm.submit();


                                    
                          }

                      </script>

   <div class="row">
      <div class="col-md-9" style="left: 12%;margin-top: 4%;" >
            <div class="panel panel-default">
                <!-- <div class="panel-heading">Add equipment estimate</div> -->
                <?php if(count($errors) >0 ): ?>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
                <div class="panel-body" style="margin-top: 4%">


                        

                            
                        <center>
                          <form id="glineprogresstotal" class="form-horizontal" role="form" method="POST" action="<?php echo e(url('glineprogresstotal')); ?>">
                        <?php echo e(csrf_field()); ?>


              

                             <div id="linechart" class="linechart">

                                    <html>
                                    
                                    
                                    <h2>Progress Curve</h2>
                                    <h4></h4>
                                    <h3 style='background-color: #F1F1F1'><?php echo "3D Progress" ?></h3>

                                    <?php $i=0; ?>
                                  <div id="glineprogresstotal">
                                      <head>
                                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                          <script type="text/javascript">
                                            google.charts.load('current', {'packages':['corechart']});
                                            google.charts.setOnLoadCallback(drawChart);

                                            function drawChart() {
                                              var data = google.visualization.arrayToDataTable([
                                                //['Date', 'Estimated','Modeled'],
                                                ['Week','Progress','Estimated'],

                                                

                                                 <?php $__currentLoopData = $milestone; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestones): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   
                                                  [<?php echo e($milestones->week); ?>, <?php echo e($progresscurve[$i]->progress); ?>,<?php echo e($milestones->estimated); ?>],
                                                 
                                                <?php $i = $i+1;?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                               
                                               
                                                

                                              /////////////////////////////////////
                                               
                                            ]);

                                              var options = {
                                                'width':1100,
                                                'height':500,                                               
                                                hAxis: { title: 'Week',titleTextStyle: { fontName: 'Quicksand,sans-serif',italic: false,fontSize: 24},textStyle: { fontName: 'Quicksand,sans-serif', bold: false,fontSize: 14}},
                                                vAxis: { title: 'Progress (%)',titleTextStyle: { fontName: 'Quicksand,sans-serif',italic: false,fontSize: 24},textStyle: { fontName: 'Quicksand,sans-serif',bold: false,fontSize: 14}},
                                                curveType: 'function',
                                                legend: { fontName: 'Quicksand,sans-serif', position: 'right'},
                                                crosshair: { trigger: 'both', color: '#01A1DD',opacity: 0.5},
                                                pointSize: 3,
                                                explorer: {},
                                              };


                                        
                                              var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));                                   

                                              chart.draw(data, options);

                                            }
                                          </script>
                                      </head>
                                    </div>

                                      <body>
                                        <div id="curve_chart" style="height: 60%"></div>
                                      </body>
                                    </html>

                                    </div>           
                            </center>                                             

                         </form>

                        <center>
                           <br><br>
                        <button onclick="location.href='<?php echo e(url('home')); ?>'" type="button" class="btn btn-lg btn-default">Home</button>

                          <script type="text/javascript">
    
                                      setTimeout(function() {
                                      $('#messages').fadeOut('slow');
                                  }, 10000);

                                  </script>

                        <div id="messages">
                         <?php if($message = Session::get('warning')): ?>
                          <br>
                          <br>

                                  <div class="alert alert-warning"> 
                                      <p><?php echo e($message); ?></p>
                                  </div>

                              <?php endif; ?>
                        </div>
                        </center>
                 
                </div>
            </div>
        </div>

    </div><!-- First Row End -->


    <?php $__env->stopSection(); ?>

<?php endif; ?>

<?php echo $__env->make('layouts.datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>