<?php $__env->startSection('title', 'Resources - Student Portal'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h2>Resources</h2>
        <p>Digital library and learning materials</p>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>🔍 Library Catalog</h3>
            <span class="card-icon">📖</span>
        </div>
        <div style="display: flex; gap: 12px; margin-top: 16px;">
            <input type="text" class="form-control" placeholder="Search for books, journals, or resources..." style="flex: 1;">
            <button class="btn-primary">Search</button>
        </div>
    </div>

    <div class="card-grid" style="margin-top: 20px;">
        <div class="card">
            <div class="card-header">
                <h3>📚 Checked Out</h3>
            </div>
            <ul>
                <li>"Introduction to Algorithms" - Due: Oct 15</li>
                <li>"Clean Code" - Due: Oct 20</li>
            </ul>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>📋 Reserved</h3>
            </div>
            <ul>
                <li>"Design Patterns" - Ready for pickup</li>
            </ul>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>📎 Learning Materials</h3>
            </div>
            <ul>
                <li><a href="#">Past Board Exams</a></li>
                <li><a href="#">Review Materials</a></li>
                <li><a href="#">Research Papers</a></li>
            </ul>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>🔗 Useful Links</h3>
            </div>
            <ul>
                <li><a href="#">UIC Library Online</a></li>
                <li><a href="#">E-Books Database</a></li>
                <li><a href="#">Journal Portal</a></li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/nico/myproject/resources/views/library.blade.php ENDPATH**/ ?>