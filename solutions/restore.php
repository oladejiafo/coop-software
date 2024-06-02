<div align="center" style='background-color:#FFFFFF; border-right:solid;border-bottom:solid; border-bottom-color:#CCCCCC; border-right-color:#CCCCCC'>
This will restore for you, any previous backup of your database!<br><br>
<?php
$list =glob("backup database/Database Backup Successfully-*.sql");
/*
echo '<pre>'.
var_export($list,true) .
'</pre>';
*/

echo "<font style='color:#FF0000'>Below are a list of previous backups with dates, Click on any specific one to restore. <br>{WARNING: Restoring will over-write your existing database records!!!}</font>:<br>";

$j=0;
foreach(array_reverse($list) as $key=>$val) 
{
  list($jk, $vall) = explode('/', $val);
  echo "<a href='backmeup.php?cmbTable=Restore Database&xXy=1x&filename=$vall'><font style='color:#008800;font-size:14px'>";
  echo $key+1 . "=>" . $vall . "<br>";
  echo "</font></a>";
if (++$j == 10) break;
}
 echo '</div>';

$xXy=$_REQUEST['xXy'];
if($xXy=="1x")
{
define('SQL_HOST','localhost');
define('SQL_USER','mydb');
define('SQL_PASS','mydb');
define('SQL_DB','thrift');
$conn = mysqli_connect(SQL_HOST,SQL_USER,SQL_PASS) or die('Could not connect to the database; ' . mysqli_error());
mysqli_select_db($conn,SQL_DB) or die('Could not select database; ' . mysqli_error());

echo "You have chosen to restore the selected file! Starting...<br>";
###############include "conn.php";

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
$folder = 'backup database/';
if (!is_dir($folder))
mkdir($folder, 0777, true);
chmod($folder, 0777);

$date = date('m-d-Y'); 
$filename = $folder."archive-".$date; 

$handle = fopen($filename.'.sql','w+');
fwrite($handle,$result);
fclose($handle);

############################################################################
$filename="backup database/" .$_REQUEST['filename'];

$op_data = '';
$lines = file($filename);
foreach ($lines as $line)
{
    if (substr($line, 0, 2) == '--' || $line == '')//This IF Remove Comment Inside SQL FILE
    {
        continue;
    }
    $op_data .= $line;
    if (substr(trim($line), -1, 1) == ';')//Breack Line Upto ';' NEW QUERY
    {
        $conn->query($op_data);
        $op_data = '';
    }
}

##########################################

echo "<br>...Your Database has been restored!<br><br>";
?>

<?php
}
?>