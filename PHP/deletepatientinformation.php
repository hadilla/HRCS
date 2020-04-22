<?php 

$servername = "localhost";
$username = "root";
$password = "";
$db = "hrcs";

$con = mysqli_connect($servername, $username, $password, $db);

if(!$con) {
	die("Connection failed: ".mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM 'patient_information' WHERE Matric_Num= '$matricnumber'";

if ($con->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $con->error;
}

$con->close();


/*echo $getmatricnumber= $_GET['matricnumber'];

  $sel = "DELETE FROM 'patient_information' WHERE 'Matric_Num' = '$getmatricnumber' ";


  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

$qry = mysqli_query($con, $sel)
  
 if ($qry){
	 header("location: managepatientinformation.php");
	  
  }*/

?>











  