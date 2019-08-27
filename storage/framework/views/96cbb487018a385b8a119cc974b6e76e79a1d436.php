<?php $__env->startSection('title', 'Quotes'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php if(session('msg')): ?>
            <div class="alert alert-success">
                <p> <?php echo e(session('msg')); ?> </p>
            </div>
        <?php endif; ?>
        <div class="row">
            <?php $__currentLoopData = $quotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="thumbail">
                        <div class="caption"><?php echo e($quote->title); ?></div>
                        <p><a href="/quotes/<?php echo e($quote->slug); ?>" class="btn btn-primary">Lihat Kutipan</a></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
            <p><a href="/home" class="btn btn-primary">Kembali ke Home</a></p>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/webdev/project_kutipan/kutipan/resources/views/quotes/index.blade.php ENDPATH**/ ?>