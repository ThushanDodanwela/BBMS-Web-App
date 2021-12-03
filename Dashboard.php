<?php
session_start();
include('connection.php');
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedinAdmin"]) || $_SESSION["loggedinAdmin"] !== true){
        
  echo "<script> window.open('login.php','_self')</script>";
  exit;
}
//total donars
$query = "SELECT count(NICdonor) FROM `donortbl`";
$result = mysqli_query($Con, $query);
$Totdonors = mysqli_fetch_all($result, MYSQLI_ASSOC);

//pending requests
$query1 ="SELECT count(Status) FROM `requests` WHERE Status='pending'";
$result1 = mysqli_query($Con, $query1);
$Pendings = mysqli_fetch_all($result1, MYSQLI_ASSOC);


//Approved
$query2 ="SELECT count(Status) FROM `requests` WHERE Status='Approved'";
$result2 = mysqli_query($Con, $query2);
$Approved = mysqli_fetch_all($result2, MYSQLI_ASSOC);

//Total Requests
$query3 ="SELECT Blood_Group, sum(NoOfUnits) as 'sum' FROM `requests` GROUP BY Blood_Group";
$result3 = mysqli_query($Con, $query3);

//Total Donations
$query4 = "SELECT BloodGroup , sum(Units) as sum FROM `donation` GROUP BY BloodGroup";
$result4 = mysqli_query($Con, $query4);
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="form1.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <title>Blood Bank Managment System</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
  </head>
  <body id="body">
    <div class="container1">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          
          <i  class="fa fa-line-chart fa-2x  a" aria-hidden="true"></i>
          <h7 style = "font-size: 25px; font-weight:bold; vertical-align: text-bottom;"class="active_link" >Dashboard</h7>
        </div>
        <div class="navbar__right">
          <a href="#">
            <i class="fa fa-search" aria-hidden="true"></i>
          </a>
          <a href="#">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
          </a>
          <a href="#">
            <img width="30" src="assets/blood-donate-unscreen.gif" alt="" />
            
          </a>
        </div>
      </nav>

      <main>
        <aside>
    
             <div class="container">
        <div class="row">
   
    <div class="col-sm">
        
         <div>
         <div class="container" style="margin-top: 20px; border: 5px solid #000f2c; border-radius: 25px; background: #ffffff;">
              <div class="row">
                    <div class="col-sm">
                      <img src="assets/Donoros.png" alt="Total Donation" style="width:50px; height:50px;margin-top: 10px;">
                    </div>
                    <div class="col-sm">
                      <?php
                      foreach($Totdonors as $Totdonor) : ?>
                        <h2 style="font-weight: bold; text-align: justify;color:#1e2a78; font-size: 30px">Total Donors:</h2>
                        <h3 style="color:#ffd615; font-weight: bold; font-size: 40px"><?php echo $Totdonor['count(NICdonor)'] ?></h3>

                        <?php endforeach ?>
                    </div>    
          </div>
        </div>
         </div>     
    </div>
    
    <!--colom 02-->
    <div class="col-sm">
     
     
         <div>
        <div class="container" style="margin-top: 20px; border: 5px solid #000f2c; border-radius: 25px; background: #ffffff;">
              <div class="row">
                    <div class="col-sm">
                      <img src="assets/pending.png" alt="Pending Requests" style="width:50px; height:50px;margin-top: 10px;">
                    </div>
                    <div class="col-sm">
                    <?php
                      foreach($Pendings as $Pending) : ?>
                        <h2 style="font-weight: bold; color:#1e2a78; font-size: 30px">Pending Requests:</h2>
                      <h3 style="color:#ffd615; font-weight: bold; font-size: 40px"><?php echo $Pending['count(Status)'] ?></h3>
                      <?php endforeach ?>
                    </div>    
          </div>
        </div>
         </div>     
     
    </div>
    
    <!--colom 03-->
    <div class="col-sm">
     
     
         <div>
        <div class="container" style="margin-top: 20px; border: 5px solid #000f2c; border-radius: 25px; background: #ffffff;">
              <div class="row">
                    <div class="col-sm">
                      <img src="assets/approved.png" alt="Approved Requests" style="width:50px; height:50px;margin-top: 10px;">
                    </div>
                    <div class="col-sm">
                    <?php
                      foreach($Approved as $Approve) : ?>
                        <h2 style="font-weight: bold;color:#1e2a78; font-size:30px ;">Approved Requests:</h2>
                      <h3 style="color:#ffd615; font-weight: bold; font-size: 40px"><?php echo $Approve['count(Status)'] ?></h3>
                      <?php endforeach ?>
                    </div>    
          </div>
        </div>
         </div>     
     
     
    </div>
    
          </div>         
        </div>

   


     
        <div class="row " style="margin-left:5%;margin-top: 15px; " > 

          <div class="col-12 col-lg-6"  > 

              
                  <div id="piechart1" style="width:560px; height:400px">

               

              </div>
