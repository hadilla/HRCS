<?php
include("db_connect.php");

if(isset($_GET['matricnumber']) && $_GET['matricnumber'] !== '')
{
	$getmatricnumber = $_GET['matricnumber'];
	//echo $getpatientid;
	$selupdatetwo = "SELECT * FROM treatment_and_medicine WHERE Matric_Num = '".$getmatricnumber."'";
	$qry = mysqli_query($con, $selupdatetwo);
	$selassoc = mysqli_fetch_array($qry);
	$date = $selassoc['Date'];
	$matricnumber = $selassoc['Matric_Num'];
	$name = $selassoc['Name'];   
    $diagnosis_system= $selassoc['Diagnosis_system'];
	$clinical_finding = $selassoc['Clinical_finding'];
	$symptom = $selassoc['Symptom'];
	$investigation = $selassoc['Investigation'];
	$treatment = $selassoc['Treatment'];
	$name_of_medicine = $selassoc['Name_of_medicine'];
	$dos = $selassoc['Dos'];
    $frequency = $selassoc['Frequency'];
    $duration = $selassoc['Duration'];
	//$birthdate = date("Y/m/d", strtotime($birthdate));

	//echo $patientid;
	//echo $usernameR;

?>
<!DOCTYPE html>
<html>
<head>
   <title>Update Patient Treatment and Medicine Form</title>
   <link rel="stylesheet" type="text/css" href="/HRCS/CSS(baru)/updatetreatmentmedicine.css">
  
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
                <li class="active"><a href= "Doctor.html">Doctor</a>
                    <div class="sub-menu-1">
                      <ul>
                         <li class="hover-me"><a href="Doctor.html">Patient Treatment and Medicine </a>
                           <div class="sub-menu-2">
                           <ul>
                              <li><a href="/HRCS/treatmentandmedicine.html">Add Patient Treatment and Medicine Form</a></li>
                               <li><a href="/HRCS/managetreatmentmedicine.html">Manage Patient Treatment and Medicine</a></li>
                               <li><a href="/HRCS/doctorview.html">View</a></li>
                           </ul>
                           </div>
                         </li>
                         <!--<li class="hover-me"><a href="/HRCS/nurseview.html">View Patient Treatment and Medicine</p></a>
                          <div class="sub-menu-2">
                           <ul>
                              <li><a href="">Update Patient Medicine</a></li>
                               <li><a href="/HRCS/displaypatientmedicine.html">View Patient Medicine</a></li>
                           </ul>
                           </div>
                         </li>-->
                        
                      </ul>
                    </div>
                </li>
                    
                <li><a href= "#">Help</a></li>
				<li><a href= "Homepage2.html">Logout</a></li>
				<li><a href= "Doctor.html">Back</a></li>
                
            </ul>
		</div>
		
	<div>
		<br>
		<br><br><br><br>
    </div>
	

<div class="updatetreatmentmedicine">
<h2>Update Patient Treatment and Medicine Form</h2>
<form method="POST" id="updatetreatmentmedicine" autocomplete="off" action="/HRCS/PHP/updatetreatmentmedicine_Submit.php?matricnumber_up=<?php echo $getmatricnumber; ?>">
			
    <label> Date       :</label><br>
	<input type="date" name="date" id="name" placeholder="" value="<?php echo strftime('%Y-%m-%d',strtotime($date)); ?>"><br><br>
	<label> Matric Number   :</label><br>
	<input type="string" name="matricnumber" id="name" placeholder="" value="<?php echo $matricnumber ?>"><br><br>
	<label> Name :</label><br>
	<input type="string" name="name" id="name" placeholder="" value="  <?php echo $name ?>"disabled><br><br>
	<label> Diagnosis System :</label><br>
	<input type="string" name="diagnosis_system" id="name" placeholder="" value="<?php echo $diagnosis_system ?>"><br><br>		   
	<label> Clinical Finding        :</label><br>
	<input type="string" name="clinical_finding" id="name" placeholder="" value="<?php echo $clinical_finding ?>"><br><br>
    <label> Symptom   :</label><br>
	<input type="string" name="symptom" id="name" placeholder="" value="<?php echo $symptom ?>"><br><br>
	<label>Investigation :</label><br>
    <input type="string" name="investigation" id="name" placeholder="" value="<?php echo $investigation ?>"><br><br>
    <label>Treatment :</label><br>
    <input type="string" name="treatment" id="name" placeholder="" value="<?php echo $treatment ?>"><br><br>
	<label> Name of Medicine      :</label><br>
	<textarea name ="name_of_medicine" rows="5" cols="55"><?php echo $name_of_medicine?></textarea><br><br>
	<label>Dos :</label><br>
    <input type="string" name="dos" id="name" placeholder="" value="<?php echo $dos ?>"><br><br>
    <label>Frequency :</label><br>
    <input type="string" name="frequency" id="name" placeholder="" value="<?php echo $frequency ?>"><br><br>
    <label>Duration :</label><br>
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



