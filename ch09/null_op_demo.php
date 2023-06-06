<?php
$user = $_GET['user'] ?? 'david';
$user = isset($_GET['user']) ? $_GET['user'] : 'david';