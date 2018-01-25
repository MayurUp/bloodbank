<?php
session_start();
date_default_timezone_set("Asia/Kolkata");

if (!isset($_SESSION['username'])) {
    header('Location:hlogin.php');
}
elseif (isset($_SESSION['username'])) {
    $username=$_SESSION['username'];
    $conn=mysqli_connect('localhost','root','','bloodbank');
    $mysql="SELECT * FROM hospital WHERE username='$username'";
    $myresult=mysqli_query($conn,$mysql);
    $myrow=mysqli_fetch_assoc($myresult);
        if ($myrow['status']=='1') {
            header("Location:index.php?VERIFIED");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container" theme-showcase role="main">   
            <p style="float: right; font-family: comic;"><h2>VERIFICATION</h2></p> 
            <a class="btn btn-md btn-danger" href="logout.php" style="float: right;">LOGOUT</a>
            <div class="page-header"></div>

            <?php 
                echo "<form method='POST' action='".login()."'>
                        <input type='text' name='code' placeholder='Unique verification code' required class='form-control'><br>
                        <button class='btn btn-success btn-lg' type='submit' name='submit-btn'>Verify</button>
                    </form>";
            ?>	

        </div> 
        <?php
            function login(){   
                if (isset($_POST['submit-btn'])) {
                    $conn= mysqli_connect('localhost','root','','bloodbank');
                    $code=$_POST['code'];
                    $username=$_SESSION['username'];
                    echo $username;
                    $sql= "SELECT * FROM hospital WHERE username='$username'";
                    $result= mysqli_query($conn, $sql);
                    $row=mysqli_fetch_assoc($result);
echo $row['code'].'12';
                    if ($row['code']==$code) {
                        $sql2="UPDATE hospital SET status=1 WHERE username='$username'";
                        $result2=mysqli_query($conn,$sql2);
                        header("Location:events.php?VERIFIED");
                    }
                    else{
                        echo "INVALID CODE!";
                    }
                }
            }
        ?>
    </body>
</html>
