<?php $__env->startSection('content'); ?>
<div class="container-fluid app-body">
    <div class="card">
        <div class="card-header">
            <h5>Recent Post Sent To Buffer</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <form class="input-group" method="get" action="<?php echo e('/search'); ?>">
                    <div class="row">
                        <input type="text" name="search" class="form-control" placeholder="search" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="row">
                        <label for="date">Date:</label>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="row">
                        <label for="group">Groups</label>
                        <select name="group" class="form-control">
                            <option disabled selected>All Groups</option>
                            
                                <option> Name </option>
                            
                        </select>
                    </div>
                </form>
            </div>
            <?php if(count($buffer) > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Group Name</th>
                        <th>Group Type</th>
                        <th>Account Name</th>
                        <th>Post Text</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $buffer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(optional($item->groupInfo)->name); ?></td>
                        <td><?php echo e(optional($item->groupInfo)->type); ?></td>
                        <td>
                            <img src="<?php echo e(optional($item->accountInfo)->avatar); ?>"
                                style="width: 50px; height: 50px; border-radius: 50%;">
                        </td>
                        <td><?php echo e($item->post_text); ?></td>
                        <td><?php echo e($item->created_at->format('d F Y h:i e')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="text-center">
                <?php echo e($buffer->links()); ?>

            </div>
            <?php else: ?>
            <h4 class="text-center">No data found</h4>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>