<?php

//INSERTING PATIENT DATA INTO DATABASE

$date = $_POST['date'];
$date = date("Y/m/d", strtotime($date));
$matricnumber = $_POST['matricnumber'];    


//echo $birthdate

if (empty($date) || empty($matricnumber))
//if (empty($patientid) || empty($usernameR) || empty($passwordR) || empty($name) || empty($icNumber) || empty($phoneNumber) || empty($address) || empty($gender) || empty($races) || empty($birthdate))
{
    ?>   
        <script type="text/javascript">
            alert("All field are required"); 
            history.go(-1);  
            window.location.href="existingpatient.html";  
        </script>
    <?php  
    die();
}
else
{
    if (!empty($date) || !empty($matricnumber))
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
            $SELECT = "SELECT Matric_Num FROM existing_patient_information WHERE Matric_Num = ? LIMIT 1";

            $INSERT = "INSERT INTO existing_patient_information(Date, Matric_Num) values (?,?)";

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
                $stmt->bind_param("ss",$date, $matricnumber); 
                $stmt->execute();
                ?> 
                    <script type="text/javascript">
                        alert("Success to add"); 
                        history.go(-1);  
                        window.location.href="existingpatient.html";  
                    </script>
                <?php  
            } 
            else
            {
                ?>   
                    <script type="text/javascript">
                        alert("Someone already insert this data"); 
                        history.go(-1);  
                        window.location.href="existingpatient.html";  
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
                window.location.href="existingpatient.html";  
            </script>
        <?php  
        die();
    }
}
?>