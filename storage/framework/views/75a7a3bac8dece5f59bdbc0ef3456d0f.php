<?php $__env->startSection('title'); ?> Home Page <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="text-center">People</h1>

    <div class="row">
        <table class="table table-bordered col-12 mt-5">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">height</th>
                <th scope="col">mass</th>
                <th scope="col">hair color</th>
                <th scope="col">birth year</th>
                <th scope="col">gender</th>
                <th scope="col">homeworld</th>
                <th scope="col">films</th>
                <th scope="col">created</th>
                <th scope="col">url</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $people; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"> <?php echo e($person->id); ?> </th>
                <td><?php echo e($person->name); ?></td>
                <td><?php echo e($person->height); ?></td>
                <td><?php echo e($person->mass); ?></td>
                <td><?php echo e($person->hair_color); ?></td>
                <td><?php echo e($person->birth_year); ?></td>
                <td><?php echo e($person->gender_id); ?></td>
                <td><?php echo e($person->homeworld_id); ?></td>
                <td>
                    <?php $__currentLoopData = $person->films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($film->title); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td><?php echo e($person->created); ?></td>
                <td><?php echo e($person->url); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-12"><?php echo e($people->links()); ?></div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\domains\lvl4\resources\views/home.blade.php ENDPATH**/ ?>