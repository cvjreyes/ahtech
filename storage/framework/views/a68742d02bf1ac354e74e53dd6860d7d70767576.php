<?php if(Auth::guest()): ?>

<?php else: ?>



<?php $__env->startSection('content'); ?>

<script>

 </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


<script type="text/javascript">



    $(function () {
        $('.add').click(function () {

            var n = ($('.resultbody tr').length - 0) + 1;
            var tr = '<tr class="fila">' +
                    '<td><?php echo Form::select('units_id[]', [null => 'Select Area...'] + $units, null, array( 'style'=>'height:31px','required')); ?></td>'+
                    '<td><?php echo Form::select('tequis_id[]', [null => 'Select Type...'] + $tequis, null, array( 'style'=>'height:31px','required')); ?></td>'+
                    '<td><?php echo Form::number('est_qty[]', null, array('placeholder' => 'Quantity','class' => 'form-control','required')); ?></td>'+
                    '<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
            $('.resultbody').append(tr);
        });

        $('.resultbody').delegate('.delete', 'click', function () {
            $(this).parent().parent().remove();
        });

        $('.resultbody').delegate('.obtainedmarks , .totalmarks', 'keyup', function () {
            var tr = $(this).parent().parent();
            var obtainedmarks = tr.find('.obtainedmarks').val() - 0;
            var totalmarks = tr.find('.totalmarks').val() - 0;

            var percentage = (obtainedmarks / totalmarks) * 100;
            tr.find('.percentage').val(percentage);
        });
    });

// SHOW/UPDATE EQUIPMENT 
$(document).on('click', '.edit-equi-modal', function() {
         
       
         
             //$('#est_qtya').val($(this).data('est_qty'));
            $('.id').val($(this).data('id'));


            $('.units_id').val($(this).data('units_id'));
            $('.tequis_id').val($(this).data('tequis_id'));
            $('.hours').val($(this).data('hours'));
            $('.est_qty').val($(this).data('est_qty'));

        });

// DESTROY EQUIPMENT 
$(document).on('click', '.del-equi-modal', function() {
         
            
         
             //$('#est_qtya').val($(this).data('est_qty'));
            $('.id').val($(this).data('id'));


            $('.units_id').val($(this).data('units_id'));
            $('.tequis_id').val($(this).data('tequis_id'));
            $('.hours').val($(this).data('hours'));
            $('.est_qty').val($(this).data('est_qty'));

        });
   
</script>

                            <script type="text/javascript">
                                
                                 window.onload = function() {

                                     document.getElementById("s0").style.fontWeight='bold';
                                     document.getElementById("s0").style.fontSize=10 + "pt";
                                     document.getElementById("s0").style.fontStyle="italic";;


                                 }

                            </script> 

<br><br><br><br>
<div class="container">
                                                <?php 
                                                    $sum_per_eequi = DB::select("SELECT SUM(est_hours) as ehrsequis FROM equisview");
                                                    $budget = DB::select("SELECT weight FROM pmanagers WHERE name='equi'"); 
                                                    ?>

                                                <center>
                                                    <?php 

                                                 if ($sum_per_eequi[0]->ehrsequis > $budget[0]->weight){
                                                    echo "<h3 style='background-color: #FCF8E3'>The estimated exceed the budget!</h3>";

                                                 }   

                                                ?>
                                                <h3>Estimated Equipments</h3>
                                                <h4><?php echo $sum_per_eequi[0]->ehrsequis." hours"; ?></h4>
                                                </center>

<br>


<button 
                               style="align:right"
                               type="button" 
                               class="btn btn-lg" 
                               data-toggle="modal" 
                               data-target="#createequiModal">
                              Add Equipments&nbsp;&nbsp;<img src="<?php echo e(asset('images/add-icon.ico')); ?>" style="width:20px" >
                            </button>
                            <button onclick="location.href='<?php echo e(url('typesequi')); ?>'" type="button" class="btn btn-lg">Equipments Types&nbsp;&nbsp;<img src="<?php echo e(asset('images/plan-icon.png')); ?>" style="width:20px" ></button>
                            <!-- <button onclick="location.href='<?php echo e(url('milestoneequi')); ?>'" type="button" class="btn btn-lg">Milestones&nbsp;&nbsp;<img src="<?php echo e(asset('images/plan-icon.png')); ?>" style="width:20px" ></button> -->


<br><br><br>




<link href="<?php echo asset('css/jquery.dataTables.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo asset('js/jquery.dataTables.min.js'); ?>"></script>
<table id="eequi" class="table table-hover table-condensed" style="width:100%">
    <center><thead>
        <tr>
            <th>Area</th>
            <th>Type</th>
            <th>Code</th>
            <th>Site</th>
            <th>Hours</th>
            <th>Estimated quantity</th>
            <th>Estimated Hours</th>
            <th>Action</th>
        </tr>
    </thead></center>
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
var action_bt = "Edit / Delete"
$(document).ready(function() {
    oTable = $('#eequi').DataTable({
        

        dom: 'Bfrtip',

        buttons: [            
            {
                extend: 'excelHtml5',
                title: 'EQP-Estimated',
                exportOptions: {
                    columns: [ 0, 1, 3, 4, 5, 6 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'EQP-Estimated',
                exportOptions: {
                    columns: [ 0, 1, 3, 4, 5, 6 ]
                }
            },

     
          
        ],
        "processing": true,
        "serverSide": false,
        "ajax": "<?php echo e(route('equipment.indexequi')); ?>",
        "columns": [
            {data: 'area', name: 'area'},
            {data: 'type', name: 'type'},
            {data: 'code', name: 'code'},
            {data: 'site', name: 'site'},
            {data: 'hours', name: 'hours'},
            {data: 'est_quantity', name: 'est_quantity'},
            {data: 'est_hours', name: 'est_hours'},
            {data: 'action', name: 'action', orderable: false, searchable: false}


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


<?php 

    $sum_per = DB::select("SELECT SUM(percentage) as sum_per FROM pequis");
    $sum_est_qty = DB::select("SELECT SUM(est_qty) as sum_est_qty FROM eequis");
    $sum_hours = DB::select("SELECT SUM(hours) as sum_hours FROM equisview");
    $mult_estimated = DB::select("SELECT SUM(`est_hours`) AS mult_estimated FROM equisview");


    $qty_x_hours=$sum_est_qty[0]->sum_est_qty * $sum_hours[0]->sum_hours;

?>



  </center> 


  <center>
  <button onclick="location.href='<?php echo e(url('modeledequi')); ?>'" type="button" class="btn btn-primary btn-lg">Modeled</button>
  <!-- <button style="align:right" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modeledequiModal">Modeled</button> -->
  <button onclick="location.href='<?php echo e(url('glineequi')); ?>'" type="button" class="btn btn-primary btn-lg">LineChart</button>
  <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#glineequiModal">LineChart</button> -->

  <button onclick="location.href='<?php echo e(url('home')); ?>'" type="button" class="btn btn-lg btn-default">Home</button>


  </center>


<?php $__env->stopSection(); ?>

<?php endif; ?>

<?php echo $__env->make('equipment.delequi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('equipment.editequi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('equipment.createequi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>