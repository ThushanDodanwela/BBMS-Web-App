<?php
session_start();
include('connection.php');

    $nic = $_POST['Nic'];
    $date = date("Y-m-d");
    $bloodGroup=$_POST['Blood'];
    $bloodUnits = $_POST['units'];
    $plasma=$_POST['plasma'];
    $platelet = $_POST['platelet'];
    $query1 = "INSERT INTO `bloodtbl`( `BloodGroup`, `amount`, `Date`) VALUES  ('$bloodGroup','$bloodUnits','$date')";
    $saved1 = mysqli_query($Con, $query1);
    $query2 = "INSERT INTO `plasma`( `Amount`, `date`) VALUES ('$plasma','$date')";
    $saved2 = mysqli_query($Con, $query2);
    $query3 = "INSERT INTO `platelet`( `nic`,  `BloodGroup`, `Amount`, `date`) VALUES ('$nic','$bloodGroup','$platelet','$date')";
    $saved3 = mysqli_query($Con, $query3);
    $query4 = "INSERT INTO `donar_donation`(`NIC`, `LastDonationDate`) VALUES ('$nic','$date')";
    $saved4 = mysqli_query($Con, $query4);
    echo $saved1;
    echo $saved2;
    echo $saved3;
    echo $saved4;
if ($saved1 && $saved2 && $saved3 && $saved4) {
  echo "<script> alert('Donation Added successfully ')</script>";
  echo "<script> window.open('Donation.php','_self')</script>";
  }
    

  
?>