<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col s12">
    	<div class="card">
    		<div class="card-title" style="margin-left:1px">
    			<b style="font-size:30px"><?php echo e($project->name); ?></b>
            </div>
            <div class="card-content">
                <p><?php echo e($project->description); ?></p>
            </div>
            <div>
                <form method="POST" id="form" action="<?php echo e(url('project/'.$project->id."/delete")); ?>">
                    <?php echo e(method_field('DELETE')); ?>

                    <?php echo e(csrf_field()); ?>

                    <a href="<?php echo e(url('project/'.$project->id."/edit")); ?>"><i class="material-icons small">mode_edit</i></a>
                    <a href="javascript:document.getElementById('form').submit()"><i class="material-icons small">delete</i></a>
                </form>
            </div>
    	</div>
	</div>
</div>
<div class="row">
    <div class="col s12">
        <div class="page-title">Task List</div>
    </div>
    <div class="col s12 m12 l12">
        <div class="card">
            <div class="card-content">
            <?php if(Auth::user()->id == $project->pic): ?>
            <a href="<?php echo e(url('project'."/".$project->id."/addTask")); ?>" class="waves-effect waves-light btn teal">Add new Task</a>
            <?php endif; ?>
            	<table class="table responsive" id="dtbl">
            		<thead>
            			<th>No. </th>
            			<th>Date</th>
            			<th>Name</th>
                        <th>Poin</th>
                        <th>Priority</th>
                        <th>Type Task</th>
                        <th>Description</th>
            			<th>Status</th>
            			<th>#</th>
            		</thead>
            		<tbody>
            			<?php $__currentLoopData = $tasks->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        				<tr>
        					<td><?php echo e($key +1); ?>.</td>
        					<td><?php echo e($task->start_date." - ".$task->end_date); ?></td>
        					<td><?php echo e($task->name); ?></td>
        					<td><?php echo e($task->poin); ?></td>
                            <td>
                                <div class="chip <?php echo e(($task->priority == 3) ? "green" : (($task->priority == 2) ? "yellow darken-1" : "red")); ?>" style="color:white">
                                    <span style=""><?php echo e($task->priority_name); ?></span>
                                </div>
                            </td>
                            <td><?php echo e($task->type_task_name); ?></td>
                            <td><?php echo e($task->description); ?></td>
                            <td><?php echo e($task->status == 1 ? "Done" : "Not Yet Done"); ?></td>
                            <td>
        						<a class="btn-floating btn-medium waves-effect waves-light green" href="<?php echo e(url('project/'.$project->id.'/task')."/".$task->id); ?>"><i class="material-icons">search</i></a>
        						<?php if(Auth::user()->id == $project->pic): ?>
        						<a class="waves-effect waves-light btn teal"> Edit</a>
        						<a class="waves-effect waves-light btn red"> Delete</a>
        						<?php endif; ?>
        					</td>
        				</tr>
            			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
// $('#dtbl').DataTable();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>