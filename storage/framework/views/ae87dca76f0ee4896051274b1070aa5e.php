<?php $__env->startSection('title', 'Manage Schedules'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div>
        <h2>Schedules Management</h2>
        <p>Manage class schedules and time slots</p>
    </div>
    <div class="page-header-actions">
        <a href="<?php echo e(route('admin.schedules.create')); ?>" class="btn-primary">+ Add New Schedule</a>
    </div>
</div>

<!-- Search and Filters -->
<div class="card">
    <form method="GET" action="<?php echo e(route('admin.schedules.index')); ?>" class="search-bar" style="margin-bottom: 0;">
        <input type="text" name="search" class="form-control" placeholder="Search by subject..." value="<?php echo e(request('search')); ?>">
        
        <select name="day" class="form-control" style="width: 150px;">
            <option value="">All Days</option>
            <?php $__currentLoopData = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($day); ?>" <?php echo e(request('day') == $day ? 'selected' : ''); ?>><?php echo e($day); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        
        <select name="semester" class="form-control" style="width: 150px;">
            <option value="">All Semesters</option>
            <option value="1st Semester" <?php echo e(request('semester') == '1st Semester' ? 'selected' : ''); ?>>1st Semester</option>
            <option value="2nd Semester" <?php echo e(request('semester') == '2nd Semester' ? 'selected' : ''); ?>>2nd Semester</option>
            <option value="Summer" <?php echo e(request('semester') == 'Summer' ? 'selected' : ''); ?>>Summer</option>
        </select>
        
        <button type="submit" class="btn-primary">Search</button>
        <a href="<?php echo e(route('admin.schedules.index')); ?>" class="btn-secondary">Reset</a>
    </form>
</div>

<!-- Schedule by Day (Portal Style) -->
<?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($schedulesByDay[$day]->count() > 0): ?>
        <div class="card" style="margin-bottom: 16px;">
            <div class="card-header" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);">
                <h3 style="color: white;">📅 <?php echo e($day); ?></h3>
                <span style="color: rgba(255,255,255,0.8);"><?php echo e($schedulesByDay[$day]->count()); ?> classes</span>
            </div>
            <div class="table-container" style="margin-top: 0;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Subject</th>
                            <th>Section</th>
                            <th>Room</th>
                            <th>Semester</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $schedulesByDay[$day]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <strong><?php echo e(\Carbon\Carbon::parse($schedule->start_time)->format('h:i A')); ?></strong>
                                    -
                                    <?php echo e(\Carbon\Carbon::parse($schedule->end_time)->format('h:i A')); ?>

                                </td>
                                <td>
                                    <strong><?php echo e($schedule->subject->subject_code); ?></strong><br>
                                    <span style="font-size: 0.85em; color: var(--text-secondary);">
                                        <?php echo e($schedule->subject->subject_name); ?>

                                    </span>
                                </td>
                                <td style="text-align: center;">
                                    <span class="badge badge-primary"><?php echo e($schedule->section); ?></span>
                                </td>
                                <td style="text-align: center;"><?php echo e($schedule->room ?? 'TBA'); ?></td>
                                <td><?php echo e($schedule->semester ?? 'N/A'); ?></td>
                                <td>
                                    <div class="actions">
                                        <a href="<?php echo e(route('admin.schedules.edit', $schedule->id)); ?>" class="action-btn edit">Edit</a>
                                        <form action="<?php echo e(route('admin.schedules.destroy', $schedule->id)); ?>" method="POST" style="display: inline;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="action-btn delete" onclick="return confirmDelete('Are you sure you want to delete this schedule?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if($schedules->count() == 0): ?>
    <div class="card">
        <div style="text-align: center; padding: 40px; color: var(--text-secondary);">
            <p>No schedules available.</p>
            <a href="<?php echo e(route('admin.schedules.create')); ?>" class="btn-primary" style="margin-top: 16px;">Add First Schedule</a>
        </div>
    </div>
<?php endif; ?>

<!-- Summary -->
<div class="card-grid" style="margin-top: 20px;">
    <div class="card">
        <div class="card-header">
            <h3>📊 Schedule Summary</h3>
        </div>
        <ul>
            <li><strong>Total Classes:</strong> <?php echo e($schedules->count()); ?></li>
            <li><strong>Unique Days:</strong> <?php echo e($schedules->pluck('day_of_week')->unique()->count()); ?></li>
            <li><strong>Unique Subjects:</strong> <?php echo e($schedules->pluck('subject_id')->unique()->count()); ?></li>
        </ul>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>🕐 Time Distribution</h3>
        </div>
        <ul>
            <li><strong>Morning (8AM-12PM):</strong> <?php echo e($schedules->filter(function($s) { return \Carbon\Carbon::parse($s->start_time)->hour < 12; })->count()); ?> classes</li>
            <li><strong>Afternoon (12PM-5PM):</strong> <?php echo e($schedules->filter(function($s) { return \Carbon\Carbon::parse($s->start_time)->hour >= 12 && \Carbon\Carbon::parse($s->start_time)->hour < 17; })->count()); ?> classes</li>
            <li><strong>Evening (5PM+):</strong> <?php echo e($schedules->filter(function($s) { return \Carbon\Carbon::parse($s->start_time)->hour >= 17; })->count()); ?> classes</li>
        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin-portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/nico/myproject/resources/views/admin/schedules/index.blade.php ENDPATH**/ ?>