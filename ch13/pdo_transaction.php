<?php
//$pdo为一个已经连接的pdo句柄
try {  
  $pdo->beginTransaction();//事务开始
  //TODO 业务逻辑
  $pdo->commit();//事务提交
} catch (Exception $e) {
  $pdo->rollBack();//处理失败，回滚
  echo "RollBack: " . $e->getMessage();
}