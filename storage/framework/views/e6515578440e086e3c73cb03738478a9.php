<?php $__env->startSection('title', 'Manage Students'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div>
        <h2>Students Management</h2>
        <p>Manage all registered students (30 students per year level)</p>
    </div>
    <div class="page-header-actions">
        <a href="<?php echo e(route('admin.students.create')); ?>" class="btn-primary">+ Add New Student</a>
    </div>
</div>

<!-- Search and Filters -->
<div class="card">
    <form method="GET" action="<?php echo e(route('admin.students.index')); ?>" class="search-bar" style="margin-bottom: 0;">
        <input type="text" name="search" class="form-control" placeholder="Search by name or student ID..." value="<?php echo e(request('search')); ?>">
        
        <select name="department" class="form-control" style="width: 200px;">
            <option value="">All Departments</option>
            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($department->id); ?>" <?php echo e(request('department') == $department->id ? 'selected' : ''); ?>>
                    <?php echo e($department->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        
        <select name="status" class="form-control" style="width: 150px;">
            <option value="">All Status</option>
            <option value="active" <?php echo e(request('status') == 'active' ? 'selected' : ''); ?>>Active</option>
            <option value="inactive" <?php echo e(request('status') == 'inactive' ? 'selected' : ''); ?>>Inactive</option>
            <option value="graduated" <?php echo e(request('status') == 'graduated' ? 'selected' : ''); ?>>Graduated</option>
        </select>
        
        <button type="submit" class="btn-primary">Search</button>
        <a href="<?php echo e(route('admin.students.index')); ?>" class="btn-secondary">Reset</a>
    </form>
</div>

<!-- Year Level Navigation -->
<div class="card">
    <div class="card-header">
        <h3>👥 Enrolled Students by Year Level</h3>
        <span class="card-icon">👨‍🎓</span>
    </div>
    
    <!-- Year Level Tabs -->
    <div style="display: flex; gap: 8px; margin-bottom: 20px; flex-wrap: wrap;">
        <?php $__currentLoopData = $yearLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $yearLevel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="#year-<?php echo e(str_replace(' ', '-', $yearLevel)); ?>" class="tab-btn <?php echo e($index === 0 ? 'active' : ''); ?>">
                <?php echo e($yearLevel); ?>

                <span class="badge badge-primary" style="margin-left: 4px;">
                    <?php echo e($studentsByYear[$yearLevel]->count()); ?>

                </span>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Students by Year Level -->
    <?php $__currentLoopData = $yearLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $yearLevel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div id="year-<?php echo e(str_replace(' ', '-', $yearLevel)); ?>" class="year-section" style="margin-bottom: 30px;">
            <div class="section-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                <h4 style="color: var(--primary-color); margin: 0;">
                    📚 <?php echo e($yearLevel); ?> Students
                    <span style="font-size: 0.8em; color: var(--text-secondary);">(Showing <?php echo e($studentsByYear[$yearLevel]->count()); ?> of 30)</span>
                </h4>
                <span class="badge badge-info"><?php echo e($studentsByYear[$yearLevel]->count()); ?> Students</span>
            </div>
            
            <?php if($studentsByYear[$yearLevel]->count() > 0): ?>
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $studentsByYear[$yearLevel]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($student->student_id); ?></td>
                                    <td><?php echo e($student->full_name); ?></td>
                                    <td><?php echo e($student->user->email ?? 'N/A'); ?></td>
                                    <td><?php echo e($student->department->name ?? 'N/A'); ?></td>
                                    <td>
                                        <?php if($student->status == 'active'): ?>
                                            <span class="badge badge-success">Active</span>
                                        <?php elseif($student->status == 'inactive'): ?>
                                            <span class="badge badge-warning">Inactive</span>
                                        <?php else: ?>
                                            <span class="badge badge-info"><?php echo e($student->status); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <a href="<?php echo e(route('admin.students.show', $student->id)); ?>" class="action-btn view">View</a>
                                            <a href="<?php echo e(route('admin.students.edit', $student->id)); ?>" class="action-btn edit">Edit</a>
                                            <form action="<?php echo e(route('admin.students.destroy', $student->id)); ?>" method="POST" style="display: inline;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="action-btn delete" onclick="return confirmDelete('Are you sure you want to delete this student?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div style="text-align: center; padding: 40px; color: var(--text-secondary); background: var(--bg-secondary); border-radius: 8px;">
                    <p>No students found in this year level.</p>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<!-- Summary Stats -->
<div class="card-grid" style="margin-top: 20px;">
    <div class="card">
        <div class="card-header">
            <h3>📊 Student Statistics</h3>
        </div>
        <ul>
            <li><strong>Total Students Displayed:</strong> <?php echo e($totalDisplayed); ?></li>
            <li><strong>Students per Year Level:</strong> 30 max</li>
            <li><strong>Departments:</strong> <?php echo e($departments->count()); ?></li>
        </ul>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>📚 By Year Level</h3>
        </div>
        <ul>
            <?php $__currentLoopData = $yearLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $yearLevel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <strong><?php echo e($yearLevel); ?>:</strong> 
                    <?php echo e($studentsByYear[$yearLevel]->count()); ?> students
                    <?php if($studentsByYear[$yearLevel]->count() >= 30): ?>
                        <span class="badge badge-success">Max Reached</span>
                    <?php endif; ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>

<script>
    // Smooth scroll for year level tabs
    document.querySelectorAll('.tab-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            document.querySelector(targetId).scrollIntoView({
                behavior: 'smooth'
            });
            
            // Update active tab
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin-portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/nico/myproject/resources/views/admin/students/index.blade.php ENDPATH**/ ?>