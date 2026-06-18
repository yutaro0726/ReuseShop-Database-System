<?php
return [
    'up' => "CREATE TABLE login_attempts (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        ip_address VARCHAR(45) NOT NULL,
        attempted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        success BOOLEAN NOT NULL DEFAULT FALSE,
        INDEX idx_username (username),
        INDEX idx_ip_address (ip_address)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",
    
    'down' => "DROP TABLE IF EXISTS login_attempts;"
];