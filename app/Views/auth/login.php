<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStore Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: linear-gradient(135deg, #1e3a5f 0%, #2c3e66 100%);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
        .login-card {
            max-width: 450px;
            width: 100%;
            background: #fff;
            border-radius: 2rem;
            box-shadow: 0 25px 45px -12px rgba(0,0,0,0.25);
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .dark-mode .login-card {
            background: #1e2438;
        }
        .card-header {
            background: linear-gradient(135deg, #1e3a5f, #2c3e66);
            padding: 2rem;
            text-align: center;
            color: white;
        }
        .card-header i { font-size: 3rem; margin-bottom: 0.5rem; }
        .card-header h2 { font-size: 1.8rem; font-weight: 700; margin: 0; }
        .card-header p { opacity: 0.9; margin-top: 0.5rem; }
        .card-body { padding: 2rem; }
        .form-group { margin-bottom: 1.25rem; }
        label { font-weight: 500; display: block; margin-bottom: 0.5rem; color: #1e293b; }
        .dark-mode label { color: #e2e8f0; }
        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #cbd5e1;
            border-radius: 0.75rem;
            font-size: 0.95rem;
            transition: 0.2s;
        }
        .dark-mode .form-control {
            background: #2d3748;
            border-color: #4a5568;
            color: #f0f2f5;
        }
        .form-control:focus {
            outline: none;
            border-color: #1e3a5f;
            box-shadow: 0 0 0 3px rgba(30,58,95,0.1);
        }
        .btn-login {
            background: linear-gradient(135deg, #1e3a5f, #2c3e66);
            border: none;
            border-radius: 0.75rem;
            padding: 0.8rem;
            font-weight: 600;
            font-size: 1rem;
            color: white;
            width: 100%;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,0.15); }
        .alert {
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        .alert-danger { background: #fee2e2; color: #991b1b; border-left: 4px solid #dc2626; }
        .alert-success { background: #e0f2fe; color: #0c4a6e; border-left: 4px solid #0ea5e9; }
        .dark-mode .alert-danger { background: #631d1d; color: #ffd4d4; }
        .dark-mode .alert-success { background: #1e4620; color: #d4ffd4; }
        .register-link { text-align: center; margin-top: 1.5rem; }
        .register-link a { color: #1e3a5f; text-decoration: none; font-weight: 600; }
        .dark-mode .register-link a { color: #6c9bd2; }
        .register-link a:hover { text-decoration: underline; }
        .lockout-timer { color: #dc2626; font-size: 0.85rem; text-align: center; margin-top: 0.5rem; }
        hr { margin: 1rem 0; border-color: #e2e8f0; }
        .dark-mode hr { border-color: #3a4055; }
        .text-muted { color: #64748b; }
        .dark-mode .text-muted { color: #94a3b8; }
        .small { font-size: 0.8rem; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
<div class="login-card">
    <div class="card-header">
        <i class="fas fa-store"></i>
        <h2>TechStore</h2>
        <p>Inventory & Sales System</p>
    </div>
    <div class="card-body">
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <?php if(session()->getFlashdata('message')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('login') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label><i class="fas fa-envelope"></i> Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="admin@techstore.com" value="<?= old('email') ?>" required autofocus>
            </div>
            <div class="form-group">
                <label><i class="fas fa-lock"></i> Password</label>
                <input type="password" name="password" class="form-control" placeholder="••••••" required>
            </div>
            <?php if(isset($lockout) && $lockout > 0): ?>
                <div class="lockout-timer">
                    <i class="fas fa-hourglass-half"></i> Too many attempts. Try again in <?= ceil($lockout / 60) ?> minute(s).
                </div>
            <?php else: ?>
                <button type="submit" class="btn-login"><i class="fas fa-sign-in-alt"></i> Sign In</button>
            <?php endif; ?>
        </form>

        <div class="register-link">
            <a href="<?= base_url('register') ?>"><i class="fas fa-user-plus"></i> Create New Account</a>
        </div>

        <hr>
     
    </div>
</div>
</body>
</html>