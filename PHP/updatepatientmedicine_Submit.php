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

        $getpatientid = $_GET['patientid_up'];
        
        $patientid = $_POST['patientid'];    
        $name_of_medicine = $_POST['name_of_medicine'];   
        $dos = $_POST['dos'];
        $frequency = $_POST['frequency'];
        $duration = $_POST['duration'];
        
        
        $selupdate = "UPDATE patient_medicine SET PatientID='$patientid', Name_of_medicine='$name_of_medicine', Dos='$dos', Frequency='$frequency', Duration='$duration'";	

        $qry = mysqli_query($con,$selupdate);

        if ($qry)
        {
            
            ?>   
                <script type="text/javascript">
                    alert("Success to update"); 
                    window.location.href="../displaypatientmedicine.html";  //for html back
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