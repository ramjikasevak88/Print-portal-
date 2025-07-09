<?php
include 'config.php';

$admin_user = 'admin';
$admin_pass = password_hash('admin123', PASSWORD_DEFAULT);

$stmt = $db->prepare("INSERT OR IGNORE INTO users (username, password) VALUES (?, ?)");
$stmt->bindValue(1, $admin_user, SQLITE3_TEXT);
$stmt->bindValue(2, $admin_pass, SQLITE3_TEXT);
$stmt->execute();

echo "Admin user created successfully.";
?>