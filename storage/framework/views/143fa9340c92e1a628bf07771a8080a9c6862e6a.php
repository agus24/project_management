<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col s12">
        <div class="page-title">Create New Project</div>
    </div>
    <div class="col s12 m12 l12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"></span><br>
                <div class="bakal-inputan">
                <form action="<?php echo e(url('project/new')); ?>" method="POST">
                	<?php echo e(csrf_field()); ?>

	                <div class="row">
	                    <div class="input-field col s12">
	                        <input placeholder="" name="name" id="name" type="text" class="validate <?php echo e($errors->has('name') ? ' invalid' : ''); ?>">
	                        <label for="name" data-error="<?php echo e($errors->first('name')); ?>">Project Name</label>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="input-field col s12">
	                        
	                        <textarea name="description" id="description" class="materialize-textarea validate <?php echo e($errors->has('description') ? ' invalid' : ''); ?>" length="255"></textarea>
	                        <label for="description" data-error="<?php echo e($errors->first('description')); ?>">Description</label>
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
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>