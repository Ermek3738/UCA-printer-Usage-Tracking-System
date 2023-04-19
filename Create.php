<!DOCTYPE html>
<html>
<head>
    <title>Insert Page page</title>
</head>
<body>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "aelina");
         
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        $name =  $_REQUEST['firstname'];
        $password = $_REQUEST['password'];
        $contactNo =  $_REQUEST['contactNo'];
        $gender =  $_REQUEST['gender'];
        $progskills= $_REQUEST['progskills'];
        $dep= $_REQUEST['dep'];
         

        $sql = "INSERT INTO daniiar  VALUES ('$name','$password','$contactNo','$gender','$progskills','$dep')";
         
        if(mysqli_query($conn, $sql)){
            echo "<h3>Your recorded Data</h3>";
 
            echo nl2br("\n$name\n $password\n "
                . "$contactNo\n $gender\n $progskills\n $dep");
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