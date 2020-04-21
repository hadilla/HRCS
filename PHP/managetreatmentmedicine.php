<!DOCTYPE html>
<html>
<head>
   <title>Patient Treatment and Medicine Form</title>
   <link rel="stylesheet" type="text/css" href="CSS(baru)/managetreatmentandmedicine.css">
  
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
    <form action="" autocomplete="off" id = "search" method="POST">
        <input type="text" name="text" class="search" placeholder="Search Here">
        <input type="submit" name="submit" class="submit" value="Search">
    
    </form>
    
    <div>
        <br><br><br>
    </div>

    <table>

        <tr>
   
   <?php
   $sel = "SELECT * FROM treatment_and_medicine";
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
   
       $date = $row["Date"];
       $matricnumber = $row["Matric_Num"];
       $name = $row["Name"];
       $diagnosis_system = $row["Diagnosis_system"];
       $clinical_finding = $row["Clinical_finding"];
       $symptom = $row["Symptom"]; 
       $investigation = $row["Investigation"];
       $treatment = $row["Treatment"];
       $name_of_medicine = $row["Name_of_medicine"];
       $dos = $row["Dos"];
       $frequency = $row["Frequency"]; 
       $duration = $row["Duration"];


   echo "<tr><td>".$date."</td><td>".$matricnumber."</td><td>".$name."</td><td>".$diagnosis_system."</td><td>".$clinical_finding."</td><td>".$symptom."</td><td>".$investigation."</td><td>".$treatment."</td><td>".$name_of_medicine."</td><td>".$dos."</td><td>".$frequency."</td><td>".$duration."</td><td><a href='updatetreatmentmedicine.php?update=$matricnumber'>Update</a></td><td><a href='deletetreatmentmedicine.php?deletematricnumber=$matricnumber'>Delete</a></td><tr>";
   
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