<?php
session_start();
$_SESSION['loggedinAdmin'] =  false;
$_SESSION['loggedinHospital'] =  false;

include('connection.php');
$userName=$_POST['userName'];
$password=md5($_POST['password']);
$query = "SELECT * FROM `emptbl` ";
$result = mysqli_query($Con, $query);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($users as $user) :
    if($userName==$user['EmpUserName']&& $password == $user['EmpPw'] ){
        
        if($user['Register as']=="Admin"){
            $_SESSION['loggedinAdmin'] =  true;
            echo "<script> window.open('Dashboard.php','_self')</script>";
        }
        else{
            $_SESSION['loggedinHospital'] =  true;
            echo "<script> window.open('HospitleDash.php','_self')</script>";
        }
    }
endforeach;

if($_SESSION['loggedinAdmin']==false && $_SESSION['loggedinHospital'] == false ){
    echo "<script> alert('UserName or password incorrect ')</script>";
        echo "<script> window.open('login.php','_self')</script>";
}
?>