<?php
date_default_timezone_set("Asia/Kolkata");

require_once('connect.php');
if(isset($_POST) & !empty($_POST)){
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $phone = md5($_POST['phone']);
    $category = mysqli_real_escape_string($connection, $_POST['category']);
    $info = mysqli_real_escape_string($connection, $_POST['info']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);


    $sql = "INSERT INTO `request` (name, phone, category, info, email) VALUES ('$name', '$phone', '$category', '$info', '$email')";
    $result = mysqli_query($connection, $sql);

    if($result){
        $smsg = "User Request Successfull";

    }else{
        $fmsg = "User Request failed";
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
        <h2 class="form-signin-heading">Request Blood</h2>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">@</span>
          <input type="text" name="name" class="form-control" placeholder="name" required>
        </div>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Phone No.</label>
        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone-No" required>
        <label for="inputPassword" class="sr-only">Blood-group</label>
        <input type="text" name="category" id="category" class="form-control" placeholder="category" required>
        <label for="inputPassword" class="sr-only">Info and Require Date</label>
        <input type="text" name="info" id="phone" class="form-control" placeholder="info" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Request</button>
      </form>
</div>
</body>
</html>