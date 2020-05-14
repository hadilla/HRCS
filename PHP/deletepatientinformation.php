<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "hrcs";

// Create connection
$con = mysqli_connect($servername, $username, $password, $db);

//Check connection
if(!$con) {
	die("Connection failed: ".mysqli_connect_error());
}

 else
   {
    mysqli_select_db($con, 'hrcs');
    $sql = "DELETE FROM patient_information WHERE Matric_Num ='$_GET[matricnumber]'";

    ?>
      <script type = "text/javascript">
      var r = confirm("Are you sure want to delete ?");
      if (r == true) {
          alert("Success delete");
    <?php
       if(mysqli_query($con,$sql))
       {
           header("location: /HRCS/managepatientinformation.html");
       }
       else
       {
           echo "error";
       }

     ?> }

     else
     {
         alert("You cancel Delete");
     }
     </script>

     <?php

     die();
    }

?>


