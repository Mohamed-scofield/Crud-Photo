<?php $__env->startSection('title', 'Detail student'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="text-muted fw-bold">Student Detail</h3>
                        <a href="<?php echo e(route('Notes.index')); ?>" class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">
                        <p><strong>First Name:</strong> <?php echo e($student->nom); ?></p>
                        <p><strong>Last Name:</strong> <?php echo e($student->prenom); ?></p>
                        <?php if($student->notes->isNotEmpty()): ?>
                            <?php $__currentLoopData = $student->notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div><?php echo e($note->matiere); ?>: <strong><?php echo e($note->note); ?>/20</strong>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <span class="text-muted">Aucune note</span>
                        <?php endif; ?>
                        <p><strong>Email:</strong> <?php echo e($student->email); ?></p>
                        <?php if($student->photo): ?>
                            <img src="<?php echo e(asset('storage/' . $student->photo)); ?>" alt="photo de  <?php echo e($student->nom); ?>"
                                class="img-thumbnail" style="with:150px;height:150px">
                        <?php else: ?>
                            <p>Aucune photo disponible.</p>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Administrateur\projet-notes\resources\views/Notes/show.blade.php ENDPATH**/ ?>