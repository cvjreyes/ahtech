<?php if(Auth::guest()): ?>

<?php else: ?>

<?php if(auth()->check() && auth()->user()->hasRole('Isoctrl')): ?>



<?php $__env->startSection('content'); ?>

<style type="text/css">
    

.dgcAlert {top: 0;position: absolute;width: 100%;display: block;height: 1000px; background: url(http://www.dgcmedia.es/recursosExternos/fondoAlert.png) repeat; text-align:center; opacity:0; display:none; z-index:999999999999999;}
.dgcAlert .dgcVentana{width: 500px; background: white;min-height: 150px;position: relative;margin: 0 auto;color: black;padding: 10px;border-radius: 10px;}
.dgcAlert .dgcVentana .dgcCerrar {height: 25px;width: 25px;float: right; cursor:pointer; background: url(http://www.dgcmedia.es/recursosExternos/cerrarAlert.jpg) no-repeat center center;}
.dgcAlert .dgcVentana .dgcMensaje { margin: 0 auto; padding-top: 0px; text-align: center; width: 400px;font-size: 20px;}
.dgcAlert .dgcVentana .dgcAceptar{background:#09C; bottom:20px; display: inline-block; font-size: 12px; font-weight: bold; height: 24px; line-height: 24px; padding-left: 5px; padding-right: 5px;text-align: center; text-transform: uppercase; width: 75px;cursor: pointer; color:#FFF; margin-top:25px;}

</style>
<script type="text/javascript">
    
function alertDGC(mensaje)
    {
    var dgcTiempo=500
    var ventanaCS='<div class="dgcAlert"><div class="dgcVentana"><div class="dgcCerrar"></div><div class="dgcMensaje">'+mensaje+'<br><div class="dgcAceptar">CLOSE</div></div></div></div>';
    $('body').append(ventanaCS);
    var alVentana=$('.dgcVentana').height();
    var alNav=$(window).height();
    var supNav=0//$(window).scrollTop();
    $('.dgcAlert').css('height',$(document).height());
    $('.dgcVentana').css('top',(30)+'%');
    //$('.dgcVentana').css('top',((alNav-alVentana)/2+supNav-100)+'px');
    $('.dgcAlert').css('display','block');
    $('.dgcAlert').animate({opacity:1},dgcTiempo);
     $('.dgcCerrar,.dgcAceptar').click(function(e) {
         $('.dgcAlert').animate({opacity:0},dgcTiempo);
         setTimeout("$('.dgcAlert').remove()",dgcTiempo);
     });
        }
        window.alert = function (message) {
          alertDGC(message);
        };


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
            
// SHOW/UPDATE MILESTONES PIPE 
$(document).on('click', '.edit-isostatus-modal', function() {
         

            $('.id').val($(this).data('id'));

            $('.area').val($(this).data('area'));
            $('.week').val($(this).data('week'));
            $('.estimated').val($(this).data('estimated'));
  

        });


</script>


                            <script type="text/javascript">
                                
                                 window.onload = function() {

                                     document.getElementById("s2").style.fontWeight='bold';
                                     document.getElementById("s2").style.fontSize=10 + "pt";
                                     document.getElementById("s2").style.fontStyle="italic";;


                                 }

                            </script> 



        <center>
           <?php //if (auth()->user()->hasRole('IsoctrlAdmin')){ ?> 
                <br>
                <div style="background-color: #E8FFE3;margin-top: 1.7%">
               
                 <img src="<?php echo e(asset('images/excel-icon.png')); ?>" style="width:30px;padding-bottom: 0px;" >&nbsp;&nbsp;<b style="font-size: 18px">REPORTS</b> &nbsp;&nbsp;
                <?php if (auth()->user()->hasRole('IsoctrlAdmin')){ ?><button onclick="location.href='<?php echo e(url('exportisostatus')); ?>'" type="button" class="btn btn-success" style="width:6%"><b>Comments</b></button>&nbsp;&nbsp;<?php } ?>
                <button onclick="location.href='<?php echo e(url('exportisostatuswithdates')); ?>'" type="button" class="btn btn-success" style="width:6%"><b>Dates</b></button>&nbsp;&nbsp;
                <!-- <button onclick="location.href='<?php echo e(url('exportisostatuscount')); ?>'" type="button" class="btn btn-success" style="width:6%"><b>Count</b></button>&nbsp;&nbsp; -->
                <button onclick="location.href='<?php echo e(url('exportisostatuscountbytypeline')); ?>'" type="button" class="btn btn-success" style="width:6%"><b>Count</b></button>&nbsp;&nbsp;
                
                <button onclick="location.href='<?php echo e(url('exportissued')); ?>'" type="button" class="btn btn-success" style="width:6%"><b>Issuedlist</b></button>
                <br>
            </div>
                <?php //} ?> 
          </center>      
<br><br><br>

<?php // VALORES DE PROGRESO

    $maxprogress = DB::select("SELECT SUM(progressmax) as value FROM disoctrls"); //PESO TOTAL DE LOS ISOMETRICOS
    $progressreal = DB::select("SELECT SUM(progressreal) as value FROM disoctrls");
    $progress = DB::select("SELECT SUM(progress) as value FROM disoctrls");

    $progressisoreal = round(($progressreal[0]->value / $maxprogress[0]->value)*100,0)+0; //SOBRE ISOMETRICOS
    $progressisototal = round(($progress[0]->value / $maxprogress[0]->value)*100,0)+0; //SOBRE ISOMETRICOS

    $total_weight= DB::select("SELECT SUM(weight) AS weight FROM dpipesfullview"); //PESO TOTAL

    $remaining_weight = ($total_weight[0]->weight)-($maxprogress[0]->value)+0; // PESO FALTANTE (ISOS POR SUBIR)

    //El remaining_weight se coloca al 0% para IFD y 50% para IFC

    $ifc = env('APP_IFC');

    if ($ifc==1){

        $remaining_weight_progress=($remaining_weight/2)+0;

    }else{

        $remaining_weight_progress=0;

    }

    //SOBRE EL PESO TOTAL MODELADO

    $progress = round(((($progress[0]->value)+($remaining_weight_progress))/(($maxprogress[0]->value)+($remaining_weight)))*100,0);

    $progressreal = round(((($progressreal[0]->value)+($remaining_weight_progress))/(($maxprogress[0]->value)+($remaining_weight)))*100,0);



?>


<div class="container">

    <center>

        <h2><b><i>IsoTracker</i></b></h2>
        <h3>Status</h3>
        <h4>Progress: <?php echo $progress."%"; ?> <?php if (auth()->user()->hasRole('IsoctrlAdmin')){ ?> / Real Progress: <?php echo $progressreal."%"; ?><?php } ?></h4>
        <h4>Progress ISO: <?php echo $progressisototal."%"; ?> <?php if (auth()->user()->hasRole('IsoctrlAdmin')){ ?> / Real Progress ISO: <?php echo $progressisoreal."%"; ?><?php } ?></h4>
   
        <br>
    </center>
    <table style='width: 100%'>
        <td>
             
             <button onclick="location.href='<?php echo e(url('isostatus')); ?>'" type="button" class="btn btn-primary btn-lg" style="width:38%"><b>Status</b>
                </button>
             <button onclick="location.href='<?php echo e(url('hisoctrl')); ?>'" type="button" class="btn btn-info btn-lg" style="width:38%"><b>History</b>
                </button>

       </td> 
       <td style='width: 64%'>        
<!-- TABLA DE TOTALES SEGUN STATUS -->
            <?php echo $__env->make('isoctrl.totalesbystatus', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- FIN TABLA DE TOTALES SEGUN STATUS -->
        </td>
</table>
 <br>
<link href="<?php echo asset('css/jquery.dataTables.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo asset('js/jquery.dataTables.min.js'); ?>"></script>


<table border id="isostatus" class="table table-hover table-condensed" style="width: 100%;font-size: 14px;font-weight: normal;white-space: nowrap">

    <script type="text/javascript">
    
function vcomments(val)
    {

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        // Esta es la variable que vamos a pasar
 
        var miVariableJS= val;
        // Enviamos la variable de javascript a archivo.php
        $.post("jsvcomments",{"texto":miVariableJS},function(respuesta){
            alert(respuesta);

        });


    }

$(document).on('click', '.show-vcomments-modal', function() {
         
         

            $('.id').val($(this).data('id'));


            $('.filename').val($(this).data('filename'));
            $('.comments').val($(this).data('comments'));

        });

</script>

    <center><thead>
        <tr>
            <th>Status</th>
            <th>Iso ID</th>
            <th>Condition</th>
            <th>Progress MAX</th>
            <?php if (auth()->user()->hasRole('IsoctrlAdmin')){ ?><th>Real Progress</th><?php } ?>
            <th>Progress</th>


            
    <!--         <th>Date</th>
            <th>Comment</th> -->
        </tr>
    </thead></center>
    <tfoot><tr>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>
            <?php if (auth()->user()->hasRole('IsoctrlAdmin')){ ?><th style="text-align: center"></th><?php } ?>
            <th style="text-align: center"></th>
<!--             <th style="text-align: center"></th>
            <th style="text-align: center"></th> -->
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


<?php if (auth()->user()->hasRole('IsoctrlAdmin')){ ?>
            <script type="text/javascript">
            var action_bt = "Edit / Delete"
            $(document).ready(function() {
                oTable = $('#isostatus').DataTable({
                    
                    "processing": true,
                    "serverSide": false,
                    "ajax": "<?php echo e(route('isoctrl.isostatusindex')); ?>",
                    "order": [[ 1, "asc" ]],
                    "pageLength" : 8,
                    "columns": [
                        {data: 'name', name: 'name'},
                        {data: 'filename', name: 'filename'},
                        {data: 'deleted', name: 'deleted'},
                        {data: 'progressmax', name: 'progressmax'},
                        {data: 'perprogressreal', name: 'perprogressreal'},          
                        {data: 'perprogress', name: 'perprogress'}
                        // {data: 'instress', name: 'instress'},
                        // {data: 'insupports', name: 'insupport'},
                        // {data: 'inmaterials', name: 'inmaterials'}


                    ]

                });

             
            });
            </script>
<?php }else{ ?>

    <script type="text/javascript">
            var action_bt = "Edit / Delete"
            $(document).ready(function() {
                oTable = $('#isostatus').DataTable({
                    
                    "processing": true,
                    "serverSide": false,
                    "ajax": "<?php echo e(route('isoctrl.isostatusindex')); ?>",
                    "order": [[ 1, "asc" ]],
                    "pageLength" : 8,
                    "columns": [
                        {data: 'name', name: 'name'},
                        {data: 'filename', name: 'filename'},
                        {data: 'deleted', name: 'deleted'},
                        {data: 'progressmax', name: 'progressmax'},        
                        {data: 'perprogress', name: 'perprogress'}
                        // {data: 'instress', name: 'instress'},
                        // {data: 'insupports', name: 'insupport'},
                        // {data: 'inmaterials', name: 'inmaterials'}


                    ]

                });

             
            });
            </script>




<?php } ?>



<br>

 <!-- BUTTONS   -->
    <center>
         <button onclick="location.href='<?php echo e(url('design')); ?>'" type="button" class="btn btn-default btn-lg" style="width:9%"><b>Design</b></button>&nbsp;&nbsp;

        <button onclick="location.href='<?php echo e(url('stress')); ?>'" type="button" class="btn btn-default btn-lg" style="width:9%"><b>Stress</b></button>&nbsp;&nbsp;

        <button onclick="location.href='<?php echo e(url('supports')); ?>'" type="button" class="btn btn-default btn-lg" style="width:9%"><b>Supports</b></button>&nbsp;&nbsp;

        <button onclick="location.href='<?php echo e(url('materials')); ?>'" type="button" class="btn btn-default btn-lg" style="width:9%"><b>Materials</b></button>&nbsp;&nbsp;

        <button onclick="location.href='<?php echo e(url('lead')); ?>'" type="button" class="btn btn-default btn-lg" style="width:9%"><b>Issuer</b></button>&nbsp;&nbsp;

        <button onclick="location.href='<?php echo e(url('iso')); ?>'" type="button" class="btn btn-default btn-lg" style="width:9%"><b>LDE/Isocontrol</b></button>
    </center>

<script type="text/javascript">
    
    setTimeout(function() {
    $('#messages').fadeOut('slow');
}, 10000);

</script>




  </center> 



<!-- SCRIPT PARA BÚSQUEDA POR COLUMNAS   -->


<script type="text/javascript">
    
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#isostatus tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" style="width: 100%;font-size: 12px;font-weight: normal;white-space: nowrap" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#isostatus').DataTable();
 
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

<?php echo $__env->make('layouts.datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>