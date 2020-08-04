<?php if(Auth::guest()): ?>

<?php else: ?>



<?php $__env->startSection('content'); ?>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script type="text/javascript">



    $(function () {
        $('.add').click(function () {

            var n = ($('.resultbody tr').length - 0) + 1;
            var tr = '<tr class="fila">' +
                    '<td><?php echo Form::text('name[]', null, array('placeholder' => 'Calculation Note','class' => 'form-control','style' => 'text-transform: uppercase','required')); ?></td>'+
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


   
</script>




                            <script type="text/javascript">
                                
                                 window.onload = function() {

                                     document.getElementById("s2").style.fontWeight='bold';
                                     document.getElementById("s2").style.fontSize=10 + "pt";
                                     document.getElementById("s2").style.fontStyle="italic";;


                                 }

                            </script> 


<script type="text/javascript">
  
  // SHOW/UPDATE PIPE
$(document).on('click', '.edit-cnotes-modal', function() {
         
        
         
             //$('#est_qtya').val($(this).data('est_qty'));
            $('.id').val($(this).data('id'));


            $('.units_id').val($(this).data('units_id'));
            $('.diameter').val($(this).data('diameter'));
            $('.pdms_linenumber').val($(this).data('pdms_linenumber'));
            $('.sec_number').val($(this).data('sec_number'));
            $('.spec').val($(this).data('spec'));
            $('.calc_notes').val($(this).data('calc_notes'));

        });

// PROGRESS PIPE




$(document).on('click', '.progress-pipe-modal', function() {
         
         

            $('.id').val($(this).data('id'));


            $('.units_id').val($(this).data('units_id'));
            $('.diameter').val($(this).data('diameter'));
            $('.pdms_linenumber').val($(this).data('pdms_linenumber'));
            $('.pdms_linenumber_progress').val($(this).data('pdms_linenumber'));
            $('.sec_number').val($(this).data('sec_number'));
            $('.spec').val($(this).data('spec'));
            $('.calc_notes').val($(this).data('calc_notes'));

        });

</script>
                                                

<br><br><br><br>




<!-- /////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////// -->
    

    <script>

    function enviar(val)
    {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        // Esta es la variable que vamos a pasar
        //var miVariableJS=$("#texto").val();
 
        var miVariableJS= val;
        // Enviamos la variable de javascript a archivo.php
        $.post("archivo",{"texto":miVariableJS},function(respuesta){
            alert(respuesta);

        });
    }
    </script>




    <!-- /////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////// -->
<div class="container">

    
                            <?php 

                            $sum_per_pipe = DB::select("SELECT * FROM total_ppipes_view"); 
                            $budget = DB::select("SELECT weight FROM pmanagers WHERE name='pipe'");
                            $sum_per_epipe = DB::select("SELECT SUM(hours) as ehrspipes FROM pipesview"); ?>

                                                <center>
                                                    <?php 

                                                 if ($sum_per_epipe[0]->ehrspipes > $budget[0]->weight){
                                                    echo "<h3 style='background-color: #FCF8E3'>The estimated exceed the budget!</h3>";

                                                 }   

                                                ?>
                                                <h3>Estimated: <?php echo $sum_per_epipe[0]->ehrspipes." hours"; ?></h3>
                                                
                                            <?php if(($sum_per_pipe[0]->total_epipehours)>0) :?>

                                                <h3>Total Progress: <?php echo round((($sum_per_pipe[0]->total_ppipehours)/($sum_per_pipe[0]->total_epipehours))*100,2)."%"; ?></h3>
                                                <h4></h4>
                                            <?php endif; ?>

                                                </center>
                                                <br>
                                                <button onclick="location.href='<?php echo e(url('exportpipe')); ?>'" type="button" class="btn btn-lg btn-success" style="font-size: 16px;font-weight: bold">Excel</button><br>

<br>

<link href="<?php echo asset('css/jquery.dataTables.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo asset('js/jquery.dataTables.min.js'); ?>"></script>
<table id="epipe" class="table table-hover table-condensed">
    <center><thead>
        <tr>
            <th>Area</th>
            <th>Diameter</th>
            <th>LN</th>
            <th>SN</th>
            <th>Specification</th>
            <th>PDMS LN</th>
            <th>TL</th>
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
    oTable = $('#epipe').DataTable({
        

        // dom: 'Bfrtip',

        // buttons: [            
        //     {
        //         extend: 'excelHtml5',
        //         title: 'PIP-Estimated',
        //         exportOptions: {
        //             columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
        //         }
        //     },
        //     {
        //         extend: 'pdfHtml5',
        //         title: 'PIP-Estimated',
        //         exportOptions: {
        //             columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
        //         }
        //     },

     
          
        // ],
        "processing": true,
        "serverSide": false,
        "ajax": "<?php echo e(route('piping.indexpipe')); ?>",
        "columns": [
            {data: 'area', name: 'area'},
            {data: 'diameter', name: 'diameter'},
            {data: 'line_number', name: 'line_number'},
            {data: 'sec_number', name: 'sec_number'},
            {data: 'spec', name: 'spec'},
            {data: 'pdms_linenumber', name: 'pdms_linenumber'},
            {data: 'type_line', name: 'type_line'},
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


  <center>
   <!--  <button onclick="location.href='<?php echo e(url('modeledpipe')); ?>'" type="button" class="btn btn-primary btn-lg">Modeled</button> -->
  <!-- <button style="align:right" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modeledpipeModal">Modeled</button> -->

  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#glinepipeModal">LineChart</button>
  <button onclick="location.href='<?php echo e(url('home')); ?>'" type="button" class="btn btn-lg btn-default">Home</button>


  </center>
<?php $__env->stopSection(); ?>

<?php endif; ?>

<?php echo $__env->make('piping.showcnotes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('piping.createcnotes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('piping.glinepipe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('piping.progresspipe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('piping.editpipe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>