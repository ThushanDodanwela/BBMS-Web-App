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
            
            <i  class="fa fa-line-chart fa-2x  a" aria-hidden="true"></i>
            <h7 style = "font-size: 25px; font-weight:bold; vertical-align: text-bottom;"class="active_link" >Dashboard</h7>
          </div>
          <div class="navbar__right">
          
          </div>
        </nav>

        <main>

            <div class="main__container" style="margin-top: 20px;">

              <img src="assets/Heart.gif" style=" width:40% ; height: 40%; margin-left: 30%;">

              <h2 style = "font-size: 50px; font-weight:bold; text-align: center;" >General Hospitle Kandy</h7>
                <br>

                <script>function display_ct7() {
                  var x = new Date()
                  var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
                  hours = x.getHours( ) % 12;
                  hours = hours ? hours : 12;
                  hours=hours.toString().length==1? 0+hours.toString() : hours;
                  
                  var minutes=x.getMinutes().toString()
                  minutes=minutes.length==1 ? 0+minutes : minutes;
                  
                  var seconds=x.getSeconds().toString()
                  seconds=seconds.length==1 ? 0+seconds : seconds;
                  
                  var month=(x.getMonth() +1).toString();
                  month=month.length==1 ? 0+month : month;
                  
                  var dt=x.getDate().toString();
                  dt=dt.length==1 ? 0+dt : dt;
                  
                  var x1=month + "/" + dt + "/" + x.getFullYear(); 
                  x1 = x1 + " - " +  hours + ":" +  minutes + ":" +  seconds + " " + ampm;
                  document.getElementById('ct7').innerHTML = x1;
                  display_c7();
                   }
                   function display_c7(){
                  var refresh=1000; // Refresh rate in milli seconds
                  mytime=setTimeout('display_ct7()',refresh)
                  }
                  display_c7()
                  </script>
                  <span id='ct7' style="font-size: 22px; font-weight: bold;color: crimson; " ></span>

                    
                
    
  
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
            <div class="sidebar__link active_menu_link">
            <i class="fa fa-line-chart" aria-hidden="true"></i>
              <a href="HospitleDash.php" style="text-decoration: none;">Dashboard</a>
            </div>
            <div class="sidebar__link">
              <i class="fa fa-pie-chart"></i>
              <a href="MakeRequest.php"style="text-decoration: none;">Make a Request</a>
            </div>
          
            <div class="sidebar__link ">
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
