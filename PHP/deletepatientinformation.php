<?php 

include("db_connect.php");

   echo $getpatienttid= $_GET['deletepatientid'];

  $sel = "DELETE FROM 'patient_information' WHERE 'PatientID' = '$getpatientid' ";
  $qry = mysqli_query($con, $sel);
  
  if ($qry){
	 header("location: displaypatientinformation.php");
	  
  }
  

?>