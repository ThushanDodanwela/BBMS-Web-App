<?php

include('connection.php');


  $PName=$_POST['PName'];
  $Wno=$_POST['Wno'];
  $SId=$_POST['SId'];
  $Units=$_POST['Units'];
  $Blood=$_POST['Blood'];
  $Status = "pending";
  
  
  
  //query
  $query="INSERT INTO `requests`(`Patient_name`, `Ward_No`, `Blood_Group`, `NoOfUnits`, `StaffID`, `Status`) VALUES('$PName','$Wno','$Blood','$Units','$SId','$Status');";
  
  //Execute Query
  $saved = mysqli_query($Con, $query);

  if ($saved) {
    echo "<script> alert('Request Sent successfully ')</script>";
    echo "<script> window.open('History.php','_self')</script>";
  
}
?>