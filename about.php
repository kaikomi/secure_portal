<?php
// ============================================
// about.php — About Page
// ============================================

require('pdo.php');
require('header.php');
?>

<main class="about-page">
    <div class="about-content">
        <h1>About This Project</h1>
        <p class="about-sub">Week 10 — Dynamic Secure Portal</p>

        <div class="tech-grid">
            <div class="tech-card">
                <div class="tech-icon">🐘</div>
                <h3>PHP 8.x</h3>
                <p>Server-side logic, session management, form handling</p>
            </div>
            <div class="tech-card">
                <div class="tech-icon">🗄️</div>
                <h3>MySQL + PDO</h3>
                <p>Secure database queries with prepared statements</p>
            </div>
            <div class="tech-card">
                <div class="tech-icon">🎨</div>
                <h3>CSS3</h3>
                <p>Responsive design with Flexbox and Grid</p>
            </div>
            <div class="tech-card">
                <div class="tech-icon">⚡</div>
                <h3>JavaScript</h3>
                <p>Form validation and UI interactivity</p>
            </div>
        </div>

        <div class="flow-section">
            <h2>How Login Works</h2>
            <div class="flow-steps">
                <div class="step">
                    <span class="step-num">1</span>
                    <p>User submits username + password</p>
                </div>
                <div class="step-arrow">→</div>
                <div class="step">
                    <span class="step-num">2</span>
                    <p>PHP queries DB with PDO prepared statement</p>
                </div>
                <div class="step-arrow">→</div>
                <div class="step">
                    <span class="step-num">3</span>
                    <p><code>password_verify()</code> checks the hash</p>
                </div>
                <div class="step-arrow">→</div>
                <div class="step">
                    <span class="step-num">4</span>
                    <p>Session created → user redirected</p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require('footer.php'); ?>