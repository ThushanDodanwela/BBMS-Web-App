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
  
  $query = "UPDATE `campreg` SET `Name`='$campName',`NIC`='$nic',`Address`='$address',`ContactNo`='$contactNo',`Date`='$day',`Month`='$month',`Year`='$year' WHERE `NIC`='$nic' AND `Date`='$day' AND`Month`='$month'AND`Year`='$year';";

  $saved = mysqli_query($Con, $query);

  if ($saved) {
    echo "<script> alert('Camp Updated successfully ')</script>";
    echo "<script> window.open('DonationCampaign.php','_self')</script>";
  }
?>