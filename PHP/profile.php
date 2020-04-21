<?php
   include("db_connect.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="css(baru)/managepatientinformation.css">
  
  </head>
	 <body>
	  <div id="wrapper">
		  <header>
			  <h1>HEALTH REPORT CARD SYSTEM</h1>
		  </header>
		  
		  <div class="menu-bar">
        <ul>
            <li><a href= "homepage2.html">Homepage</a></li>
            <li><a href= "healthinfo.html">Health Info</a></li>
            <li class="active"><a href= "nurse1.html">Nurse</a>
                <div class="sub-menu-1">
                  <ul>
                     <li class="hover-me"><a href="/HRCS/nurse1.html">Patient Information</a>
                       <div class="sub-menu-2">
                       <ul>
                          <li><a href="/HRCS/patientinformation.html">Add New Patient</a></li>
                           <li><a href="/HRCS/managepatientinformation.html">Manage Patient Information</a></li>
                       </ul>
                       </div>
                     </li>
                     <li class="hover-me"><a href="/HRCS/nurseview.html">View Patient Treatment and Medicine</p></a>
                      <!--<div class="sub-menu-2">
                       <ul>
                          <li><a href="">Update Patient Medicine</a></li>
                           <li><a href="/HRCS/displaypatientmedicine.html">View Patient Medicine</a></li>
                       </ul>
                       </div>-->
                     </li>
                    
                  </ul>
                </div>
                </li>
                
            <li><a href= "#">Help</a></li>
            <li><a href= "Homepage2.html">Logout</a></li>
            <li><a href= "nurse1.html">Back</a></li>
				  </ul>
				</div>

<div>
<br><br><br><br><br><br>
</div>

<div class="container">
    <form action="" method="post">
          <button class="btn btn-default" style="float: right; width: 70px;" name="Submit1" >Edit</button>
    </form>
    <div>
        <?php
        $servername = "localhost";
        $username = "root";  
        $password = "";
        $database = "hrcs";

        $mysqli = new mysqli($servername, $username, $password, $database); 
        $query = "SELECT * FROM patient_information"; 
          
        $q=mysqli_query($database,"SELECT*FROM patient_information where Matric_Num='$_SESSION[patient_information]'");
        ?>

        <h2 style ="text-align: center;">My Profile</h2>

        <?php
          $row=mysqli_fetch_assoc($q);

          echo "<div style='text-align: center'>
                <img class= 'img-circle  profile-img' height=110 width=120 src='(../images/icon.png)'></div>";
        ?>
        <div style= "text-align: center;"><b>Welcome,</b></div>

        <?php>
            echo "<table>";
               echo "<tr>";
                   echo "<td>";
                       echo "<b> Matric Number: </b>";
                   echo "</td>";

                   echo "<td>";
                       echo $row['Matric_Num'];
                   echo "</td>";
               echo"</tr>";
                   
                echo "<tr>";
                    echo "<td>";
                        echo "<b>Username: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo $row['Username'];
                    echo "</td>";
                echo"</tr>";

                echo "<tr>";
                    echo "<td>";
                        echo "<b>Password: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo $row['Password'];
                    echo "</td>"; 
                echo"</tr>";

                echo "<tr>";
                    echo "<td>";
                        echo "<b>Name: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo $row['Name'];
                    echo "</td>";
                echo"</tr>";

                echo "<tr>";
                    echo "<td>";
                        echo "<b>IC Number: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo $row['IC_Num'];
                    echo "</td>";
                echo"</tr>";

                echo "<tr>";
                    echo "<td>";
                        echo "<b>Phone Number: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo $row['Phone_Num'];
                    echo "</td>";
                echo"</tr>";

                echo "<tr>";
                    echo "<td>";
                        echo "<b>Address: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo $row['Address'];
                    echo "</td>";
                echo"</tr>";

                echo "<tr>";
                    echo "<td>";
                        echo "<b>Gender: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo $row['Gender'];
                    echo "</td>";
                echo"</tr>";

                echo "<tr>";
                    echo "<td>";
                        echo "<b>Races</b>";
                    echo "</td>";
                    echo "<td>";
                        echo $row['Races'];
                    echo "</td>";
                echo"</tr>";

                echo "<tr>";
                    echo "<td>";
                        echo "<b>Birth Date</b>";
                    echo "</td>";
                    echo "<td>";
                        echo $row['Birth_Date'];
                    echo "</td>";
                echo"</tr>"; 

            echo "</table>"

        ?>

         

    </div>
</div>
</body>
</html>
