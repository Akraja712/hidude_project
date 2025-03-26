

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Orders')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Orders')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5><?php echo e(__('Orders List')); ?></h5>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table" id="pc-dt-simple">
                        <thead>
                            <tr>
                                <th><?php echo e(__('ID')); ?></th>
                                <th><?php echo e(__('User ID')); ?></th>
                                <th><?php echo e(__('User Name')); ?></th>
                                <th><?php echo e(__('User Mobile')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Price')); ?></th>
                                <th><?php echo e(__('Message')); ?></th>
                                <th><?php echo e(__('Datetime')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($order->id); ?></td>  
                                    <td><?php echo e($order->user_id); ?></td>
                                    <td><?php echo e($order->users->name); ?></td>
                                    <td><?php echo e($order->users->mobile); ?></td>
                                    <td>
                                            <?php if($order->status == 0): ?>
                                                <i class="fa fa-clock text-warning"></i> <span class="font-weight-bold"><?php echo e(__('Try')); ?></span>
                                            <?php elseif($order->status == 1): ?>
                                                <i class="fa fa-check-circle text-success"></i> <span class="font-weight-bold"><?php echo e(__('Success')); ?></span>
                                            <?php elseif($order->status == 2): ?>
                                                <i class="fa fa-times-circle text-danger"></i> <span class="font-weight-bold"><?php echo e(__('Cancelled')); ?></span>
                                            <?php else: ?>
                                                <i class="fa fa-question-circle text-secondary"></i> <span class="font-weight-bold"><?php echo e(__('Unknown')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                    <td><?php echo e($order->price); ?></td>
                                    <td><?php echo e($order->message); ?></td>
                                    <td><?php echo e($order->datetime); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTable with default search functionality
        $('#pc-dt-simple').DataTable();
    });

    // Confirmation for delete action
    function confirmDelete(event, speechTextId) {
        event.preventDefault(); // Prevent the default form submission

        // Show a confirmation dialog
        if (confirm("Are you sure you want to delete this speech text?")) {
            // If the user clicks "Yes", submit the delete form
            document.getElementById('delete-form-' + speechTextId).submit();
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u743445510/domains/hidude.in/public_html/resources/views/orders/index.blade.php ENDPATH**/ ?>