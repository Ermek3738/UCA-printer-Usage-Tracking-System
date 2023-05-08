<?php
    require 'connection.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
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
        color: rgba(255,255,255,.75);
        }

        .card {
        border-radius: .5rem;
        }
    </style>
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
        <br><br>    
        <section class="intro">
        <div>
            <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0,0,0,.60);">
            <div class="container">
                <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card bg-dark shadow-2-strong">
                    <h3>Recorded data</h3> <br>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-dark table-borderless mb-0">
                            <thead>
                            <tr>
                                <th scope="col"> № </th>
                                <th scope="col"> Date</th>
                                <th scope="col"> Name </th> 
                                <th scope="col"> Year </th>
                                <th scope="col"> Paper No </th>
                                <th scope="col"> Reason </th> 
                            </tr>
                            </thead>
                            <tbody>
            <?php
            // fetch each record in result set
            for ( $counter = 1; $row = mysqli_fetch_row( $result
            ); $counter++ ) {
            echo( "<tr>" );
            echo ("<td>$counter</td>");
            foreach ( $row as $key => $value )
                echo ( "<td>$value</td>" );
           echo ( "</tr>" );
            
            } 
            ?><!-- end PHP script -->

                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                    <br>
                    <p>Click <a href = "index.php">here</a> to submit the next
                    record.</p>
                    <br>
                    <p>Click <a href = "total.php">here</a> to see each student's total.</p>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
    </body>
</html>
