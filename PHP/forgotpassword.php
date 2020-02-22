<?php

session_start();
include_once 'db_connect.php';

if(isset($_POST['submit']))
{
   $email = $_POST['Email'];
   $position = $_POST['Position'];

   if (empty($email) || empty($position)) 
   {
      ?>   
         <script type="text/javascript">
            alert("All field are required"); 
            history.go(-1);  
            window.location.href="forgotpassword.html";  
         </script>
      <?php  
      die();
   }
   else
   {
      if ($position=="Doctor")
      {
         $result = mysqli_query($con,"SELECT * FROM doctor_register WHERE Email='" . $_POST['Email'] . "'");
         $row = mysqli_fetch_assoc($result);
         $fetch_email=$row['Email'];
         //echo $fetch_email;
         $email=$row['Email'];
         //echo $email;
         $password=$row['Password'];
         //echo $password;
         if (!empty($email))
         {
            if($email==$fetch_email)
            {
               $to = $email;
               $subject = "Password";
               $txt = "Your password is : $password.";
               $headers = "From: HRCS@example.com" . "\r\n" ."CC: didi@example.com";
               mail($to,$subject,$txt,$headers);
               ?>   
                  <script type="text/javascript">
                     alert("Your password already sent to your email"); 
                     history.go(-1);  
                     window.location.href="forgotpassword.html";  
                  </script>
               <?php  
               die();
            }
         }
         else
         {
            ?>   
               <script type="text/javascript">
                  alert("Invalid email address"); 
                  history.go(-1);  
                  window.location.href="forgotpassword.html";  
               </script>
            <?php  
            die();
         }
      }
      if ($position=="Nurse")
      {
         $result = mysqli_query($con,"SELECT * FROM nurse_register WHERE Email='" . $_POST['Email'] . "'");
         $row = mysqli_fetch_assoc($result);
         $fetch_email=$row['Email'];
         //echo $fetch_email;
         $email=$row['Email'];
         //echo $email;
         $password=$row['Password'];
         //echo $password;
         if (!empty($email))
         {
            if($email==$fetch_email)
            {
               $to = $email;
               $subject = "Password";
               $txt = "Your password is : $password.";
               $headers = "From: HRCS@example.com" . "\r\n" ."CC: didi@example.com";
               mail($to,$subject,$txt,$headers);
               ?>   
                  <script type="text/javascript">
                     alert("Your password already sent to your email"); 
                     history.go(-1);  
                     window.location.href="forgotpassword.html";  
                  </script>
               <?php  
               die();
            }
         }
         else
         {
            ?>   
               <script type="text/javascript">
                  alert("Invalid email address"); 
                  history.go(-1);  
                  window.location.href="forgotpassword.html";  
               </script>
            <?php  
            die();
         }
      }
   } 
}
?>


