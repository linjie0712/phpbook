<?php
$pdo = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
$stmt = $pdo->prepare("SELECT * FROM users where id = :id");
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();
$result = $stmt->fetchAll();
var_dump($result);