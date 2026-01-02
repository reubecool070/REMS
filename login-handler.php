<?php
session_start();

// This is a demo handler - in production, you'll validate against database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? '';

    // Demo credentials (replace with database validation later)
    if ($email == 'admin@rems.com' && $password == 'admin123' && $role == 'admin') {
        $_SESSION['user_id'] = 1;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_role'] = 'admin';
        $_SESSION['user_name'] = 'Admin User';
        header('Location: admin-dashboard.php');
        exit();
    } elseif ($email == 'employee@rems.com' && $password == 'emp123' && $role == 'employee') {
        $_SESSION['user_id'] = 2;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_role'] = 'employee';
        $_SESSION['user_name'] = 'John Doe';
        header('Location: employee-dashboard.php');
        exit();
    } else {
        $_SESSION['error'] = 'Invalid credentials or role selection';
        header('Location: index.php');
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}
?>

