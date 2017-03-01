<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col s12">
		<div class="page-title">
			Project List
		</div>
		<div class="page-content">
			<table>
				<thead>
					<th>No.</th>
					<th>Project Name</th>
					<th>PIC</th>
					<th width="10%">#</th>
				</thead>
				<tbody>
				<?php $__currentLoopData = $project; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($key+1); ?></td>
						<td><?php echo e($value->name); ?></td>
						<td><?php echo e($value->pic_name); ?></td>
						<?php if($value->pic == Auth::user()->id): ?>
						<td><input type="submit" class="waves-effect waves-light btn blue m-b-xs" value="Edit"></td>
						<?php endif; ?>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>