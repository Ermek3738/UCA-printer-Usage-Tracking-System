<html>
    <head>
        <title> Records </title>
    </head>
    <body>
        <?php
        $con = mysqli_connect("localhost","root","", "printer");
        if (!$con){
        die('Could not connect to localhost'. mysql_error());
        }
        
        mysqli_select_db($con, "printer");
        $result = mysqli_query($con,"SELECT * FROM student_info");
        
        $sql = "DELETE FROM student_info WHERE Name = Null";
        if ($con->query($sql) === TRUE) {
            echo "Record deleted successfully";
          } else {
            echo "Error deleting record: " . $conn->error;
          }
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
        <br />Your search yielded
        <strong>
            <?php print( "$counter"-1 ) ?> results.<br />
        </strong>

        <p>Click <a href = "index.html">here</a> to submit the next
        record.</p>
        <p>Click <a href = "total.html">here</a> to submit the next
        record.</p>
    </body>
</html>
