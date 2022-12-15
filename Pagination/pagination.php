<?php
    $conn = sqlsrv_connect("LAPTOP-HPL2O8ER\SQLEXPRESS", array("Database"=>"test_db"));
    $rows = $_POST['rows'];
    $page = $_POST['page'];

    $from = $rows * ($page-1) + 1;
    $to = $rows * $page;
    
    $tbody = '';
    $a = 1;
    $query = sqlsrv_query($conn, "SELECT * FROM (SELECT ROW_NUMBER() OVER (ORDER BY emp_id DESC) row_id, * FROM employee) T WHERE T.row_id BETWEEN $from AND $to");
    while($fetch_records = sqlsrv_fetch_array($query)){
        $tbody .= '<tr>
            <th>'.$a++.'</th>
            <td>'.$fetch_records['emp_name'].'</td>
            <td>'.$fetch_records['emp_salary'].'</td>
            <td>'.$fetch_records['gender'].'</td>
        </tr>';
    }

    
    $query = sqlsrv_query($conn, "SELECT COUNT(*) AS emp_count FROM employee");
    if($fetch_records = sqlsrv_fetch_array($query)){
        $total_page = ceil($fetch_records['emp_count']/$rows);
    }

    $pagination = '';
    if(ceil($from/$rows) == 0){
        $p = 1;
    }else{
        $p = ceil($from/$rows);
        if($_POST['page'] == $total_page && $total_page > 2){ $p--; }
    }

    $pagination .= '<li class="page-item ';if($page == 1){ $pagination .= 'disabled'; }$pagination .= '">
        <a class="page-link first" href="#" onclick="pagination(1)">First</a>
    </li>
    <li class="page-item ';if($page == 1){ $pagination .= 'disabled'; }$pagination .= '">
        <a class="page-link prev" href="#" onclick="pagination('.$p.')">Previous</a>
    </li>';
    $arr = [];
    $z = 1;
    for($x=$p;$x<=$total_page;$x++){
        array_push($arr, $x);
        $pagination .= '<li class="page-item'; if($page == $x){ $pagination .= ' active'; } $pagination .= '">
            <a class="page-link num" data-id="'.$z.'" href="#" onclick="pagination('.$x.')">'.$x.'</a>
        </li>';
        if($z == 3){ break; } $z++;
    }
    $pagination .= '<li class="page-item ';if($page == $total_page){ $pagination .= 'disabled'; }$pagination .= '">
        <a class="page-link next" href="#" onclick="pagination('; if(count($arr) >= 3){ if($page == 1){ $pagination .= 2; }else{ $pagination .= $arr[count($arr)-1]; } }else{ $pagination .= $arr[count($arr)-1]; } $pagination .= ')">Next</a>
    </li>
    <li class="page-item ';if($page == $total_page){ $pagination .= 'disabled'; }$pagination .= '">
        <a class="page-link last" href="#" onclick="pagination('.$total_page.')">Last</a>
    </li>';

    echo json_encode(array($tbody, $pagination));
?>