<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col s12">
    	<div class="card">
    		<div class="card-title">
    			<b><?php echo e($project->name); ?></b><br>
    			Add New Task
    		</div>
    		<div class="card-content">
    			<form action=<?php echo e(url('project/')."/".$project->id); ?> method="POST">
    				<?php echo e(csrf_field()); ?>

    				<div class="row">
	    				<div class="col s12 input-field">
	    					<input placeholder="" name="name" id="name" type="text" class="validate <?php echo e($errors->has('name') ? ' invalid' : ''); ?>">
	    					<label for="name" data-error="<?php echo e($errors->first('name')); ?>">Name</label>
	    				</div>
    				</div>
    				<div class="row">
	    				<div class="col s12 input-field">
	    					<input type="text" placeholder="" name="start_date" id="start_date" class="datepicker <?php echo e($errors->has('start_date') ? ' invalid' : ''); ?>">
	    					<label for="start_date" data-error="<?php echo e($errors->first('start_date')); ?>">Start Date</label>
	    				</div>
    				</div>
    				<div class="row">
	    				<div class="col s12 input-field">
	    					<input type="text" placeholder="" name="end_date" id="end_date" class="datepicker <?php echo e($errors->has('end_date') ? ' invalid' : ''); ?>">
	    					<label for="end_date" data-error="<?php echo e($errors->first('end_date')); ?>">End Date</label>
	    				</div>
    				</div>
    				<div class="row">
	    				<div class="col s12 input-field">
	    					<select class="validate initialized <?php echo e($errors->has('priority') ? ' invalid' : ''); ?>" name="priority" id="priority">
	    						<option value="null" disabled selected>Choose Your Priority</option>
	    						<?php $__currentLoopData = $priority; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prior): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    						<option value="<?php echo e($prior->value); ?>"><?php echo e($prior->text); ?></option>
	    						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    					</select>
	    					<label for="priority" data-error="<?php echo e($errors->first('priority')); ?>">Priority</label>
	    				</div>
    				</div>
    				<div class="row">
	    				<div class="col s12 input-field">
	    					<select class="validate initialized <?php echo e($errors->has('type_task') ? ' invalid' : ''); ?>" name="type_task" id="type_task">
	    						<option value="null" disabled selected>Choose Your Type Task</option>
	    						<?php $__currentLoopData = $type_task; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    						<option value="<?php echo e($type->value); ?>"><?php echo e($type->text); ?></option>
	    						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    					</select>
	    					<label for="type_task" data-error="<?php echo e($errors->first('type_task')); ?>">Type Task</label>
	    				</div>
    				</div>
    				<div class="row">
	    				<div class="col s12 input-field">
	    					 <input type="number" name="poin" id="poin" class="validate <?php echo e($errors->has('poin') ? ' invalid' : ''); ?>" length="255">
	                        <label for="poin" data-error="<?php echo e($errors->first('poin')); ?>">Point</label>
	    				</div>
    				</div>
    				<div class="row">
	    				<div class="col s12 input-field">
	    					 <textarea name="description" id="description" class="materialize-textarea validate <?php echo e($errors->has('description') ? ' invalid' : ''); ?>" length="255"></textarea>
	                        <label for="description" data-error="<?php echo e($errors->first('description')); ?>">Description</label>
	    				</div>
    				</div>
    				<div class="row">
	    				<div class="col s12 input-field">
	    					<p>User to Assign to this task</p><br>
	    					<select class="select2 js-states browser-default <?php echo e($errors->has('user') ? ' invalid' : ''); ?>" name="user[]" id="user" multiple="multiple">
	    						<?php $__currentLoopData = Auth::user()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    						<option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
	    						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    					</select>
	    				</div>
    				</div>
    				<div class="row">
	                	<input type="submit" class="waves-effect waves-light btn blue m-b-xs" value="submit">
	                </div>
    			</form>
    		</div>
    	</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>