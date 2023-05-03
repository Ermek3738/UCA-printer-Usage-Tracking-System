<!DOCTYPE html>
<html>
<head>
    <title>Insert Page</title>
</head>
<body>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "printer");
         
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }

        $Date= $_REQUEST['Date'];
        $Name =  $_REQUEST['Name'];
        $Year =  $_REQUEST['Year'];
        $PaperNo =  $_REQUEST['PaperNo'];
        $Reason= $_REQUEST['Reason'];

        $sql = "INSERT INTO student_info VALUES ('$Date','$Name','$Year','$PaperNo','$Reason')";
         
        if(mysqli_query($conn, $sql)){
            echo "<h3>Your recorded Data</h3>";
 
                echo "<table border = 1>";
                echo "<tr>";
                echo "<td>$Date</td>";
                echo "<td>$Name</td>";
                echo "<td>$Year</td>";
                echo "<td>$PaperNo</td>";
                echo "<td>$Reason</td>";
                echo "</tr>";
                echo "</table>";
        } else{
            echo "ERROR! $sql. "
                . mysqli_error($conn);
        }
         
        mysqli_close($conn);
        ?>
        <p>Click <a href = "index.html">here</a> to submit the next
        record.</p>
        <p>Click <a href = "Read.php">here</a> to read the stored
        records.</p>
</body>
 
</html>