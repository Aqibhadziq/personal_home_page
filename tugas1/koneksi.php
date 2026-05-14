<?php

$dsn = 'mysql:dbname=dbpersonal;host=localhost;port=3306';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->exec("SET NAMES utf8mb4");
} catch (PDOException $e) {
    die('<div class="alert alert-danger m-3">Koneksi database gagal: ' . $e->getMessage() . '</div>');
}
?>
