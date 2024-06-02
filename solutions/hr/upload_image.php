<?php
require_once 'conn.php';
require_once 'header.php';
require_once 'style.php';

$SNO=$_REQUEST['SNO'];
?>

<html>
<head>
<title>Upload your picture!</title>
</head>
<body>
<form name="form1" method="post" action="check_image.php"
enctype="multipart/form-data">
<table border="0" cellpadding="5">
<tr>
<td>Image Title or Caption<br>
<em>Example: You talkin' to me?</em></td>
<td><input name="image_caption" type="text" id="item_caption" size="55"
maxlength="255">
<input type="text" name="SNO" value="<?php echo $SNO;?>"></td>
</tr>
<tr>
<td>Your Userid</td>
<td><input name="image_userid" type="text" id="image_userid" size="15"
maxlength="255"></td>
</tr>
<td>Upload Image:</td>
<td><input name="image_filename" type="file" id="image_filename"></td>
</tr>
</table>
<br>
<em>Acceptable image formats include: GIF, JPG/JPEG, and PNG.</em>
<p align="center"><input type="submit" name="Submit" value="Submit">
&nbsp;
<input type="reset" name="Submit2" value="Clear Form">
</p>
</form>
</body>
</html>