<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e(APP_NAME) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php"><?= e(APP_NAME) ?></a>
        <div class="ms-auto d-flex gap-2">
            <?php if (!empty($_SESSION['user_id'])): ?>
                <a href="dashboard.php" class="btn btn-outline-primary btn-sm">Dashboard</a>
                <a href="logout.php" class="btn btn-dark btn-sm">Logout</a>
            <?php else: ?>
                <a href="login.php" class="btn btn-outline-primary btn-sm">Login</a>
                <a href="register.php" class="btn btn-primary btn-sm">Register</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
<div class="container py-4">
    <?php show_flash(); ?>
