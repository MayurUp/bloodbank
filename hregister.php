<?php
date_default_timezone_set("Asia/Kolkata");

require_once('connect.php');
if(isset($_POST) & !empty($_POST)){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = md5($_POST['password']);
    $date=date('Y-m-d H:i:s');

    $code=rand(10000,99999);
    $sql = "INSERT INTO `hospital` (username, email, password,code,date) VALUES ('$username', '$email', '$password','$code','$date')";
    $result = mysqli_query($connection, $sql);

    if($result){
        $smsg = "User Registration successfull";

        $to=$email;
        $subject="VERIFICATION || EMAIL";
        $headersUser="From:mayur.gupta@lapolo.in";
        $headersUser .= "MIME-Version: 1.0" . PHP_EOL;
        $headersUser .= "Content-Type: text/html; charset=ISO-8859-1" . PHP_EOL;
        $body='<!DOCTYPE html>
        <html>
        <body>
        <h2>WELCOME TO BB(Blood Bank) ! </h2>
        <p>please go to the following link and enter your unique code to verify your Email</p><br>
        <p>YOUR UNIQUE CODE IS - <b>'.$code.'</b></p>
        <br>
        <p>GO to following link to verify your code ! <a href="hlogin.php">Verify your mail</a></p>
        </body>
        </html>';

        ini_set('SMTP', 'stmp.gmail.com'); 
        ini_set('smtp_port', 465);
        mail($to, $subject,$body,$headers);

    }else{
        $fmsg = "User registration failed";
    }
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
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
      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Please Register</h2>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">@</span>
          <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <a class="btn btn-lg btn-primary btn-block" href="hlogin.php">Login</a>
      </form>
</div>
</body>
</html>