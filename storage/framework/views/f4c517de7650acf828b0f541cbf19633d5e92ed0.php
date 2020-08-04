<?php if(Auth::guest()): ?>

<?php else: ?>

<?php if(auth()->check() && auth()->user()->hasRole('Elec')): ?>



<?php $__env->startSection('content'); ?>

<!-- ESTILOS DE MODAL -->
<style type="text/css">
    

.dgcAlert {top: 0;position: absolute;width: 100%;display: block;height: 1000px; background: url(http://www.dgcmedia.es/recursosExternos/fondoAlert.png) repeat; text-align:center; opacity:0; display:none; z-index:999999999999999;}
.dgcAlert .dgcVentana{width: 500px; background: white;min-height: 150px;position: relative;margin: 0 auto;color: black;padding: 10px;border-radius: 10px;}
.dgcAlert .dgcVentana .dgcCerrar {height: 25px;width: 25px;float: right; cursor:pointer; background: url(http://www.dgcmedia.es/recursosExternos/cerrarAlert.jpg) no-repeat center center;}
.dgcAlert .dgcVentana .dgcMensaje { margin: 0 auto; padding-top: 0px; text-align: center; width: 400px;font-size: 20px;}
.dgcAlert .dgcVentana .dgcAceptar{background:#09C; bottom:20px; display: inline-block; font-size: 12px; font-weight: bold; height: 24px; line-height: 24px; padding-left: 5px; padding-right: 5px;text-align: center; text-transform: uppercase; width: 75px;cursor: pointer; color:#FFF; margin-top:25px;}

</style>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<?php $areas = DB::table('areas')->pluck('name')->all();
              $type_elec = DB::table('telecs')->pluck('name')->all(); 
              ?>

<script type="text/javascript">



    $(function () {
        $('.add').click(function () {

            var n = ($('.resultbody tr').length - 0) + 1;
            var tr = '<tr class="fila">' +
                    '<td><?php echo Form::select('areas_id[]', [null => 'Select Area...'] + $areas, null, array( 'style'=>'height:34px;font-size: 14px;font-weight: normal;','relecred')); ?></td>'+
                    '<td><?php echo Form::select('telecs_id[]', [null => 'Select Type...'] + $type_elec, null, array( 'style'=>'height:34px;font-size: 14px;font-weight: normal;','relecred')); ?></td>'+
                    '<td><?php echo Form::number('qty[]', null, array('placeholder' => 'Qty','class' => 'form-control','style' => 'width: 75px;font-size: 14px;font-weight: normal;','relecred')); ?></td>'+
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

// SHOW/UPDATE elec 
$(document).on('click', '.edit-elec-modal', function() {
         
       
         
             //$('#est_qtya').val($(this).data('est_qty'));
            $('.id').val($(this).data('id'));


            $('.units_id').val($(this).data('units_id'));
            $('.areas_id').val($(this).data('areas_id'));
            $('.telecs_id').val($(this).data('telecs_id'));
            $('.tag').val($(this).data('tag'));
            $('.hours').val($(this).data('hours'));
            $('.est_qty').val($(this).data('est_qty'));

        });

// DESTROY elec 
$(document).on('click', '.del-eelecs-modal', function() {
         
            
         
             //$('#est_qtya').val($(this).data('est_qty'));
            $('.id').val($(this).data('id'));


            $('.units_id').val($(this).data('units_id'));
            $('.telecs_id').val($(this).data('telecs_id'));
            $('.tag').val($(this).data('tag'));
            $('.hours').val($(this).data('hours'));
            $('.est_qty').val($(this).data('est_qty'));

        });
   
</script>

                            <script type="text/javascript">
                                
                                 window.onload = function() {

                                     document.getElementById("s4").style.fontWeight='bold';
                                     document.getElementById("s4").style.fontSize=10 + "pt";
                                     document.getElementById("s4").style.fontStyle="italic";


                                 }

                            </script> 

<br><br><br><br>
<div class="container" style="width: 70%">
                                                
                                                <center>

                                   <!--   Se comprueba el peso deseado (BUDGET/AREAS) -->

                                                <?php $weight_total= DB::select("SELECT weight_total FROM pmanagers WHERE name='elec'");?>


                                                <h2><b>Electrical</b></h2>

                                            <?php if ($weight_total[0]->weight_total==0) :?>    

                                                <?php $total_weight= DB::select("SELECT SUM(weight*qty) AS weight FROM eelecsfullview;");?> 

                                            <?php else: ?>

                                                 <?php $total_weight= DB::select("SELECT weight FROM pmanagers WHERE name='elec'");?>   

                                            <?php endif ?>

                                     <!--   FIN DE LA COMPROBACIÓN (BUDGET/AREAS) -->
                                             
                                                <?php if ($total_weight[0]->weight!=0) :?>

                                                    <h3>Estimated Weight: <?php echo $total_weight[0]->weight; ?>
                                                    <?php $total_progress = DB::select("SELECT SUM((weight*progress)/".$total_weight[0]->weight.") as total_progress FROM delecsfullview;");

                                                  
                                                    ?>

                                                <br>Total Progress: <?php echo round($total_progress[0]->total_progress,1)."%";?></h3>


                                                <?php else: ?>

                                                    <h3>Estimated Weight: <?php echo "0"; ?>
                                                    <br>Total Progress: <?php echo "0%";?></h3>

                                                <?php endif ?>

                                                <?php // LEYENDA DE STEPS

                                                    
                                                            $pelecs = DB::select("SELECT * FROM pelecs"); 

                                                            echo "<table border='1'><tr>";
                                                            foreach ($pelecs as $pelecss) {

                                                                echo "<td style='font-size: 14px;color:red;font-weight:bold;text-align:center'>&nbsp;".$pelecss->name."&nbsp;</td>";      
                                                            }
                                                            echo "</tr><tr>";
                                                            foreach ($pelecs as $pelecss) {

                                                                echo "<td style='font-size: 14px;color:red;text-align:center'>&nbsp;".$pelecss->percentage."%&nbsp;</td>";      
                                                            }
                                                            echo "</tr></table>";

                                                        ?>
                                                </center>

<br>


<?php if(auth()->check() && auth()->user()->hasRole('ElecAdmin')): ?><button style="align:right" type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#createelecModal"><img src="<?php echo e(asset('images/add-icon.ico')); ?>" style="width:23px" ></button>&nbsp;<?php endif; ?>
<button onclick="location.href='<?php echo e(url('typeselec')); ?>'" type="button" class="btn btn-lg btn-default"><img src="<?php echo e(asset('images/elec-icon.png')); ?>" style="width:23px" ></button>
<!-- <button onclick="location.href='<?php echo e(url('exportelec')); ?>'" type="button" class="btn btn-lg btn-success" style="font-size: 16px;font-weight: bold">Excel</button> --><br>

<br>



<link href="<?php echo asset('css/jquery.dataTables.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo asset('js/jquery.dataTables.min.js'); ?>"></script>
<table border id="eelec" class="table table-hover table-condensed" style="width: 100%;font-size: 14px;font-weight: normal;white-space: nowrap">
    <center><thead>
        <tr>
            <th>Area</th>
            <th>Type</th>
            <th>Quantity</th>
            <th style="text-align: center;background: #82DD7C">Modelled</th>

           <!-- SE GENERA SEGUN STEPS DE PROGRESO -->

            <?php

                $pelecs = DB::select("SELECT percentage FROM pelecs"); 

                foreach ($pelecs as $pelecss) {

                echo "<th style='text-align: center;background: #A8E6A4'>".$pelecss->percentage."%</th>";           

                } 

            ?>


            <?php if(auth()->check() && auth()->user()->hasRole('ElecAdmin')): ?> <th>Action</th> <?php endif; ?>
        </tr>
    </thead></center>
    <tfoot><tr>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>

          <!-- SE GENERA SEGUN STEPS DE PROGRESO --> 

             <?php

                $pelecs = DB::select("SELECT percentage FROM pelecs"); 

                foreach ($pelecs as $pelecss) {

                echo "<th style='text-align: center'></th>";    

                } 

            ?>
            
            <?php if(auth()->check() && auth()->user()->hasRole('ElecAdmin')): ?> <th style="text-align: center"></th> <?php endif; ?>
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

<?php if(auth()->check() && auth()->user()->hasRole('ElecAdmin')): ?>
    <script type="text/javascript">
    var action_bt = "Edit / Delete"
    $(document).ready(function() {
        oTable = $('#eelec').DataTable({
            
            pageLength: 8,

            "processing": true,
            "serverSide": false,
            "ajax": "<?php echo e(route('electrical.eelecsfullquery')); ?>",
            "columns": [
                     {data: 'area', name: 'area'},
            {data: 'type_elec', name: 'type_elec'},
            {data: 'qty', name: 'qty'},
            {data: 'modeled', name: 'modeled'},

            //SE GENERA SEGUN STEPS DE PROGRESO 
            <?php

                $pelecs = DB::select("SELECT percentage FROM pelecs"); 

                foreach ($pelecs as $pelecss) {

                echo "{data: 'modeled".$pelecss->percentage."', name: 'modeled".$pelecss->percentage."'},";    

                } 

            ?>
            {data: 'action', name: 'action', orderable: false, searchable: false}


            ]

        });

     
    });

    </script>
<?php else: ?>
    <script type="text/javascript">
    var action_bt = "Edit / Delete"
    $(document).ready(function() {
        oTable = $('#eelec').DataTable({
            
            pageLength: 8,

            "processing": true,
            "serverSide": false,
            "ajax": "<?php echo e(route('electrical.eelecsfullquery')); ?>",
            "columns": [
                {data: 'area', name: 'area'},
            {data: 'type_elec', name: 'type_elec'},
            {data: 'qty', name: 'qty'},
            {data: 'modeled', name: 'modeled'}
             //SE GENERA SEGUN STEPS DE PROGRESO 
            <?php

                $pelecs = DB::select("SELECT percentage FROM pelecs"); 

                foreach ($pelecs as $pelecss) {

                echo ",{data: 'modeled".$pelecss->percentage."', name: 'modeled".$pelecss->percentage."'}";    

                } 

            ?>


            ]

        });

     
    });

    </script>
<?php endif; ?>

<br>
<br>
<br>


    
 <!--    extends('elec.editelec') -->
    






<?php 

    $sum_per = DB::select("SELECT SUM(percentage) as sum_per FROM pelecs");
    $sum_est_qty = DB::select("SELECT SUM(est_qty) as sum_est_qty FROM eelecs");
    $sum_hours = DB::select("SELECT SUM(hours) as sum_hours FROM elecsview");
    $mult_estimated = DB::select("SELECT SUM(`est_hours`) AS mult_estimated FROM elecsview");


    $qty_x_hours=$sum_est_qty[0]->sum_est_qty * $sum_hours[0]->sum_hours;

?>



  </center> 


  <center>
  <button onclick="location.href='<?php echo e(url('modeledelec')); ?>'" type="button" class="btn btn-primary btn-lg">Modelled</button>
  <!-- <button style="align:right" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modeledelecModal">Modelled</button> -->
<!--   <button onclick="location.href='<?php echo e(url('glineelec')); ?>'" type="button" class="btn btn-primary btn-lg">CurveByArea</button> -->
  <button onclick="location.href='<?php echo e(url('glineelectotal')); ?>'" type="button" class="btn btn-primary btn-lg">Curve</button>
  <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#glineelecModal">LineChart</button> -->

  <button onclick="location.href='<?php echo e(url('home')); ?>'" type="button" class="btn btn-lg btn-default">Home</button>


  </center>

<!-- SCRIPT PARA BÚSQUEDA POR COLUMNAS   -->


<script type="text/javascript">
    
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#eelec tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" style="width: 100%;font-size: 12px;font-weight: normal;white-space: nowrap" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#eelec').DataTable();
 
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

<?php else: ?>
<?php echo $__env->make('common.forbidden', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php endif; ?>

<?php endif; ?>

<?php echo $__env->make('electrical.delelec', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('electrical.createelec', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>