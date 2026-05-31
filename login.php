<?php
// ============================================
// login.php — Login Page
// ============================================

require('pdo.php');    // get database connection ($pdo)
require('header.php'); // show header (also starts session)

$error = '';
$success = '';

// ---- If already logged in, redirect home ----
if ($isLoggedIn) {
    header('Location: index.php');
    exit;
}

// ---- Handle form submission ----
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1. Grab what the user typed (trim removes accidental spaces)
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // 2. Basic validation — don't even hit the DB if fields are empty
    if (empty($username) || empty($password)) {
        $error = 'Please fill in both fields.';

    } else {
        // 3. Prepared statement — SAFE way to query (prevents SQL injection)
        //    The :username is a placeholder, not raw user input
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(); // returns one row or false

        // 4. Check if user exists AND password matches the hash
        if ($user && password_verify($password, $user['password'])) {
            // ✅ Login successful — save user info in session
            $_SESSION['user_id']  = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email']    = $user['email'];

            header('Location: index.php'); // redirect to homepage
            exit;
        } else {
            // ❌ Wrong username or password
            $error = 'Invalid username or password.';
        }
    }
}
?>

<main class="auth-page">
    <div class="auth-card">
        <div class="auth-icon">🔐</div>
        <h1>Welcome Back</h1>
        <p class="auth-sub">Sign in to your account</p>

        <?php if ($error): ?>
            <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="login.php" id="loginForm">

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
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    autocomplete="current-password"
                >
                <span class="toggle-pw" onclick="togglePassword()">👁 Show</span>
            </div>

            <button type="submit" class="btn-submit">Login →</button>

        </form>

        <p class="auth-footer">
            Test account: <strong>testuser</strong> / <strong>password123</strong>
        </p>
    </div>
</main>

<?php require('footer.php'); ?>