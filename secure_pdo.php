<?php
// ============================================
// secure_pdo.php — Database Connection
// Include this file on any page that needs DB access
// ============================================

$host   = 'sql102.infinityfree.com';
$dbname = 'if0_42162559_secure_portal';
$user   = 'if0_42162559'; 
$pass   = 'but3oHoQyHzy';       

// $host   = 'localhost';
// $dbname = 'secure_portal';
// $user   = 'root';
// $pass   = '';

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