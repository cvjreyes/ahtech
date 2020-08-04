<?php if(Auth::guest()): ?>

<?php else: ?>


<div class="modal fade" id="modeledcivilModal" style="top:10%"
     tabindex="-1" role="dialog" 
     aria-labelledby="modeledcivilModalLabel">
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

<!DOCTYPE html>
<html>
<head>
    <title>TechnipFMC.app - civils</title>
    <link href="<?php echo asset('css/app.css'); ?>" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('css/jquery.dataTables.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo asset('js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/jquery.dataTables.min.js'); ?>"></script>


</head>
<body>
<div class="modal-header" style="background-color: #F5F8FA;border-radius: 4px;">
                            <button type="button" class="close" data-dismiss="modal"" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <table>
                            <?php $sum_per_civil = DB::select("SELECT SUM(total_progress) as sum_per_civil FROM pcivils_view"); ?>
                 
                            </table>
        
                        </div>
<!-- Data Table Progress By Area -->



                                                <center>
                                                <h3>Modeled Table</h3>
                                                <h4><?php echo round($sum_per_civil[0]->sum_per_civil,2)."%"; ?></h4>
                                                </center>


<div class="container" style="width:100%">
<table id="dcivilgetprogressbyarea" class="table table-hover table-condensed" style="width:100%;font-size: 14px">
    <thead>
        <tr>
            <th>Zone</th>
            <th>Type of civils</th>
            <th>Progress</th>
            <th>Status</th>
            <th>Modeled</th>
<!--             <th>MultProgress</th>
            <th>MultEstimated</th> -->
            <th>Total Progress (%)</th>
        </tr>
    </thead>
  </table>



<script type="text/javascript">
$(document).ready(function() {
    oTable = $('#dcivilgetprogressbyarea').DataTable({
        dom: 'Bfrtip',
        buttons: [            
            {
                extend: 'excelHtml5',
                title: 'CIV-Modeled',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'CIV-Modeled',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                }
            },
          
        ],
        "processing": true,
        "serverSide": false,
        "autoWidth": false,
        "ajax": "<?php echo e(route('dcivildatatable.dcivilgetprogressbyarea')); ?>",
        "columns": [
            {data: 'zone_name', name: 'zone_name'},
            {data: 'type_civil', name: 'type_civil'},
            {data: 'progress', name: 'progress'},
            {data: 'status', name: 'status'},
            {data: 'modeled', name: 'modeled'},
            // {data: 'mult_progress', name: 'mult_progress'},
            // {data: 'mult_estimated', name: 'mult_estimated'},   
            {data: 'total_progress', name: 'total_progress'} 
        ]


    });
});
</script>

</div>

</body>

</html>

<br>
<br>

</center>
    <center>

        <button data-dismiss="modal" value="Close" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#glinecivilModal">LineChart</button>
        <input type="submit" class="btn btn-lg btn-default" data-dismiss="modal" value="Close">
    
    </center>

</div>
</div>
</div>
</div>
</div>

<?php endif; ?>
