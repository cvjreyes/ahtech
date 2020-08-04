<?php $__env->startSection('content'); ?>

<?php $sum_per_equi = DB::select("SELECT SUM(total_progress) as sum_per_equi FROM pequis_view"); ?>
<?php $sum_per_civil = DB::select("SELECT SUM(total_progress) as sum_per_civil FROM pcivils_view"); ?> 

<br>


<br><br>


    

    <div class="row">
        <div class="container-fluid" style="height: 60%;width: 80%">
            <div class="panel panel-default">
      
                <div class="panel-heading" style="background-color: #ffffff;"><h4>Dashboard - 3D Progress Control</h4></div>
                </br>
                <table>
                  
                  <tr>  <!--BARRAS-->
                    
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                      <script type="text/javascript">
                        google.charts.load("current", {packages:['corechart']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                          var data = google.visualization.arrayToDataTable([
                            ["Element", "Density", { role: "style" } ],
                            ["SMC", parseFloat('<?php echo round($sum_per_equi[0]->sum_per_equi,2);?>'), "#B0BED9"],
                            ["SOE", parseFloat('<?php echo round($sum_per_civil[0]->sum_per_civil,2);?>'), "#3366CC"],
                            ["STU", 50, "#B0BED9"],
                            ["SEL", 80, "color: #3366CC"],
                            ["SIT", 75, "color: #B0BED9"],
                          ]);

                          var view = new google.visualization.DataView(data);
                          view.setColumns([0, 1,
                                           { calc: "stringify",
                                             sourceColumn: 1,
                                             type: "string",
                                             role: "annotation" },
                                           2]);

                          var options = {
                            fontName: 'Quicksand,sans-serif',
                            title: "Progress by Disciplines",
                            width: 1024,
                            height: 768,
                            bar: {groupWidth: "95%"},
                            legend: { position: "none" },
                          };
                          var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                          chart.draw(view, options);
                      }
                      </script>
                    <center><div id="columnchart_values" style="width: 1024px; height: 600px;"></div></center>
                    </br></br></br></br>
                    <div class="panel-heading"></div>
                   
                  </tr>
               
                 </table>
<div class="panel-body">
                    
                </div>
            </div>
        </div>
    </div>
    

</div>


<?php echo $__env->make('common.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>