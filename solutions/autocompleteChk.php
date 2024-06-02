<?php
    require_once 'conn.php';
    //$connection = mysqli_connect("localhost","mydb","mydb","swift") or die("Error " . mysqli_error($connection)); 
    //fetch department names from the department table

    $sqlENc = "Select `Surname`, `First Name`,`Membership Number` from `membership`  WHERE `Company` ='" .$_SESSION['company']. "' AND `Status` = 'Active'";
    $resultENc = mysqli_query($conn,$sqlENc) or die("Error " . mysqli_error($conn));

$dnamec_list = array();
while($rowENc = mysqli_fetch_array($resultENc))
{
    $nameChk=$rowENc['First Name'] . " " . $rowENc['Surname'] . " - " . $rowENc['Membership Number'];
    
    $dnamec_list[] = mysqli_escape_String($conn,$nameChk);;          
}
echo json_encode($dnamec_list);
/*
    $dname_list = array();
    while($rowN = mysqli_fetch_array($resultN))
    {
        $dname_list[] = $rowN['Name'];
    }
    echo json_encode($dname_list);
*/
?>