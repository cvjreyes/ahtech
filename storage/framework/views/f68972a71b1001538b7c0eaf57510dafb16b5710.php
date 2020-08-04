<?php if(Auth::guest()): ?>

<?php else: ?>



<?php $__env->startSection('content'); ?>

<script>

 </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>




  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>


<script type="text/javascript">

    function initGui()
    {
        $('.date-iso8601').datepicker();
    }
   

    $(function () {
        $('.add').click(function () {


            var n = ($('.resultbody tr').length - 0) + 1;
            var tr = '<tr class="fila">' +
                    '<td><?php echo Form::text('code[]', null, array('placeholder' => 'Code','class' => 'form-control','required')); ?></td>'+
                    '<td><?php echo Form::text('name[]', null, array('placeholder' => 'Name','class' => 'form-control','required')); ?></td>'+
                    '<td><?php echo Form::number('hours[]', null, array('placeholder' => 'Hours','class' => 'form-control','required')); ?></td>'+
                    '<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
            $('.resultbody').append(tr);


              var newRow = tr.clone();

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
$(document).on('click', '.edit-typesequi-modal', function() {
         

            $('.id').val($(this).data('id'));

            $('.code').val($(this).data('code'));
            $('.name').val($(this).data('name'));
            $('.hours').val($(this).data('hours'));
  

        });

// DESTROY EQUIPMENT 
$(document).on('click', '.del-typesequi-modal', function() {
         
            
         
            $('.id').val($(this).data('id'));

            $('.code').val($(this).data('code'));
            $('.name').val($(this).data('name'));
            $('.hours').val($(this).data('hours'));

        });

</script>


                            <script type="text/javascript">
                                
                                 window.onload = function() {

                                     document.getElementById("s0").style.fontWeight='bold';
                                     document.getElementById("s0").style.fontSize=12 + "pt";
                                     document.getElementById("s0").style.fontStyle="italic";;


                                 }

                            </script> 

<br><br><br><br>
<div class="container">



<button 
                               style="align:right"
                               type="button" 
                               class="btn btn-lg" 
                               data-toggle="modal" 
                               data-target="#createtypesequiModal">
                              Add Type&nbsp;&nbsp;<img src="<?php echo e(asset('images/equi-icon.png')); ?>" style="width:20px" >
                            </button>
<br><br><br>


<link href="<?php echo asset('css/jquery.dataTables.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo asset('js/jquery.dataTables.min.js'); ?>"></script>
<table id="milestoneequi" class="table table-hover table-condensed" style="width:100%">
    <center><thead>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Weight</th>
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
    oTable = $('#milestoneequi').DataTable({
        

        dom: 'Bfrtip',

        buttons: [            
            {
                extend: 'excelHtml5',
                title: 'EQP-Estimated',
                exportOptions: {
                    columns: [ 0, 1, 3]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'EQP-Estimated',
                exportOptions: {
                    columns: [ 0, 1, 3]
                }
            },

     
          
        ],
        "processing": true,
        "serverSide": false,
        "ajax": "<?php echo e(route('equipment.types')); ?>",
        "columns": [
            {data: 'code', name: 'code'},
            {data: 'name', name: 'name'},
            {data: 'hours', name: 'hours'},
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




  </center> 


  <center>
  <button onclick="location.href='<?php echo e(url('modeledequi')); ?>'" type="button" class="btn btn-primary btn-lg">Modeled</button>
  <!-- <button style="align:right" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modeledequiModal">Modeled</button> -->
  <button onclick="location.href='<?php echo e(url('glineequi')); ?>'" type="button" class="btn btn-primary btn-lg">LineChart</button>
  <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#glineequiModal">LineChart</button> -->
  <button onclick="location.href='<?php echo e(url('pmanager')); ?>'" type="button" class="btn btn-lg btn-default"><img src="<?php echo e(asset('images/config-icon.png')); ?>" style="width:25px" ></button>


  </center>

  
<?php $__env->stopSection(); ?>

<?php endif; ?>

<?php echo $__env->make('equipment.deltypesequi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('equipment.edittypesequi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('equipment.createtypesequi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>