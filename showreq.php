<?php

include 'event_new.php';

$sql="SELECT * FROM request ORDER BY id DESC";
$result=mysqli_query($conn,$sql);
?>
<div class="col-lg-12" id="dashboard">
<p style="font-family: arial;"><h2><b><center>All Requests</center></b></h2></p>
<div class="page-header" ></div>

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-lg-1"><center><b>ID</b></center></div>
			<div class="col-lg-1"><center><b>Name</b></center></div>
			<div class="col-lg-1"><center><b>phone</b></center></div>
			<div class="col-lg-2"><center><b>category</b></center></div>
			<div class="col-lg-3"><center><b>Information</b></center></div>
			<div class="col-lg-1"><center><b>Email Id</b></center></div>
		</div>
	</div>
</div>

	<?php
		while ($row=mysqli_fetch_assoc($result)) {
			echo "<div class='panel panel-default'>
				<div class='panel-body'>
					<div class='row'>
						<div class='col-lg-1'><center>".$row['id']."</center></div>
						<div class='col-lg-1'><center><a href='#".$row['id']."'>".$row['name']."</a></center></div>
						<div class='col-lg-1'><center>".$row['phone']."</center></div>
						<div class='col-lg-1'><center>".$row['category']."</center></div>
						<div class='col-lg-3'><center>".$row['info']."</center></div>
						<div class='col-lg-1'><center>".$row['email']."</center></div>
					</div>
			</div></div><br>";
		}
	?>

        </div> <!--col-lg-9-->
        </div><!--container-->
    </body>
</html>
