<?php $__env->startSection('title'); ?> Person Page <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="text-center">Person</h1>

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
            <tr>
                <th scope="row"> <?php echo e($person->id); ?> </th>
                <td><?php echo e($person->name); ?></td>
                <td><?php echo e($person->height); ?></td>
                <td><?php echo e($person->mass); ?></td>
                <td><?php echo e($person->hair_color); ?></td>
                <td><?php echo e($person->birth_year); ?></td>
                <td><?php echo e($person->gender->gender); ?></td>
                <td><?php echo e($person->homeworld->name); ?></td>
                <td>
                    <?php $__currentLoopData = $person->films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($film->title); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td><?php echo e($person->created); ?></td>
                <td><?php echo e($person->url); ?></td>
            </tr>
            </tbody>
        </table>
        <?php if(!$person->images->isEmpty()): ?>
            <h2>Images</h2>
        <div class="row">
            <?php $__currentLoopData = $person->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col">
                    <img class="img-fluid" src="<?php echo e(asset("/storage/images/$image->name")); ?>">
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="p-0 col">
            <a href="<?php echo e(route('people.edit', $person->id)); ?>" class="btn btn-primary me-2">Edit</a>
            <form class="d-inline-block" action="<?php echo e(route('people.destroy', [$person->id])); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\domains\lvl4\resources\views/show.blade.php ENDPATH**/ ?>