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
    tbody th {
    color: #fff;
    }

    tbody td {
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

        <?php
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
        <section class="intro">
  <div>
    <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0,0,0,.79);">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="card bg-dark shadow-2-strong">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-dark table-borderless mb-0">
                    <thead>
                      <tr>
                        <th scope="col">EMPLOYEES</th>
                        <th scope="col">POSITION</th>
                        <th scope="col">CONTACTS</th>
                        <th scope="col">AGE</th>
                        <th scope="col">ADDRESS</th>
                        <th scope="col">SALARY</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Tiger Nixon</th>
                        <td>System Architect</td>
                        <td>tnixon12@example.com</td>
                        <td>61</td>
                        <td>Edinburgh</td>
                        <td>$320,800</td>
                      </tr>
                      <tr>
                        <th scope="row">Sonya Frost</th>
                        <td>Software Engineer</td>
                        <td>sfrost34@example.com</td>
                        <td>23</td>
                        <td>Edinburgh</td>
                        <td>$103,600</td>
                      </tr>
                      <tr>
                        <th scope="row">Jena Gaines</th>
                        <td>Office Manager</td>
                        <td>jgaines75@example.com</td>
                        <td>30</td>
                        <td>London</td>
                        <td>$90,560</td>
                      </tr>
                      <tr>
                        <th scope="row">Quinn Flynn</th>
                        <td>Support Lead</td>
                        <td>qflyn09@example.com</td>
                        <td>22</td>
                        <td>Edinburgh</td>
                        <td>$342,000</td>
                      </tr>
                      <tr>
                        <th scope="row">Charde Marshall</th>
                        <td>Regional Director</td>
                        <td>cmarshall28@example.com</td>
                        <td>36</td>
                        <td>San Francisco</td>
                        <td>$470,600</td>
                      </tr>
                      <tr>
                        <th scope="row">Haley Kennedy</th>
                        <td>Senior Marketing Designer</td>
                        <td>hkennedy63@example.com</td>
                        <td>43</td>
                        <td>London</td>
                        <td>$313,500</td>
                      </tr>
                      <tr>
                        <th scope="row">Tatyana Fitzpatrick</th>
                        <td>Regional Director</td>
                        <td>tfitzpatrick00@example.com</td>
                        <td>19</td>
                        <td>Warsaw</td>
                        <td>$385,750</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
        <p>Click <a href = "index.html">here</a> to submit the next
        record.</p>
        <p>Click <a href = "Read.php">here</a> to read the stored
        records.</p>
</body>
 
</html>