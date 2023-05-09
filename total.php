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
<style>
        body{
            background-image: url('background.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
        html,
        body,
        .intro {
        height: 100%;
        }

        table td,
        table th {
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        }

        thead th,
        tbody th,h3 {
        color: #fff;
        }

        tbody td, p {
        font-weight: 500;
        color: rgba(255,255,255,.70);
        }

        .card {
        border-radius: .5rem;
        }
    </style>
<body>
    <?php
        require 'header.php';

        $con = mysqli_connect("localhost","root","", "printer");
        if (!$con){
        die('Could not connect to localhost'. mysql_error());
        }

        mysqli_select_db($con, "printer");
        $result = "SELECT SUM(student_info.PaperNo), student_info.FullName as FullName, users.email 
                FROM student_info 
                INNER JOIN users
                ON student_info.Fullname LIKE users.name
                GROUP BY student_info.FullName";
        $sql2 = $con->query($result); 
?>
        <br><br><br>
        <section class="intro">
        <div>
            <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0,0,0,.60);">
            <div class="container">
                <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card bg-dark shadow-2-strong">
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-dark table-borderless mb-0">
                            <thead>
                            <tr>
                                <th scope="col"> Name </th> 
                                <th scope="col"> Email </th>
                                <th scope="col"> Total Paper No </th>
                            </tr>
                            </thead>
                            <tbody>
        <?php 

        while ($row = mysqli_fetch_array($sql2)) {

            $name =  $row[1];
            $email =  $row[2];
            $TotalPaperNo =  $row[0];

            $sql = "INSERT INTO total VALUES ('$name','$email','$TotalPaperNo')"; 
            
            if(mysqli_query($con, $sql)){
                    echo "<tr>";
                    echo "<th>$name</th>";
                    echo "<td>$email</th>";
                    echo "<th>$TotalPaperNo</th>";
                    echo "</tr>";

            } else{
                echo "ERROR! $sql. "
                    . mysqli_error($con);
            }
        }

        ?>

                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                    <br>
                    <p>Click <a href = "index.php">here</a> to submit the next
                    record.</p>
                    <br>
                    <p>Click <a href = "Read.php">here</a> to see recorded data.</p>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
</body>
</html>