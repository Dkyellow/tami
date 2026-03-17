<?php
header('Content-Type: application/json');

// Include database connection
require_once 'db_connect.php';

try {
    // Fetch submissions
    $stmt = $pdo->query("SELECT * FROM submissions ORDER BY created_at DESC");
    $submissions = $stmt->fetchAll();

    // Fetch visitor count
    $stmt = $pdo->query("SELECT visitor_count FROM site_stats WHERE id = 1");
    $stats = $stmt->fetch();
    $visitor_count = $stats ? $stats['visitor_count'] : 0;

    echo json_encode([
        'success' => true, 
        'data' => $submissions,
        'visitor_count' => $visitor_count
    ]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
}
?>
