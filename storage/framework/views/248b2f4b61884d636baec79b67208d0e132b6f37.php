<?php if(Auth::guest()): ?>

<?php else: ?>
    
    <div class="modal fade" id="glinecivilModal" style="top:12%"; 
     tabindex="-1" role="dialog" 
     aria-labelledby="glinecivilModalLabel">
   <div class="row">
      <div class="col-md-9" style="left: 12%" >
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


                      
               
             <!--       <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/editcivil/')); ?>"> -->
                        <?php echo csrf_field(); ?>


                        <div class="modal-header" style="background-color: #F5F8FA;border-radius: 4px;">
                            <button type="button" class="close" data-dismiss="modal"" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            

                        </div>


                        <?php 

                                $lineprogress = DB::select("SELECT DATE_FORMAT(hcivils.date,'%d-%m-%Y') as date, SUM(hcivils.count) AS count, mcivils.quantity from hcivils JOIN mcivils where hcivils.progress<>0 and hcivils.milestone=1 and hcivils.date=mcivils.date group by hcivils.date, mcivils.date,mcivils.quantity");

                            ?>


                                        
                        <center>
                             <div id="linechart" class="linechart">

                                    <html>
                                    <h3>Line Progress Civil</h3>
                                    <h4>Estimated vs Modeled</h4>
                                      <head>
                                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                          <script type="text/javascript">
                                            google.charts.load('current', {'packages':['corechart']});
                                            google.charts.setOnLoadCallback(drawChart);

                                            function drawChart() {
                                              var data = google.visualization.arrayToDataTable([
                                                ['Date', 'Estimated','Modeled'],

                                                 <?php $__currentLoopData = $lineprogress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lineprogressss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    ['<?php echo e($lineprogressss->date); ?>', <?php echo e($lineprogressss->quantity); ?>, <?php echo e($lineprogressss->count); ?> ],
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            ]);

                                              var options = {
                                                'width':1400,
                                                'height':500,
                                                curveType: 'function',
                                                fontName: 'Quicksand,sans-serif',
                                                legend: { position: 'left'},
                                                crosshair: { trigger: 'both' },
                                                pointSize: 5,
                                              };

                                              var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                                              chart.draw(data, options);
                                            }
                                          </script>
                                      </head>
                                      <body>
                                        <div id="curve_chart" style="height: 60%"></div>
                                      </body>
                                    </html>

                                    </div>           
                            </center>                                             


                  
                        
                        <center>

                        <button data-dismiss="modal" value="Close" style="align:right" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modeledcivilModal">Modeled</button>  
                        <input type="submit" class="btn btn-lg btn-default" data-dismiss="modal" value="Close">

                        </center>
                 
                </div>
            </div>
        </div>

    </div><!-- First Row End -->
</div>

    <?php echo Form::close(); ?>


<?php endif; ?>