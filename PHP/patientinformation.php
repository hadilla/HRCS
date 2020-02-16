<?php
include("db_connect.php");

if(isset($_POST['submit'])){

   if (!empty($patientid) || !empty($name) || !empty($icnumber) || !empty($phonenumber) || !empty($address) || !empty($gender) || !empty($races) || !empty($birthdate)) 
   {
      $patientid = $_POST['patientid'];    
      $name = $_POST['name'];   
      $icnumber = $_POST['ic_number'];
      $phonenumber = $_POST['phone_number'];
      $address = $_POST['address'];
      $gender = $_POST['gender'];
      $races = $_POST['races'];
      $birthdate = $_POST['birthdate'];
      
         $sql = "INSERT INTO  `patient_information`(`PatientID`, `Name`, `IC_Num`, `Phone_Num`, `Address`, `Gender`, `Races`, `Birth_Date`) 
                      VALUES ([$patientid],[$name],[$icnumber],[$phonenumber],[$address],[$gender],[$races],[$birthdate]) ";
        
        $qry = mysqli_query($connect, $sql);
        if($qry){
           echo "inserted successfully";

   }
  }else{
     echo "all fields must be filled";
  }

}
?>
<!DOCTYPE html>
<html>
<head>
   <title>Patient Information Form</title>
   <link rel="stylesheet" type="text/css" href="CSS(baru)/patientinformation.css">
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
	
	<div class="patientinformation">
	  <h2>Patient Information Form</h2>
	<form method="POST" id="patientinformation" autocomplete="off" action="/HRCS/PHP/patientinformation.php">
	
		<label> PatientID   :</label><br>
		<input type="string" name="patientID" id="name" placeholder=""><br><br>
		<label> Name        :</label><br>
		<input type="string" name="name" id="name" placeholder=""><br><br>
		<label> IC Number   :</label><br>
		<input type="string" name="ic_number" id="name" placeholder=""><br><br>
		<label>Phone Number :</label><br>
		<input type="string" name="phone_number" id="num" placeholder=""><br><br>
		<label> Address      :</label><br>
		<textarea name ="Address" rows="5" cols="55"></textarea><br><br>
		<label> Gender      :</label><br>
		<input type="radio" name="position" value="Male" checked>Male<br>
        <input type="radio" name="position" value="Female">Female<br><br>
		<label> Races       :</label><br>
	    <select name="races"> 
			  <option value="Malay">Malay</option>
              <option value="chinese">Chinese</option>
              <option value="indian">Indian</option>
              <option value="other">Other</option>   
		</select><br><br>
		<label> BirthDate       :</label><br>
		<input type="date" name="birthdate" id="name" placeholder="Enter BirthDate"><br><br>
		
		<input type="reset" name="reset" value="Reset" id="sub">
		<input type="submit" name="submit" value="Save" id="sub">
	</form>
	</div>
	
   
   
   </body>
 </html>
















