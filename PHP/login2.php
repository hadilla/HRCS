<?php
 //Get values passe from in login.php file
 $usernameL = $_POST["username"];
 $passwordL = $_POST["password"];
 $userL = $_POST["user"];

//cek kalau text area tu kosong, kalau kosong dia akan kluar pop up message
 if (empty($usernameL) || empty($passwordL) || empty($userL))
 {
     ?>   
         <script type="text/javascript">
             alert("All field are required"); 
             history.go(-1);  
             window.location.href="login.html";  
         </script>
     <?php  
     die();
 }
 else
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
        if ($userL=="Doctor")
        {
            $result1 = mysqli_query($con,"SELECT Username, Password FROM doctor_register WHERE Username = '".$_POST['username']."' AND Password = '".$_POST['password']."'") or die ("Failed to query database" .mysql_error());
            $row = mysqli_fetch_array($result1); //dia masukkan data drpd data row yang dah dapat dalam table database

            if($row['Username'] == $usernameL && $row['Password'] == $passwordL)
            {
                header("location: /HRCS/Doctor.html");
            }
            else
            {
                ?>   
                    <script type="text/javascript">
                        alert("Login Failed"); 
                        history.go(-1);  
                        window.location.href="login.html";  
                    </script>
                <?php  
                die();
            }
        } 
        if ($userL=="Nurse")
        {
            $result1 = mysqli_query($con,"SELECT Username, Password FROM nurse_register WHERE Username = '".$_POST['username']."' AND Password = '".$_POST['password']."'") or die ("Failed to query database" .mysql_error());
            $row = mysqli_fetch_array($result1); //dia masukkan data drpd data row yang dah dapat dalam table database

            if($row['Username'] == $usernameL && $row['Password'] == $passwordL)
            {
                header("location: /HRCS/nurse1.html");
            }
            else
            {
                ?>   
                    <script type="text/javascript">
                        alert("Login Failed"); 
                        history.go(-1);  
                        window.location.href="login.html";  
                    </script>
                <?php  
                die();
            }
        }
        if ($userL=="Patient")
        {
            $patient = mysqli_query($con,"SELECT Username, Password FROM patient_information WHERE Username = '".$_POST['username']."'AND Password = '".$_POST['password']."'") or die ("Failed to query database" .mysql_error());
            $row = mysqli_fetch_array($patient); //dia masukkan data drpd data row yang dah dapat dalam table database

            if($row['Username'] == $usernameL && $row['Password'] == $passwordL)
            {
                //header("Location: /HRCS/patient.html?username=$row['Username']");
                header("Location: /HRCS/patient.html?username='".$row['Username']."'");  //guna untuk parsing username ke page html lain dari file php
                //header("location: /HRCS/patient.html?username=$row['Username']");
                /*?>
                    <script>
                        var formData = new FormData();
                        formData.append("USERNAME", "'.$row['Username'].'");
              
                        var request = new XMLHttpRequest();
                        request.open("POST", "/HRCS/patient.html");
                        request.send(formData);
                    </script>
                <?php
                /*?>
                <html>s
                    <a href="/HRCS/patient.html?username=<?php echo $row['Username']; ?>">
                </html>
                <?php*/
                //header("location: /HRCS/patient.html");
                //buat coding parsing username ke page patient.html by url
            }
            else
            {
                ?>   
                    <script type="text/javascript">
                        alert("Login Failed"); 
                        history.go(-1);  
                        window.location.href="login.html";  
                    </script>
                <?php  
                die();
            }
        }
    }
}

?>