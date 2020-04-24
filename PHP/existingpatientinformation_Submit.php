<?php

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
    if(isset($_GET['matricnumber_up']) && $_GET['matricnumber_up'] !== '')
    {
        $getmatricnumber = $_GET['matricnumber_up'];
        $date = $_POST['date'];
        $matricnumber = $_POST['matricnumber'];    
        //$usernameR = $_POST['username'];   
       //$passwordR = $_POST['password'];
       // $name = $_POST['name'];
       // $icNumber = $_POST['ic_number'];
        //$phoneNumber = $_POST['phone_number'];
        //$address = $_POST['address'];
        //$gender = $_POST['gender'];
        //$races = $_POST['races'];
        //$birthdate = $_POST['birthdate'];
        //$birthdate1 = date("Y/m/d", strtotime($birthdate));

        //$selupdate = "UPDATE `patient_information` SET `PatientID`=[value-1],`Username`=[$upusernameR],`Password`=[$uppasswordR],`Name`=[$upname],`IC_Num`=[$upic_number],`Phone_Num`=[$upphone_number],`Address`=[$upaddress],`Gender`=[value-8],`Races`=[value-9],`Birth_Date`=[value-10] WHERE 'PatientID'='$getpatientid'";
        //$selupdate = "UPDATE patient_information SET PatientID=[value-1],Username=[$upusernameR],Password=[$uppasswordR],Name=[$upname],IC_Num=[$upic_number],Phone_Num=[$upphone_number],Address=[$upaddress],Gender=[value-8],Races=[value-9],Birth_Date=[value-10] WHERE 'PatientID'='$getpatientid'";	
        //$selupdate = "UPDATE patient_information SET PatientID='$patientid', Username='$usernameR', Password='$passwordR', Name='$name', IC_Num='$icNumber', Phone_Num='$phoneNumber', Address='$address', Gender='$gender', Races='$races', Birth_Date='$birthdate' WHERE PatientID='$getpatientid'";	
        $selupdate = "UPDATE patient_information SET Date='$date', Matric_Num='$matricnumber' WHERE Matric_Num='$getmatricnumber'";	

        $qry = mysqli_query($con,$selupdate);

        if ($qry)
        {
            
            ?>   
                <script type="text/javascript">
                    alert("Success to add"); 
                    window.location.href="../managepatientinformation.html";  //for html back
                </script> 
            <?php
             
        }
        //header("location: ../displaypatientinformation.html");  //for coding php back
    } 
    else 
    {
        echo "failed";
    }
}
	
    
?>





