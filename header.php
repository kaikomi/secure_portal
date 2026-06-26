<?php
// ============================================
// header.php — Reusable Header
// Use: require('header.php'); at top of every page
// ============================================

// Start session so we can check if user is logged in
if (session_status() === PHP_SESSION_NONE) {
    // session_save_path(__DIR__ . '/tmp');
    session_start();
}

// Check if user is logged in
$isLoggedIn = isset($_SESSION['user_id']);
$username   = $isLoggedIn ? htmlspecialchars($_SESSION['username']) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Portal</title>
    <link rel="stylesheet" href="secure_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Syne:wght@400;600;800&display=swap" rel="stylesheet">
</head>
<body>

<header class="site-header">
    <div class="header-inner">
        <a href="index.php" class="logo">Dynamic Secure Portal</a>
        <nav>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <?php if ($isLoggedIn): ?>
                <span class="user-badge">👤 <?= $username ?></span>
                <a href="logout.php" class="btn-nav logout">Logout</a>
            <?php else: ?>
                <a href="register.php" class="btn-nav" style="background:var(--bg3);border:1px solid var(--border);">Register</a>
                <a href="login.php" class="btn-nav">Login</a>
            <?php endif; ?>
        </nav>
    </div>
</header>