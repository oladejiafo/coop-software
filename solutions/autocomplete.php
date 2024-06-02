<?php
    require_once 'conn.php';
    //$connection = mysqli_connect("localhost","mydb","mydb","swift") or die("Error " . mysqli_error($connection)); 
    //fetch department names from the department table

    $sqlEN = "Select `Surname`, `First Name` from `membership`  WHERE `Company` ='" .$_SESSION['company']. "' AND `Status` = 'Active'";
    $resultEN = mysqli_query($conn,$sqlEN) or die("Error " . mysqli_error($conn));

$dname_list = array();
while($rowEN = mysqli_fetch_array($resultEN))
{
    $namexx=$rowEN['First Name'] . " " . $rowEN['Surname'];
    
    $dname_list[] = mysqli_escape_String($conn,$namexx);;          
}
echo json_encode($dname_list);
/*
    $dname_list = array();
    while($rowN = mysqli_fetch_array($resultN))
    {
        $dname_list[] = $rowN['Name'];
    }
    echo json_encode($dname_list);
*/
?>