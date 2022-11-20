<?php
    // Insert rows
    $sql = 'INSERT INTO test_tbl(id, username, country_code, pnum) VALUES(?, ?, ?, ?)';
    $params = [2, "Sky", "91", "7385183328"];
    //if($stmt = sqlsrv_query($conn, $sql, $params)){ echo 'Insert Succefully!'; }else{ echo 'Insert Failed!'; }
    
    // Fetch data table
    $sql = 'SELECT * FROM test_tbl';
    $params = []; // $params = array(1);
    $stmt = sqlsrv_query($conn, $sql, $params);
    echo '<pre>';
    while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
        print_r($rows);
    }
?>