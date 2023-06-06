<?php
$comment = strip_tags($_POST['comment'], '<b><p><i><u>');
?>
<b style="font-size: 1000px">
BIG WORDS COVERS FULL SCREEN!
</b>

<u onmouseup="alert('xss is allowed');">
Click Here
</u>

<p style="background: url(http://ad.com/tracker.gif)">
Track Users
</p>