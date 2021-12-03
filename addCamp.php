<?php
include('connection.php');

  $campName= $_POST['campName'];
  $nic = $_POST['NIC'];
  $address  = $_POST['address'];
  $date1 = $_POST['Date']; 
$day=date("d",strtotime($date1));
$month=date("m",strtotime($date1));
$year=date("y",strtotime($date1));
  $contactNo=$_POST['contactNo'];
  
  $query = "INSERT INTO `campreg`(`Name`, `NIC`, `Address`, `ContactNo`, `Date`, `Month`, `Year`)
   VALUES('$campName','$nic','$address','$contactNo','$day','$month','$year')";

  $saved = mysqli_query($Con, $query);

  if ($saved) {
    echo "<script> alert('Camp Added successfully ')</script>";
    echo "<script> window.open('DonationCampaign.php','_self')</script>";
  }
?>