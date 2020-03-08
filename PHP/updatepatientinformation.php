<?php
include("db_connect.php");

if(isset($_GET['patientid']) && $_GET['patientid'] !== '')
{
	$getpatientid = $_GET['patientid'];
	//echo $getpatientid;
	$selupdatetwo = "SELECT * FROM patient_information WHERE PatientID = '".$getpatientid."'";
	$qry = mysqli_query($con, $selupdatetwo);
	$selassoc = mysqli_fetch_array($qry);
	$patientid = $selassoc['PatientID'];
	$usernameR = $selassoc['Username'];   
	$passwordR = $selassoc['Password'];
	$name = $selassoc['Name'];
	$icNumber = $selassoc['IC_Num'];
	$phoneNumber = $selassoc['Phone_Num'];
	$address = $selassoc['Address'];
	$gender = $selassoc['Gender'];
	$races = $selassoc['Races'];
	$birthdate = $selassoc['Birth_Date'];
	//$birthdate = date("Y/m/d", strtotime($birthdate));

	//echo $patientid;
	//echo $usernameR;

	?>
		<!DOCTYPE html>
		<html>
		<head>
		<title>Update Patient Information Form</title>
		<link rel="stylesheet" type="text/css" href= "/HRCS/css(baru)/updatepatientinformation.css">
		
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
									<li class="active"><a href="updatepatientinformation.html">Update Patient Information</a>
									<li><a href= "/HRCS/PHP/displaypatientinformation.php">View Patient Information</a>
								</ul>
								</div>
								</li>
								<li class="hover-me"><a href="patientmedicine.html">Manage Patient Medicine</p></a>
								<div class="sub-menu-2">
								<ul>
									<li><a href="updatepatientmedicine.html">Update Patient Medicine</a>
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

			<div class="updatepatientinformation">
			<h2>Update Patient Information Form</h2>
			<form method="POST" id="updatepatientinformation" autocomplete="off" action="/HRCS/PHP/updatepatientinformation_Submit.php?patientid_up=<?php echo $getpatientid; ?>">
			
				<label> PatientID   :</label><br>
				<input type="string" name="patientid" id="name" placeholder="" value="<?php echo $patientid ?>"><br><br>
				<label> Username :</label><br>
				<input type="string" name="username" id="name" placeholder="" value="<?php echo $usernameR ?>"><br><br>
				<label> Password :</label><br>
				<input type="password" name="password" id="name" placeholder="" value="<?php echo $passwordR ?>"><br><br>		   
				<label> Name        :</label><br>
				<input type="string" name="name" id="name" placeholder="" value="<?php echo $name ?>"><br><br>
				<label> IC Number   :</label><br>
				<input type="icNumber" name="ic_number" id="name" placeholder="" value="<?php echo $icNumber ?>"><br><br>
				<label>Phone Number :</label><br>
				<input type="phoneNumber" name="phone_number" id="num" placeholder="" value="<?php echo $phoneNumber ?>"><br><br>
				<label> Address      :</label><br>
				<textarea name ="address" rows="5" cols="55"><?php echo $address?></textarea><br><br>
				<label> Gender      :</label><br>
				<input type="radio" name="gender" <?php echo ($gender=='Male')?'checked':'' ?> value="Male"  disabled>Male<br>
				<input type="radio" name="gender" <?php echo ($gender=='Female')?'checked':'' ?> value="Female"  disabled>Female<br><br>
				<!--<input type="radio" name="gender" value="Male" >Male <?php //echo ($gender =='Male')? 'checked':'' ?><br><br>
				<input type="radio" name="gender" value="Female">Female <?php //echo ($gender =='Female')? 'checked':'' ?> <br><br>-->
				<label> Races       :</label><br>
				<select name="races" disabled>
					<option value="Malay" <?php if($races=="Malay") echo 'selected="selected"'; ?> >Malay</option>
					<option value="chinese" <?php if($races=="chinese") echo 'selected="selected"'; ?> >Chinese</option>
					<option value="indian" <?php if($races=="indian") echo 'selected="selected"'; ?> >Indian</option>
					<option value="other" <?php if($races=="other") echo 'selected="selected"'; ?> >Others</option>   
				</select><br><br>
				<label> BirthDate       :</label><br>
				<input type="date" name="birthdate" id="name" placeholder="Enter BirthDate" value="<?php echo strftime('%Y-%m-%d',strtotime($birthdate)); ?>"  disabled><br><br>
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



/*$getpatientid = $_GET['patientid'];
//echo '<a>' .$_GET['patientid']. '<a>';
 $selupdatetwo = "SELECT * FROM patient_information WHERE PatientID = '.$getpatientid.'";
 $qry = mysqli_query($con, $selupdatetwo);
 $selassoc = mysqli_fetch_assoc($qry);
 $patientid = $selassoc['PatientID'];
 $usernameR = $selassoc['Username'];   
 $passwordR = $selassoc['Password'];
 $name = $selassoc['Name'];
 $icNumber = $selassoc['IC_Num'];
 $phoneNumber = $selassoc['Phone_Num'];
 $address = $selassoc['Address'];
 $gender = $selassoc['Gender'];
 $races = $selassoc['Races'];
 $birthdate = $selassoc['Birth_Date'];
 $birthdate = date("Y/m/d", strtotime($birthdate));*/

 /*if (isset($_POST['submit'])){

	$upusernameR = $_POST['username'];
	$passwordR = $_POST['password'];
	$upname = $_POST['name'];
	$upic_number = $_POST['ic_number'];
	$upphone_number = $_POST['phone_number'];
	$upaddress = $_POST['address'];

	//$selupdate = "UPDATE `patient_information` SET `PatientID`=[value-1],`Username`=[$upusernameR],`Password`=[$uppasswordR],`Name`=[$upname],`IC_Num`=[$upic_number],`Phone_Num`=[$upphone_number],`Address`=[$upaddress],`Gender`=[value-8],`Races`=[value-9],`Birth_Date`=[value-10] WHERE 'PatientID'='$getpatientid'";
	//$selupdate = "UPDATE patient_information SET PatientID=[value-1],Username=[$upusernameR],Password=[$uppasswordR],Name=[$upname],IC_Num=[$upic_number],Phone_Num=[$upphone_number],Address=[$upaddress],Gender=[value-8],Races=[value-9],Birth_Date=[value-10] WHERE 'PatientID'='$getpatientid'";	
	$selupdate = "UPDATE patient_information SET `PatientID`=[value-1],`Username`=[value-2],`Password`=[value-3],`Name`=[value-4],`IC_Num`=[value-5],`Phone_Num`=[value-6],`Address`=[value-7],`Gender`=[value-8],`Races`=[value-9],`Birth_Date`=[value-10] WHERE 1";
	$qry = mysqli_query($con,$selupdate);

	if ($qry)
	{
		header("location: displaypatientinformation.php");
	}
 }*/

//$selupdate = "UPDATE `patient_information` SET `PatientID`=[value-1],`Name`=[value-2],`IC_Num`=[value-3],`Phone_Num`=[value-4],
			 // `Address`=[value-5],`Gender`=[value-6],`Races`=[value-7],`Birth_Date`=[value-8] WHERE 'patientid'= '$getipatientid'";

?>


<!--
<!DOCTYPE html>
<html>
<head>
   <title>Update Patient Information Form</title>
   <link rel="stylesheet" type="text/css" href= "/HRCS/css(baru)/updatepatientinformation.css">
  
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
                              <li class="active"><a href="updatepatientinformation.html">Update Patient Information</a>
                               <li><a href= "/HRCS/PHP/displaypatientinformation.php">View Patient Information</a>
                           </ul>
                           </div>
                         </li>
                         <li class="hover-me"><a href="patientmedicine.html">Manage Patient Medicine</p></a>
                          <div class="sub-menu-2">
                           <ul>
                              <li><a href="updatepatientmedicine.html">Update Patient Medicine</a>
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

	<div class="updatepatientinformation">
	  <h2>Update Patient Information Form</h2>
	<form method="POST" id="updatepatientinformation" autocomplete="off" action="/HRCS/PHP/updatepatientinformation.php">
	
		<label> PatientID   :</label><br>
		<input type="string" name="patientid" id="name" placeholder="" value=""><br><br>
		<label> Username :</label><br>
		<input type="string" name="username" id="name" placeholder="" value=""><br><br>
		<label> Password :</label><br>
		<input type="password" name="password" id="name" placeholder=""><br><br>		   
		<label> Name        :</label><br>
		<input type="string" name="name" id="name" placeholder=""><br><br>
		<label> IC Number   :</label><br>
		<input type="icNumber" name="ic_number" id="name" placeholder=""><br><br>
		<label>Phone Number :</label><br>
		<input type="phoneNumber" name="phone_number" id="num" placeholder=""><br><br>
		<label> Address      :</label><br>
		<textarea name ="address" rows="5" cols="55"></textarea><br><br>
		<label> Gender      :</label><br>
		<input type="radio" name="gender" value="Male" >Male<br>
        <input type="radio" name="gender" value="Female">Female<br><br>
		<label> Races       :</label><br>
	    <select name="races"> 
			  <option value="Malay">Malay</option>
              <option value="chinese">Chinese</option>
              <option value="indian">Indian</option>
              <option value="other">Others</option>   
		</select><br><br>
		<label> BirthDate       :</label><br>
		<input type="date" name="birthdate" id="name" placeholder="Enter BirthDate"><br><br>
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
 </html>-->