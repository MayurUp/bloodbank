<?php
session_start();
date_default_timezone_set("Asia/Kolkata");

require_once('connect.php');

if(isset($_POST) & !empty($_POST)){
    $username = $_POST['username'];
    $password = md5($_POST['password']);


    $sql = "SELECT * FROM `hospital` WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connection, $sql);
    $count = mysqli_num_rows($result);
    $row=mysqli_fetch_assoc($result);
    if($count == 1){

        $_SESSION['username'] = $row['username'];
    header("Location:events.php");  
    }
    else{
        $fmsg = "Invalid Username/Password";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>User Login </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
    
    <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
      <center style="margin: 15px;padding: 25px;">
        <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">LogIn / Register</h2>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">@</span>
          <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <a class="btn btn-lg btn-primary btn-block" href="hregister.php">Register</a>
      </form>
      </center>
    </div>

</div>
</body>
</html>