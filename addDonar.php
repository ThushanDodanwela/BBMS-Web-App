<?php
include('connection.php');
  $firstName= $_POST['firstName'];
  $lastName= $_POST['lastName'];
  $nic = $_POST['NIC'];
  $dob  = $_POST['Date'];
  $age = $_POST['age']; 
  $gender = $_POST['gender'];
  $ContactNo=$_POST['contactNo'];
  $bloodGroup=$_POST['Blood'];
  $line1= $_POST['line1'];
  $line2 = $_POST['line2'];
  $street = $_POST['street'];
  $city = $_POST['city'];
  $query = "INSERT INTO `donortbl`(`NICdonor`, `Dfname`, `Dlname`, `DDob`, `Dage`, `DPhone`, `DGender`, `DBgroup`, `Line1`, `line2`, `Street`, `City`) VALUES ('$nic','$firstName','$lastName','$dob','$age','$ContactNo','$gender','$bloodGroup','$line1','$line2','$street','$city')";

  $saved = mysqli_query($Con, $query);

  if ($saved) {
    echo "<script> alert('DonarAdded successfully ')</script>";
    echo "<script> window.open('Donor.php','_self')</script>";
  }
?>