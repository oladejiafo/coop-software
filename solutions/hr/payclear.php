<?php
        ##### PAYROLL
        $query_delete_pay ="delete from `pay`";
        $result_delete_pay = mysql_query($query_delete_pay) or die(mysql_error());

        $query_delete_payr ="delete from `payr`";
        $result_delete_payr = mysql_query($query_delete_payr) or die(mysql_error());
?>