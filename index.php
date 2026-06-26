<?php
// ============================================
// index.php — Homepage
// ============================================

require('secure_pdo.php');
require('header.php');
?>

<main class="home-page">

    <?php if ($isLoggedIn): ?>
    <!-- ✅ Logged in view -->
    <section class="hero logged-in">
        <div class="hero-content">
            <span class="badge">✅ Authenticated</span>
            <h1>Hey, <?= $username ?>!</h1>
            <p>You're successfully logged in. Your session is active and database connection is working.</p>

            <div class="info-cards">
                <div class="info-card">
                    <div class="info-icon">🗄️</div>
                    <h3>Database</h3>
                    <p>MySQL connected via PDO</p>
                </div>
                <div class="info-card">
                    <div class="info-icon">🔐</div>
                    <h3>Session</h3>
                    <p>User ID: <?= $_SESSION['user_id'] ?></p>
                </div>
                <div class="info-card">
                    <div class="info-icon">📧</div>
                    <h3>Email</h3>
                    <p><?= htmlspecialchars($_SESSION['email']) ?></p>
                </div>
            </div>

            <a href="logout.php" class="btn-hero logout">Logout</a>
        </div>
    </section>

    <?php else: ?>
    <!-- Not logged in view -->
    <section class="hero">
        <div class="hero-content">
            <h1> Secure Portal</h1>
            <p>A PHP + MySQL authentication system with PDO, sessions, and modular templating.</p>
            <a href="login.php" class="btn-hero">Login →</a>
            <a href="register.php" class="btn-hero" style="background:var(--bg3);border:1px solid var(--border);color:var(--text);margin-left:1rem;">Register</a>
        </div>
        <div class="hero-visual">
            <div class="code-block">
                <span class="code-comment">// pdo.php</span><br>
                <span class="code-keyword">$pdo</span> = <span class="code-fn">new PDO</span>(<br>
                &nbsp;&nbsp;"mysql:host=localhost",<br>
                &nbsp;&nbsp;<span class="code-str">"root"</span>, <span class="code-str">""</span><br>
                );
            </div>
        </div>
    </section>
    <?php endif; ?>

</main>

<?php require('footer.php'); ?>