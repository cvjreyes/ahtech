
    <table class="table table-bordered">
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
    </table>