<?php
$mysqli = new mysqli("localhost", "user_rw", "password", "user_db");
$id = $mysqli->real_escape_string($_GET['id']);             
$name = $mysqli->real_escape_string($_GET['name']);
$mysqli->query("INSERT INTO user (id,name) VALUES({$id}, '{$name}')");