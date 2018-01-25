<?php
date_default_timezone_set("Asia/Kolkata");
include 'connect.php';
?>
<?php 
session_start();
date_default_timezone_set("Asia/Kolkata");
$conn=mysqli_connect('localhost','root','','bloodbank');
if (!isset($_SESSION['username'])) {
    header("Location:events.html");
}
    $username=$_SESSION['username'];
    $mysql="SELECT * FROM hospital WHERE username='$username'";
    $myresult=mysqli_query($conn,$mysql);
    $myrow=mysqli_fetch_assoc($myresult);
        if ($myrow['status']!='1') {
            header("Location:verification.php");
        }        

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    </head>
    <body onload="set_interval()" onmousemove="reset_interval()" onscroll="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()">
    <!-- Navigation -->
     <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">BloodBank</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Hi,<?php echo $username;?>
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="showreq.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</li>
      </ul>
    </div>
  </div>
</nav>
        <div class="container" theme-showcase" role="main" style="background: #e2e2e2;padding-top: 10px;"; >     	

        <div>
            <?php
                $today=date('Y-m-d');
                $sqlUp="SELECT * FROM bloodgroups where date<='$today' AND enddate>='$today'";
                $resultUp=mysqli_query($connection,$sqlUp);
                $rowCount=mysqli_num_rows($resultUp);
                //if there is an onGoing event then show carousel
                if ($rowCount>0) {
                    ongoingEvents($connection,$rowCount,$resultUp);
                }
            ?>
        </div>

        <div class="panel panel-default" style="border: 1px solid black;">
            <div class="panel-body" >
                <div class="row">
                    <div class="col-lg-4">
                        <select class='form-control' id="type">
                            <option value="default">All Group</option>
                            <option value='O+'>O+</option>
                            <option value='O-'>O-</option>
                            <option value='A+'>A+</option>
                            <option value='A-'>A-</option>
                            <option value='B+'>B+</option>
                            <option value='B-'>B-</option>
                            <option value='AB+'>AB+</option>
                            <option value='AB-'>AB-</option>
                        </select>
                    </div><!--column-->
                    <div class="col-lg-4">
                        <select class='form-control' id="year">
                            <option value="default">All Year</option>
                            <option value="year2018">2018</option>
                            <option value="year2017">2017</option>
                            <option value="year2016">2016</option>
                        </select>
                    </div><!--column-->
                    <div class="col-lg-4">
                        <select class='form-control' id="month">
                            <option value="default">All Month</option>
                            <option value="month01">January</option>
                            <option value="month02">February</option>
                            <option value="month03">March</option>
                            <option value="month04">April</option>
                            <option value="month05">May</option>
                            <option value="month06">June</option>
                            <option value="month07">July</option>
                            <option value="month08">August</option>
                            <option value="month09">September</option>
                            <option value="month10">October</option>
                            <option value="month11">November</option>
                            <option value="month12">December</option>
                        </select>
                    </div><!--column-->
                </div><!--row-->
            </div><!--panel body-->
        </div><!--panel-->

        <br><h2><center><u>AVAILABLE BLOOD</u></center></h2>
        <?php
            $sql="SELECT * FROM bloodgroups ";
            $result=mysqli_query($connection,$sql);
            while ($row=mysqli_fetch_assoc($result)) {
                $date=[];
                $date=explode("-", $row['date']);
                if ($row['date']>date("Y-m-d")) {
                    if ($row['category']=='polo') {
                        echo"<div class='col-lg-4 ".$row['category']." year".$date[0]." month".$date[1]." eventDiv' style='margin-bottom:1%'>
                            <center style='background:#fff;' >
                                <b><a href='#".$row['id']."'>".$row['name']."</a></b><br>
                                ".$row['location']." <br>
                                (".$row['date'].")-(".$row['enddate'].")<br>
                                ".$row['category']."
                            </center>
                        </div>";
                    }
                    else{
                        echo"<div class='col-lg-4 ".$row['category']." year".$date[0]." month".$date[1]." eventDiv' style='margin-bottom:1%'>
                            <center style='background:#fff;'>
                                <b><a href='#".$row['id']."'>".$row['name']."</a></b><br>
                                ".$row['location']." <br>
                                (".$row['date'].")-(".$row['enddate'].")<br>
                                ".$row['category']."
                            </center>
                        </div>";
                    }//else loop
                }//if loop for date
            }//while loop
        ?><!--UPCOMING EVENTS-->

