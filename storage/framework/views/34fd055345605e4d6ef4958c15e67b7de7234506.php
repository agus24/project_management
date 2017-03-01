<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        
        <!-- Title -->
        <title><?php echo e(config('app.name','Laravel')); ?></title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/plugins/materialize/css/materialize.min.css')); ?>"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?php echo e(asset('assets/plugins/material-preloader/css/materialPreloader.min.css')); ?>" rel="stylesheet"> 
        <link href="<?php echo e(asset('assets/plugins/select2/css/select2.css')); ?>" rel="stylesheet"> 
       
            
        <!-- Theme Styles -->
        <link href="<?php echo e(asset('assets/css/alpha.min.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(asset('assets/css/custom.css')); ?>" rel="stylesheet" type="text/css"/>
        
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
<body>
    <?php echo $__env->make('layouts.loader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="mn-content fixed-sidebar fixed-sidebar-on-hidden">
        <?php echo $__env->make('layouts.settings', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <main class="mn-inner">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <div id="chpass" class="modal">
        <div class="modal-content">
            <h4>Change Password</h4>
            <form action="<?php echo e(url('changePassword')); ?>" method="POST" id="formPwd">
            <?php echo e(method_field('PUT')); ?>

            <?php echo e(csrf_field()); ?>

            <div class="row">
                <div class="col s12 input-field">
                    <input placeholder="" name="old_password" id="old_password" type="password" class="validate <?php echo e($errors->has('old_password') ? ' invalid' : ''); ?>">
                    <label for="old_password" data-error="<?php echo e($errors->first('old_password')); ?>">Old Password</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 input-field">
                    <input placeholder="" name="new_password" id="new_password" type="password" class="validate <?php echo e($errors->has('new_password') ? ' invalid' : ''); ?>">
                    <label for="new_password" data-error="<?php echo e($errors->first('new_password')); ?>">New Password</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 input-field">
                    <input placeholder="" name="confirm_password" id="confirm_password" type="password" class="validate <?php echo e($errors->has('confirm_password') ? ' invalid' : ''); ?>">
                    <label for="confirm_password" data-error="<?php echo e($errors->first('confirm_password')); ?>">Confirm Password</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a type="submit" class="waves-effect waves-light btn blue m-b-xs" href="javascript:document.getElementById('formPwd').submit()">Submit</a>
        </div>
        </form>
    </div>
    <!-- Scripts -->
        <script src="<?php echo e(asset('assets/plugins/jquery/jquery-2.2.0.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/materialize/js/materialize.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/material-preloader/js/materialPreloader.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/jquery-blockui/jquery.blockui.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/alpha.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/pages/form_elements.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/pages/form-select2.js')); ?>"></script>
        <?php echo $__env->yieldContent('script'); ?>
        <?php if($errors->has('pwd')): ?>
        <script>
               Materialize.toast('Wrong Password !', 4000);
        </script>
        <?php endif; ?>
</body>
</html>
