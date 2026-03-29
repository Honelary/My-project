-- =============================================
-- Electrician Website Database Setup
-- =============================================

-- =============================================
-- Create 'contacts' table
-- This table stores all contact form submissions
-- =============================================
CREATE TABLE IF NOT EXISTS contacts (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_created_at (created_at),
    INDEX idx_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- Create 'admin_users' table (for admin login)
-- This table stores admin credentials
-- =============================================
CREATE TABLE IF NOT EXISTS admin_users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- Insert default admin user
-- Username: admin
-- Password: admin123 (CHANGE THIS IMMEDIATELY!)
-- Password is hashed using PHP's password_hash()
-- =============================================
INSERT INTO admin_users (username, password, email) 
VALUES ('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@honeelectricpro.com');

-- Note: The default password is 'admin123'
-- After first login, change this password immediately!

-- =============================================
-- Sample data for testing (optional)
-- =============================================
INSERT INTO contacts (name, email, phone, message) VALUES
('John Doe', 'john@example.com', '555-0123', 'I need help with electrical installation in my new home.'),
('Jane Smith', 'jane@example.com', '555-0456', 'Can you provide a quote for rewiring my office?');

-- =============================================
-- Useful queries for admin panel
-- =============================================

-- View all contacts (most recent first)
-- SELECT * FROM contacts ORDER BY created_at DESC;

-- Count total contacts
-- SELECT COUNT(*) as total_contacts FROM contacts;

-- Search contacts by name or email
-- SELECT * FROM contacts WHERE name LIKE '%search_term%' OR email LIKE '%search_term%';

-- Delete old contacts (older than 6 months)
-- DELETE FROM contacts WHERE created_at < DATE_SUB(NOW(), INTERVAL 6 MONTH);