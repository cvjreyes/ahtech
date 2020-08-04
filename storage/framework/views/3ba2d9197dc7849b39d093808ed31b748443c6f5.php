<?php if(Auth::guest()): ?>

<?php else: ?>



<?php $__env->startSection('content'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


<script type="text/javascript">
    $(function () {
        $('.add').click(function () {
            var n = ($('.resultbody tr').length - 0) + 1;
            var tr = '<tr class="fila">' +
                    '<td><?php echo Form::select('units_id[]_', [null => 'Select Area...'] + $units, null, array( 'style'=>'height:31px','required')); ?></td>'+
                    '<td><?php echo Form::select('tcivils_id[]', [null => 'Select Type...'] + $tcivils, null, array( 'style'=>'height:31px','required')); ?></td>'+
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

// SHOW/UPDATE civil 
$(document).on('click', '.edit-civil-modal', function() {
         
       
         
             //$('#est_qtya').val($(this).data('est_qty'));
            $('.id').val($(this).data('id'));


            $('.units_id').val($(this).data('units_id'));
            $('.tcivils_id').val($(this).data('tcivils_id'));
            $('.hours').val($(this).data('hours'));
            $('.est_qty').val($(this).data('est_qty'));

        });

// SHOW/UPDATE civil 
$(document).on('click', '.del-civil-modal', function() {
         
            
         
             //$('#est_qtya').val($(this).data('est_qty'));
            $('.id').val($(this).data('id'));


            $('.units_id').val($(this).data('units_id'));
            $('.tcivils_id').val($(this).data('tcivils_id'));
            $('.hours').val($(this).data('hours'));
            $('.est_qty').val($(this).data('est_qty'));

        });
   
</script>


                        <script type="text/javascript">
                                
                                 window.onload = function() {

                                     document.getElementById("s1").style.fontWeight='bold';
                                     document.getElementById("s1").style.fontSize=10 + "pt";
                                     document.getElementById("s1").style.fontStyle="italic";;


                                 }

                            </script> 

<br><br><br><br>
<div class="container">


<button 
                               style="align:right"
                               type="button" 
                               class="btn btn-primary btn-lg" 
                               data-toggle="modal" 
                               data-target="#createcivilModal">
                              Create
                            </button>
<br><br><br>




<link href="<?php echo asset('css/jquery.dataTables.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo asset('js/jquery.dataTables.min.js'); ?>"></script>
<table id="ecivil" class="table table-hover table-condensed" style="width:100%">
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
    <script src="https://cdn.datatables.net/select/1.2.3/js/dataTables.select.min.js"></script>
    <script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>


    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.2.3/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css" rel="stylesheet">

<script type="text/javascript">  


$(document).ready(function() {



    oTable = $('#ecivil').DataTable({
        dom: 'Bfrtip',
        buttons: [            
            {
                extend: 'excelHtml5',
                title: 'CIV-Estimated',
                exportOptions: {
                    columns: [ 0, 1, 3, 4, 5, 6 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'CIV-Estimated',
                exportOptions: {
                    columns: [ 0, 1, 3, 4, 5, 6 ]
                }
            },
          
        ],

        "processing": true,
        "serverSide": false,
        "ajax": "<?php echo e(route('civil.indexcivil')); ?>",
        "columns": [
            {data: 'area', name: 'area'},
            {data: 'type', name: 'type'},
            {data: 'code', name: 'code'},
            {data: 'site', name: 'site'},
            {data: 'hours', name: 'hours'},
            {data: 'est_quantity', name: 'est_quantity'},
            {data: 'est_hours', name: 'est_hours'},
            {data: 'action', name: 'action', orderable: false, searchable: false}


        ],
        

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

    $sum_per = DB::select("SELECT SUM(percentage) as sum_per FROM pcivils");
    $sum_est_qty = DB::select("SELECT SUM(est_qty) as sum_est_qty FROM ecivils");
    $sum_hours = DB::select("SELECT SUM(hours) as sum_hours FROM civilsview");
    $mult_estimated = DB::select("SELECT SUM(`est_hours`) AS mult_estimated FROM civilsview");


    $qty_x_hours=$sum_est_qty[0]->sum_est_qty * $sum_hours[0]->sum_hours;

?>


<!-- <center>
<table border="1">
  <thead>
    <tr>
      <th>&nbsp;Estimated Quantity&nbsp;</th>
      <th>&nbsp;Hours&nbsp;</th>
      <th>MultiEstimated</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>&nbsp;<?php //echo $sum_est_qty[0]->sum_est_qty; ?>&nbsp;</td>
      <td>&nbsp;<?php //echo $sum_hours[0]->sum_hours; ?>&nbsp;</td>
      <td><b>&nbsp;<?php //echo $mult_estimated[0]->mult_estimated; ?>&nbsp;</b></td>
    </tr>
  </tbody>
  </center> -->


  <center>
  <button style="align:right" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modeledcivilModal">Modeled</button>
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#glinecivilModal">LineChart</button>
  <button onclick="location.href='<?php echo e(url('home')); ?>'" type="button" class="btn btn-lg btn-default">Home</button>


  </center>

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
<?php $__env->stopSection(); ?>

<?php endif; ?>

<?php echo $__env->make('civil.glinecivil', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('civil.modeledcivil', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('civil.delcivil', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('civil.editcivil', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('civil.createcivil', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>