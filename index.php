<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMS - Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="login-page">
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo">
                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="50" height="50" rx="10" fill="#4F46E5"/>
                        <path d="M15 20H35M15 25H35M15 30H28" stroke="white" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                </div>
                <h1>REMS</h1>
                <p>Remote Employee Monitoring System</p>
            </div>

            <form action="login-handler.php" method="POST" class="login-form">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <div class="form-group">
                    <label for="role">Login As</label>
                    <select id="role" name="role" required>
                        <option value="">Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="employee">Employee</option>
                    </select>
                </div>

                <div class="form-options">
                    <label class="checkbox-label">
                        <input type="checkbox" name="remember">
                        <span>Remember me</span>
                    </label>
                    <a href="#" class="forgot-link">Forgot Password?</a>
                </div>

                <button type="submit" class="btn-primary">Sign In</button>
            </form>

            <div class="login-footer">
                <p>&copy; 2026 REMS. All rights reserved.</p>
            </div>
        </div>

        <!-- Demo Credentials Box -->
        <!-- <div class="demo-credentials">
            <h3>Demo Credentials</h3>
            <div class="demo-item">
                <strong>Admin:</strong>
                <span>admin@rems.com / admin123</span>
            </div>
            <div class="demo-item">
                <strong>Employee:</strong>
                <span>employee@rems.com / emp123</span>
            </div>
        </div> -->
    </div>
</body>
</html>

