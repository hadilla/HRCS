<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="css(baru)/profile.css">
  
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
            <li class="active"><a href= "/HRCS/patient.html">Patient</a>
                <div class="sub-menu-1">
                  <ul>
                     <li class="hover-me"><a href="/HRCS/patient.html">Patient Health Information</a>
                       <div class="sub-menu-2">
                       <ul>
                          <li><a href="/HRCS/profile.html">Profile</a></li>
                           <li><a href="/HRCS/viewpatient.html">View Treatment and Medicine</a></li>
                       </ul>
                       </div>
                     </li>
                  <!--<li class="hover-me"><a href="">View Treatment and Medicine</p></a>
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
            <li><a href= "patient.html">Back</a></li>
				  </ul>
				</div>

<div>
<br><br><br><br><br><br>
</div>

<div class="viewpatient">  
  <form method="POST" id="viewpatient" autocomplete="off" action="">
  
     <label> Matric Number  :</label><br>
     <input type="string" name="matricnumber" id="name" placeholder=""><br><br>
     <label> Name  :</label><br>
     <input type="text" name="name" id="name" placeholder=""><br>
  </form>
</div>

<div>
  <br><br><br>
  </div>

<table>

    <tr>

<?php

$sel = "SELECT * FROM patient_information";
$qrydisplay = mysqli_query($con, $sel);
while($row = mysqli_fetch_array($qrydisplay)){
	
	//$date = $row['Date'];
	$matricnumber = $row['Matric_Num'];    
	//$usernameR = $row['Username'];   
	//$passwordR = $row['Password'];
	$name = $row['Name'];
	$icNumber = $row['IC_Num'];
	$phoneNumber = $row['Phone_Num'];
	$address = $row['Address'];
	$gender = $row['Gender'];
	$races = $row['Races'];
	$birthdate = $row['Birth_Date'];

echo "<tr><td>".$matricnumber."</td><td>"."</td><td>".$name."</td><td>".$icNumber."</td><td>".$phoneNumber."</td><td>".$address."</td><td>".$gender."</td><td>".$races."</td><td>".$birthdate."</td><td>";

	



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