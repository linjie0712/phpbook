<?php
/*
表创建SQL
CREATE TABLE `student` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(20) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='学生信息表';
*/

$sql = 'select name from student where id = 1;';
// mysql
$c = mysql_connect("localhost", "user", "password");
mysql_select_db("demo");
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
echo $row['name'];

// mysqli
$mysqli = new mysqli("localhost", "user", "password", "demo");
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
echo $row['name'];

// PDO
$pdo = new PDO('mysql:host=localhost;dbname=demo', 'user', 'password');
$statement = $pdo->query($sql);
$row = $statement->fetch(PDO::FETCH_ASSOC);
echo $row['name'];



