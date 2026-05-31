// ============================================
// script.js — UI Interactivity
// ============================================

// --- Toggle password visibility ---
function togglePassword() {
    const input  = document.getElementById('password');
    const toggle = document.querySelector('.toggle-pw');

    if (input.type === 'password') {
        input.type   = 'text';
        toggle.textContent = 'Hide';
    } else {
        input.type   = 'password';
        toggle.textContent = 'Show';
    }
}

// --- Client-side form validation (runs BEFORE PHP) ---
const loginForm = document.getElementById('loginForm');
if (loginForm) {
    loginForm.addEventListener('submit', function (e) {
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();

        if (!username || !password) {
            e.preventDefault(); // stop form from submitting
            alert('Please fill in both fields!');
        }
    });
}

// --- Fade in cards on page load ---
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.info-card, .tech-card, .step');
    cards.forEach((card, i) => {
        card.style.opacity  = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = `opacity 0.4s ease ${i * 0.1}s, transform 0.4s ease ${i * 0.1}s`;

        // Tiny delay so transition kicks in
        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                card.style.opacity   = '1';
                card.style.transform = 'translateY(0)';
            });
        });
    });
});