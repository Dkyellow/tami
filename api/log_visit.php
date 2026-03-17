<?php
header('Content-Type: application/json');

// Include database connection
require_once 'db_connect.php';

try {
    // Increment the visitor count
    $pdo->query("UPDATE site_stats SET visitor_count = visitor_count + 1 WHERE id = 1");
    
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
