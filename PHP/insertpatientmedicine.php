<?php

//INSERTING PATIENT DATA INTO DATABASE

$patientid = $_POST['patientid'];    
$name_of_medicine = $_POST['name_of_medicine'];   
$dos = $_POST['dos'];
$frequency = $_POST['frequency'];
$duration = $_POST['duration'];



if (empty($patientid) || empty($name_of_medicine) || empty($dos) || empty($frequency) || empty($duration))
{
    ?>   
        <script type="text/javascript">
            alert("All field are required"); 
            history.go(-1);  
            window.location.href="patientmedicine.html";  
        </script>
    <?php  
    die();
}
else
{
    if (!empty($patientid) || !empty($name_of_medicine) || !empty($dos) || !empty($frequency) || !empty($duration))
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
            $SELECT = "SELECT PatientID FROM patient_medicine WHERE PatientID = ? LIMIT 1";
              
            $INSERT = "INSERT INTO patient_medicine(PatientID, Name_of_medicine, Dos, Frequency, Duration) values(?,?,?,?,?)";

            //Prepare statement
             //$stmt = $con->prepare( "SELECT PatientID FROM patient_medicine WHERE PatientID = ? LIMIT 1";);
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
                $stmt->bind_param("sssss",$patientid, $name_of_medicine, $dos, $frequency, $duration); 
                $stmt->execute();
                ?> 
                    <script type="text/javascript">
                        alert("Success to save"); 
                        history.go(-1);  
                        window.location.href="patientmedicine.html";  
                    </script>
                <?php  
            } 
            else
            {
                ?>   
                    <script type="text/javascript">
                        alert("Someone already insert this data"); 
                        history.go(-1);  
                        window.location.href="patientinmedicine.html";  
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
                window.location.href="patientmedicine.html";  
            </script>
        <?php  
        die();
    }
}
?>













