<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "hrcs";

$con = mysqli_connect($servername, $username, $password, $db);

//Check connection
if(!$con) {
 die("Connection failed: ".mysqli_connect_error());
}

   // Select Database
   mysqli_select_db($con, 'hcrs');

   //select query
   $sql = "DELETE FROM treatment_and_medicine WHERE Matric_Num='$_GET[matricnumber]'";

   //execute the query
   if(mysqli_query($con,$sql))
     header("location: /HRCS/managepatientinformation.html");

    else
       echo "Not Deleted";

       {
    ?>   
            <script type="text/javascript">
                alert("Data was delete"); 
                history.go(-1);  
                window.location.href="managepatientinformation.html";  
            </script>
        <?php  
        die();
    }
    ?>


    

               













   