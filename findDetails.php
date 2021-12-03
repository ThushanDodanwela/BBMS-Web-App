<?php
include('connection.php');
 $nic= $_REQUEST['nic'];
 if ($nic != ""){
    $query = "SELECT d.`DBgroup`,max(dd.LastDonationDate) FROM `donortbl` d,donar_donation dd WHERE d.`NICdonor`='$nic' AND  dd.NIC ='$nic'";

    $result = mysqli_query($Con, $query);
    $donors = mysqli_fetch_array($result);
    $BloodGrp =$donors['DBgroup'];
    $LDate = $donors['max(dd.LastDonationDate)'];
 }
  
$row = array("$BloodGrp","$LDate");
$myJSON = json_encode($row);
echo $myJSON;


?>


  
