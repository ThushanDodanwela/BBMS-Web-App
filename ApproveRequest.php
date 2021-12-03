<?php
include('connection.php');
  $Id= $_POST['requestId'];
  $units= -($_POST['units']);
  $bloodGroup= $_POST['bloodGroup'];
  $stat= "Approved";
  $date=date("Y/m/d");
  $query = "UPDATE `requests` SET `Status`='$stat' WHERE `Request_ID`='$Id'";
  $query1 = "INSERT INTO `bloodtbl`( `BloodGroup`, `amount`, `Date`) VALUES ('$bloodGroup','$units','$date')";
  $saved = mysqli_query($Con, $query);
  $saved1 = mysqli_query($Con, $query1);

  if ($saved && $saved1) {
    echo "<script> alert('Request Approved successfully ')</script>";
    echo "<script> window.open('PendingRequests.php','_self')</script>";
  }
