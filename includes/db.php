<?php
$host = 'localhost';
$port = '5432';
$dbname = 'briqslab';
$user = 'postgres';
$password = 'demo_password';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die('DB connection failed: ' . $e->getMessage());
}
