<?php
function extract_poem($str){
	//过滤掉标点符号
	$punctuations = [',',';','.','!',':'];
	$replaces = ['','','','',''];
	$str = str_replace($punctuations, $replaces, $str);
	//分割为单词
	$words = preg_split("/[\s,]+/", $str);
	//全部转化为小写
	$words = array_map(function($w){return strtolower($w);},$words);
	return $words;
}

include './dict_trie.class.php';
$trie = new Trie();
//<The Road Not Taken>(by Robert Frost) 
$poem = <<<EOT
TWO roads diverged in a yellow wood,
And sorry I could not travel both
And be one traveler, long I stood
And looked down one as far as I could
To where it bent in the undergrowth;
Then took the other, as just as fair,
And having perhaps the better claim
Because it was grassy and wanted wear;
Though as for that, the passing there
Had worn them really about the same,
And both that morning equally lay
In leaves no step had trodden black.
Oh, I kept the first for another day!
Yet knowing how way leads on to way
I doubted if I should ever come back.
I shall be telling this with a sigh
Somewhere ages and ages hence:
Two roads diverged in a wood, and I,
I took the one less traveled by,
And that has made all the difference.
EOT;
$words = extract_poem($poem);
foreach ($words as $word) {
	$trie->insert($word);
}
$words = $trie->get_distinct_words();
var_dump($words);
$is_exist = $trie->exist('roads');
var_dump($is_exist);