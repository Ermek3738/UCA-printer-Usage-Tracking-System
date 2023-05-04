<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Total</title>
</head>
<body>
    <?php
        require 'header.php';

        $con = mysqli_connect("localhost","root","", "printer");
        if (!$con){
        die('Could not connect to localhost'. mysql_error());
        }

        mysqli_select_db($con, "printer");
        $result = "SELECT SUM(PaperNo), FullName FROM student_info GROUP BY FullName";
        $sql2 = $con->query($result); 

        echo "<table border = 1>";
        echo "<tr>";
        echo "<th> Name</th>";
        echo "<th> Email </th> ";
        echo "<th> Total Paper No </th>";
        echo "</tr>";  

        while ($row = mysqli_fetch_array($sql2)) {

            $name =  $row["FullName"];
            $email =  "email@a.com";
            $TotalPaperNo =  $row[0];

            $sql = "INSERT INTO total VALUES ('$name','$email','$TotalPaperNo')"; 
            if(mysqli_query($con, $sql)){
                    echo "<tr>";
                    echo "<th>$name</th>";
                    echo "<th>$email</th>";
                    echo "<th>$TotalPaperNo</th>";
                    echo "</tr>";


            } else{
                echo "ERROR! $sql. "
                    . mysqli_error($con);
            }
        }

        echo "</table>";

        ?> 


</body>
</html>