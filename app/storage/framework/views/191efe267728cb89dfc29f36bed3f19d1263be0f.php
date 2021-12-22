<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo e(config('app.name')); ?></title>

    <style>
        .theme-button{
            display: none;
        }
    </style>
    <?php echo $__env->yieldContent('style'); ?>
</head>

<body <?php echo $__env->yieldContent('body-id'); ?> <?php echo $__env->yieldContent('body-class'); ?>>
    <?php echo $__env->yieldContent('nav'); ?>

    <?php echo $__env->yieldContent('menu'); ?>

    <?php echo $__env->yieldContent('body'); ?>

    <?php echo $__env->yieldContent('script'); ?>


</body>

</html>
<?php /**PATH D:\Projects\new-projects-dev\app\resources\views/layouts/app.blade.php ENDPATH**/ ?>