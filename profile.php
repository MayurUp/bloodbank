<?php
session_start();
date_default_timezone_set("Asia/Kolkata");

if (!$_SESSION['username']) {
header('Location:login.php');
}
else{
    $username=$_SESSION['username'];
    $conn=mysqli_connect('localhost','root','','bloodbank');
    $mysql="SELECT * FROM users WHERE username='$username'";
    $myresult=mysqli_query($conn,$mysql);
    $myrow=mysqli_fetch_assoc($myresult);
    $myid=$myrow['id'];
    $username= strtoupper($myrow['username']);
    $password=$myrow['password'];
    $lname =$myrow['Lname'];
    $fname =$myrow['Fname'];
    $email =$myrow['email'];
    $phone =$myrow['phone'];
    $street =$myrow['street'];
    $city =$myrow['city'];
    $state =$myrow['state'];
    $zip =$myrow['zip'];
    $country =$myrow['country'];
}?>
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
    <body onload="set_interval()" onmousemove="reset_interval()" onscroll="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()">
        <div class="container" theme-showcase" role="main">    	
        <p style="font-family: comic;"><h2><center>DashBoard</center></h2></p>
        <a class="btn btn-md btn-danger" href="logout.php" style="float: right;">LOGOUT</a>
        <div class="page-header"></div>


        <div class="jumbotron">

        <a class="btn btn-md btn-primary" href="orders.php" style="float: right;">Your Orders</a>

        
            <p ><b><u>Welcome <?php echo "$username"; ?>,</u></b></p><br>
            <div class="row">
                <div class="col-sm-4">
                    <p style="font-family: comic; font-size: 18px">USER name</p><br>
                    <p style="font-family: comic; font-size: 18px">Email ID(verified)</p><br>
                    <p style="font-family: comic; font-size: 18px">First name</p><br>
                    <p style="font-family: comic; font-size: 18px">Last ID</p><br>
                    <p style="font-family: comic; font-size: 18px">Phone no.</p><br>
                    <p style="font-family: comic; font-size: 18px">Street</p><br>
                    <p style="font-family: comic; font-size: 18px">City</p><br>
                    <p style="font-family: comic; font-size: 18px">State</p><br>
                    <p style="font-family: comic; font-size: 18px">Zip</p><br>
                    <p style="font-family: comic; font-size: 18px">Country</p><br>
                </div>
                <div class="col-sm-8">
                <?php
                    echo "<form method='POST' action='".update()."'>
                        <p style='font-family: comic; font-size: 22px'> ".$username."</p><br>
                        <p style='font-family: comic; font-size: 22px'> ".$email."</p><br>
                        <input type='text' name='fname' class='form-control' value='".$fname."'><br>
                        <input type='text' name='lname' class='form-control' value='".$lname."'><br>
                        <input type='text' name='phone' class='form-control' value='".$phone."'><br>
                        <input type='text' name='street' class='form-control' value='".$street."'><br>
                        <input type='text' name='city' class='form-control' value='".$city."'><br>
                        <input type='text' name='state' class='form-control' value='".$state."'><br>
                        <input type='text' name='zip' class='form-control' value='".$zip."'><br>
                        <input type='text' name='country' class='form-control' value='".$country."'><br>
                        <button class='btn btn-success btn-lg' type='submit' style='float: right;' name='submit-btn'>UPDATE</button>
                        </form>";
                ?>
                </div>
            </div>
        </div>
    <?php
        function update(){
            if (isset($_POST['submit-btn'])) {
                $username=$_SESSION['username'];
                $lname =$_POST['lname'];
                $fname =$_POST['fname'];
                $phone =$_POST['phone'];
                $id =$_POST['id'];
                $street =$_POST['street'];
                $city =$_POST['city'];
                $state =$_POST['state'];
                $zip =$_POST['zip'];
                $country =$_POST['country']; 

                function validation($data)
                {
                    $data=htmlspecialchars($data);
                    $data=trim($data);
                    $data=stripslashes($data);
                }

                validation($fname);
                validation($lname);
                validation($street);
                validation($city);
                validation($state);
                validation($zip);
                validation($country);
                validation($phone);

                $conn=mysqli_connect('localhost','root','','bloodbank');
                $sql="UPDATE users set phone='".$phone."', street='$street', city='$city', state='$state', country='$country', zip='$zip',Fname='$fname' , Lname='$lname' where username='$username'";
                $result=mysqli_query($conn,$sql);

                header("Location:profile.php");
            }
        }
    ?>
        </div> 
            <script type="text/javascript">
        var timer=0;
        function set_interval() {
           timer= setInterval(auto_logout,20*60*1000);
        }
        function reset_interval() {
            if (timer!=0) {
                clearInterval(timer);
                timer=0;
                timer= setInterval(auto_logout,20*60*1000);
            }  
        }
        function auto_logout() {
            window.location="logout.php";
        }
    </script> 
    </body>
</html>
