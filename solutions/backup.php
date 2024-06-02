<div align="center" style='background-color:#FFFFFF; border-right:solid;border-bottom:solid; border-bottom-color:#CCCCCC; border-right-color:#CCCCCC'>
This will create a new backup of all your database records for you!<br><br>
<?php
$drv= $_REQUEST['drives'];

list($drives, $dtype) = explode(' - ', $drv);

$drive= $drives;

if($drive=="" or empty($drive) OR $drive=="Default")
{
  $drive=NULL;
}

if($drive)
{
 $list =glob($drive . "/backup database/Database Backup Successfully-*.sql");
} else {
 $list =glob("backup database/Database Backup Successfully-*.sql");
}

/*
echo '<pre>'.
var_export($list,true) .
'</pre>';
*/

#################################

echo "<div>Select Drive for Backup<form action='backmeup.php'><select name='drives' style='width:180px;height:40px' placeholder='Select Drive' required>";
/*
if ($drv="" or empty($drv))
{
 echo '<option selected>Select Drive for Backup</option>';
} else {
 echo '<option selected>' . $drv . '</option>';
}
*/
 echo '<option selected>' . $drv . '</option>';
 echo '<option>Default</option>';
$fso = new COM('Scripting.FileSystemObject');
  $D = $fso -> Drives;
  $type = array ("Unknown", "Removable", "Fixed Disk", "Network", "CD-ROM", "RAM Disk");
  foreach ($D as $d){
    $d0 = $fso->GetDrive($d);
    $s ="";
    if($d0->DriveType == 3){
      $n=$d0->Sharename;
    } else if($d0->IsReady){
      $n=$d0->VolumeName;
      $s= file_size($d0->FreeSpace) . " free of: " . file_size($d0->TotalSize);
    } else {
      $n = "[Drive not ready]";
    }
####  echo "Drive " . $d0->DriveLetter . ": - " . $type[$d0->DriveType] . " - " . $n . " - " . $s . "";
 echo '<option>';
  echo $d0->DriveLetter . ": - " . $type[$d0->DriveType];
 echo '</option>';
 }

function file_size($size)
{
  $filesizename = array(" Bytes", " KB", " MB", " GB", " TB");
  return $size ? round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . $filesizename[$i] : '0 Bytes';
}
echo "</select>"; 
#################################
echo "<input type='hidden' value='Backup Database' name='cmbTable'>";
echo "<input type='hidden' value='1x' name='xXx'>";
echo "&nbsp;<input type='submit' value='Backup Now' name='submit' style='width:150px; height:40px'>";
echo "</form></div>";

#echo "<br><a href='backmeup.php?xXx=1x'><font style='color:#008800;font-size:16px'><i>Click Here To Backup All Database</i></font></a>";
echo "<p>&nbsp;</p>";
echo "<font style='color:#FF0000'>Below are a list of previous backups with dates</font>:<br>";

$j=0;
#echo $drive;

if($drive)
{
foreach(array_reverse($list) as $key=>$val) 
{
  list($jx, $jk, $vall) = explode('/', $val);
  echo $key+1 . "=>" . $val . "<br>";
if (++$j == 5) break;
}
} else {
foreach(array_reverse($list) as $key=>$val) 
{
  list($jk, $vall) = explode('/', $val);
  echo $key+1 . "=>" . $vall . "<br>";
if (++$j == 5) break;
}

}

 echo '</div>';

$xXx=$_REQUEST['xXx'];
if($xXx=="1x")
{
require_once 'conn.php';
$conn = mysqli_connect(SQL_HOST,SQL_USER,SQL_PASS) or die('Could not connect to the database; ' . mysqli_error());
mysqli_select_db($conn,SQL_DB) or die('Could not select database; ' . mysqli_error());

echo "<div align='center'>";
echo "Back-up Started...<br><br>";
#################################include "conn.php";

#################################include "../config/connect.php";
$tables = array();
$query = mysqli_query($conn, 'SHOW TABLES');
while($row = mysqli_fetch_row($query)){
     $tables[] = $row[0];
}

$result = "";
foreach($tables as $table){
$query = mysqli_query($conn,'SELECT * FROM '.$table);
@$num_fields = mysqli_num_fields($query);

$result .= 'DROP TABLE IF EXISTS '.$table.';';
@$row2 = mysqli_fetch_row(mysqli_query($conn, 'SHOW CREATE TABLE '.$table));
$result .= "\n\n".$row2[1].";\n\n";

for ($i = 0; $i < $num_fields; $i++) {
while($row = mysqli_fetch_row($query)){
   $result .= 'INSERT INTO '.$table.' VALUES(';
     for($j=0; $j<$num_fields; $j++){
       $row[$j] = addslashes($row[$j]);
       $row[$j] = str_replace("\n","\\n",$row[$j]);
       if(isset($row[$j])){
		   $result .= '"'.$row[$j].'"' ; 
		}else{ 
			$result .= '""';
		}
		if($j<($num_fields-1)){ 
			$result .= ',';
		}
    }
   	$result .= ");\n";
}
}
$result .="\n\n";
}

//Create Folder
if($drive=="" or empty($drive) OR $drive=="Default")
{
  $drives="";
  $drive="Default";
} else {
  $drives=$drives . "/";
  $drive=$drv;
}

$folder = $drives . 'backup database/';
if (!is_dir($folder))
mkdir($folder, 0777, true);
chmod($folder, 0777);

$date = date('m-d-Y'); 
$filename = $folder."Database Backup Successfully-".$date; 

$handle = fopen($filename.'.sql','w+');
fwrite($handle,$result);
fclose($handle);
echo "<br>...Back-up Finished!<br></div>";
### window.location='backmeup.php'; ####
echo $drive;
?>
 <script>
  alert('DATABASE SUCCESSFULLY BACKED-UP?');
  window.location='backmeup.php?<?php echo "drives=" .$drive. "&cmbTable=Backup Database"; ?>';
 </script>

<?php
}
?>