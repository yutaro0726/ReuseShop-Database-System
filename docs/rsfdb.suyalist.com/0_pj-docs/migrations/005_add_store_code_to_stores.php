<?php
return [
    'up' => "ALTER TABLE stores
        ADD COLUMN store_code VARCHAR(20) AFTER id,
        ADD UNIQUE INDEX idx_store_code (store_code),
        MODIFY name VARCHAR(500) NOT NULL;",
    
    'down' => "ALTER TABLE stores
        DROP INDEX idx_store_code,
        DROP COLUMN store_code,
        MODIFY name VARCHAR(255) NOT NULL;"
];