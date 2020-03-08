<?php

//INSERTING PATIENT DATA INTO DATABASE

$patientid = $_POST['patientid'];    
$usernameR = $_POST['username'];   
$passwordR = $_POST['password'];
$name = $_POST['name'];
$icNumber = $_POST['ic_number'];
$phoneNumber = $_POST['phone_number'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$races = $_POST['races'];
$birthdate = $_POST['birthdate'];
$birthdate = date("Y/m/d", strtotime($birthdate));  //change date formats

//echo $birthdate
if (empty($patientid) || empty($usernameR) || empty($passwordR) || empty($name) || empty($icNumber) || empty($phoneNumber) || empty($address) || empty($gender) || empty($races) || empty($birthdate))
{
    ?>   
        <script type="text/javascript">
            alert("All field are required"); 
            history.go(-1);  
            window.location.href="patientinformation.html";  
        </script>
    <?php  
    die();
}
else
{
    if (!empty($patientid) || !empty($usernameR) || !empty($passwordR) || !empty($name) || !empty($icNumber) || !empty($phoneNumber) || !empty($address) || !empty($gender) || !empty($races)|| !empty($birthdate))
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
            $SELECT = "SELECT PatientID FROM patient_information WHERE PatientID = ? LIMIT 1";
              
            $INSERT = "INSERT INTO patient_information(PatientID, Username, Password, Name, IC_Num, Phone_Num, Address, Gender, Races, Birth_Date) values(?,?,?,?,?,?,?,?,?,?)";

            //Prepare statement
             //$stmt = $con->prepare( "SELECT PatientID FROM patient_information WHERE PatientID = ? LIMIT 1";);
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
                $stmt->bind_param("ssssiissss",$patientid, $usernameR, $passwordR, $name, $icNumber, $phoneNumber, $address, $gender, $races, $birthdate); 
                $stmt->execute();
                ?> 
                    <script type="text/javascript">
                        alert("Success to save"); 
                        history.go(-1);  
                        window.location.href="patientinformation.html";  
                    </script>
                <?php  
            } 
            else
            {
                ?>   
                    <script type="text/javascript">
                        alert("Someone already insert this data"); 
                        history.go(-1);  
                        window.location.href="patientinformation.html";  
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
                window.location.href="patientinformation.html";  
            </script>
        <?php  
        die();
    }
}
?>













