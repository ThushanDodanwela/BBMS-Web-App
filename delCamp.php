<?php 
session_start();
include('connection.php');

$Id = $_POST['campId'];
$delQuery = "DELETE FROM `campreg` WHERE `NIC`='$Id'" ;

$saved = mysqli_query($Con, $delQuery);
  
    if ($saved) {
        echo "<script> alert('Camp deleted successfully ')</script>";
        echo "<script> window.open('DonationCampaign.php','_self')</script>";
    }
   
?>