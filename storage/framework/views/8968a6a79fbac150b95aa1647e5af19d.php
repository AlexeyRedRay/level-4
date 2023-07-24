<?php $__env->startSection('title'); ?> Home Page <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="text-center">People</h1>

    <?php echo $__env->make('people-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\domains\lvl4\resources\views/people.blade.php ENDPATH**/ ?>