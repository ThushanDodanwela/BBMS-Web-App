<?php
session_start();
include('connection.php');

 
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedinHospital"]) || $_SESSION["loggedinHospital"] !== true){
        
      echo "<script> window.open('login.php','_self')</script>";
        exit;
    }


$query = "SELECT * FROM `requests`";
$result = mysqli_query($Con, $query);
$requests = mysqli_fetch_all($result, MYSQLI_ASSOC);


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
      <link rel="stylesheet" type="text/css" href="style1.css">
      <link rel="stylesheet" type="text/css" href="form1.css">
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
            <h7 style = "font-size: 25px; font-weight:bold; vertical-align: text-bottom;"class="active_link" >History</h7>
          </div>
          <div class="navbar__right">
          
          </div>
        </nav>

        <main>

            <div class="main__container" style="margin-top: 20px;">

              <table class="table">
                <thead class="table-dark">
                  <tr>
                      
        <th scope="col">Patient Name</th>
        <th scope="col">Ward No</th>
        <th scope="col">Blood Group</th>
        <th scope="col">No of Units</th>
        <th scope="col">Staff ID</th>
        <th scope="col">Status</th>
      
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($requests as $request) : ?>
                    <tr>

                      <td><?php echo $request['Patient_name'] ?></td>
                      <td><?php echo $request['Ward_No'] ?></td>
                      <td><?php echo $request['Blood_Group'] ?></td>
                      <td><?php echo $request['NoOfUnits'] ?></td>
                      <td><?php echo $request['StaffID'] ?></td>
                      <td id="stat" class = <?php if($request['Status']=="Approved"){echo "text-success";}else{echo "text-danger";} ?>><?php echo $request['Status'] ?></td>

                      
                      
                      
                    </tr>
                  <?php endforeach ?>

                  
                    
                </tbody>
              </table>

              <div class="container-form-1">


                
              </div>
                
    
  
  </div>
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
            <div class="sidebar__link ">
            <i class="fa fa-line-chart" aria-hidden="true"></i>
              <a href="HospitleDash.php" style="text-decoration: none;">Dashboard</a>
            </div>
            <div class="sidebar__link">
              <i class="fa fa-pie-chart"></i>
              <a href="MakeRequest.php"style="text-decoration: none;">Make a Request</a>
            </div>
          
            <div class="sidebar__link active_menu_link " >
              <i class="fa fa-user-plus" aria-hidden="true"></i>
              <a href="History.php" style="text-decoration: none;">History</a>
            </div>
          
            
            
            <div class="sidebar__logout" style ="position:fixed; bottom:1rem;">
              <i class="fa fa-power-off"></i>
              <a href="logout.php" >Log out</a>
            </div>
          </div>
        </div>
      <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
      <script src="script.js"></script>
    </body>
  </html>
