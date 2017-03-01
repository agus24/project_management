<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col s12">
    	<div class="card">
    		<div class="card-title">
    			<?php echo e($project->name); ?>

    		</div>
    		<div class="card-content">
    			<p><?php echo e($project->description); ?></p>
    		</div>
    	</div>
	</div>
</div>
<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-title">
				<?php echo e($task->name); ?>

			</div>
			<div class="card-content">
				<table class="table bordered stripped">
					<tr>
						<td>
							<b>Point</b>
						</td><td>
							<?php echo e($task->poin); ?>

						</td>
					</tr>
					<tr>
						<td>
							<b>Start Date</b>
						</td><td>
							<?php echo e($task->start_date); ?>

						</td>
					</tr>
					<tr>
						<td>
							<b>End Date</b>
						</td><td>
							<span style="<?php echo e(($task->end_date < Carbon\Carbon::now()) ? "Color:red" : ''); ?>">
								<?php echo e($task->end_date); ?>

							</span>
						</td>
					</tr>
					<tr>
						<td>
							<b>Priority</b>
						</td><td>
						<div class="chip <?php echo e(($task->priority == 3) ? "green" : (($task->priority == 2) ? "yellow darken-1" : "red")); ?>" style="color:white">
							<?php echo e($priority_name); ?>

							</div>
						</td>
					</tr>
					<tr>
						<td>
							<b>Type Task</b>
						</td><td>
							<?php echo e($type_task_name); ?>

						</td>
					</tr>
					<tr>
						<td>
							<b>Status</b>
						</td><td>
							<?php echo e(($task->status == 1) ? "Done" : "Not Yet Done"); ?>

						</td>
					</tr>
					<tr>
						<td>
							<b>User Assigned</b>
						</td>
						<td>
							<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($key != 0): ?>
								<?php echo e(','); ?>

							<?php endif; ?>
								&nbsp;<?php echo e($user->name); ?>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>