<?php
session_start();
require_once '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Check DB for user
    $stmt = $conn->prepare("SELECT id, username, password FROM admin_users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['admin_id'] = $user['id'];
        $_SESSION['admin_username'] = $user['username'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid credentials!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S.B. Syscon - Admin Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #0d0d0d; 
            background-image: 
                radial-gradient(at 0% 0%, hsla(354,80%,30%,0.2) 0px, transparent 50%),
                radial-gradient(at 100% 100%, hsla(354,80%,30%,0.2) 0px, transparent 50%);
            display: flex; 
            align-items: center; 
            justify-content: center; 
            height: 100vh; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow: hidden;
        }
        
        .login-card { 
            width: 100%; 
            max-width: 420px; 
            padding: 3rem; 
            border-radius: 20px; 
            background: rgba(25, 25, 25, 0.95); 
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 50px rgba(0,0,0,0.5); 
            position: relative;
            z-index: 10;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h3 {
            font-weight: 700;
            color: #fff;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-size: 1.5rem;
        }
        
        .login-header p {
            color: #888;
            font-size: 0.9rem;
        }
        
        .logo-icon {
            font-size: 3rem;
            color: #dc3545;
            margin-bottom: 1rem;
        }

        .form-control {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid #333;
            color: #fff;
            height: 50px;
            padding-left: 20px;
            border-radius: 8px;
        }
        
        .form-control:focus {
            background: rgba(0, 0, 0, 0.5);
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
            color: #fff;
        }
        
        .form-label {
            color: #bbb;
            font-size: 0.9rem;
            margin-bottom: 8px;
        }
        
        .btn-login {
            background: #dc3545;
            border: none;
            height: 50px;
            font-weight: 600;
            letter-spacing: 1px;
            border-radius: 8px;
            margin-top: 1rem;
            transition: all 0.3s ease;
        }
        
        .btn-login:hover {
            background: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
        }

        .input-group-text {
            background: #222;
            border: 1px solid #333;
            color: #888;
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.3);
            color: #ff6b6b;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="login-header">
        <div class="logo-icon"><i class="fas fa-shield-alt"></i></div>
        <h3>Admin Panel</h3>
        <p>Login to manage your website</p>
    </div>
    
    <?php if(isset($error)): ?>
        <div class="alert alert-danger d-flex align-items-center">
            <i class="fas fa-exclamation-circle me-2"></i>
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    
    <form method="POST">
        <div class="mb-4">
            <label class="form-label">Username</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="username" class="form-control" placeholder="Enter username" required>
            </div>
        </div>
        <div class="mb-4">
            <label class="form-label">Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100 btn-login">SECURE LOGIN</button>
    </form>
    
    <div class="text-center mt-4">
        <a href="../index.php" class="text-decoration-none text-muted small hover-white">
            <i class="fas fa-arrow-left me-1"></i> Back to Website
        </a>
    </div>
</div>

</body>
</html>
