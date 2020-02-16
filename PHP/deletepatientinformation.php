<?php 

include("db_connect.php");

   echo $getPatientID = $_GET['deletepatientid'];

  $sel = "DELETE FROM 'patient_information' WHERE 'PatientID' = '$getPatientID' ";
  $qry = mysqli_query($con, $sel);
  
  if ($qry){
	 header("location: patientinformation.php");
	  
  }
  

?>