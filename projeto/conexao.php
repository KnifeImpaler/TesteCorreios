<?php
$user = 'teste';
$pass = 'teste123';

try {
    $conn = new PDO('mysql:host=191.252.120.37;dbname=correios4', $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    $conn = null;
    die();
}
$pdo = $conn;
?>