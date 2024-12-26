
<?php $__env->startSection('title', 'Add New Pet'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Add Pet</h1>
    <form method="POST" action="<?php echo e(route('pets.store')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="breed">Breed</label>
            <input type="text" id="breed" name="breed" required>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" id="age" name="age" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Pet Image</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn">Save Pet</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\pet_parade_one\resources\views/pets/create.blade.php ENDPATH**/ ?>