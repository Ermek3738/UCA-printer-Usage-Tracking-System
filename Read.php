<html>
    <head>
        <title> Reading data from the database </title>
    </head>
    <body>
        <?php
        $con = mysqli_connect("localhost","root","", "aelina");
        if (!$con){
        die('Could not connect to localhost'. mysql_error());
        }
        mysqli_select_db($con, "aelina");
        $result = mysqli_query($con,"SELECT * FROM daniiar");
        mysqli_close($con);
        ?>
        <h3>Search Results</h3>
        <table border = 1>
            <tr>
                <td>№</td>
                <td> Name </td> 
                <td> Password </td>
                <td> Contact No </td>
                <td> Gender </td> 
                <td> Skills </td> 
                <td> Department </td>
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
            } // end for
            ?><!-- end PHP script -->
        </table>
        <br />Your search yielded
        <strong>
            <?php print( "$counter"-1 ) ?> results.<br />
        </strong>

        <p>Click <a href = "index.html">here</a> to submit the next
        record.</p>
    </body>
</html>