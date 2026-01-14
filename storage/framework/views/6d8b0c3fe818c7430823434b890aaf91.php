<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Admin Portal'); ?> - Student Management System</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        :root {
            --primary-bg: #1e293b;
            --secondary-bg: #334155;
            --accent-color: #3b82f6;
            --accent-hover: #2563eb;
            --text-primary: #f1f5f9;
            --text-secondary: #94a3b8;
            --border-color: #475569;
            --success: #22c55e;
            --warning: #eab308;
            --danger: #ef4444;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Figtree', ui-sans-serif, system-ui, sans-serif;
            background-color: var(--primary-bg);
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Admin Layout */
        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background-color: var(--secondary-bg);
            border-right: 1px solid var(--border-color);
            padding: 24px 20px;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            z-index: 100;
        }

        .sidebar-header {
            text-align: center;
            margin-bottom: 32px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .sidebar-header h1 {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .sidebar-header p {
            font-size: 0.75rem;
            color: var(--text-secondary);
            margin-top: 4px;
        }

        .sidebar-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .sidebar-nav li a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--text-secondary);
            text-decoration: none;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar-nav li a:hover {
            background-color: rgba(59, 130, 246, 0.1);
            color: var(--text-primary);
        }

        .sidebar-nav li a.active {
            background-color: var(--accent-color);
            color: var(--text-primary);
        }

        .sidebar-nav li a .icon {
            font-size: 1.1rem;
            width: 24px;
            text-align: center;
        }

        .sidebar-footer {
            margin-top: auto;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }

        .sidebar-footer a {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.85rem;
            padding: 8px 12px;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .sidebar-footer a:hover {
            color: var(--text-primary);
            background-color: rgba(255, 255, 255, 0.05);
        }

        /* Main Content */
        .main-content {
            flex-grow: 1;
            margin-left: 260px;
            padding: 32px 40px;
        }

        .page-header {
            margin-bottom: 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-header h2 {
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .page-header p {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .page-header-actions {
            display: flex;
            gap: 12px;
        }

        /* Cards */
        .card {
            background-color: var(--secondary-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 20px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--border-color);
        }

        .card h3 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background-color: var(--secondary-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .stat-icon.blue { background-color: rgba(59, 130, 246, 0.2); }
        .stat-icon.green { background-color: rgba(34, 197, 94, 0.2); }
        .stat-icon.yellow { background-color: rgba(234, 179, 8, 0.2); }
        .stat-icon.purple { background-color: rgba(168, 85, 247, 0.2); }

        .stat-info h4 {
            font-size: 0.85rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .stat-info p {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        /* Forms */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-primary);
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            background-color: var(--primary-bg);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            color: var(--text-primary);
            font-size: 0.9rem;
            font-family: inherit;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        select.form-control {
            cursor: pointer;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--accent-color);
            color: var(--text-primary);
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary:hover {
            background-color: var(--accent-hover);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--text-primary);
            padding: 12px 24px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .btn-danger {
            background-color: var(--danger);
            color: var(--text-primary);
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-danger:hover {
            opacity: 0.9;
        }

        .btn-sm {
            padding: 8px 16px;
            font-size: 0.8rem;
        }

        .btn-group {
            display: flex;
            gap: 12px;
        }

        /* Tables */
        .table-container {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        .table th {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-secondary);
            background-color: rgba(255, 255, 255, 0.02);
        }

        .table tr:hover {
            background-color: rgba(255, 255, 255, 0.02);
        }

        /* Alerts */
        .alert {
            padding: 16px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: rgba(34, 197, 94, 0.2);
            border: 1px solid var(--success);
            color: var(--success);
        }

        .alert-danger {
            background-color: rgba(239, 68, 68, 0.2);
            border: 1px solid var(--danger);
            color: var(--danger);
        }

        /* Badges */
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-success { background-color: rgba(34, 197, 94, 0.2); color: var(--success); }
        .badge-warning { background-color: rgba(234, 179, 8, 0.2); color: var(--warning); }
        .badge-danger { background-color: rgba(239, 68, 68, 0.2); color: var(--danger); }
        .badge-info { background-color: rgba(59, 130, 246, 0.2); color: var(--accent-color); }

        /* Search Bar */
        .search-bar {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
        }

        .search-bar .form-control {
            flex-grow: 1;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background-color: var(--secondary-bg);
            border-radius: 12px;
            padding: 32px;
            max-width: 500px;
            width: 90%;
            border: 1px solid var(--border-color);
        }

        .modal-header {
            margin-bottom: 24px;
        }

        .modal-header h3 {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .modal-footer {
            margin-top: 24px;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        /* Pagination */
        .pagination {
            display: flex;
            gap: 8px;
            margin-top: 20px;
        }

        .pagination a {
            padding: 8px 16px;
            border-radius: 6px;
            color: var(--text-secondary);
            text-decoration: none;
            border: 1px solid var(--border-color);
            transition: all 0.2s ease;
        }

        .pagination a:hover, .pagination a.active {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: var(--text-primary);
        }

        /* Actions */
        .actions {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.2s ease;
            border: none;
        }

        .action-btn.view {
            background-color: rgba(59, 130, 246, 0.2);
            color: var(--accent-color);
        }

        .action-btn.edit {
            background-color: rgba(234, 179, 8, 0.2);
            color: var(--warning);
        }

        .action-btn.delete {
            background-color: rgba(239, 68, 68, 0.2);
            color: var(--danger);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1>⚙️ Admin Portal</h1>
                <p>Student Management System</p>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="<?php echo e(url('/admin/dashboard')); ?>" class="<?php echo e(request()->is('admin/dashboard') ? 'active' : ''); ?>"><span class="icon">📊</span> Dashboard</a></li>
                    <li><a href="<?php echo e(url('/admin/students')); ?>" class="<?php echo e(request()->is('admin/students*') ? 'active' : ''); ?>"><span class="icon">👨‍🎓</span> Students</a></li>
                    <li><a href="<?php echo e(url('/admin/subjects')); ?>" class="<?php echo e(request()->is('admin/subjects*') ? 'active' : ''); ?>"><span class="icon">📚</span> Subjects</a></li>
                    <li><a href="<?php echo e(url('/admin/schedules')); ?>" class="<?php echo e(request()->is('admin/schedules*') ? 'active' : ''); ?>"><span class="icon">📅</span> Schedules</a></li>
                    <li><a href="<?php echo e(url('/admin/departments')); ?>" class="<?php echo e(request()->is('admin/departments*') ? 'active' : ''); ?>"><span class="icon">🏛️</span> Departments</a></li>
                    <li><a href="<?php echo e(url('/admin/enrollments')); ?>" class="<?php echo e(request()->is('admin/enrollments*') ? 'active' : ''); ?>"><span class="icon">📝</span> Enrollments</a></li>
                </ul>
            </nav>
            <div class="sidebar-footer">
                <a href="<?php echo e(url('/')); ?>"><span>🏠</span> Back to Portal</a>
                <form action="<?php echo e(route('admin.logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" style="background: none; border: none; cursor: pointer; width: 100%;">
                        <a><span>🚪</span> Logout</a>
                    </button>
                </form>
                <p>&copy; <?php echo e(date('Y')); ?> Admin Panel</p>
            </div>
        </aside>

        <main class="main-content">
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <script>
        function confirmDelete(message) {
            return confirm(message || 'Are you sure you want to delete this item?');
        }
    </script>
</body>
</html>

<?php /**PATH /Users/nico/myproject/resources/views/layouts/admin-portal.blade.php ENDPATH**/ ?>