
<?php $__env->startSection('title', 'Manage Pets'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Pet List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Breed</th>
                <th>Age</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($pet->id); ?></td>
                    <td><img src="<?php echo e(asset('HomePageImages/' . $pet->image)); ?>" alt="Pet Image" width="60"></td>
                    <td><?php echo e($pet->breed); ?></td>
                    <td><?php echo e($pet->age); ?></td>
                    <td><?php echo e($pet->description); ?></td>
                    <td>
                        <a href="<?php echo e(route('pets.edit', $pet->id)); ?>" class="btn-edit">Edit</a>
                        <form method="POST" action="<?php echo e(route('pets.destroy', $pet->id)); ?>" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\pet_parade_one\resources\views/pets/index.blade.php ENDPATH**/ ?>