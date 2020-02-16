<?php
include("db.php");

 $getPatientID = $_GET['Update'];


 $selupdatetwo = "SELECT * FROM `patient_information` WHERE $getPatientID";
 $qry = mysqli_query($con, $selupdatetwo);

 $selassoc = mysqli_fetch_assoc($qry);

 $patientid = $selassoc['PatientID'];
 echo $name = $selassoc['Name'];
 $ic_number = $selassoc['IC_Num'];
 $phone_number = $selassoc['Phone_Num'];
 $address = $selassoc['Address'];
 $gender = $selassoc['Gender'];
 $races = $selassoc['Races'];
 $birthdate = $selassoc['Birth_Date'];

 if (isset($_POST['update'])){

	$upname = $_POST['upname'];
	$upic_number = $_POST['upic_number'];
	$upphone_number = $_POST['upphone_number'];
    $upaddress = $_POST['upaddress'];
	 
	 $selupdate = "UPDATE `patient_information` SET `PatientID`=[value-1],`Name`=[$upname],`IC_Num`=[$upic_number],`Phone_Num`=[$upphone_number],`Address`=[$upaddress],`Gender`=[value-6],`Races`=[value-7],`Birth_Date`=[value-8] WHERE 'PatientID' = 'getpatientid";
	$qry = mysqli_query($con,$selupdate);

	if ($qry){
		header("location: displaypatient.php");



	}


 }

//$selupdate = "UPDATE `patient_information` SET `PatientID`=[value-1],`Name`=[value-2],`IC_Num`=[value-3],`Phone_Num`=[value-4],
			 // `Address`=[value-5],`Gender`=[value-6],`Races`=[value-7],`Birth_Date`=[value-8] WHERE 'patientid'= '$getipatientid'";

?>

<!DOCTYPE html>
<html>
<head>
   <title>Update Patient Information</title>
   <link rel="stylesheet" type="text/css" href="CSS(baru)/updatepatientinformation.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   
</head>
   <body>
     <div class="menu-bar">
     <ul>
     
	   <li><a href= "homepage.html"><i class="fa fa-home"></i>Home</a></li>
       <li><a href= "healthinfo.html">Health Info</a></li>
       <li class="active"><a href= "nurse.html">Nurse</a>
       <div class="sub-menu-1">
	   <ul>
	     <li ><a href="patientinformation.html">Manage Patient Information</a></li>
		 <li ><a href="patientmedicine.html">Manage Patient Medicine</a></li>
		 <li><a href="#">View Health Information</a></li>  
		 
	  </ul>
	</div>
	</li>
	    
     <li><a href= "homepage">Logout</a></li>
   
       </ul>
       </div> 
   
  
        <br>
        <br>
        <br>
	
	<div class="updatepatientinformation">
	  <h2>Update Patient Information</h2>
	<form method="POST" id="patientinformation" action="/HRCS/PHP/updatepatientinformation.php">
	
		<label> PatientID   :</label><br>
		<input type="string" name="patientid" id="name" placeholder="" value =" <?php echo $patientid; ?>"><br><br>
		<label> Name        :</label><br>
		<input type="string" name="upname" id="name" placeholder=""  value =" <?php echo $name; ?>"><br><br>
		<label> IC Number   :</label><br>
		<input type="string" name="upic_number" id="name" placeholder=""  value =" <?php echo $ic_number; ?>"><br><br>
		<label>Phone Number :</label><br>
		<input type="string" name="upphone_number" id="num" placeholder="" value =" <?php echo $phone_number; ?>" ><br><br>
		<label> Address      :</label><br>
		<textarea name ="upaddress" rows="5" cols="55"></textarea><value =" <?php echo $address; ?>"><br><br>
		<label> Gender      :</label><br>
		<input type="radio" name="position" value="Male" checked>Male<br>
        <input type="radio" name="position" value="Female">Female<br><br>
		<label> Races       :</label><br>
		<select>
		<select name="races"> 
			  <option value="Malay">Malay</option>
              <option value="chinese">Chinese</option>
              <option value="indian">Indian</option>
              <option value="other">Other</option>   
		</select><br><br>
		<label> BirthDate       :</label><br>
		<input type="date" name="birthdate" id="name" placeholder="Enter BirthDate"><br><br>
		
		<input type="reset" name="reset" value="Reset" id="sub">
		<input type="update" name="upupdate" value="Update" id="sub"><br><br>
		<input type="delete" name="delete" value="Delete" id="sub">
	</form>
	</div>
	
   
   
   </body>
 </html>