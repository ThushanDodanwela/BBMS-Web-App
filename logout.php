<?php
session_start();
$_SESSION['loggedinAdmin'] =  false;
$_SESSION['loggedinHospital'] =  false;
$_SESSION['loggedin']==false;
echo "<script> window.open('login.php','_self')</script>";

?>