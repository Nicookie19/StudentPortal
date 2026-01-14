<?php $__env->startSection('title', 'Manage Enrollments'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div>
        <h2>Enrollments Management</h2>
        <p>Manage student course enrollments and grades</p>
    </div>
    <div class="page-header-actions">
        <button class="btn-primary" onclick="document.getElementById('addModal').classList.add('active')">+ Enroll Student</button>
    </div>
</div>

<!-- Add Enrollment Modal -->
<div id="addModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Enroll Student in Subject</h3>
            <button onclick="document.getElementById('addModal').classList.remove('active')" style="background: none; border: none; color: var(--text-primary); cursor: pointer; font-size: 1.5rem;">&times;</button>
        </div>
        <form method="POST" action="<?php echo e(route('admin.enrollments.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="student_id">Student *</label>
                <select id="student_id" name="student_id" class="form-control <?php $__errorArgs = ['student_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                    <option value="">Select a student</option>
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($student->id); ?>" <?php echo e(old('student_id') == $student->id ? 'selected' : ''); ?>>
                            <?php echo e($student->student_id); ?> - <?php echo e($student->first_name); ?> <?php echo e($student->last_name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['student_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="subject_id">Subject *</label>
                <select id="subject_id" name="subject_id" class="form-control <?php $__errorArgs = ['subject_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                    <option value="">Select a subject</option>
                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($subject->id); ?>" <?php echo e(old('subject_id') == $subject->id ? 'selected' : ''); ?>>
                            <?php echo e($subject->subject_code); ?> - <?php echo e($subject->subject_name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['subject_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="semester">Semester *</label>
                <select id="semester" name="semester" class="form-control <?php $__errorArgs = ['semester'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                    <option value="1st Semester" <?php echo e(old('semester') == '1st Semester' ? 'selected' : ''); ?>>1st Semester</option>
                    <option value="2nd Semester" <?php echo e(old('semester') == '2nd Semester' ? 'selected' : ''); ?>>2nd Semester</option>
                    <option value="Summer" <?php echo e(old('semester') == 'Summer' ? 'selected' : ''); ?>>Summer</option>
                </select>
                <?php $__errorArgs = ['semester'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="academic_year">Academic Year *</label>
                <input type="text" id="academic_year" name="academic_year" class="form-control <?php $__errorArgs = ['academic_year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                       value="<?php echo e(old('academic_year', '2024-2025')); ?>" required placeholder="e.g., 2024-2025">
                <?php $__errorArgs = ['academic_year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="status">Status *</label>
                <select id="status" name="status" class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                    <option value="enrolled" <?php echo e(old('status') == 'enrolled' ? 'selected' : ''); ?>>Enrolled</option>
                    <option value="completed" <?php echo e(old('status') == 'completed' ? 'selected' : ''); ?>>Completed</option>
                    <option value="dropped" <?php echo e(old('status') == 'dropped' ? 'selected' : ''); ?>>Dropped</option>
                </select>
                <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="document.getElementById('addModal').classList.remove('active')">Cancel</button>
                <button type="submit" class="btn-primary">Enroll Student</button>
            </div>
        </form>
    </div>
</div>

<!-- Filters -->
<div class="card">
    <form method="GET" action="<?php echo e(route('admin.enrollments.index')); ?>" class="search-bar" style="margin-bottom: 0;">
        <select name="student" class="form-control" style="width: 200px;">
            <option value="">All Students</option>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($student->id); ?>" <?php echo e(request('student') == $student->id ? 'selected' : ''); ?>>
                    <?php echo e($student->first_name); ?> <?php echo e($student->last_name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        
        <select name="subject" class="form-control" style="width: 200px;">
            <option value="">All Subjects</option>
            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($subject->id); ?>" <?php echo e(request('subject') == $subject->id ? 'selected' : ''); ?>>
                    <?php echo e($subject->subject_code); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        
        <select name="semester" class="form-control" style="width: 150px;">
            <option value="">All Semesters</option>
            <option value="1st Semester" <?php echo e(request('semester') == '1st Semester' ? 'selected' : ''); ?>>1st Semester</option>
            <option value="2nd Semester" <?php echo e(request('semester') == '2nd Semester' ? 'selected' : ''); ?>>2nd Semester</option>
            <option value="Summer" <?php echo e(request('semester') == 'Summer' ? 'selected' : ''); ?>>Summer</option>
        </select>
        
        <button type="submit" class="btn-primary">Filter</button>
        <a href="<?php echo e(route('admin.enrollments.index')); ?>" class="btn-secondary">Reset</a>
    </form>
</div>

<div class="card">
    <div class="table-container">
        <?php if($enrollments->count() > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Subject</th>
                        <th>Semester</th>
                        <th>Academic Year</th>
                        <th>Status</th>
                        <th>Grade</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $enrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <strong><?php echo e($enrollment->student->first_name); ?> <?php echo e($enrollment->student->last_name); ?></strong><br>
                                <span style="font-size: 0.85rem; color: var(--text-secondary);"><?php echo e($enrollment->student->student_id); ?></span>
                            </td>
                            <td>
                                <strong><?php echo e($enrollment->subject->subject_code); ?></strong><br>
                                <span style="font-size: 0.85rem; color: var(--text-secondary);"><?php echo e($enrollment->subject->subject_name); ?></span>
                            </td>
                            <td><?php echo e($enrollment->semester); ?></td>
                            <td><?php echo e($enrollment->academic_year); ?></td>
                            <td>
                                <?php if($enrollment->status == 'enrolled'): ?>
                                    <span class="badge badge-success">Enrolled</span>
                                <?php elseif($enrollment->status == 'completed'): ?>
                                    <span class="badge badge-info">Completed</span>
                                <?php else: ?>
                                    <span class="badge badge-warning">Dropped</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($enrollment->grade): ?>
                                    <strong><?php echo e($enrollment->grade); ?></strong>
                                <?php else: ?>
                                    <span style="color: var(--text-secondary);">-</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="actions">
                                    <button type="button" class="action-btn edit" onclick="openEditModal(<?php echo e($enrollment->id); ?>, '<?php echo e($enrollment->status); ?>', <?php echo e($enrollment->grade ?? 'null'); ?>)">Update Grade</button>
                                    <form action="<?php echo e(route('admin.enrollments.destroy', $enrollment->id)); ?>" method="POST" style="display: inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="action-btn delete" onclick="return confirmDelete('Are you sure you want to delete this enrollment?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            
            <?php echo e($enrollments->links()); ?>

        <?php else: ?>
            <div style="text-align: center; padding: 40px; color: var(--text-secondary);">
                <p>No enrollments found.</p>
                <button class="btn-primary" style="margin-top: 16px;" onclick="document.getElementById('addModal').classList.add('active')">Enroll First Student</button>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Edit Grade Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Update Enrollment</h3>
            <button onclick="document.getElementById('editModal').classList.remove('active')" style="background: none; border: none; color: var(--text-primary); cursor: pointer; font-size: 1.5rem;">&times;</button>
        </div>
        <form method="POST" id="editForm">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <input type="hidden" name="status" id="editStatus" value="enrolled">
            <div class="form-group">
                <label for="grade">Grade (0-100)</label>
                <input type="number" id="editGrade" name="grade" class="form-control <?php $__errorArgs = ['grade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                       min="0" max="100" step="1" placeholder="Enter grade (leave empty if not yet graded)">
                <?php $__errorArgs = ['grade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="document.getElementById('editModal').classList.remove('active')">Cancel</button>
                <button type="submit" class="btn-primary">Update Enrollment</button>
            </div>
        </form>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
function openEditModal(id, status, grade) {
    document.getElementById('editForm').action = '/admin/enrollments/' + id;
    document.getElementById('editStatus').value = status;
    document.getElementById('editGrade').value = grade || '';
    document.getElementById('editModal').classList.add('active');
}
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin-portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/nico/myproject/resources/views/admin/enrollments/index.blade.php ENDPATH**/ ?>