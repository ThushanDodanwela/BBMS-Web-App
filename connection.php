<?php
$Con = mysqli_connect("localhost", "root", "", "BBMS","3306");
if (mysqli_connect_errno())
  {
  echo "<script> alert('unable to connect') </script>" ;
  }
?>