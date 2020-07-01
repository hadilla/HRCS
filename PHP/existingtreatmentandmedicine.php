<?php

//INSERTING PATIENT DATA INTO DATABASE
$date = $_POST['date'];
$date = date("Y/m/d", strtotime($date));
$matricnumber = $_POST['matricnumber']; 
$name = $_POST['name'];
$diagnosis_system = $_POST['diagnosis_system'];
$clinical_finding = $_POST['clinical_finding'];
$symptom = $_POST['symptom'];
$investigation = $_POST['investigation'];
$treatment = $_POST['treatment'];
$name_of_medicine = $_POST['name_of_medicine'];
$dos = $_POST['dos'];
$frequency = $_POST['frequency'];
$duration = $_POST['duration'];

//echo $birthdate

if (empty($date) || empty($matricnumber) || empty($name) || empty($diagnosis_system) || empty($clinical_finding) || empty($symptom) || empty($investigation) || empty($treatment) || empty($name_of_medicine) || empty ($dos) || empty($frequency) || empty($duration))
//if (empty($patientid) || empty($usernameR) || empty($passwordR) || empty($name) || empty($icNumber) || empty($phoneNumber) || empty($address) || empty($gender) || empty($races) || empty($birthdate))
{
    ?>   
        <script type="text/javascript">
            alert("All field are required"); 
            history.go(-1);  
            window.location.href="existingtreatmentandmedicine.html";  
        </script>
    <?php  
    die();
}
else
{
    if (!empty($date) || !empty($matricnumber) || !empty($name) || !empty($diagnosis_system) || !empty($clinical_finding) || !empty($symptom) || !empty($investigation) || !empty($treatment) || !empty($name_of_medicine) || !empty($dos) || !empty($frequency)|| !empty($duration))
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
            $SELECT = "SELECT Matric_Num FROM existing_treatment_and_medicine WHERE Matric_Num = ? LIMIT 1";
              
            $INSERT = "INSERT INTO existing_treatment_and_medicine(Date, Matric_Num, Name, Diagnosis_system, Clinical_finding, Symptom, Investigation, Treatment, Name_of_medicine, Dos, Frequency, Duration) values(?,?,?,?,?,?,?,?,?,?,?,?)";

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
                $stmt->bind_param("ssssssssssss",$date, $matricnumber, $name, $diagnosis_system, $clinical_finding, $symptom, $investigation, $treatment, $name_of_medicine, $dos, $frequency, $duration); 
                $stmt->execute();
                ?> 
                    <script type="text/javascript">
                        alert("Success to save"); 
                        history.go(-1);  
                        window.location.href="treatmentandmedicine.html";  
                    </script>
                <?php  
            } 
            else
            {
                ?>   
                    <script type="text/javascript">
                        alert("Someone already insert this data"); 
                        history.go(-1);  
                        window.location.href="existingtreatmentandmedicine.html";  
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
                window.location.href="treatmentandmedicine.html";  
            </script>
        <?php  
        die();
    }
}
?>
