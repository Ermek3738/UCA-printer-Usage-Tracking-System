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
    <title>Insert Page</title>
</head>
<body>
        <?php
            require 'header.php';
        ?>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "printer");
         
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }

        $Date= $_REQUEST['Date'];
        $FullName =  $_REQUEST['FullName'];
        $Year =  $_REQUEST['Year'];
        $PaperNo =  $_REQUEST['PaperNo'];
        $Reason = $_REQUEST['Reason'];

        $sql = "INSERT INTO student_info VALUES ('$Date','$FullName','$Year','$PaperNo','$Reason')";
         
        if(mysqli_query($conn, $sql)){
            echo "<h3>Your recorded Data</h3>";
 
                echo "<table border = 1>";
                echo "<tr>";
                echo "<td>$Date</td>";
                echo "<td>$FullName</td>";
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