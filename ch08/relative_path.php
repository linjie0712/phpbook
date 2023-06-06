<?php
$path_1 = '/a/e/c/d/g';
$path_2 = '/a/e/f';
echo relative_path($path_1, $path_2);//输出 ../c/d/g
function relative_path($path_1, $path_2)
{
    $path_segments_1 = explode('/', $path_1);//将 $path_1 分片，取出所有的目录名
    $path_segments_2 = explode('/', $path_2);//将 $path_2 分片，取出所有的目录名
    $path1_len = count($path_segments_1);//暂存 $path_1 的长度
    $path2_len = count($path_segments_2);//暂存 $path_2 的长度
    $same = 0;//保存相同的目录名的个数
    while ($same < $path1_len && $same < $path2_len) {//如果 $path_1 或 $path_2 遍历完，即退出
        if ($path_segments_1[$same] == $path_segments_2[$same]) {//记录公共节点的次数
            $same++;
        } else {
            break;
        }
    }
    $diff = $path2_len - $same;//计算 $path_2 距离公共节点需要向上寻找的次数
    if ($diff != 0) {//diff不为0，表示不在同一目录，需要向上查找
        $str = str_repeat('../', abs($diff));
    } else {//diff为0时，表示在同一目录下时，不需要向上查找
        $str = './';
    }
    $remainders = array_slice($path_segments_1, $same);//剩余的节点为 $path_1 从公共节点之后的所有节点
    if (!empty($remainders)) {//如果不为空，则拼接起来
        $str .= implode('/', $remainders);
    }
    return $str;
}