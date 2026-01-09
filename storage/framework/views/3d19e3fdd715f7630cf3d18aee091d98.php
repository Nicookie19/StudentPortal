<?php $__env->startSection('title', 'Dashboard - Student Portal'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h2>Welcome, Nico Mahipus</h2>
        <p>Student ID: 240000001368 | Bachelor in Information Technology - 2nd Year</p>
    </div>

    <!-- Quick Links Section -->
    <div class="quick-links-section">
        <div class="card" style="margin-bottom: 0; padding: 20px;">
            <h3 style="margin-bottom: 16px; color: #FFFFFF;">📌 Quick Links</h3>
            <div class="quick-links-grid">
                <a href="https://mail.google.com/mail/u/0/#inbox" target="_blank" class="quick-link-btn">
                    <span class="icon">📧</span>
                    <span>Email</span>
                </a>
                <a href="https://classroom.google.com/u/0/h" target="_blank" class="quick-link-btn">
                    <span class="icon">📚</span>
                    <span>Google Classroom</span>
                </a>
                <a href="<?php echo e(url('/financial-record')); ?>" class="quick-link-btn">
                    <span class="icon">💰</span>
                    <span>Financial Record</span>
                </a>
                <a href="<?php echo e(url('/support-ticket')); ?>" class="quick-link-btn">
                    <span class="icon">🎫</span>
                    <span>Support Ticket</span>
                </a>
                <a href="https://drive.google.com/file/d/1XaD-zY-V39kCgqn3xIHpPjC3xnPwYXTl/view" target="_blank" class="quick-link-btn">
                    <span class="icon">📖</span>
                    <span>Handbook</span>
                </a>
                <a href="<?php echo e(url('/resources')); ?>" class="quick-link-btn">
                    <span class="icon">📂</span>
                    <span>Resources</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content Cards -->
    <div class="card-grid">
        <div class="card">
            <div class="card-header">
                <h3>📅 Today's Classes</h3>
                <span class="card-icon">📆</span>
            </div>
            <ul>
                <li>09:00 AM - 10:30 AM <strong>CS404: Advanced Algorithms</strong></li>
                <li>11:00 AM - 12:30 PM <strong>MATH203: Linear Algebra</strong></li>
                <li>02:00 PM - 04:00 PM <strong>EE201: Circuit Theory Lab</strong></li>
            </ul>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>📊 Recent Grades</h3>
                <span class="card-icon">🎓</span>
            </div>
            <ul>
                <li>PHYS101 Midterm: <strong style="color: #FFFFFF;">A (95%)</strong></li>
                <li>MATH203 Homework 5: <strong style="color: #FFFFFF;">95%</strong></li>
                <li>CS404 Quiz 3: <strong style="color: #FFFFFF;">A-</strong></li>
            </ul>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>📢 Announcements</h3>
                <span class="card-icon">📣</span>
            </div>
            <ul>
                <li>Campus-wide network maintenance on Sunday</li>
                <li>Spring registration is now open</li>
                <li>Library extended hours for finals week</li>
            </ul>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>📅 Upcoming Events</h3>
                <span class="card-icon">🔔</span>
            </div>
            <ul>
                <li>Midterm Examinations - Oct 21-25</li>
                <li>Career Fair 2024 - Oct 28</li>
                <li>Thanksgiving Break - Nov 1-3</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/nico/myproject/resources/views/welcome.blade.php ENDPATH**/ ?>