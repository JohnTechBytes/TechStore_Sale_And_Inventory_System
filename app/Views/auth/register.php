<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStore Registration</title>
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Same as login page styles – reuse identical CSS */
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
        .register-card {
            max-width: 500px;
            width: 100%;
            background: #fff;
            border-radius: 2rem;
            box-shadow: 0 25px 45px -12px rgba(0,0,0,0.25);
            overflow: hidden;
        }
        .dark-mode .register-card { background: #1e2438; }
        .card-header {
            background: linear-gradient(135deg, #1e3a5f, #2c3e66);
            padding: 1.8rem;
            text-align: center;
            color: white;
        }
        .card-header i { font-size: 2.5rem; margin-bottom: 0.5rem; }
        .card-header h2 { font-size: 1.6rem; font-weight: 700; }
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
        .btn-register {
            background: linear-gradient(135deg, #1e3a5f, #2c3e66);
            border: none;
            border-radius: 0.75rem;
            padding: 0.8rem;
            font-weight: 600;
            font-size: 1rem;
            color: white;
            width: 100%;
            cursor: pointer;
            transition: 0.2s;
        }
        .btn-register:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,0.15); }
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
        .login-link { text-align: center; margin-top: 1.5rem; }
        .login-link a { color: #1e3a5f; text-decoration: none; font-weight: 600; }
        .dark-mode .login-link a { color: #6c9bd2; }
        hr { margin: 1rem 0; border-color: #e2e8f0; }
        .dark-mode hr { border-color: #3a4055; }
        .text-center { text-align: center; }
        .small { font-size: 0.8rem; }
    </style>
</head>
<body>
<div class="register-card">
    <div class="card-header">
        <i class="fas fa-user-plus"></i>
        <h2>Create Account</h2>
    </div>
    <div class="card-body">
        <?php if(session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach(session()->getFlashdata('errors') as $error): ?>
                    <p><i class="fas fa-exclamation-circle"></i> <?= $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if(session()->getFlashdata('message')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('register') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label><i class="fas fa-user"></i> Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="John Doe" value="<?= old('name') ?>" required>
            </div>
            <div class="form-group">
                <label><i class="fas fa-envelope"></i> Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="user@example.com" value="<?= old('email') ?>" required>
            </div>
            <div class="form-group">
                <label><i class="fas fa-lock"></i> Password</label>
                <input type="password" name="password" class="form-control" placeholder="Min. 6 characters" required>
            </div>
            <div class="form-group">
                <label><i class="fas fa-check-circle"></i> Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password" required>
            </div>
            <button type="submit" class="btn-register"><i class="fas fa-user-plus"></i> Register</button>
        </form>

        <div class="login-link">
            <a href="<?= base_url('login') ?>"><i class="fas fa-sign-in-alt"></i> Already have an account? Login</a>
        </div>
        <hr>
        <div class="text-center small text-muted">TechStore Inventory System</div>
    </div>
</div>
</body>
</html>