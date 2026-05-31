-- ============================================
-- STEP 1: Create the database
-- ============================================
CREATE DATABASE IF NOT EXISTS secure_portal;

-- ============================================
-- STEP 2: Use it
-- ============================================
USE secure_portal;

-- ============================================
-- STEP 3: Create the users table
-- ============================================
CREATE TABLE IF NOT EXISTS users (
    id       INT PRIMARY KEY AUTO_INCREMENT,  -- unique ID, auto counts up
    username VARCHAR(50)  NOT NULL UNIQUE,    -- must be unique
    email    VARCHAR(100) NOT NULL UNIQUE,    -- must be unique
    password VARCHAR(255) NOT NULL,           -- hashed password (long string)
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
-- STEP 4: Insert a test user (password = "password123")
-- The hash below is: password_hash("password123", PASSWORD_BCRYPT)
-- ============================================
INSERT INTO users (username, email, password) VALUES (
    'testuser',
    'test@example.com',
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
);