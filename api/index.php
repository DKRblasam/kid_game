<?php
// backend/databases/db.php

$host = 'bcobddenafaiocpas8fm-mysql.services.clever-cloud.com';
$db   = 'bcobddenafaiocpas8fm';
$user = 'umil3ibxm0xtpsub';
$pass = 'umil3ibxm0xtpsub';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

?>