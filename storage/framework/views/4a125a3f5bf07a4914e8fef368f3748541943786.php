<!--     <link href="<?php echo asset('css/all.css'); ?>" media="all" rel="stylesheet" type="text/css" /> -->
    <!-- <script type="text/javascript" src="<?php echo asset('js/app.min.js'); ?>"></script> -->
<?php if(Auth::guest()): ?>

<?php else: ?>



<?php $__env->startSection('content'); ?>


<!DOCTYPE html>
<html>
<head>
    <title>TechnipFMC.app - Civil</title>

    <link href="<?php echo asset('css/app.css'); ?>" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('css/jquery.dataTables.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('css/tabulator.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="<?php echo asset('js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/jquery.dataTables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/tabulator.min.js'); ?>"></script>

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
<center><a href="home"><h4>Dashboard</h4></a></center>
<center><h1>Progress - Civil</h1></center><br>
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
<div class="container">
  <table id="dcivil" class="table table-hover table-condensed" style="width:100%">
    <thead>
        <tr>
            <th>Zone Name</th>
            <th>Item Name</th>
            <th>Item Type</th>
            <th>Progress</th>
            <th>Status</th>
        </tr>
    </thead>
  </table>
</div>

<script type="text/javascript">
$(document).ready(function() {
    oTable = $('#dcivil').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo e(route('dcivildatatable.dcivilgetposts')); ?>",
        "columns": [
            {data: 'zone_name', name: 'zone_name'},
            {data: 'item_name', name: 'item_name'},
            {data: 'item_type', name: 'item_type'},
            {data: 'status_civil', name: 'status_civil'},
            {data: 'name', name: 'name'}
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