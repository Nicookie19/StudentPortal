<?php $__env->startSection('title', 'Profile - Student Portal'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h2>User Profile</h2>
        <p>Manage your account settings</p>
    </div>

    <div class="card-grid">
        <div class="card">
            <div class="card-header">
                <h3>👤 Student Information</h3>
                <span class="card-icon">📋</span>
            </div>
            <ul>
                <li><strong>Name:</strong> Nico Mahipus</li>
                <li><strong>Student ID:</strong> 240000001368</li>
                <li><strong>Email:</strong> nmahipus_240000001368@uic.edu.ph</li>
                <li><strong>Major:</strong> Bachelor in Information Technology</li>
                <li><strong>Year Level:</strong> 2nd Year</li>
                <li><strong>Status:</strong> Enrolled</li>
            </ul>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>⚙️ Account Settings</h3>
                <span class="card-icon">🔧</span>
            </div>
            <ul>
                <li><a href="#">Change Password</a></li>
                <li><a href="#">Notification Preferences</a></li>
                <li><a href="#">Privacy Settings</a></li>
                <li><a href="#">Update Contact Info</a></li>
                <li><a href="#">Two-Factor Authentication</a></li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/nico/myproject/resources/views/profile.blade.php ENDPATH**/ ?>