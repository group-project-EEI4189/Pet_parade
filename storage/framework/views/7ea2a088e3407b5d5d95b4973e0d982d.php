
<?php $__env->startSection('title', 'Manage Adopters'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Adopter List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Pet ID</th>
                <th>Adopter Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $adoptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adoption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($adoption->id); ?></td>
                    <td><?php echo e($adoption->pet_id); ?></td>
                    <td><?php echo e($adoption->name); ?></td>
                    <td><?php echo e($adoption->email); ?></td>
                    <td><?php echo e($adoption->address); ?></td>
                    <td><?php echo e($adoption->phone); ?></td>
                    <td>
                        <form method="POST" action="<?php echo e(route('adoptions.destroy', $adoption->id)); ?>" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to remove this adopter?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\pet_parade_one\resources\views/pets/indexadoption.blade.php ENDPATH**/ ?>