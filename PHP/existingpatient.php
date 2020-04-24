<?php

//INSERTING PATIENT DATA INTO DATABASE


$date = $_POST['date'];
$date = date("Y/m/d", strtotime($date));
$matricnumber = $_POST['matricnumber'];    
/*$usernameR = $_POST['username'];   
$passwordR = $_POST['password'];
$name = $_POST['name'];
$icNumber = $_POST['ic_number'];
$phoneNumber = $_POST['phone_number'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$races = $_POST['races'];
$birthdate = $_POST['birthdate'];
$birthdate = date("Y/m/d", strtotime($birthdate));  //change date formats*/

//echo $birthdate

if (empty($date) || empty($matricnumber))


//if (empty($date) || empty($matricnumber) || empty($usernameR) || empty($passwordR) || empty($name) || empty($icNumber) || empty($phoneNumber) || empty($address) || empty($gender) || empty ($races) || empty($birthdate))

{
    ?>   
        <script type="text/javascript">
            alert("All field are required"); 
            history.go(-1);  
            window.location.href="existingpatientinformation.html";  
        </script>
    <?php  
    die();
}
else
{
    if (!empty($date) || !empty($matricnumber) )
    //if (!empty($date) || !empty($matricnumber) || !empty($usernameR) || !empty($passwordR) || !empty($name) || !empty($icNumber) || !empty($phoneNumber) || !empty($address) || !empty($gender) || !empty($races)|| !empty($birthdate))
    {
    
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "HRCS";   

        $con = mysqli_connect($servername, $username, $password,$db);

        if (!$con) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        else
        {
            $SELECT = "SELECT Matric_Num FROM patient_information WHERE Matric_Num = ? LIMIT 1";
              
            $INSERT = "INSERT INTO patient_information(Date, Matric_Num, Username, Password, Name, IC_Num, Phone_Num, Address, Gender, Races, Birth_Date) values(?,?,?,?,?,?,?,?,?,?,?)";

            //Prepare statement
             //$stmt = $con->prepare( "SELECT PatientID FROM patient_information WHERE PatientID = ? LIMIT 1";);
            $stmt = $con->prepare($SELECT);
            $stmt->bind_param("s", $matricnumber);
            $stmt->execute();
            $stmt->bind_result($matricnumber);
            $stmt->store_result();
            $rnum = $stmt->num_rows;
        
            if ($rnum==0)
            {
                $stmt->close();
                $stmt = $con->prepare($INSERT);
                $stmt->bind_param("ssssssissss",$date, $matricnumber, $usernameR, $passwordR, $name, $icNumber, $phoneNumber, $address, $gender, $races, $birthdate); 
                $stmt->execute();
                ?> 
                    <script type="text/javascript">
                        alert("Success to save"); 
                        history.go(-1);  
                        window.location.href="patientinformation.html";  
                    </script>
                <?php  
            } 
            else
            {
                ?>   
                    <script type="text/javascript">
                        alert("Someone already insert this data"); 
                        history.go(-1);  
                        window.location.href="patientinformation.html";  
                    </script>
                <?php 
            }
            $stmt->close();
            $con->close();
        }
    }
    else
    {
        ?>   
            <script type="text/javascript">
                alert("Data was save"); 
                history.go(-1);  
                window.location.href="patientinformation.html";  
            </script>
        <?php  
        die();
    }
}

if(isset($_GET['matricnumber']) && $_GET['matricnumber'] !== '')
{
	$getmatricnumber = $_GET['matricnumber'];
	//echo $getpatientid;
	$selupdatetwo = "SELECT * FROM patient_information WHERE Matric_Num = '".$getmatricnumber."'";
	$qry = mysqli_query($con, $selupdatetwo);
	$selassoc = mysqli_fetch_array($qry);
	$date = $selassoc['Date'];
	$matricnumber = $selassoc['Matric_Num'];
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
   <title>Existing Patient Information Form</title>
   <link rel="stylesheet" type="text/css" href="/HRCS/CSS(baru)/existingpatient.css">
  
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
		<br>
		<br><br><br><br>
	</div>
	

<div class="existingpatientinformation">
<h2>Add Existing Patient Information Form</h2>
<form method="POST" id="existingpatientinformation" autocomplete="off" action="/HRCS/PHP/existingpatientinformation_Submit.php?matricnumber_up=<?php echo $getmatricnumber; ?>">
			
    <label> Date       :</label><br>
	<input type="date" name="date" id="name" placeholder="" value="<?php echo strftime('%Y-%m-%d',strtotime($date)); ?>"><br><br>
	<label> Matric Number   :</label><br>
	<input type="string" name="matricnumber" id="name" placeholder="" value="<?php echo $matricnumber ?>" ><br><br>
	<label> Username :</label><br>
	<input type="string" name="username" id="name" placeholder="" value="<?php echo $usernameR ?>"disabled><br><br>
	<label> Password :</label><br>
	<input type="password" name="password" id="name" placeholder="" value="<?php echo $passwordR ?>"disabled><br><br>		   
	<label> Name        :</label><br>
	<input type="string" name="name" id="name" placeholder="" value="<?php echo $name ?>"disabled><br><br>
    <label> IC Number   :</label><br>
	<input type="string" name="ic_number" id="name" placeholder="" value="<?php echo $icNumber ?>"disabled><br><br>
	<label>Phone Number :</label><br>
	<input type="phone_number" name="phone_number" id="num" placeholder="" value="<?php echo $phoneNumber ?>"disabled><br><br>
	<label> Address      :</label><br>
	<textarea disabled name ="address" rows="5" cols="55"><?php echo $address?></textarea><br><br>
	<label> Gender      :</label><br>
	<input type="radio" name="gender" <?php echo ($gender=='Male')?'checked':'' ?> value="Male"  disabled>Male<br>
	<input type="radio" name="gender" <?php echo ($gender=='Female')?'checked':'' ?> value="Female"  disabled>Female<br><br>
	<!--<input type="radio" name="gender" value="Male" >Male <?php //echo ($gender =='Male')? 'checked':'' ?><br><br>
	<input type="radio" name="gender" value="Female">Female <?php //echo ($gender =='Female')? 'checked':'' ?> <br><br>-->
	<label> Races       :</label><br>
	<select name="races" disabled>
	<option value="Malay" <?php if($races=="Malay") echo 'selected="selected"'; ?> >Malay</option>
	<option value="Chinese" <?php if($races=="Chinese") echo 'selected="selected"'; ?> >Chinese</option>
	<option value="Indian" <?php if($races=="Indian") echo 'selected="selected"'; ?> >Indian</option>
	<option value="Other" <?php if($races=="Other") echo 'selected="selected"'; ?> >Others</option>   
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

?>




