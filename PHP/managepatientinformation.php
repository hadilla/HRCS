<?php 
include("db_connect.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>View Patient Information</title>
	<link rel="stylesheet" type="text/css" href="css(baru)/managepatientinformation.css">
  
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
                     <li class="hover-me"><a href="/HRCS/nurse1.html">Patient Information</a>
                       <div class="sub-menu-2">
                       <ul>
                          <li><a href="/HRCS/patientinformation.html">Add New Patient</a></li>
                           <li><a href="/HRCS/managepatientinformation.html">Manage Patient Information</a></li>
                       </ul>
                       </div>
                     </li>
                     <li class="hover-me"><a href="/HRCS/nurseview.html">View Patient Treatment and Medicine</p></a>
                      <!--<div class="sub-menu-2">
                       <ul>
                          <li><a href="">Update Patient Medicine</a></li>
                           <li><a href="/HRCS/displaypatientmedicine.html">View Patient Medicine</a></li>
                       </ul>
                       </div>-->
                     </li>
                    
                  </ul>
                </div>
                </li>
                
            <li><a href= "#">Help</a></li>
            <li><a href= "Homepage2.html">Logout</a></li>
            <li><a href= "nurse1.html">Back</a></li>
				  </ul>
				</div>

<div>
<br><br><br><br><br><br>
</div>

<form>
	<input type="text" name="text" class="search" placeholder="Search Here">
	<input type="submit" name="submit" class="submit" value="Search">

</form>


<table>

     <tr>

<?php
$sel = "SELECT * FROM patient_information";
$qrydisplay = mysqli_query($con, $sel);
while($row = mysqli_fetch_array($qrydisplay)){
	/*$patientid = $row['patientid'];
	$name = $row['name'];
	$icnumber = $row['ic_number'];
	$phonenumber = $row['phone_number'];
	$address = $row['address'];
	$gender = $row['gender'];
	$races = $row['races'];
	$birthdate = $row['birthdate'];*/

	
	$date = $row['Date'];
	$matricnumber = $row['Matric_Num'];    
	$usernameR = $row['Username'];   
	$passwordR = $row['Password'];
	$name = $row['Name'];
	$icNumber = $row['IC_Num'];
	$phoneNumber = $row['Phone_Num'];
	$address = $row['Address'];
	$gender = $row['Gender'];
	$races = $row['Races'];
	$birthdate = $row['Birth_Date'];

echo "<tr><td>".$date."<tr><td>".$matricnumber."</td><td>".$usernameR."</td><td>".$passwordR."</td><td>".$name."</td><td>".$icNumber."</td><td>".$phoneNumber."</td><td>".$address."</td><td>".$gender."</td><td>".$races."</td><td>".$birthdate."</td><td><a href='existingpatient.php?add=$matricnumber>Add</a></td><td><a href='updatepatientinformation.php?update=$matricnumber'>Update</a></td><td><a href='deletepatientinformation.php?deletematricnumber=$matricnumber'>Delete</a><a href='displayexistingpatient.php?viewmatricnumber=$matricnumber'>View</a></td><tr>";

	/*echo "<tr><td>".$patientid."</td><td>".$name. "</td></td>".$ic_number."</td><td>".$phone_number."</td><td>" .$address."</td><td>".$gender."</td><td>"
	.$races."</td><td>".$birthdate."</td><td><a href='updatepatientinformation.php?update=$patientID'>Update</a></td><td><a href='deletepatientinformation.php?deletepatientid=$patientid'>Delete</a></td><tr>";*/

}

?>
</tr>
</table>

<div>
	<br>
	<br>
	<br>
	<br>
	<br><br><br>
	<br><br><br>
</div>

</body>
</html>