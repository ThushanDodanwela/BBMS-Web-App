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
  $query = "UPDATE `donortbl` SET `Dfname`='$firstName',`Dlname`='$lastName',`DDob`='$dob',`Dage`='$age',`DPhone`='$ContactNo',`DGender`='$gender',`DBgroup`='$bloodGroup',`Line1`='$line1',`line2`='$line2',`Street`='$street',`City`='$city' WHERE `NICdonor`='$nic'";
  
  $saved = mysqli_query($Con, $query);

  if ($saved) {
    echo "<script> alert('Successfully Updated')</script>";
    echo "<script> window.open('Donor.php','_self')</script>";
  }
?>