<?php
session_start();
include('connection.php');
$nic=$_POST['nic'];
$staffId=$_POST['staffID'];
$password=md5($_POST['newPassword']);

$query = "SELECT `Staff ID` FROM `emptbl` WHERE `EmpNIC`='$nic'";
$result = mysqli_query($Con, $query);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($users as $user) :
    if($staffId==$user['Staff ID'] ){
        $query1 = "UPDATE `emptbl` SET `EmpPw`='$password' WHERE `EmpNIC`='$nic'";
        $saved = mysqli_query($Con, $query1);
        if ($saved) {
            echo "<script> alert('Successfully Updated')</script>";
            echo "<script> window.open('login.php','_self')</script>";
          }   
        
    }else{
        echo "<script> alert('NIC number and Staff ID do not matched ')</script>";
        echo "<script> window.open('login.php','_self')</script>";
    }
endforeach;


?>