<?php
// ============================================
// pdo.php — Database Connection
// Include this file on any page that needs DB access
// ============================================

$host   = 'localhost';
$dbname = 'secure_portal';
$user   = 'root';     // XAMPP default username
$pass   = '';         // XAMPP default password (empty)

try {
    // PDO = PHP Data Objects — secure way to connect to MySQL
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

    // Show errors clearly during development
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Return results as associative arrays (like $row['username'])
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // If connection fails, stop everything and show the error
    die("❌ Database connection failed: " . $e->getMessage());
}
?>