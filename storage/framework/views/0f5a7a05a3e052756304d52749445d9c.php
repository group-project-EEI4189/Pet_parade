
<?php $__env->startSection('title', 'Edit Pet Details'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Edit Pet</h1>
    <form method="POST" action="<?php echo e(route('pets.update', $pet->id)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <label>Breed</label>
        <input type="text" name="breed" value="<?php echo e($pet->breed); ?>" required>

        <label>Age</label>
        <input type="number" name="age" value="<?php echo e($pet->age); ?>" required>

        <label>Description</label>
        <textarea name="description" required><?php echo e($pet->description); ?></textarea>

        <label>Upload New Image (optional)</label>
        <input type="file" name="image">

        <button type="submit">Update</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\pet_parade_one\resources\views/pets/edit.blade.php ENDPATH**/ ?>