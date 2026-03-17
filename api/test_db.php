<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h3>PHP Environment Check</h3>";
echo "PHP Version: " . phpversion() . "<br>";
echo "PDO Loaded: " . (extension_loaded('pdo') ? 'Yes' : 'No') . "<br>";
echo "PDO MySQL Loaded: " . (extension_loaded('pdo_mysql') ? 'Yes' : 'No') . "<br>";

echo "<h3>Database Connection Test</h3>";
require_once 'db_connect.php';

try {
    if (isset($pdo)) {
        echo "PDO object created successfully.<br>";
        $stmt = $pdo->query("SELECT DATABASE()");
        $res = $stmt->fetchColumn();
        echo "Successfully connected to database: " . $res . "<br>";
        
        $stmt = $pdo->query("SHOW TABLES LIKE 'submissions'");
        if ($stmt->rowCount() > 0) {
            echo "Table 'submissions' exists.<br>";
        } else {
            echo "<span style='color:red;'>Table 'submissions' NOT found. Please import database.sql.</span><br>";
        }

        $stmt = $pdo->query("SHOW TABLES LIKE 'site_stats'");
        if ($stmt->rowCount() > 0) {
            echo "Table 'site_stats' exists.<br>";
        } else {
            echo "<span style='color:red;'>Table 'site_stats' NOT found. Please run the SQL for site_stats.</span><br>";
        }
    }
} catch (Exception $e) {
    echo "<span style='color:red;'>Error: " . $e->getMessage() . "</span><br>";
}
?>
