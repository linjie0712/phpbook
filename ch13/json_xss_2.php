<?php
//将 Content-Type 限制为 JSON 类型来避免 XSS 攻击
header('Content-Type: application/json; charset=utf-8');
$data = [
	'foo' => "<script>alert('xss');</script>"
];
echo json_encode($data);
exit(0);