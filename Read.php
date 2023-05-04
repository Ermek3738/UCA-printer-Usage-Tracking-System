<?php
    require 'connection.php';
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Records </title>
    </head> 
    <body>
        <?php
            require 'header.php';
        ?>
        <?php
        $con = mysqli_connect("localhost","root","", "printer");
        if (!$con){
        die('Could not connect to localhost'. mysql_error());
        }
        
        
        mysqli_select_db($con, "printer");
        $result = mysqli_query($con,"SELECT * FROM student_info");

        mysqli_close($con);

        ?>
        <h3>Recorded data</h3>
        <table border = 1>
            <tr>
                <th> № </th>
                <th> Date</th>
                <th> Name </th> 
                <th> Year </th>
                <th> Paper No </th>
                <th> Reason </th> 
            </tr>

            <?php
            // fetch each record in result set
            for ( $counter = 1; $row = mysqli_fetch_row( $result
            ); $counter++ ) {
            print( "<tr>" );
            print("<td>$counter</td>");
            foreach ( $row as $key => $value )
                print( "<td>$value</td>" );
            print( "</tr>" );
            
            } 
            ?><!-- end PHP script -->

        </table>
        <br>
        <p>Click <a href = "index.php">here</a> to submit the next
        record.</p>
        <br>
        <p>Click <a href = "total.php">here</a> totals.</p>
    </body>
</html>