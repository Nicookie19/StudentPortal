<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Student Portal'); ?></title>
    
    <!-- Fonts - Figtree like UIC -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        :root {
            --primary-bg: #FFFFFF;
            --primary-text: #000000;
            --accent-color: #ff914d;
            --card-bg: #fdc48d;
            --border-color: #ca7727;
            --font-sans: 'Figtree', ui-sans-serif, system-ui, sans-serif;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--font-sans);
            background-color: var(--primary-bg);
            color: var(--primary-text);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Animated Background */
        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            background-color: var(--accent-color);
            border-radius: 50%;
            opacity: 0.5;
            animation: move linear infinite;
        }

        @keyframes move {
            0% {
                transform: translateY(100vh) scale(1);
            }
            100% {
                transform: translateY(-10vh) scale(0);
            }
        }

        /* Main Layout */
        .portal-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background-color: var(--card-bg);
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
            color: #FFFFFF;
        }

        .sidebar-header p {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.5);
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
            color: rgba(0, 0, 0, 0.8);
            text-decoration: none;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar-nav li a:hover {
            background-color: rgba(255, 255, 0, 0.1);
            color: #FFFFFF;
        }

        .sidebar-nav li a.active {
            background-color: var(--accent-color);
            color: var(--primary-bg);
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
            color: rgba(0, 0, 0, 0.6);
            text-decoration: none;
            font-size: 0.85rem;
            padding: 8px 12px;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .sidebar-footer a:hover {
            color: #FFFFFF;
            background-color: rgba(255, 255, 255, 0.05);
        }

        .sidebar-footer p {
            text-align: center;
            font-size: 0.75rem;
            color: rgba(0, 0, 0, 0.4);
            margin-top: 12px;
        }

        /* Main Content */
        .main-content {
            flex-grow: 1;
            margin-left: 260px;
            padding: 32px 40px;
            z-index: 1;
        }

        .page-header {
            margin-bottom: 32px;
        }

        .page-header h2 {
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .page-header p {
            color: rgba(0, 0, 0, 0.6);
            font-size: 0.9rem;
        }

        /* Card Grid */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 24px;
            transition: all 0.2s ease;
        }

        .card:hover {
            border-color: rgba(255, 255, 0, 0.3);
            transform: translateY(-2px);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--border-color);
        }

        .card h3 {
            font-size: 1rem;
            font-weight: 600;
            color: #FFFFFF;
        }

        .card-icon {
            font-size: 1.25rem;
        }

        .card ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .card li {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            color: rgba(0, 0, 0, 0.85);
            padding: 8px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .card li:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .card a {
            color: var(--primary-text);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .card a:hover {
            color: #FFFFFF;
        }

        /* Quick Links Buttons */
        .quick-links-section {
            margin-bottom: 32px;
        }

        .quick-links-grid {
            display: flex;
            flex-wrap: nowrap;
            justify-content: center;
            gap: 12px;
            overflow-x: auto;
            padding-bottom: 8px;
        }

        .quick-links-grid::-webkit-scrollbar {
            height: 6px;
        }

        .quick-links-grid::-webkit-scrollbar-thumb {
            background-color: var(--border-color);
            border-radius: 3px;
        }

        .quick-link-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            background-color: var(--accent-color);
            color: #000000;
            padding: 12px 16px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .quick-link-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 255, 0, 0.3);
            opacity: 0.9;
        }

        .quick-link-btn .icon {
            font-size: 1.1rem;
            color: #000000;
        }

        .quick-link-btn span {
            color: #000000;
        }

        /* Info Table */
        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table th, .info-table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        .info-table th {
            font-size: 0.85rem;
            font-weight: 600;
            color: #FFFFFF;
            background-color: rgba(255, 255, 255, 0.02);
        }

        .info-table tr:hover {
            background-color: rgba(255, 255, 0, 0.05);
        }

        /* Status Badge */
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-cleared { background-color: #22c55e; color: #000; }
        .status-pending { background-color: #eab308; color: #000; }
        .status-uncleared { background-color: #ef4444; color: #fff; }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--accent-color);
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            color: var(--primary-text);
            font-size: 0.9rem;
            font-family: inherit;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(255, 255, 0, 0.1);
        }

        select.form-control {
            cursor: pointer;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .btn-primary {
            background-color: var(--accent-color);
            color: var(--primary-bg);
            padding: 14px 28px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--primary-text);
            padding: 14px 28px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .btn-group {
            display: flex;
            gap: 12px;
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

            .quick-links-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Loading Spinner */
        .loading-spinner {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            display: none;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid var(--accent-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="background"></div>

    <div class="loading-spinner" id="loading-spinner">
        <div class="spinner"></div>
    </div>

    <div class="portal-layout">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1>🎓 Student Portal</h1>
                <p>College of Computer Studies</p>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="<?php echo e(url('/dashboard')); ?>" class="<?php echo e(request()->is('dashboard') || request()->is('/') ? 'active' : ''); ?>"><span class="icon">🏠</span> Home</a></li>
                    <li><a href="<?php echo e(url('/academic-record')); ?>" class="<?php echo e(request()->is('academic-record') ? 'active' : ''); ?>"><span class="icon">📊</span> Academic Record</a></li>
                    <li><a href="<?php echo e(url('/class-schedule')); ?>" class="<?php echo e(request()->is('class-schedule') ? 'active' : ''); ?>"><span class="icon">📅</span> Class Schedule</a></li>
                    <li><a href="<?php echo e(url('/financial-record')); ?>" class="<?php echo e(request()->is('financial-record') ? 'active' : ''); ?>"><span class="icon">💰</span> Financial Record</a></li>
                    <li><a href="<?php echo e(url('/clearance')); ?>" class="<?php echo e(request()->is('clearance') ? 'active' : ''); ?>"><span class="icon">✅</span> Clearance</a></li>
                    <li><a href="<?php echo e(url('/curriculum-view')); ?>" class="<?php echo e(request()->is('curriculum-view') ? 'active' : ''); ?>"><span class="icon">📚</span> Curriculum View</a></li>
                    <li><a href="<?php echo e(url('/resources')); ?>" class="<?php echo e(request()->is('resources') ? 'active' : ''); ?>"><span class="icon">📂</span> Resources</a></li>
                </ul>
            </nav>
            <div class="sidebar-footer">
                <a href="<?php echo e(url('/profile')); ?>"><span>👤</span> Profile</a>
                <a href="<?php echo e(url('/logout')); ?>"><span>🚪</span> Logout</a>
                <p>&copy; <?php echo e(date('Y')); ?> College of Computer Studies</p>
            </div>
        </aside>

        <main class="main-content">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <script>
        // Show loading spinner on navigation
        document.addEventListener('DOMContentLoaded', function() {
            const spinner = document.getElementById('loading-spinner');
            const links = document.querySelectorAll('a');

            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Only show spinner for internal links
                    if (link.hostname === window.location.hostname) {
                        spinner.style.display = 'block';
                    }
                });
            });

            // Hide spinner when page loads
            window.addEventListener('load', function() {
                spinner.style.display = 'none';
            });
        });

        // Animated background particles
        const background = document.querySelector('.background');
        const numParticles = 200;

        for (let i = 0; i < numParticles; i++) {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            
            const size = Math.random() * 4 + 1;
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            
            particle.style.left = `${Math.random() * 100}vw`;
            
            const duration = Math.random() * 10 + 5;
            particle.style.animationDuration = `${duration}s`;
            
            const delay = Math.random() * 5;
            particle.style.animationDelay = `-${delay}s`;

            background.appendChild(particle);
        }
    </script>
</body>
</html>

<?php /**PATH /Users/nico/myproject/resources/views/layouts/portal.blade.php ENDPATH**/ ?>