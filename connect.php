<?php
$connection = mysqli_connect('localhost', 'root', '','bloodbank');
if(!$connection){
	die("Database Connection Failed" . mysqli_error($connection));
}?>