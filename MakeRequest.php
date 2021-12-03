<?php

    session_start();
 
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedinHospital"]) || $_SESSION["loggedinHospital"] !== true){
        
      echo "<script> window.open('login.php','_self')</script>";
        exit;
    }
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
          
          <i  class="fa fa-medkit fa-2x  a" aria-hidden="true"></i>
          <h7 style = "font-size: 25px; font-weight:bold; vertical-align: text-bottom;"class="active_link" >Make a Request</h7>
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
       <div class="main__container">
         
          <div class="charts">
            
              <div class="charts__left__title">
                <div>
                    <div class="body1">
                        <div class="container-form-1">
                            
                            <div class="content">
                            <form action="AddRequest.php" id="makeRequest" method="POST" >
                                <div class="user-details">
                                  <div class="input-box">
                                    <span class="details">Patient Name</span>
                                    <input type="text"id="PName" name="PName" placeholder="Enter Patient Name" >
                                    <p id="err_name" style="color: lightcoral;display:none"></p>
                                  </div>
                                  <div class="input-box">
                                    <span class="details">Ward No</span>
                                    <input type="text" id="Wno" name="Wno" placeholder="Ward No" >
                                    <p id="err_WardNo" style="color: lightcoral;display:none"></p>
                                  </div>
                                  <div class="input-box">
                                    <span class="details">Staff Id</span>
                                    <input type="text" Id="SId" name="SId" placeholder="Staff Id" >
                                    <p id="err_staffId" style="color: lightcoral;display:none"></p>
                                  </div>
                                  
                                  <div class="input-box">
                                    <span class="details">Units</span>
                                    <input type="text" id="Units" name="Units"placeholder="Enter Units" >
                                    <p id="err_units" style="color: lightcoral;display:none"></p>
                                  </div>
                                  
                                  <div class="input-box">
                                    <span class="details">Blood Group</span>
                                    <select name="Blood" id="Blood">
                                      <option value="A+">A+</option>
                                      <option value="A-">A-</option>
                                      <option value="B+">B+</option>
                                      <option value="B-">B-</option>
                                      <option value="AB+">AB+</option>
                                      <option value="AB-">AB-</option>
                                      <option value="O+">O+</option>
                                      <option value="O-">O-</option>
                                    </select>
                                    
                                  </div>
                                </div>
                                  
                                <div class="button" id='add'>
                                  <input type="button" name="btnsubmit" value="Send Request">
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        
                      
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
          <div class="sidebar__link">
          <i class="fa fa-line-chart" aria-hidden="true"></i>
            <a href="HospitleDash.php"style="text-decoration: none;">Dashboard</a>
          </div>
          <div class="sidebar__link active_menu_link">
            <i class="fa fa-pie-chart "></i>
            <a href="MakeRequest.php"style="text-decoration: none;">Make a Request</a>
          </div>
         
          <div class="sidebar__link ">
            <i class="fa fa-user-plus" aria-hidden="true"></i>
            <a href="History.php"style="text-decoration: none;">History</a>
          </div>
         
          
          <div class="sidebar__logout" style ="position:fixed; bottom:1rem;">
            <i class="fa fa-power-off"></i>
            <a href="logout.php">Log out</a>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
    <script src="validation.js"></script>
    <script> 
        document.getElementById("add").addEventListener('click', () => {
      let isPatientName = ValidateText("PName", "err_name", "Patient name ");
      let isWardNo = ValidateStaffID("Wno", "err_WardNo", "Ward No ");
      let isStaffId = ValidateStaffID("SId", "err_staffId", "Staff ID ");
      let isUnits = ValidateUnits("Units", "err_units", "Units ");
      

      if (isPatientName && isWardNo && isStaffId && isUnits) {

        document.getElementById("makeRequest").submit();

      }

    });
  
  </script>
  </body>
</html>
