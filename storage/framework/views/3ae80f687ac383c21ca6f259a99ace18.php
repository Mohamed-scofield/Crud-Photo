<?php $__env->startSection('title', 'Student List'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="text-muted fw-bold mb-0">Student List</h4>
                        <a href="<?php echo e(route('Notes.create')); ?>" class="btn btn-primary">Add Student</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>First</th>
                                    <th>Last</th>
                                    <th>Photos</th>
                                    <th>Notes</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo e($student->id); ?></th>
                                        <td><?php echo e($student->nom); ?></td>
                                        <td><?php echo e($student->prenom); ?></td>
                                        <td>
                                            <?php if($student->photo): ?>
                                                <img src="<?php echo e(asset('storage/' . $student->photo)); ?>"
                                                    alt="Photo de <?php echo e($student->nom); ?>"
                                                    style="width: 60px; height: 50px; border-radius: 50%;">
                                            <?php else: ?>
                                                <span class="text-muted">Aucune photo</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($student->notes->isNotEmpty()): ?>
                                                <?php $__currentLoopData = $student->notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div><?php echo e($note->matiere); ?>: <strong><?php echo e($note->note); ?>/20</strong></div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <span class="text-muted">Aucune note</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('Notes.show', $student)); ?>" class="btn btn-info mb-1"
                                                title="Show detail">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="<?php echo e(route('Notes.edit', $student)); ?>" class="btn btn-primary mb-1"
                                                title="Edit student">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="<?php echo e(route('Notes.destroy', $student)); ?>" method="post"
                                                class="d-inline delete-form">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="button" class="btn btn-danger mb-1 btn-delete"
                                                    title="Delete student">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="text-center text-danger">Aucun étudiant pour le moment !
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            <?php echo e($students->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php if(session('success')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success !',
                text: "<?php echo e(session('success')); ?>",
                showConfirmButton: true,
                timer: 1500
            });
        </script>
    <?php endif; ?>

    <script>
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Confirmer la suppression ?',
                    text: "Cette action est irréversible.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimer',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.closest('form').submit();
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Administrateur\projet-notes\resources\views/Notes/index.blade.php ENDPATH**/ ?>