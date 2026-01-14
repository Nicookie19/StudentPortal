<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div>
        <h2>Admin Dashboard</h2>
        <p>Welcome to the admin control panel</p>
    </div>
</div>

<!-- Stats Grid -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon blue">👨‍🎓</div>
        <div class="stat-info">
            <h4>Total Students</h4>
            <p><?php echo e($stats['total_students']); ?></p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green">📚</div>
        <div class="stat-info">
            <h4>Total Subjects</h4>
            <p><?php echo e($stats['total_subjects']); ?></p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon yellow">📅</div>
        <div class="stat-info">
            <h4>Schedules</h4>
            <p><?php echo e($stats['total_schedules']); ?></p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon purple">📝</div>
        <div class="stat-info">
            <h4>Enrollments</h4>
            <p><?php echo e($stats['total_enrollments']); ?></p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Quick Actions</h3>
    </div>
    <div class="btn-group">
        <a href="<?php echo e(route('admin.students.create')); ?>" class="btn-primary">+ Add New Student</a>
        <a href="<?php echo e(route('admin.subjects.create')); ?>" class="btn-secondary">+ Add New Subject</a>
        <a href="<?php echo e(route('admin.schedules.create')); ?>" class="btn-secondary">+ Add New Schedule</a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Recent Students</h3>
        <a href="<?php echo e(route('admin.students.index')); ?>" class="btn-secondary btn-sm">View All</a>
    </div>
    <?php if($recent_students->count() > 0): ?>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Year Level</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $recent_students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($student->student_id); ?></td>
                            <td><?php echo e($student->full_name); ?></td>
                            <td><?php echo e($student->department->name ?? 'N/A'); ?></td>
                            <td><?php echo e($student->year_level ?? 'N/A'); ?></td>
                            <td>
                                <span class="badge badge-success"><?php echo e($student->status); ?></span>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
<p style="color: var(--text-secondary);">No students found. <a href="<?php echo e(route('admin.students.create')); ?>" style="color: var(--accent-color);">Add your first student</a></p>
    <?php endif; ?>
</div>

<div class="card">
    <div class="card-header">
        <h3>Departments Overview</h3>
        <a href="<?php echo e(route('admin.departments.index')); ?>" class="btn-secondary btn-sm">Manage</a>
    </div>
    <?php if($departments->count() > 0): ?>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Department</th>
                        <th>Code</th>
                        <th>Students</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($department->name); ?></td>
                            <td><?php echo e($department->code); ?></td>
                            <td><?php echo e($department->students_count); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p style="color: var(--text-secondary);">No departments found. Add departments to organize your subjects and students.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin-portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/nico/myproject/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>