<?php

$staffid = $_POST['StaffID'];    //StaffID ni dia amik dari name="StaffID"
$fullname = $_POST['Fullname'];   //semua name yang dalam array
$usernameR = $_POST['Username'];
$passwordR = $_POST['Password'];
$icNumber = $_POST['IC_Number'];
$phoneNumber = $_POST['Phone_Number'];
$email = $_POST['Email'];
$position = $_POST['position'];


if (!empty($staffid) || !empty($fullname) || !empty($usernameR) || !empty($passwordR) || !empty($icNumber) || !empty($phoneNumber) || !empty($email) || !empty($position)) 
{
    //dalam phpmyadmin tu, kita set 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "HRCS";  //nama database dlm phpmyadmin

    // Create connection
    $con = mysqli_connect($servername, $username, $password,$db);

    // Check connection
    if (!$con) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
        if ($position=="Doctor")
        {
            $SELECT = "SELECT STAFF_ID FROM doctor_register WHERE STAFF_ID = ? LIMIT 1";
            //$INSERT = "INSERT INTO doctor_register(STAFF_ID, USERNAME, PASSWORDS, POSITION, IC_NUM, EMAIL, FULLNAME, PHONE_NUM) values($staffid, $usernameR, $passwordR, $position, $icNumber, $email, $fullname, $phoneNumber)";
            $INSERT = "INSERT INTO doctor_register(STAFF_ID, USERNAME, PASSWORDS, POSITION, IC_NUM, EMAIL, FULLNAME, PHONE_NUM) values(?,?,?,?,?,?,?,?)";

            //Prepare statement
            //$stmt = $con->prepare("SELECT STAFF_ID FROM doctor_register WHERE STAFF_ID = $staffid LIMIT 1");
            $stmt = $con->prepare($SELECT);
            $stmt->bind_param("s", $staffid);
            $stmt->execute();
            $stmt->bind_result($staffid);
            $stmt->store_result();
            $rnum = $stmt->num_rows;
     
            if ($rnum==0) 
            {
                $stmt->close();
                //$stmt = $con->prepare("INSERT INTO doctor_register(STAFF_ID, USERNAME, PASSWORDS, POSITION, IC_NUM, EMAIL, FULLNAME, PHONE_NUM) values($staffid, $usernameR, $passwordR, $position, $icNumber, $email, $fullname, $phoneNumber)");
                $stmt = $con->prepare($INSERT);
                $stmt->bind_param("ssssssss", $staffid, $usernameR, $passwordR, $position, $icNumber,  $email, $fullname, $phoneNumber); // yg ssss banyak2 tu sebab s tu menandakan value yang store dlm database adalah string
                $stmt->execute();
                echo "Success to register"; // yang ni nak test ja, kalau taknak dia muncul another page yg tunjuk success ni, buat success pop out guns javascript, boleh cari dalam online
            } 
            else 
            {
                echo "Someone already register using this Staff ID";
            }
            $stmt->close();
            $con->close();
        }
        
        if ($position=="Nurse")
        {
            //buat sebijik macam doctor yang kat atas tu, amik semua dalam if doctor dan ubah nama table nurse_register dan column sahaja
        }
    }
} 
else 
{
    echo "All field are required";
    die();
}
?>