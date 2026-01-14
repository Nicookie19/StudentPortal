<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - Student Management System</title>
    
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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background-color: var(--secondary-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 40px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-header h1 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .login-header p {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .login-icon {
            font-size: 3rem;
            margin-bottom: 16px;
        }

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
            padding: 14px 18px;
            background-color: var(--primary-bg);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            color: var(--text-primary);
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        .btn-primary {
            width: 100%;
            background-color: var(--accent-color);
            color: var(--text-primary);
            padding: 14px 24px;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background-color: var(--accent-hover);
        }

        .alert {
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .alert-danger {
            background-color: rgba(239, 68, 68, 0.15);
            border: 1px solid #ef4444;
            color: #ef4444;
        }

        .login-footer {
            margin-top: 24px;
            text-align: center;
            padding-top: 24px;
            border-top: 1px solid var(--border-color);
        }

        .login-footer a {
            color: var(--accent-color);
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .demo-credentials {
            margin-top: 20px;
            padding: 16px;
            background-color: rgba(59, 130, 246, 0.1);
            border-radius: 10px;
            font-size: 0.85rem;
        }

        .demo-credentials strong {
            color: var(--accent-color);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="login-icon">⚙️</div>
                <h1>Admin Login</h1>
                <p>Student Management System</p>
            </div>

            <?php if(session('error')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('admin.login.post')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" required autofocus placeholder="admin@example.com">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required placeholder="Enter your password">
                </div>

                <button type="submit" class="btn-primary">Sign In</button>
            </form>

            <div class="demo-credentials">
                <strong>Demo Credentials:</strong><br>
                Email: admin@test.com<br>
                Password: password123
            </div>

            <div class="login-footer">
                <a href="<?php echo e(url('/')); ?>">← Back to Student Portal</a>
            </div>
        </div>
    </div>
</body>
</html>

<?php /**PATH /Users/nico/myproject/resources/views/admin/login.blade.php ENDPATH**/ ?>