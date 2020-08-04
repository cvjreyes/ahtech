   
<?php if(Auth::guest()): ?>

<?php else: ?>



<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>TechnipFMC.app - Equipments</title>
    <link href="<?php echo asset('css/app.css'); ?>" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('css/jquery.dataTables.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo asset('js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/jquery.dataTables.min.js'); ?>"></script>


</head>
<body>
<div id="fixhead" style="width:100%;background-color: #f5f8fa; position: fixed;z-index: 1;">
<br>
<!-- <img src="<?php echo e(asset('images/tpfmc_logo.png')); ?>" style="width:400px;position: absolute; left:20%; top:40px" >-->
<img src="<?php echo e(asset('images/total_logo.png')); ?>" style="width:10%;position: absolute; left:70%; top:30%" > 
<br>
<br>
<br>
<br>
<br>
<center><a href="home"><h4>Dashboard</h4></a></center>
<center><h1>Progress - Equipments</h1></center><br>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
  <table id="dequi" class="table table-hover table-condensed" style="width:100%">
    <thead>
        <tr>
            <th>Zone Name</th>
            <th>Equi Name</th>
            <th>Progress</th>
            <th>Status</th>
        </tr>
    </thead>
  </table>
</div>

<script type="text/javascript">
$(document).ready(function() {
    oTable = $('#dequi').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo e(route('dequidatatable.dequigetposts')); ?>",
        "columns": [
            {data: 'zone_name', name: 'zone_name'},
            {data: 'equi_name', name: 'equi_name'},
            {data: 'progress', name: 'progress'},
            {data: 'name', name: 'name'}
        ]
    });
});
</script>
<br>
<br>
<br>
<br>
<!-- Data Table Progress -->
<center><h3>Progress - Equipments Modeled</h3></center><br>
<div class="container">
<table id="dequigetprogress" class="table table-hover table-condensed" style="width:100%">
    <thead>
        <tr>
            <th>Progress</th>
            <th>Status</th>
            <th>Modeled</th>
        </tr>
    </thead>
  </table>
</div>


<script type="text/javascript">
$(document).ready(function() {
    oTable = $('#dequigetprogress').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo e(route('dequidatatable.dequigetprogress')); ?>",
        "columns": [
            {data: 'progress', name: 'progress'},
            {data: 'status', name: 'status'},
            {data: 'count', name: 'count'}  

        ]


    });
});
</script>

<!-- Graphic -->
<!-- <center><h3>Progress PieChart - Equipments</h3></center><br> -->
<div class="chart" align="center" style="width:100%;">
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
                
            <?php $__currentLoopData = $chartprogress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chartprogressss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                ['<?php echo e($chartprogressss->status); ?>', <?php echo e($chartprogressss->count); ?>],
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ]);

        var options = {
          //title: 'Progress PieChart- Equipments'
          backgroundColor: 'transparent',
          is3D: true,
          fontName: 'Raleway,sans-serif',

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 1500px; height: 500px;"></div>
  </body>
</html>
</div>


<!-- Data Table Progress By Area -->
<center><h3>Progress - Equipments Modeled by Area</h3></center><br>
<div class="container">
<table id="dequigetprogressbyarea" class="table table-hover table-condensed" style="width:100%">
    <thead>
        <tr>
            <th>Area</th>
            <th>Progress</th>
            <th>Status</th>
            <th>Modeled</th>
        </tr>
    </thead>
  </table>
</div>


<script type="text/javascript">
$(document).ready(function() {
    oTable = $('#dequigetprogressbyarea').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo e(route('dequidatatable.dequigetprogressbyarea')); ?>",
        "columns": [
            {data: 'area', name: 'area'},
            {data: 'progress', name: 'progress'},
            {data: 'status', name: 'status'},
            {data: 'count', name: 'count'}  

        ]


    });
});
</script>

</body>
</html>
<br>
<br>
<br>
<br>
<?php echo $__env->make('common.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php endif; ?>
<?php echo $__env->make('layouts.datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>