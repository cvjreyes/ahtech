<?php $__env->startSection('content'); ?>
<?php if($message = Session::get('success')): ?>

<br>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


<script type="text/javascript">
    $(function () {
        $('.add').click(function () {
            var n = ($('.resultbody tr').length - 0) + 1;
            var tr = '<tr><td class="no">' + n + '</td>' +
                    '<td><?php echo Form::select('units_id[]', [null => 'Select Area...'] + $units, null, ['required']); ?></td>'+
                    '<td><?php echo Form::select('tequis_id[]', [null => 'Select Area...'] + $tequis, null, ['required']); ?></td>'+
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
</script>

<br><br><br><br>
<div class="container">


    <!-- <table id="example" class="display" cellspacing="0" width="100%">
        <tr>
            <th>Area</th>
            <th>Type of equipments</th>
            <th>Code</th>
            <th>Hours</th>
            <th>Estimated quantity</th>
            <th>Estimated Hours</th>
            <th width="280px">Action</th>
        </tr>
    <?php $__currentLoopData = $eequis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($item->area); ?></td>
        <td><?php echo e($item->type); ?></td>
        <td><?php echo e($item->code); ?></td>
        <td><?php echo e($item->hours); ?></td>
        <td><?php echo e($item->est_quantity); ?></td>
        <td><?php echo e($item->est_hours); ?></td>

    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table> -->
<button 
                               style="align:right"
                               type="button" 
                               class="btn btn-primary btn-lg" 
                               data-toggle="modal" 
                               data-target="#addequiModal">
                              Add Equipments
                            </button>
<br><br><br>



<table id="eequi" class="table table-hover table-condensed" style="width:100%">
<link href="<?php echo asset('css/jquery.dataTables.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo asset('js/jquery.dataTables.min.js'); ?>"></script>

    <thead>
        <tr>
            <th>Area</th>
            <th>Type of equipments</th>
            <th>Code</th>
            <th>Hours</th>
            <th>Estimated quantity</th>
            <th>Estimated Hours</th>
            <th width="280px">Action</th>
        </tr>
    </thead>
  </table>
</div>

<script type="text/javascript">
var action_bt = "Edit / Delete"
$(document).ready(function() {
    oTable = $('#eequi').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo e(route('equipment.addequi')); ?>",
        "columns": [
            {data: 'area', name: 'area'},
            {data: 'type', name: 'type'},
            {data: 'code', name: 'code'},
            {data: 'hours', name: 'hours'},
            {data: 'est_quantity', name: 'est_quantity'},
            {data: 'est_hours', name: 'est_hours'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]

    });
});
</script>

    

    
</div>

                            
<?php $__env->stopSection(); ?>

<?php echo $__env->make('equipment.editequi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('equipment.createequi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>