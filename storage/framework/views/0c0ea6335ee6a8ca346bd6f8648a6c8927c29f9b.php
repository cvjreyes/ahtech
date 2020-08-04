<?php if(Auth::guest()): ?>

<?php else: ?>



<?php $__env->startSection('content'); ?>

<script>

 </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>



                            <script type="text/javascript">
                                
                                 window.onload = function() {

                                     document.getElementById("s1").style.fontWeight='bold';
                                     document.getElementById("s1").style.fontSize=10 + "pt";
                                     document.getElementById("s1").style.fontStyle="italic";;


                                 }

                            </script> 
            <?php 
                    $sum_per_ecivil = DB::select("SELECT SUM(est_hours) as ehrscivils FROM civilsview");
                    $sum_per_civil = DB::select("SELECT SUM(total_progress) as sum_per_civil FROM pcivils_view"); 
                    ?>
<br><br><br><br>
<div class="container">
                                                <center>
                                                <h2><b>Modeled Civil</b></h2>
                                                <h3>Estimated Weight: <?php echo $sum_per_ecivil[0]->ehrscivils; ?>
                                                <br>Total Progress: <?php echo round($sum_per_civil[0]->sum_per_civil,2)."%"; ?></h3>
                                                </center>



<br>
<button onclick="location.href='<?php echo e(url('typescivil')); ?>'" type="button" class="btn btn-lg btn-default"><img src="<?php echo e(asset('images/stru-icon.png')); ?>" style="width:23px" ></button>
<button onclick="location.href='<?php echo e(url('exportmodeledcivil')); ?>'" type="button" class="btn btn-lg btn-success" style="font-size: 16px;font-weight: bold">Excel</button><br>
<br>



<link href="<?php echo asset('css/jquery.dataTables.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo asset('js/jquery.dataTables.min.js'); ?>"></script>
<table border id="modeledcivil" class="table table-hover table-condensed" style="width: 100%;font-size: 14px;font-weight: normal;white-space: nowrap">
    <thead>
        <tr>
            <th>Area</th>
            <th>Tag</th>
            <th>Type</th>
            <th>Weight</th>
            <th>Progress</th>
            <th>Status</th>
           <!--  <th>Modeled</th> -->
            <!-- <th>Progress</th> -->
          <!--   <th>EstimatedHrs</th> -->
            <th>Total Progress (%)</th>
        </tr>
    </thead>
    <tfoot><tr>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>
            <!-- <th style="text-align: center"></th> -->
           <!--  <th style="text-align: center"></th> -->
            <th style="text-align: center"></th>
        </tr></tfoot>
  </table>
</div>
  
  <!-- Buttons for export -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css" rel="stylesheet">

<script type="text/javascript">
$(document).ready(function() {
    oTable = $('#modeledcivil').DataTable({
        // dom: 'Bfrtip',
        // buttons: [            
        //     {
        //         extend: 'excelHtml5',
        //         title: 'EQP-Modeled',
        //         exportOptions: {
        //             columns: [ 0, 1, 2, 3, 4, 5 ]
        //         }
        //     },
        //     {
        //         extend: 'pdfHtml5',
        //         title: 'EQP-Modeled',
        //         exportOptions: {
        //             columns: [ 0, 1, 2, 3, 4, 5 ]
        //         }
        //     },
          
        // ],
        "processing": true,
        "serverSide": false,
        "autoWidth": false,
        "ajax": "<?php echo e(route('dcivildatatable.dcivilgetprogressbyarea')); ?>",
        "columns": [
            {data: 'area', name: 'area'},
            {data: 'tag', name: 'tag'},
            {data: 'type_civil', name: 'type_civil'},
            {data: 'hours', name: 'hours'},
            {data: 'progress', name: 'progress'},
            {data: 'status', name: 'status'},
            //{data: 'modeled', name: 'modeled'},
            //{data: 'mult_progress', name: 'mult_progress'},
            // {data: 'mult_estimated', name: 'mult_estimated'},   
            {data: 'total_progress', name: 'total_progress'} 
        ]


    });
});
</script>
<br>
<br>
<br>





<script type="text/javascript">
    
    setTimeout(function() {
    $('#messages').fadeOut('slow');
}, 10000);

</script>
<center><strong><div id="messages">
<?php if($message = Session::get('success')): ?>

<br>


        <div class="alert alert-success"> 
            <p><?php echo e($message); ?></p>
        </div>

    <?php endif; ?>

<?php if($message = Session::get('warning')): ?>
<br>
<br>

        <div class="alert alert-warning"> 
            <p><?php echo e($message); ?></p>
        </div>

    <?php endif; ?>

<?php if($message = Session::get('danger')): ?>
<br>
<br>

        <div class="alert alert-danger"> 
            <p><?php echo e($message); ?></p>
        </div>

    <?php endif; ?>
</div>
</strong></center>



  </center> 


  <center>
  <button onclick="location.href='<?php echo e(url('glinecivil')); ?>'" type="button" class="btn btn-primary btn-lg">CurveByArea</button>
  <button onclick="location.href='<?php echo e(url('glineciviltotal')); ?>'" type="button" class="btn btn-primary btn-lg">Curve</button>
  <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#glinecivilModal">LineChart</button> -->
  <button onclick="location.href='<?php echo e(url('civils')); ?>'" type="button" class="btn btn-lg btn-default">Estimated</button>


  </center>

  <!-- SCRIPT PARA BÚSQUEDA POR COLUMNAS   -->


<script type="text/javascript">
    
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#modeledcivil tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" style="width: 100%;font-size: 12px;font-weight: normal;white-space: nowrap" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#modeledcivil').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );

</script>


    <!-- FIN DE BÚSQUEDA POR COLUMNAS   -->
<?php $__env->stopSection(); ?>

<?php endif; ?>

<?php echo $__env->make('layouts.datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>