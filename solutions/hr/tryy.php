<?php
 require_once 'conn.php';
        $qg ="insert into `payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`) 
                select `pay`.`Staff Number`,'Gross Pay',`pay`.`GPAmount`,'G','998','998','G' from `pay`";
        $resg = mysqli_query($conn,$qg) or die(mysqli_error());

        $qn ="insert into `payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`) 
                select `pay`.`Staff Number`,'Net Pay',(`pay`.`GPAmount`-`pay`.`TDeduction`),'N','999','999','V' from `pay`";
        $resn = mysqli_query($conn,$qn) or die(mysqli_error());

        $qT ="insert into `payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`) 
                select `pay`.`Staff Number`,'Total Emolument',(`pay`.`GPAmount`-`pay`.`TDeduction`+`pay`.`HAmount`),'P','999','999','Z' from `pay`";
        $respT = mysqli_query($conn,$qT) or die(mysqli_error());

?>