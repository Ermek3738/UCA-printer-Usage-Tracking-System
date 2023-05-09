<!DOCTYPE html>
<html>
<head>
    <title>Insert Page</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    color: rgba(255,255,255,.65);
    }

    .card {
    border-radius: .5rem;
    }
</style>
<body>
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
        $Reason= $_REQUEST['Reason'];

        $sql = "INSERT INTO student_info VALUES ('$Date','$FullName','$Year','$PaperNo','$Reason')";
        ?>
        <section class="intro">
        <div>
            <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0,0,0,.79);">
            <div class="container">
                <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card bg-dark shadow-2-strong">
                    <div class="card-body">
                        <div class="table-responsive">
                        <h3>Your recorded Data</h3> <br>
                        <table class="table table-dark table-borderless mb-0">
                            <thead>
                            <tr>
                                <th scope="col">DATE</th>
                                <th scope="col">NAME</th>
                                <th scope="col">YEAR</th>
                                <th scope="col">PAPER NO</th>
                                <th scope="col">PURPOSE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            
                            
        <?php
        if(mysqli_query($conn, $sql)){
                echo "<th scope='row'>$Date</th>";
                echo "<td>$FullName</td>";
                echo "<td>$Year</td>";
                echo "<td>$PaperNo</td>";
                echo "<td>$Reason</td>";
        ?>
                            </tr>
                        </tbody>
                    </table>
                    </div>                           
                </div>
                </div>
                <br>
                <p>Click <a href = "index.php">here</a> to submit the next
                    record.</p> <br>
                <p>Click <a href = "Read.php">here</a> to read the stored
                    records.</p>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
        <?php
        } else{
            echo "ERROR! $sql. "
                . mysqli_error($conn);
        }
         
        mysqli_close($conn);
        ?>
</body>
 
</html>