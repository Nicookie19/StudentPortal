<?php $__env->startSection('title', 'Manage Departments'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div>
        <h2>Departments Management</h2>
        <p>Manage academic departments</p>
    </div>
    <div class="page-header-actions">
        <button class="btn-primary" onclick="document.getElementById('addModal').classList.add('active')">+ Add New Department</button>
    </div>

<!-- Add Department Modal -->
<div id="addModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Add New Department</h3>
            <button onclick="document.getElementById('addModal').classList.remove('active')" style="background: none; border: none; color: var(--text-primary); cursor: pointer; font-size: 1.5rem;">&times;</button>
        </div>
        <form method="POST" action="<?php echo e(route('admin.departments.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="name">Department Name *</label>
                <input type="text" id="name" name="name" class="form-control" required placeholder="e.g., Computer Science">
            </div>
            <div class="form-group">
                <label for="code">Department Code *</label>
                <input type="text" id="code" name="code" class="form-control" required placeholder="e.g., CS">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="3" placeholder="Department description..."></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="document.getElementById('addModal').classList.remove('active')">Cancel</button>
                <button type="submit" class="btn-primary">Create Department</button>
            </div>
        </form>
    </div>

<div class="card">
    <div class="table-container">
        <?php if($departments->count() > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Students</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="font-weight: 600;"><?php echo e($department->code); ?></td>
                            <td><?php echo e($department->name); ?></td>
                            <td>
                                <span class="badge badge-info"><?php echo e($department->students_count); ?> students</span>
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="<?php echo e(route('admin.departments.edit', $department->id)); ?>" class="action-btn edit">Edit</a>
                                    <form action="<?php echo e(route('admin.departments.destroy', $department->id)); ?>" method="POST" style="display: inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="action-btn delete" onclick="return confirmDelete('Are you sure you want to delete this department?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            
            <?php echo e($departments->links()); ?>

        <?php else: ?>
            <div style="text-align: center; padding: 40px; color: var(--text-secondary);">
                <p>No departments found.</p>
                <button class="btn-primary" style="margin-top: 16px;" onclick="document.getElementById('addModal').classList.add('active')">Add First Department</button>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/nico/myproject/resources/views/admin/departments/index.blade.php ENDPATH**/ ?>