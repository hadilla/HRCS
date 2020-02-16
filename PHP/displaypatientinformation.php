<?php 
include("db_connect.php");



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type= "text/css">
        table {
		 border : 1px solid black; 
		 border-collapse: collapse;
		}
		td {
	      border : 1px solid black; 
		  padding: 10px;
		  
		}
	 
	 </style>
	 

</head>
<body>
<table>

     <tr>

	<?php
$sel = "SELECT * FROM `patient_information`";
$qrydisplay = mysqli_query($con, $sel);
while($row = mysqli_fetch_array($qrydisplay)){
	$patientid = $row['patientid'];
	$name = $row['name'];
	$icnumber = $row['ic_number'];
	$phonenumber = $row['phone_number'];
	$address = $row['address'];
	$gender = $row['gender'];
	$races = $row['races'];
	$birthdate = $row['birthdate'];

	echo "<tr><td>".$patientid."</td><td>".$name. "</td></td>".$ic_number."</td><td>".$phone_number."</td><td>" .$address."</td><td>".$gender."</td><td>"
	.$races."</td><td>".$birthdate."</td><td><a href='updatepatientinformation.php?update=$patientID'>Update</a></td><td><a href='deletepatientinformation.php?deletepatientid=$patientid'>Delete</a></td><tr>";

}
?>
</tr>
</table>


</body>
</html>