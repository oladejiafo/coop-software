<?php 
require_once 'header.php'; 
require_once 'style.php'; 
?>
<style type="text/css">
<!--
.bodye {
	text-indent: px;
}
-->
</style>

<body topmargin="0">

<div align="center">

<table width="805" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="padding: 1px">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bordercolor="#99CC00" bgcolor="#FFFFFF" ><form method="post" action="transact-user.php">
      <h1 style="margin-left: 20px">
		<font face="Verdana" color="#336600" style="font-size: 16pt">E-mail Password Reminder</font></h1>
      <p style="line-height: 18px; margin-left: 20px"> 
		<font face="Verdana" style="font-size: 9pt">Forgot your password? Just enter your e-mail address, and we'll e-mail
        your password to you! </font> </p>
      <p style="line-height: 18px; margin-left: 20px"> 
		<font face="Verdana" style="font-size: 9pt">E-mail Address:</font><br />
          <input type="text" id="e-mail" name="e-mail" />
      </p>
      <p>
        &nbsp;&nbsp;&nbsp;
        <input type="submit" class="submit" name="action" value="Send my reminder!" />
      </p>
    </form></td>
  </tr>
</table>
</div>

<?php require_once 'footer.php'; ?>