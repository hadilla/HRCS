<?php
include("db_connect.php");

if(isset($_GET['patientid']) && $_GET['patientid'] !== '')
{
	$getpatientid = $_GET['patientid'];
	//echo $getpatientid;
	$selupdatetwo = "SELECT * FROM patient_treatment WHERE PatientID = '".$getpatientid."'";
	$qry = mysqli_query($con, $selupdatetwo);
	$selassoc = mysqli_fetch_array($qry);
	$patientid = $selassoc['PatientID'];
	$diagnosis_system = $selassoc['Diagnosis_system'];   
	$clinical_finding = $selassoc['Clinical_finding'];
	$symptom = $selassoc['Symptom'];
	$investigation = $selassoc['Investigation'];
	$treatment = $selassoc['Treatment'];

	//echo $patientid;
	

	?>
		<!DOCTYPE html>
		<html>
		<head>
		<title>Update Patient Treatment Form</title>
		<link rel="stylesheet" type="text/css" href= "/HRCS/css(baru)/updatepatienttreatment.css">
		
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

			<div class="updatepatienttreatment">
			<h2>Update Patient Treatment Form</h2>
			<form method="POST" id="updatepatienttreatment" autocomplete="off" action="/HRCS/PHP/updatepatienttreatment_Submit.php?patientid_up=<?php echo $getpatientid; ?>">
			
				<label> PatientID   :</label><br>
				<input type="string" name="patientid" id="name" placeholder="" value="<?php echo $patientid ?>"><br><br>
				<label> Diagnosis System :</label><br>
				<input type="string" name="diagnosis_system" id="name" placeholder="" value="<?php echo $diagnosis_system ?>"><br><br>
				<label> Clinical Finding :</label><br>
				<input type="string" name="clinical_finding" id="name" placeholder="" value="<?php echo $clinical_finding ?>"><br><br>		   
				<label> Symptom      :</label><br>
				<input type="string" name="symptom" id="name" placeholder="" value="<?php echo $symptom ?>"><br><br>
				<label> Investigation   :</label><br>
				<input type="string" name="investigation" id="name" placeholder="" value="<?php echo $investigation ?>"><br><br>
				<label> Treatment   :</label><br>
                <input type="string" name="treatment" id="name" placeholder="" value="<?php echo $treatment ?>"><br><br>
                
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


