<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-title">
				Edit
			</div>
			<div class="card-content">
				<form method="POST" action="<?php echo e(url('project/'.$project->id)); ?>">
					<?php echo e(method_field('PATCH')); ?>

					<?php echo e(csrf_field()); ?>

					<div class="row">
						<div class="input-field col s12">
							<input placeholder="" name="name" id="name" type="text" class="validate <?php echo e($errors->has('name') ? ' invalid' : ''); ?>" value="<?php echo e(old('name') ? old('name') : $project->name); ?>">
	                        <label for="name" data-error="<?php echo e($errors->first('name')); ?>">Project Name</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<textarea name="description" id="description" class="materialize-textarea validate <?php echo e($errors->has('description') ? ' invalid' : ''); ?>" placeholder="" length="1000"><?php echo e(old('description') ? old('description') : $project->description); ?></textarea>
							<label for="" data-error="<?php echo e($errors->first('description')); ?>" >Description</label>
						</div>
					</div>
					<div class="row">
						<input type="submit" class="waves-effect waves-light btn teal" value="submit">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>