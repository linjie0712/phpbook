<?php
include './dict_trie.class.php';
$trie = new Trie();
$cet4_txt = './cet_4.txt';
$handle = fopen($cet4_txt, "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $word = strtolower(trim($line));
        $trie->insert($word);
    }
    fclose($handle);
} else {
    exit('File Not Exist');
} 
$words = $trie->related_words('ph');//查找与ph前缀相关的单词
var_dump($words);