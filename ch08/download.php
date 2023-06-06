<?php
header('Content-Type: image/jpeg');//设置输出的 MIME 格式
header('Content-Disposition: attachment; filename="new_beach.jpg"');//设置文件的命名
readfile('beach.jpg');//下载的原始文件