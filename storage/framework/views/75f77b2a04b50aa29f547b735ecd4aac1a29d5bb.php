<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col s12">
        <div class="page-title">Dashboard</div>
    </div>
    <div class="col s12 m12 l12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"></span><br>
                <div class="row">
                    <center>
                        <h4>Welcome <?php echo e(Auth::user()->name); ?></h4>
                    </center>
                </div>
                <div class="row">
                    <table class="table responsive">
                        <thead>
                            <th>No.</th>
                            <th>Task Name</th>
                            <th>Date</th>
                            <th>Details</th>
                            <th>#</th>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key+1); ?>.</td>
                            <td><?php echo e($task->name); ?></td>
                            <td><?php echo e($task->start_date." - ".$task->end_date); ?></td>
                            <td><?php echo e($task->description); ?></td>
                            <td><a href="<?php echo e(url("project/".$task->project_id."/task"."/".$task->id)); ?>" class="waves-effect waves-light btn teal">Detail</a>
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
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>