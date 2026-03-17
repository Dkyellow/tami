CREATE TABLE IF NOT EXISTS submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    service VARCHAR(100),
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS site_stats (
    id INT PRIMARY KEY,
    visitor_count INT DEFAULT 0
);

-- Initialize the stats table if empty
INSERT IGNORE INTO site_stats (id, visitor_count) VALUES (1, 0);
