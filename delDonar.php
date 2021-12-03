<?php 
session_start();
include('./connection.php');
if(isset($_POST['delDonor'])){
    $Id = $_POST['donarId'];
    $delQuery = "DELETE FROM `donortbl` WHERE `NICdonor`='$Id'" ;
    echo $delQuery ;
    $saved = mysqli_query($Con, $delQuery);
  
    if ($saved) {
      $_SESSION['deleteMsg'] ="<script> alert('successfully Deleted')</script>";
      
    }
    unset($_POST['delDonor']);
    //header("location:Donor.php");
  }
  
?>