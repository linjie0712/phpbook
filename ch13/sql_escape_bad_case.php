<?php
$mysqli = new mysqli("localhost", "user_rw", "password", "user_db");
// $id 传入 0;DROP TABLE users
$id = $mysqli->real_escape_string ($_GET['id']);                                    
$mysqli-> query("SELECT * FROM users WHERE id={$id}");
// user表被删除！