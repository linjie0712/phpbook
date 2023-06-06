<?php
$stmt = $pdo->prepare("INSERT INTO users (id, name) VALUES (:id, :name)");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':name', $name);

// 新建名称为 david 的用户
$id = 1;
$name = 'david';
$stmt->execute();

// 新建名称为 tom 的用户
$id = 2;
$name = 'tom';
$stmt->execute();