<?php
// ============================================
// register.php — Register Page
// ============================================
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('secure_pdo.php');
require('header.php');

$error   = '';
$success = '';

// ---- If already logged in, redirect home ----
if ($isLoggedIn) {
    header('Location: index.php');
    exit;
}

// ---- Handle form submission ----
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email']    ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($email) || empty($password)) {
        $error = 'Please fill in all fields.';

    } else {
        // Check if username already taken
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        if ($stmt->fetch()) {
            $error = 'Username already taken.';

        // Check if email already taken
        } else {
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
            $stmt->execute([':email' => $email]);
            if ($stmt->fetch()) {
                $error = 'Email already registered.';

            } else {
                // Hash the password — THIS is where password_hash() lives
                $hash = password_hash($password, PASSWORD_BCRYPT);

                $stmt = $pdo->prepare(
                    "INSERT INTO users (username, email, password)
                     VALUES (:username, :email, :password)"
                );
                $stmt->execute([
                    ':username' => $username,
                    ':email'    => $email,
                    ':password' => $hash,
                ]);

                $success = 'Account created! You can now login.';
            }
        }
    }
}
?>

<main class="auth-page">
    <div class="auth-card">
        <div class="auth-icon"></div>
        <h1>Create Account</h1>
        <p class="auth-sub">Register a new account</p>

        <?php if ($error): ?>
            <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <form method="POST" action="register.php">

            <div class="form-group">
                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Enter your username"
                    value="<?= htmlspecialchars($username ?? '') ?>"
                    autocomplete="username"
                >
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    value="<?= htmlspecialchars($email ?? '') ?>"
                    autocomplete="email"
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    autocomplete="new-password"
                >
                <span class="toggle-pw" onclick="togglePassword()">Show</span>
            </div>

            <button type="submit" class="btn-submit">Register →</button>

        </form>

        <p class="auth-footer">
            Already have an account? <a href="login.php">Login here</a>
        </p>
    </div>
</main>

<?php require('footer.php'); ?>
