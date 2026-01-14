<?php $__env->startSection('title', 'Manage Subjects'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div>
        <h2>Subjects Management</h2>
        <p>Manage all academic subjects</p>
    </div>
    <div class="page-header-actions">
        <a href="<?php echo e(route('admin.subjects.create')); ?>" class="btn-primary">+ Add New Subject</a>
    </div>
</div>

<div class="card">
    <form method="GET" action="<?php echo e(route('admin.subjects.index')); ?>" class="search-bar" style="margin-bottom: 0;">
        <input type="text" name="search" class="form-control" placeholder="Search by code or name..." value="<?php echo e(request('search')); ?>">
        
        <select name="department" class="form-control" style="width: 200px;">
            <option value="">All Departments</option>
            <?php $__currentLoopData = \App\Models\Department::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($department->id); ?>" <?php echo e(request('department') == $department->id ? 'selected' : ''); ?>>
                    <?php echo e($department->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        
        <select name="type" class="form-control" style="width: 150px;">
            <option value="">All Types</option>
            <option value="lecture" <?php echo e(request('type') == 'lecture' ? 'selected' : ''); ?>>Lecture</option>
            <option value="laboratory" <?php echo e(request('type') == 'laboratory' ? 'selected' : ''); ?>>Laboratory</option>
            <option value="both" <?php echo e(request('type') == 'both' ? 'selected' : ''); ?>>Both</option>
        </select>
        
        <button type="submit" class="btn-primary">Search</button>
        <a href="<?php echo e(route('admin.subjects.index')); ?>" class="btn-secondary">Reset</a>
    </form>
</div>

<div class="card">
    <div class="table-container">
        <?php if($subjects->count() > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Units</th>
                        <th>Type</th>
                        <th>Department</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="font-weight: 600;"><?php echo e($subject->subject_code); ?></td>
                            <td><?php echo e($subject->subject_name); ?></td>
                            <td><?php echo e($subject->units); ?></td>
                            <td>
                                <span class="badge badge-info"><?php echo e(ucfirst($subject->type)); ?></span>
                            </td>
                            <td><?php echo e($subject->department->name ?? 'N/A'); ?></td>
                            <td>
                                <div class="actions">
                                    <a href="<?php echo e(route('admin.subjects.show', $subject->id)); ?>" class="action-btn view">View</a>
                                    <a href="<?php echo e(route('admin.subjects.edit', $subject->id)); ?>" class="action-btn edit">Edit</a>
                                    <form action="<?php echo e(route('admin.subjects.destroy', $subject->id)); ?>" method="POST" style="display: inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="action-btn delete" onclick="return confirmDelete('Are you sure you want to delete this subject?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            
            <?php echo e($subjects->links()); ?>

        <?php else: ?>
            <div style="text-align: center; padding: 40px; color: var(--text-secondary);">
                <p>No subjects found.</p>
                <a href="<?php echo e(route('admin.subjects.create')); ?>" class="btn-primary" style="margin-top: 16px;">Add First Subject</a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin-portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/nico/myproject/resources/views/admin/subjects/index.blade.php ENDPATH**/ ?>