<?php
include('connection.php');
  $fullName= $_POST['fullName'];
  $userName= $_POST['userName'];
  $password = md5($_POST['password']);
  $nic = $_POST['nic']; 
  $staffId = $_POST['staffId'];
  $type=$_POST['user'];
  
  $query = "INSERT INTO `emptbl`(`EmpNIC`, `EmpName`, `EmpUserName`, `EmpPw`, `Register as`, `Staff ID`) VALUES ('$nic','$fullName','$userName','$password','$type','$staffId')";

  $saved = mysqli_query($Con, $query);

  if ($saved) {
    echo "<script> alert('UserAdded successfully ')</script>";
    echo "<script> window.open('UserRegistration.php','_self')</script>";
  }
?>