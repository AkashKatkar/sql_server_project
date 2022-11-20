<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SQL Server</title>
        <meta name="description" content="SQL server practice">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            table, th, td{
                border: 1px solid #000;
                text-align: center;
            }
            div{
                display: flex;
                justify-content: center;
                align-items: center;
            }
        </style>
    </head>
    <body>
        <div>
            <table>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Country Code</th>
                    <th>Contact Number</th>
                </tr><?php
                include 'connect_db.php';
                $a = 1;
                $stmt = sqlsrv_query($conn, 'SELECT * FROM test_tbl');
                while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){ ?>
                    <tr>
                        <td><?php echo $a; ?></td>
                        <td><?php echo $rows['username']; ?></td>
                        <td><?php echo $rows['country_code']; ?></td>
                        <td><?php echo $rows['pnum']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>