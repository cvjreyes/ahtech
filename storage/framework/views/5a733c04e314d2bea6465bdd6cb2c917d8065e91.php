<!--     <link href="<?php echo asset('css/all.css'); ?>" media="all" rel="stylesheet" type="text/css" /> -->
    <!-- <script type="text/javascript" src="<?php echo asset('js/app.min.js'); ?>"></script> -->
   
<?php if(Auth::guest()): ?>

<?php else: ?>



<?php $__env->startSection('content'); ?>
                    <script type="text/javascript">
                                
                                 window.onload = function() {

                                     document.getElementById("s2").style.fontWeight='bold';
                                     document.getElementById("s2").style.fontSize=12 + "pt";
                                     document.getElementById("s2").style.fontStyle="italic";;


                                 }

                            </script> 

<!DOCTYPE html>
<html>
<head>
    <title>TechnipFMC.app - Pipes</title>

    <link href="<?php echo asset('css/app.onlypipeblade.css'); ?>" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('css/app.css'); ?>" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('css/jquery.dataTables.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo asset('js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/jquery.dataTables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/tabulator.min.js'); ?>"></script>

</head>
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
<center><h1>Progress - Pipes</h1></center><br>
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
</div>

<div class="container">
  <table id="dpipe" class="table table-hover table-condensed" style="width:100%;">
    <thead>
        <tr>
            <th>Zone Name</th>
            <th>Pipe Name</th>
            <th>PID</th>
            <th>Status_PID</th>
            <th>Iso</th>
            <th>Status_Iso</th>
            <th>Stress</th>
            <th>Status_Stress</th>
            <th>Support</th>
            <th>Status_Support</th>
            <th>PDMS_Linenumber</th>
        </tr>
    </thead>
  </table>
</div>

<script type="text/javascript">
$(document).ready(function() {
    oTable = $('#dpipe').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo e(route('dpipedatatable.dpipegetposts')); ?>",
        "columns": [
            {data: 'zone_name', name: 'zone_name'},
            {data: 'pipe_name', name: 'pipe_name'},
            {data: 'pid', name: 'pid'},
            {data: 'pidpname', name: 'pidpname'},
            {data: 'iso', name: 'iso'},
            {data: 'isospname', name: 'isospname'},
            {data: 'stress', name: 'stress'},
            {data: 'stressespname', name: 'stressespname'},
            {data: 'support', name: 'support'},
            {data: 'supportspname', name: 'supportspname'},
            {data: 'pdms_linenumber', name: 'pdms_linenumber'}
        ]
    });
});
</script>
<br>
<br>
<br>
<br>
<!-- Data Table Modeled -->
<div class="container" style="width:50%">
<table id="dpipegetareas" class="table table-hover table-condensed" style="width:50%">
    <thead>
        <tr>
            <th>Design Area</th>
            <th>Modeled</th>
        </tr>
    </thead>
  </table>
</div>

<script type="text/javascript">
$(document).ready(function() {
    oTable = $('#dpipegetareas').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo e(route('dpipedatatable.dpipegetareas')); ?>",
        "columns": [
            {data: 'area', name: 'area'},
            {data: 'modeled', name: 'modeled'}  

        ]


    });
});
</script>
<br>
<br>
<br>
<br>
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