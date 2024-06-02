<table width="100%">
<td width="90%" align="left">
<?php  
if($row['Company Name'] != "LLOYDINS ENT")
{
 echo "<h1>Pirated Software!! .... This Software is not licenced to you!</h1>";
exit;
}
if(date('Y-m-d') > date('2018-12-10'))
{
 echo "<h1>Expired Software!!</h1>";
 exit;
}
?>
</td>
</table>