<?php
// include 'connection.php';
include 'hprofile.php';

$url=$_SERVER['REQUEST_URI'];
if (strpos($url, 'EventAdded')) {
 echo"<br><div class='alert alert-success'>
     <p><center>This bloodgroups is Available Now!!</center></p>
 	</div>";
}

if (isset($_POST['submitBtn'])) {
		$name=$_POST['name'];
		$category=$_POST['category'];
		$location=$_POST['location'];
		$startDate=$_POST['startDate'];
		$endDate=$_POST['endDate'];
		$info=$_POST['info'];

                function validation($data)
                {
                    $data=htmlspecialchars($data);
                    $data=trim($data);
                    $data=stripslashes($data);
                }

                validation($name);
                validation($category);
                validation($location);
                validation($startDate);
                validation($endDate);
                validation($info);

                $conn = mysqli_connect('localhost','root','','bloodbank');
                $sql = "INSERT INTO bloodgroups (name, category, location, date, enddate, info) VALUES ('".$name."', '".$category."', '".$location."', '".$startDate."', '".$endDate."', '".$info."')";

                // $sql = "INSERT INTO 'bloodgroups' (name, category, location, date, enddate, info) VALUES ('$name', '$category', '$location', '$startDate', '$endDate', '$info')";


                $result=mysqli_query($conn,$sql) || die("unsuccessful");

}
?>  
<div class="col-lg-12" id="dashboard">
    <p style="font-family: arial;">
        <h2><b><center>Add Blood Group</center></b></h2></p>
    <div class="page-header"></div>

    <form method='POST' action='<?php echo $_SERVER['PHP_SELF'];?>' enctype='multipart/form-data'>

        <p><b>Blood Bank</b></p>
            <input type='text' name='name' class='form-control' placeholder='Enter Blood Bank here' required>
            <br>

            <div class='row'>
                <div class='col-lg-6'>
                    <p><b>Blood Category </p></b>
                        <select required class='form-control' name='category'>
                            <option value='O+'>O+</option>
                            <option value='O-'>O-</option>
                            <option value='A+'>A+</option>
                            <option value='A-'>A-</option>
                            <option value='B+'>B+</option>
                            <option value='B-'>B-</option>
                            <option value='AB+'>AB+</option>
                            <option value='AB-'>AB-</option>

                        </select>
                </div>
                <div class='col-lg-6'>
                    <p><b>Blood Location </p></b>
                        <input type='text' name='location' class='form-control' placeholder='Enter Blood location here' required>
                        <br>
                </div>
                <!--col-lg-6-->
            </div>
            <!--row-->

            <div class='row'>
                <div class='col-lg-6'>
                    <p><b>Blood Available Date </p></b>
                        <input type='date' name='startDate' class='form-control' id='startDate'>
                </div>
                <div class='col-lg-6'>
                    <p><b>Blood Expire Date </p></b>
                        <input type='date' name='endDate' class='form-control' id='endDate'>
                        <br>
                </div>
                <!--col-lg-6-->
            </div>
            <!--row-->

            <p><b>Blood Information</b></p>
            <textarea name='info' class='form-control' placeholder='Enter all Blood related information here' required></textarea>
            <br>
            <!--row-->
            <center>
                <button type='submit' name='submitBtn' class='btn btn-success btn-lg'>Add Blood</button>
            </center>
    </form>

    <div class="page-header"></div>
</div>

</body>

</html>
