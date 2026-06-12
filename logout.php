<?php
// ============================================
// logout.php — Destroys session and redirects
// ============================================

session_start();

// Clear all session data
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to login page
header('Location: login.php');
exit;
?>