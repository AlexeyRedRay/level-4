<?php $__env->startSection('title'); ?>Homeland Search <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="text-center">Homeland Search</h1>

    <form method="post" action="<?php echo e(route('homeland.search')); ?>" enctype="multipart/form-data" class="mb-5">
    <?php echo csrf_field(); ?>
        <label for="homeworlds" class="form-label">select homeworlds</label>
        <select name="homeworld_id" class="form-select mb-2"  id="homeworlds" size="6" required>
            <?php $__currentLoopData = $homeworlds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <button type="submit" class="btn btn-primary">submit</button>
    </form>

<?php if(isset($people)): ?>
    <h2>People from <?php echo e($homeworld); ?></h2>
    <?php echo $__env->make('people-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\domains\lvl4\resources\views/homeland.blade.php ENDPATH**/ ?>