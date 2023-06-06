<html>
<head>
	<meta charset="utf-8"><!--设置网页编码方式-->
	<title>文件上传演示</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"><!--设置视图格式-->
</head>
<body>
<!-- 上传文件的form格式，action是处理上传逻辑的脚本 -->
<form enctype="multipart/form-data" action="upload.php" method="POST">
    <!-- MAX_FILE_SIZE 表示文件最大占用空间，以字节为单位 -->
    <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
    <!-- 上传成功后，文件信息保存在 $_FILES['image'] 数组里 -->
     <input name="image" type="file" />
    <input type="submit" value="上传图片" />
</form>
<?php
if(isset($_FILES['image'])){//如果提交了图片，则进行以下操作
	$dist_file = './image/'.md5(basename($_FILES['image']['name']));//新图片名
	if (move_uploaded_file($_FILES['image']['tmp_name'], $dist_file)) {//保存图片到新位置
    	echo "<img src='{$dist_file}' />";//成功后展示图片
	} else {
    	echo "<p style='color:red;'>Something Is Wrong,Error No :{$_FILES['image']['error']}</p>";//失败后显示错误码
	}
}
?>
</body>
</html>