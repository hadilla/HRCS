<?php

$staffid = $_POST['StaffID'];    
$fullname = $_POST['Fullname'];   
$usernameR = $_POST['Username'];
$passwordR = $_POST['Password'];
$icNumber = $_POST['IC_Number'];
$phoneNumber = $_POST['Phone_Number'];
$email = $_POST['Email'];
$position = $_POST['Position'];

//if (empty($staffid) && empty($fullname)  && empty($usernameR)  && empty($passwordR)  && empty($icNumber)  && empty($phoneNumber)  && empty($email)  && empty($position)) 

if (empty($staffid) || empty($fullname) || empty($usernameR) || empty($passwordR) || empty($icNumber) || empty($phoneNumber) || empty($email) || empty($position)) 
{
    ?>   
        <script type="text/javascript">
            alert("All field are required"); 
            history.go(-1);  
            window.location.href="register.html";  
        </script>
    <?php  
    //echo "All field are required";
    die();
}
else
{
    if (!empty($staffid) || !empty($fullname) || !empty($usernameR) || !empty($passwordR) || !empty($icNumber) || !empty($phoneNumber) || !empty($email) || !empty($position)) 
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
            if ($position=="Doctor")
            {
                $SELECT = "SELECT StaffID FROM doctor_register WHERE StaffID = ? LIMIT 1";
                //$INSERT = "INSERT INTO doctor_register(StaffID, Fullname, Username, Password, IC_Num, Phone_Num, Email, Position) values($staffid, $fullname, $usernameR, $passwordR, $icNumber, $phoneNumber, $email, $position)";
                $INSERT = "INSERT INTO doctor_register(StaffID, Fullname, Username, Password, IC_Num, Phone_Num, Email, Position) values(?,?,?,?,?,?,?,?)";

                //Prepare statement
                //$stmt = $con->prepare("SELECT StaffID FROM doctor_register WHERE StaffID = $staffid LIMIT 1");
                $stmt = $con->prepare($SELECT);
                $stmt->bind_param("s", $staffid);
                $stmt->execute();
                $stmt->bind_result($staffid);
                $stmt->store_result();
                $rnum = $stmt->num_rows;
        
                if ($rnum==0)
                {
                    $stmt->close();
                    //$stmt = $con->prepare("INSERT INTO doctor_register (StaffID, Fullname, Username, Password, IC_Num, Phone_Num, Email, Position) values($staffid, $fullname, $usernameR, $passwordR, $icNumber, $phoneNumber, $email, $position)");
                    $stmt = $con->prepare($INSERT);
                    $stmt->bind_param("ssssiiss",$staffid, $fullname, $usernameR, $passwordR, $icNumber, $phoneNumber, $email, $position); 
                    $stmt->execute();
                    ?>   
                    <script type="text/javascript">
                        alert("Success to register"); 
                        history.go(-1);  
                        window.location.href="register.html";  
                    </script>
                    <?php  

                    //echo "Success to register"; 
                } 
                else 
                {
                    ?>   
                    <script type="text/javascript">
                        alert("Someone already register using this Staff ID"); 
                        history.go(-1);  
                        window.location.href="register.html";  
                    </script>
                    <?php 
                    //echo "Someone already register using this Staff ID";
                }
                $stmt->close();
                $con->close();
            }
            
            if ($position=="Nurse")
            {
                $SELECT = "SELECT StaffID FROM nurse_register WHERE StaffID = ? LIMIT 1";
                //$INSERT = "INSERT INTO nurse_register(StaffID, Fullname, Username, Password, IC_Num, Phone_Num, Email, Position) values($staffid, $fullname, $usernameR, $passwordR, $icNumber, $phoneNumber, $email, $position)";
                $INSERT = "INSERT INTO nurse_register(StaffID, Fullname, Username, Password, IC_Num, Phone_Num, Email, Position) values(?,?,?,?,?,?,?,?)";

                //Prepare statement
                //$stmt = $con->prepare("SELECT StaffID FROM nurse_register WHERE StaffID = $staffid LIMIT 1");
                $stmt = $con->prepare($SELECT);
                $stmt->bind_param("s", $staffid);
                $stmt->execute();
                $stmt->bind_result($staffid);
                $stmt->store_result();
                $rnum = $stmt->num_rows;
        
                if ($rnum==0) 
                {
                    $stmt->close();
                    //$stmt = $con->prepare("INSERT INTO nurse_register (StaffID, Fullname, Username, Password, IC_Num, Phone_Num, Email, Position) values($staffid, $fullname, $usernameR, $passwordR, $icNumber, $phoneNumber, $email, $position)");
                    $stmt = $con->prepare($INSERT);
                    $stmt->bind_param("ssssiiss",$staffid, $fullname, $usernameR, $passwordR, $icNumber, $phoneNumber, $email, $position); 
                    $stmt->execute();
                    ?>   
                    <script type="text/javascript">
                        alert("Success to register"); 
                        history.go(-1);  
                        window.location.href="register.html";  
                    </script>
                    <?php  

                    //echo "Success to register"; 
                } 
                else 
                {
                    ?>   
                    <script type="text/javascript">
                        alert("Someone already register using this Staff ID"); 
                        history.go(-1);  
                        window.location.href="register.html";  
                    </script>
                    <?php 
                }
                $stmt->close();
                $con->close();
            }
        }
    } 
        
    else if (empty($staffid) || empty($fullname) || empty($usernameR) || empty($passwordR) || empty($icNumber) || empty($phoneNumber) || empty($email) || empty($position)) 
    //else 
    {
        ?>   
            <script type="text/javascript">
                alert("All field are required"); 
                history.go(-1);  
                window.location.href="register.html";  
            </script>
        <?php  
        //echo "All field are required";
        die();
    }
}
?>