<?php
include("db_connect.php");

if(isset($_GET['patientid']) && $_GET['patientid'] !== '')
{
	$getpatientid = $_GET['patientid'];
	//echo $getpatientid;
	$selupdatetwo = "SELECT * FROM patient_medicine WHERE PatientID = '".$getpatientid."'";
	$qry = mysqli_query($con, $selupdatetwo);
	$selassoc = mysqli_fetch_array($qry);
	$patientid = $selassoc['PatientID'];
	$name_of_medicine = $selassoc['Name_of_medicine'];   
	$dos = $selassoc['Dos'];
	$frequency = $selassoc['Frequency'];
	$duration = $selassoc['Duration'];
	

	//echo $patientid;
	

	?>
		<!DOCTYPE html>
		<html>
		<head>
		<title>Update Patient Medicine Form</title>
		<link rel="stylesheet" type="text/css" href= "/HRCS/css(baru)/updatepatientmedicine.css">
		
		</head>
		<body>
			<div id="wrapper">
				<header>
					<h1>HEALTH REPORT CARD SYSTEM</h1>
				</header>
				
				<div class="menu-bar">
					<ul>
						<li><a href= "homepage2.html">Homepage</a></li>
						<li><a href= "healthinfo.html">Health Info</a></li>
						<li class="active"><a href= "nurse1.html">Nurse</a>
							<div class="sub-menu-1">
							<ul>
								<li class="hover-me"><a href="patientinformation.html">Manage Patient Information</a>
								<div class="sub-menu-2">
								<ul>
									<li><a href="">Update Patient Information</a>
									<li><a href= "/HRCS/PHP/displaypatientinformation.php">View Patient Information</a>
								</ul>
								</div>
								</li>
								<li class="hover-me"><a href="patientmedicine.html">Manage Patient Medicine</p></a>
								<div class="sub-menu-2">
								<ul>
									<li><a href="">Update Patient Medicine</a>
									<li><a href="">View Patient Medicine</a>
								</ul>
								</div>
								</li>
								
							</ul>
							</div>
							</li>
							
						<li><a href= "#">Help</a></li>
						<li><a href= "Homepage2.html">Logout</a></li>
						
						</ul>
						</div>
			<div>
				<br>
				<br><br><br><br><br>
			</div>

			<div class="updatepatientmedicine">
			<h2>Update Patient Medicine Form</h2>
			<form method="POST" id="updatepatientmedicine" autocomplete="off" action="/HRCS/PHP/updatepatientmedicine_Submit.php?patientid_up=<?php echo $getpatientid; ?>">
			
				<label> PatientID   :</label><br>
				<input type="string" name="patientid" id="name" placeholder="" value="<?php echo $patientid ?>"><br><br>
				<label> Name of medicine :</label><br>
				<input type="string" name="name_of_medicine" id="name" placeholder="" value="<?php echo $name_of_medicine ?>"><br><br>
				<label> Dos :</label><br>
				<input type="string" name="dos" id="name" placeholder="" value="<?php echo $dos ?>"><br><br>		   
				<label> Frequency        :</label><br>
				<input type="string" name="frequency" id="name" placeholder="" value="<?php echo $frequency ?>"><br><br>
				<label> Duration   :</label><br>
				<input type="string" name="duration" id="name" placeholder="" value="<?php echo $duration ?>"><br><br>
				
				<input type="reset" name="reset" value="Reset" id="sub">
				<input type="submit" name="save" value="Save" id="sub">
			</form>
			</div>
			<div>
				<br>
				<br>
				<br> 
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
			</div>

		</body>
		</html>
<?php
  } 
  else 
  {
	echo "failed";
  }

?>


