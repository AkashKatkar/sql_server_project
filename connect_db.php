<?php
    $serverName = "LAPTOP-HPL2O8ER\SQLEXPRESS";
    $connectionInfo = array("Database"=>"test_db"); //, "UID"=>"LAPTOP-HPL2O8ER\katka", "PWD"=>"Akash@#$"
    $conn = sqlsrv_connect($serverName, $connectionInfo);
?>