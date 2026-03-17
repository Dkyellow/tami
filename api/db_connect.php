<?php
// Database configuration - Update these with your cPanel details
$host = 'localhost'; // Usually 'localhost' in cPanel
$db = 'tamidome_tami_db';
$user = 'tami_admin';
$pass = 'grS&?Yz^ijtg@a}{';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
     PDO::ATTR_ERR_MODE => PDO::ERR_MODE_EXCEPTION,
     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
     PDO::ATTR_EMULATE_PREPARES => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     // For security, you might want to log this instead of outputting
     // throw new \PDOException($e->getMessage(), (int)$e->getCode());
     header('Content-Type: application/json');
     echo json_encode(['success' => false, 'error' => 'Connection failed: ' . $e->getMessage()]);
     exit;
}
?>