-- POS Foundations database export
-- Create the database, then run this file against it, e.g.:
--   mysql -u root -p pos_foundations < database/pos_foundations.sql

CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    created_at DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL
);

INSERT INTO customers (full_name, email, phone, created_at) VALUES
('Maria Santos', 'maria.santos@example.com', '0917-123-4567', NOW()),
('Juan Dela Cruz', 'juan.delacruz@example.com', '0918-234-5678', NOW()),
('Angela Reyes', 'angela.reyes@example.com', '0919-345-6789', NOW()),
('Marco Villanueva', 'marco.villanueva@example.com', '0920-456-7890', NOW()),
('Kristine Bautista', 'kristine.bautista@example.com', '0921-567-8901', NOW());

INSERT INTO users (username, full_name, created_at) VALUES
('jsmith', 'Joseph Smith', NOW()),
('aramos', 'Aiza Ramos', NOW()),
('ptorres', 'Paolo Torres', NOW()),
('lmendoza', 'Liza Mendoza', NOW()),
('rvillar', 'Rico Villar', NOW());
