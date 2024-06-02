<?php
 require_once 'conn.php';
 $qpallow ="insert into `payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`, `Class`) 
			SELECT `payr`.`Staff Number`,`pallowances`.`Description`, sum((-1)*(`pallowances`.`Percent` *  `payr`.`Amount`)/100),  `pallowances`.`Type` ,  `pallowances`.`AllowanceID` ,  `pallowances`.`SortOrder` ,  `pallowances`.`Typ`,'Total Deduction' FROM  `payr` LEFT JOIN  `pallowances` ON  `payr`.`Staff Number` =  `pallowances`.`Grade Level` where `payr`.`Type` in ('Basic', 'Allowance') and `pallowances`.`Show`='Show' group by `payr`.`Staff Number`,`pallowances`.`Description`";
 $result_qpallow = mysqli_query($conn,$qpallow) or die(mysqli_error());
?>