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
    <title>Form</title>
</head>
<body>
    <?php
        require 'header.php';
    ?>
    <h3>Record Form</h3>
    <br>
    <form action="Create.php" method="post">
        Date: <input id = "currDate" type = "text" name = "Date" readonly/> <br>
        Name: <input type="text" name="FullName" required/> <br>
        Year: <input type="number" name="Year" required/> <br>
        Number of papers: <input type="number" name="PaperNo" required/><br>
        Reason: <input type="text" name="Reason" required/> <br>
        <br>
        <input type="submit" value = "Submit"/>
        <input type="reset" value = "Clear"/>
    </form>

    <script>
        var dt = new Date();
        document.getElementById('currDate').value = dt.getDate() + "/" + (dt.getMonth() + 1) + "/" + dt.getFullYear();

    </script>
</body>
</html>