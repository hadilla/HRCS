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
       // $name = $_POST['name'];   
        $diagnosis_system = $_POST['diagnosis_system'];
        $clinical_finding = $_POST['clinical_finding'];
        $symptom = $_POST['symptom'];
        $investigation = $_POST['investigation'];
        $treatment = $_POST['treatment'];
        $name_of_medicine = $_POST['name_of_medicine'];
        $dos = $_POST['dos'];
        $frequency = $_POST['frequency'];
        $duration = $_POST['duration'];

        $selupdate = "UPDATE treatment_and_medicine SET Date='$date', Matric_Num='$matricnumber', Diagnosis_system='$diagnosis_system', Clinical_finding='$clinical_finding', Symptom='$symptom', Investigation='$investigation', Treatment='$treatment', Name_of_medicine='$name_of_medicine', Dos='$dos', Frequency='$frequency', Duration='$duration' WHERE Matric_Num='$getmatricnumber'";	
        //$selupdate = "UPDATE treatment_and_medicine SET Date='$date', Matric_Num='$matricnumber', Name='$name', Diagnosis_system='$diagnosis_system', Clinical_finding='$clinical_finding', Symptom='$symptom', Investigation='$investigation', Treatment='$treatment', Name_of_medicine='$name_of_medicine', Dos='$dos', Frequency='$frequency', Duration='$duration' WHERE Matric_Num='$getmatricnumber'";	

        $qry = mysqli_query($con,$selupdate);

        if ($qry)
        {
            
            ?>   
                <script type="text/javascript">
                    alert("Success to update"); 
                    window.location.href="../managetreatmentmedicine.html";  //for html back
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