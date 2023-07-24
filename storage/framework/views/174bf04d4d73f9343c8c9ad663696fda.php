<?php $__env->startSection('title'); ?> Edit <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row mt-5">
        <form method="post" action="<?php echo e(route('people.update', $person->id)); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form-people','data' => ['person' => $person,'homeworlds' => $homeworlds,'genders' => $genders,'films' => $films,'filmsId' => $films_id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form-people'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['person' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($person),'homeworlds' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($homeworlds),'genders' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($genders),'films' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($films),'films_id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($films_id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>

            <?php if(!$person->images->isEmpty()): ?>
                <p class="fs-2">mark the images to delete:</p>
                <div class="row">
                    <?php $__currentLoopData = $person->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col">
                            <input name="del-images[]" class="form-check-input" type="checkbox" value="<?php echo e($image->name); ?>">
                            <img class="img-fluid" src="<?php echo e(asset("/storage/images/$image->name")); ?>">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\domains\lvl4\resources\views/edit.blade.php ENDPATH**/ ?>