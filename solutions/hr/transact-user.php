<?php
  require_once 'conn.php';
  require_once 'http.php';
  if (isset($_REQUEST['action'])) 
  {
    switch ($_REQUEST['action']) 
    {
      case 'Login':
        if (isset($_POST['uname']) and isset($_POST['passwd']))
        {
          $cnt=0;
          $sql = "SELECT user_id,access_lvl,username " .
                 "FROM login " .
                 "WHERE username='" . $_POST['uname'] . "' " . 
                 "AND password='" . md5($_POST['passwd']) . "'";
          $result = mysql_query($sql,$conn) or die('Could not look up member information; ' . mysql_error());
          if ($row = mysql_fetch_array($result)) 
          {
            session_start();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['access_lvl'] = $row['access_lvl'];
            $_SESSION['name'] = $row['username'];
            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn) or die('Could not fetch data; ' . mysql_error());
            $rows = mysql_fetch_array($result);

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Login','Logged In as: " . $_POST['uname'] . "')";

            $result_insert_Log = mysql_query($query_insert_Log) or die(mysql_error());
            ###### 
            redirect('index.php');
          }
          else
          {
            require_once 'header.php';
            require_once 'style.php';
             echo "<h4>Sorry, you can not be logged in. <br> This could be due to Wrong Password or Username or you are yet to be confirmed!</h4>";
            require_once 'footer.php';
            $cnt=$cnt+1;
          }
        }
break;
case 'Logout':
session_start();
session_unset();
session_destroy();
redirect('index.php');
break;
case 'Create Account':
if ($_POST['name'] !="" 
and $_POST['e-mail'] !="" 
and $_POST['passwd'] !="" 
and $_POST['passwd2'] !="" 
and $_POST['passwd'] == $_POST['passwd2'])
{
$sql = "INSERT INTO login (email,username,password,access_lvl) " .
"VALUES ('" . $_POST['e-mail'] . "','" .
$_POST['name'] . "','" . md5($_POST['passwd']) . "','" . $_POST['accesslvl'] . "')";
mysql_query($sql,$conn);
 $tval="New User Account Created!";
 header("location:admin.php?tval=$tval&redirect=$redirect");
}
else
{
 $tval="Please fill in all parameters!";
 header("location:useraccount.php?tval=$tval&redirect=$redirect");
}
break;
case 'Modify Account':
if ($_POST['name'] !="" 
and $_POST['e-mail'] !=""
and $_POST['accesslvl'] !=""
and $_POST['passwd'] !="" 
and $_POST['passwd2'] !="" 
and $_POST['passwd'] == $_POST['passwd2']
and $_POST['user_id'] !="")
{
$sql = "UPDATE login " .
"SET email='" . $_POST['e-mail'] .
"', username='" . $_POST['name'] .
"', password='" . md5($_POST['passwd']) .
"', access_lvl=" . $_POST['accesslvl'] . " " .
" WHERE user_id=" . $_POST['user_id'];
mysql_query($sql,$conn);
 $tval="User Account Modified!";
 header("location:admin.php?tval=$tval&redirect=$redirect");
}
else
{
 $tval="Please fill in all parameters!";
 header("location:useraccount.php?UID=" . $_POST['user_id'] . "&tval=$tval&redirect=$redirect");
}
break;
case 'Send my reminder!':
if (isset($_POST['e-mail'])) {
$sql = "SELECT password FROM tblMembers " .
"WHERE email='" . $_POST['e-mail'] . "'";
$result = mysql_query($sql,$conn)
or die('Could not look up password; ' . mysql_error());
if (mysql_num_rows($result)) {
$row = mysql_fetch_array($result);
$subject = 'Password reminder';
$body = "Just a reminder, your password for the " .
" site is: " . $row['password'] .
"\n\nYou can use this to log in at http://" .
$_SERVER['HTTP_HOST'] .
dirname($_SERVER['PHP_SELF']) . '/';
mail($_POST['e-mail'],$subject,$body)
or die('Could not send reminder e-mail.');
}
}
redirect('login.php');
break;
case 'Change my info':
session_start();
if ($_POST['name'] !="" 
and $_POST['e-mail'] !="" 
and isset($_SESSION['user_id']))
{
$sql = "UPDATE login " .
"SET email='" . $_POST['e-mail'] .
"', username='" . $_POST['name'] . "' " .
"WHERE userid=" . $_SESSION['user_id'];
mysql_query($sql,$conn);
redirect('cpanel.php');
}
else
{
 $tval="Please fill in all parameters!";
 header("location:cpanel.php?UID=" . $_SESSION['user_id'] . "&tval=$tval&redirect=$redirect");
}
break;
}
}
?>