 
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Items CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('itemCRUD.create')); ?>"> Create New Item</a>
            </div>
        </div>
    </div>

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Equipment</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Hours</th>
            <th>Weight</th>
            <th width="280px">Action</th>
        </tr>
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($i++); ?></td>
        <td><?php echo e($item->name); ?></td>
        <td><?php echo e($item->type); ?></td>
        <td><?php echo e($item->qty); ?></td>
        <td><?php echo e($item->hours); ?></td>
        <td><?php echo e($item->weight); ?></td>
        <td>
            <a class="btn btn-info" href="<?php echo e(route('itemCRUD.show',$item->id)); ?>">Show</a>
            <a class="btn btn-primary" href="<?php echo e(route('itemCRUD.edit',$item->id)); ?>">Edit</a>
            <?php echo Form::open(['method' => 'DELETE','route' => ['itemCRUD.destroy', $item->id],'style'=>'display:inline']); ?>

            <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>

            <?php echo Form::close(); ?>

        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

    <?php echo $items->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>