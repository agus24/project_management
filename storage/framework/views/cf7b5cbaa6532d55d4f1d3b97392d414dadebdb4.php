<ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
    <li class="no-padding">
        <a class="waves-effect waves-grey" href="<?php echo e(url('home')); ?>">
            <i class="material-icons">dashboard</i>Home
        </a>
    </li>
    <li class="no-padding">
        <a class="waves-effect waves-grey" href="<?php echo e(url('project/new')); ?>">
            <i class="material-icons">library_add</i>Add New Project
        </a>
    </li>
    <li class="no-padding">
        <a class="collapsible-header waves-effect waves-grey">
            <i class="material-icons">list</i>Project List<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
        <div class="collapsible-body">
            <ul>
                <li><a href="<?php echo e(url('project/all')); ?>">Show All Project</a></li>
                <?php $__currentLoopData = Auth::user()->filterProject()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(url('project/'.$projects->id)); ?>"><?php echo e($projects->name); ?></a></li>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </li>
</ul>