<div class="row"><!-- <center> <a href='request.php'><button type="button" class="btn btn-success btn-lg">
Requst blood</button></a></center> --></div>
        <br><br><h2><center><u>PAST BLOOD</u></center></h2>
        <?php
            $sqlPast="SELECT * FROM bloodgroups ";
            $resultPast=mysqli_query($connection,$sqlPast);
            while ($rowPast=mysqli_fetch_assoc($resultPast)) {
                $date=[];
                $date=explode("-", $rowPast['date']);
                if ($rowPast['date']<date("Y-m-d")) {
                    if ($rowPast['category']=='polo') {
                        echo"<div class='col-lg-4 ".$rowPast['category']." year".$date[0]." month".$date[1]." eventDiv' style='margin-bottom:1%'>
                            <center style='background:#fff;' >
                                <b><a href='#".$rowPast['id']."'>".$rowPast['name']."</a></b><br>
                                ".$rowPast['location']."<br>
                                (".$rowPast['date'].")-(".$rowPast['endDate'].")<br>
                                ".$rowPast['category']."
                            </center>
                        </div>";
                    }
                    else{
                        echo"<div class='col-lg-4 ".$rowPast['category']." year".$date[0]." month".$date[1]." eventDiv' style='margin-bottom:1%'>
                            <center style='background:#fff;'>
                                <b><a href='#".$rowPast['id']."'>".$rowPast['name']."</a></b><br>
                                ".$rowPast['location']." <br>
                                (".$rowPast['date'].")-(".$rowPast['enddate'].")<br>
                                ".$rowPast['category']."
                            </center>
                        </div>";
                    }//else loop
                }//if loop for date
            }//while loop
        ?><!--past events-->

        </div><!--container--> 
        <?php
            function ongoingEvents($connection,$rowCount,$resultUp)
            {
                            for($i=0;$i<$rowCount;$i++){
                                $rowUp=mysqli_fetch_assoc($resultUp);
                            }
            }
        ?>

        <script type="text/javascript">
                //event type filter-----
                $("#type").change(function(){
                    var type=$(this).val();
                    if (type!="default") {
                        $("."+type).show("slow");
                        $(".eventDiv:not(."+type+")").hide("slow");
                    }
                    else{
                        $(".eventDiv").show("slow");
                    }
                        //checking event year
                        checkYear();
                        //checking event month
                        checkMonth();
                });

                //year type filter-----
                $("#year").change(function(){
                    var year=$(this).val();
                    if (year!="default") {
                        $("."+year).show("slow");
                        $(".eventDiv:not(."+year+")").hide("slow");
                    }
                    else{
                        $(".eventDiv").show("slow");
                    }
                        //checking event type
                        checkType();
                        //checking event month
                        checkMonth();
                });

                //month type filter-----
                $("#month").change(function(){
                    var month= $(this).val();
                    if (month!="default") {
                        $("."+month).show("slow");
                        $(".eventDiv:not(."+month+")").hide("slow");
                    }
                    else{
                        $(".eventDiv").show("slow");
                    }
                        //checking event year
                        checkYear();
                        //checking event type
                        checkType();
                    
                });

                function checkMonth(){
                    var monthC=$("#month").val();
                    if (monthC!="default") {
                        $(".eventDiv:not(."+monthC+")").hide();
                    }
                }
                function checkYear(){
                    var yearC=$("#year").val();
                    if (yearC!="default") {
                        $(".eventDiv:not(."+yearC+")").hide();
                    }
                }
                function checkType(){
                    var typeC= $("#type").val();
                    if (typeC!="default") {
                        $(".eventDiv:not(."+typeC+")").hide();
                    }
                }
        </script>
    </body>
</html>
