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
    if(isset($_GET['patientid_up']) && $_GET['patientid_up'] !== '')
    {
        $getpatientid = $_GET['patientid_up'];
        $patientid = $_POST['patientid'];    
        $diagnosis_system = $_POST['diagnosis_system'];   
        $clinical_finding = $_POST['clinical_finding'];
        $symptom = $_POST['symptom'];
        $investigation = $_POST['investigation'];
        $treatment = $_POST['treatment'];
        
        $selupdate = "UPDATE patient_treatment SET PatientID='$patientid', Diagnosis_system='$diagnosis_system', Clinical_finding='$clinical_finding', Symptom='$symptom', Investigation='$investigation', Treatment='$treatment'";	

        $qry = mysqli_query($con,$selupdate);

        if ($qry)
        {
            
            ?>   
                <script type="text/javascript">
                    alert("Success to update"); 
                    window.location.href="../displaypatienttreatment.html";  //for html back
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