<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="<?php echo e(asset('admin/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/mdb.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/sidenav.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/responsive.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/datatables.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/bootstrap-colorpicker.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/datatables-select.min.css')); ?>" rel="stylesheet">
    <style>
        .topbar {
            margin-top: -24px !important;
        }
    </style>
    <?php echo $__env->yieldContent('css'); ?>;
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="fix-header fix-sidebar">

    <?php echo $__env->make('admin.Layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




    <?php echo $__env->yieldContent('content'); ?>



    </div>
    </div>
    <script type="text/javascript" src="<?php echo e(asset('admin/js/jquery-3.4.1.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin/js/popper.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin/js/bootstrap.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin/js/mdb.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin/js/jquery.slimscroll.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin/js/sidebarmenu.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin/js/sticky-kit.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin/js/custom.min-2.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin/js/datatables.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin/js/datatables-select.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin/js/axios.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin/js/bootstrap-colorpicker.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin/js/custom.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>

    <?php echo $__env->yieldContent('script'); ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/admin/Layouts/app.blade.php ENDPATH**/ ?>