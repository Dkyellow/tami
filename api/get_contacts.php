<?php
header('Content-Type: application/json');

// Include database connection
require_once 'db_connect.php';

try {
    $stmt = $pdo->query("SELECT * FROM submissions ORDER BY created_at DESC");
    $submissions = $stmt->fetchAll();

    echo json_encode(['success' => true, 'data' => $submissions]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
}
?>
