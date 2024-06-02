<?php
 session_start();
 session_unset();
 session_destroy();
 require_once '../http.php';
 redirect('../index.php');
 break;
?>