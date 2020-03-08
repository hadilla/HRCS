<?php

//INSERTING PATIENT DATA INTO DATABASE

$patientid = $_POST['patientid'];    
$diagnosis_system = $_POST['diagnosis_system'];   
$clinical_finding = $_POST['clinical_finding'];
$symptom = $_POST['symptom'];
$investigation = $_POST['investigation'];
$treatment = $_POST['treatment'];



if (empty($patientid) || empty($diagnosis_system) || empty($clinical_finding) || empty($symptom) || empty($investigation) || empty($treatment))
{
    ?>   
        <script type="text/javascript">
            alert("All field are required"); 
            history.go(-1);  
            window.location.href="patienttreatment.html";  
        </script>
    <?php  
    die();
}
else
{

    if (!empty($patientid) || !empty($diagnosis_system) || !empty($clinical_finding) || !empty($symptom) || !empty($investigation) || !empty($treatment))
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
            $SELECT = "SELECT PatientID FROM patient_treatment WHERE PatientID = ? LIMIT 1";
              
            $INSERT = "INSERT INTO patient_treatment (PatientID, Diagnosis_system, Clinical_finding, Symptom, Investigation, Treatment) values(?,?,?,?,?,?)";

            //Prepare statement
             //$stmt = $con->prepare( "SELECT PatientID FROM patient_treatment WHERE PatientID = ? LIMIT 1";);
            $stmt = $con->prepare($SELECT);
            $stmt->bind_param("s", $patientid);
            $stmt->execute();
            $stmt->bind_result($patientid);
            $stmt->store_result();
            $rnum = $stmt->num_rows;
        
            if ($rnum==0)
            {
                $stmt->close();
                $stmt = $con->prepare($INSERT);
                $stmt->bind_param("ssssss",$patientid, $diagnosis_system, $clinical_finding, $symptom, $investigation, $treatment); 
                $stmt->execute();
                ?> 
                    <script type="text/javascript">
                        alert("Success to save"); 
                        history.go(-1);  
                        window.location.href="patienttreatment.html";  
                    </script>
                <?php  
            } 
            else
            {
                ?>   
                    <script type="text/javascript">
                        alert("Someone already insert this data"); 
                        history.go(-1);  
                        window.location.href="patienttreatment.html";  
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
                window.location.href="patienttreatment.html";  
            </script>
        <?php  
        die();
    }
}
?>