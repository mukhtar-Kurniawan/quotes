<?php $__env->startSection('title', 'Creating Quotes'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if(count($errors)>0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <?php echo e($error); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>

    <?php endif; ?>

    <?php if(session('msg')): ?>
        <div class="alert alert-danger">
            <p> <?php echo e(session('msg')); ?> </p>
        </div>

    <?php endif; ?>

    <form method="POST" action="/quotes/<?php echo e($quote->id); ?>">
        <div class="form-group">
            <label for="title">Judul</label>
            <input id="text" class="form-control" type="text" name="title"
                value="<?php echo e((old('title')) ? old('title') : $quote->title); ?>" placeholder="Tulis judul di sini">
        </div>

        <div class="form-group">
            <label for="subject">Isi Kutipan</label>
            <textarea name="subject" class="form-control" id="" cols="30" rows="10"
                ><?php echo e((old('subject')) ? old('subject') : $quote->subject); ?></textarea>
        </div>

        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="_method" value="PUT">
        <button type="submit" class="btn btn-default btn-block">Edit Kutipan</button>
    </form>
        <p><a href="/quotes/<?php echo e($quote->slug); ?>" class="btn btn-primary">Ga jadi hehe</a></p>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/webdev/project_kutipan/kutipan/resources/views/quotes/edit.blade.php ENDPATH**/ ?>