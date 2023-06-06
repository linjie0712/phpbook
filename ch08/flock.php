<?php
$fp = fopen("./tmp/lock.txt", "r+");
if (flock($fp, LOCK_EX)) {  // 进行独占型锁定
    ftruncate($fp, 0);      // 清除文件
    fwrite($fp, "Write something here\n");
    fflush($fp);            // 释放锁之前刷新缓冲区
    flock($fp, LOCK_UN);    // 释放锁定
} else {
    echo "获取锁失败";
}
fclose($fp);