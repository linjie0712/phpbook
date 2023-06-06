<?php
	$comment = $_POST['comment'];
	//fix xss
	//$comment = strip_tags($_POST['comment']);
	//$comment = htmlentities($_POST['comment']);
	//$comment = htmlspecialchars($_POST['comment']);
?>

<form method="post">
	<lable>Please Input Your Comment</lable>
	<input type="text" name="comment" value="<?php echo $comment;?>" />

	<input type="submit"/>
</form>
<p>This is What You Say:</p>
<blockquote style="background-color: #F5F5DC "><?php echo $comment;?></blockquote>