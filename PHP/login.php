<?php

$username = $_POST['username'];    
$password = $_POST['password'];   
$user = $_POST['user'];


 
if (empty($username) || empty($password) || empty($user)) 
{
    ?>   
        <script type="text/javascript">
            alert("All field are required"); 
            history.go(-1);  
            window.location.href="login.html";  
        </script>
    <?php  
    //echo "All field are required";
    die();
}
else
{

    if (!empty($username) || !empty($password) || !empty($user)) 
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
            if ($user=="Doctor")
            {
                $SELECT = "SELECT Username  FROM doctor_login WHERE Username = ?";
                //$INSERT = "INSERT INTO doctor_register(StaffID, Fullname, Username, Password, IC_Num, Phone_Num, Email, Position) values($staffid, $fullname, $usernameR, $passwordR, $icNumber, $phoneNumber, $email, $position)";
                $INSERT = "INSERT INTO doctor_login(Username, Password, User, Password, User) values(?,?,?)";

                //Prepare statement
                //$stmt = $con->prepare("SELECT StaffID FROM doctor_register WHERE StaffID = $staffid LIMIT 1");
                $stmt = $con->prepare($SELECT);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $stmt->bind_result($username);
                $stmt->store_result();
                $rnum = $stmt->num_rows;
        
                if ($rnum==1)
                {
                   /* $stmt->close();
                    //$stmt = $con->prepare("INSERT INTO doctor_register (StaffID, Fullname, Username, Password, IC_Num, Phone_Num, Email, Position) values($staffid, $fullname, $usernameR, $passwordR, $icNumber, $phoneNumber, $email, $position)");
                    $stmt = $con->prepare($INSERT);
                    $stmt->bind_param("ssss",$username, $password, $user); 
                    $stmt->execute();*/
                    ?>   
                    <script type="text/javascript">
                        alert("Success to login"); 
                        history.go(-1);  
                        window.location.href="login.html";  
                    </script>
                    <?php  

                    //echo "Success to register"; 
                } 
                else 
                {
                    ?>   
                    <script type="text/javascript">
                        alert("Succes to login"); 
                        history.go(-1);  
                        window.location.href="Doctor.html";  
                    </script>
                    <?php 
                    //echo "Someone already register using this Staff ID";
                }
                $stmt->close();
                $con->close();
            }
            
            if ($user=="Nurse")
            {
                $SELECT = "SELECT Username FROM nurse_login WHERE Username = ? ";
               
                $INSERT = "INSERT INTO nurse_login(Username, Password, User) values(?,?,?)";

                //Prepare statement
                
                $stmt = $con->prepare($SELECT);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $stmt->bind_result($username);
                $stmt->store_result();
                $rnum = $stmt->num_rows;
        
                if ($rnum==1) 
                {
                    $stmt->close();
                    
                    $stmt = $con->prepare($INSERT);
                    $stmt->bind_param("ssss",$username, $password, $user); 
                    $stmt->execute();
                    ?>   
                    <script type="text/javascript">
                        alert("Success to login"); 
                        history.go(-1);  
                        window.location.href="nurse.html";  
                    </script>
                    <?php  

                    //echo "Success to register"; 
                } 
                else 
                {
                    ?>   
                    <script type="text/javascript">
                        alert("Someone already login"); 
                        history.go(-1);  
                        window.location.href="nurse.html";  
                    </script>
                    <?php 
                }
                $stmt->close();
                $con->close();
            }
            if ($user=="Patient")
            {
                $SELECT = "SELECT Username FROM patient_login WHERE Username = ? ";
               
                $INSERT = "INSERT INTO patient_login(Username, Password, User) values(?,?,?)";

                //Prepare statement
                
                $stmt = $con->prepare($SELECT);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $stmt->bind_result($username);
                $stmt->store_result();
                $rnum = $stmt->num_rows;
        
                if ($rnum==1) 
                {
                    $stmt->close();
                    
                    $stmt = $con->prepare($INSERT);
                    $stmt->bind_param("ssss",$username, $password, $user); 
                    $stmt->execute();
                    ?>   
                    <script type="text/javascript">
                        alert("Success to login"); 
                        history.go(-1);  
                        window.location.href="patient.html";  
                    </script>
                    <?php  

                    //echo "Success to register"; 
                } 
                else 
                {
                    ?>   
                    <script type="text/javascript">
                        alert("Someone already login"); 
                        history.go(-1);  
                        window.location.href="patient.html";  
                    </script>
                    <?php 
                }
                $stmt->close();
                $con->close();
            }
           




        }
    }
  
    else if (empty($username) || empty($password) || empty($user)) 
    //else 
    {
        ?>   
            <script type="text/javascript">
                alert("All field are required"); 
                history.go(-1);  
                window.location.href="login.html";  
            </script>
        <?php  
        //echo "All field are required";
        die();
    }
}

?>