</div>

        

          <div class="col-12 col-lg-6" > 

              
                    <div id="piechart2" style="width:560px; height:400px">

               
          </div>

        </div>



    
</div>

</aside>


      </main>

      <div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <img src="assets/logo.png" alt="logo" />
            <h1 style="font-size: 24px; font-weight:bold">BLOOD BANK</h1>
          </div>
          <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
          ></i>
        </div>

        <div class="sidebar__link">
          <div class="sidebar__link active_menu_link">
          <i class="fa fa-line-chart" aria-hidden="true"></i>
            <a href="Dashboard.php" style="text-decoration: none;">Dashboard</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-pie-chart"></i>
            <a href="BloodStock.php"style="text-decoration: none;">Blood Stock</a>
          </div>
         
          <div class="sidebar__link ">
            <i class="fa fa-user-plus" aria-hidden="true"></i>
            <a href="DonorRegistrations.php"style="text-decoration: none;">Donor Registration</a>
          </div>
          <div class="sidebar__link">
           <i class="fa fa-heartbeat" aria-hidden="true"></i>
            <a href="Donor.php"style="text-decoration: none;">Donor</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-medkit" aria-hidden="true"></i>
            <a href="Donation.php"style="text-decoration: none;">Donation</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-refresh" aria-hidden="true"></i>
            <a href="PendingRequests.php"style="text-decoration: none;">Pending Requests</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-user-md" aria-hidden="true"></i>
            <a href="UserRegistration.php"style="text-decoration: none;">User Registrations</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-hospital-o" aria-hidden="true"></i>
            <a href="DonationCampaign.php"style="text-decoration: none;">Donation Campaign</a>
          </div>
          
          
          <div class="sidebar__logout" style ="position:fixed; bottom:1rem;">
            <i class="fa fa-power-off"></i>
            <a href="logout.php" >Log out</a>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>

     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
              <script type="text/javascript">
                  google.charts.load('current', {'packages':['corechart']});
                  google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data1 = google.visualization.arrayToDataTable([
          ['Blood Type', 'Amount'],

          <?php 
          while ($row = mysqli_fetch_array($result3)){
            echo " ['".$row["Blood_Group"]."',".$row["sum"]."],";
          }

          ?>

        ]);



         var options1 = {
          title: 'Summery of Blood Requests'
        };

         var data2 = google.visualization.arrayToDataTable([
          ['Blood Type', 'Amount'],

          <?php 
          while ($row1 = mysqli_fetch_array($result4)){
            echo " ['".$row1["BloodGroup"]."',".$row1["sum"]."],";
          }

          ?>
         
        ]);

        var options2 = {
          title: 'Summery of Blood Donations'
        };

        var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));

        var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart1.draw(data1, options1);
        chart2.draw(data2, options2);
      }
    </script>

  </body>
</html>
