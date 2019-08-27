<?php $__env->startSection('title', strval($quote->title)); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4"><?php echo e($quote->title); ?></h1>
        <p class="lead"><?php echo e($quote->subject); ?></p>
        <p>Ditulis oleh : <?php echo e($quote->user->name); ?> </p>

        <p><a href="/quotes" class="btn btn-primary btn-lg">Kembali ke daftar</a></p>

        <?php if($quote->userIsOwner()): ?>
            <p><a href="/quotes/<?php echo e($quote->id); ?>/edit" class="btn btn-primary btn-lg">Edit</a></p>
            <form method="POST" action="/quotes/<?php echo e($quote->id); ?>">
                <button type="submit" class="btn btn-danger">Hapus Kutipan</button>
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="_method" value="DELETE">
            </form>
        <?php endif; ?>

    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/webdev/project_kutipan/kutipan/resources/views/quotes/single.blade.php ENDPATH**/ ?>