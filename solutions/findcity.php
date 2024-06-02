<?php
session_start();
#### Roshan's Ajax dropdown code with php
#### Copyright reserved to Roshan Bhattarai - nepaliboy007@yahoo.com
#### if you have any problem contact me at http://roshanbh.com.np
#### fell free to visit my blog http://php-ajax-guru.blogspot.com
require_once 'conn.php';
?>

<?php 
 $classification=$_REQUEST['classification'];
//$link = mysqli_connect('localhost', 'mydb', 'mydb'); //changet the configuration in required

$query="select `Type`,`Amount` from `welfare type` where `Type`='$classification' AND `Company` ='" .$_SESSION['company']. "'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
?>

<input class="form-control" placeholder=" " type="text" readonly="readonly" name="pamount" size="31" value="<?php echo $row['Amount']; ?>">

     <?php $classification=$_GET['classification'];
