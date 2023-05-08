<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <!-- <link rel="stylesheet" href="index.css"> -->
</head>
<style>
    body{
        background-image: url('background.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
    }
    
</style>

<body>
<?php
            require 'header.php';
        ?>
    <br><br><br><div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3>Record Form</h3> <br><br>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="Create.php">
                            <div class="form-group">
                                <input id = "currDate" class="form-control" type = "text" name = "Date" readonly/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Name" name="FullName" required/>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Year" name="Year" required/>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Number of Papers" name="PaperNo" required/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Purpose" name="Reason" required/>
                            </div>
                            <div class="form-group">
                                <input type="submit" value = "Submit" class="btn btn-primary"/>
                                <input type="reset" value = "Clear" class="btn btn-primary"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </div>

    <script>
        var dt = new Date();
        document.getElementById("currDate").value = (dt.getMonth() + 1) + "/" + dt.getDate() + "/" + dt.getFullYear()   ;
    </script>
</body>
</html>