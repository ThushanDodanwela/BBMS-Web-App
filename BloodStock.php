<?php
session_start();
include('connection.php');
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedinAdmin"]) || $_SESSION["loggedinAdmin"] !== true){
        
  echo "<script> window.open('login.php','_self')</script>";
  exit;
}
$query = "SELECT BloodGroup,sum(amount)/(SELECT sum(amount) from bloodtbl) as  percent, sum(amount) as total FROM `bloodtbl`  group by BloodGroup";
$result = mysqli_query($Con, $query);
$stocks = mysqli_fetch_all($result, MYSQLI_ASSOC);

$query1 = "SELECT `BloodGroup`,sum(`Amount`) as total FROM `platelet` GROUP BY `BloodGroup`";
$result1 = mysqli_query($Con, $query1);
$platelets = mysqli_fetch_all($result1, MYSQLI_ASSOC);

$query2 = "SELECT sum(`Amount`) FROM `plasma` ";
$result2 = mysqli_query($Con, $query2);
$plasmas = mysqli_fetch_all($result2, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

  <script src="progressbar.js"> </script>

  <link rel="stylesheet" href="style1.css" />
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

        <i class="fa fa-pie-chart fa-2x  a" aria-hidden="true"></i>
        <h7 style="font-size: 25px; font-weight:bold; vertical-align: text-bottom;" class="active_link">Blood Stock</h7>

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

      <div class="container">
        <div class="row " style="margin-left: 10px;">
          <div class="col-12 col-lg-3">


            <div id="container1" style=" margin-top:20px ;width: 230px;  height: 200px; position: relative;  "></div>
                <h1 style = "vertical-align:text-bottom;" id= "text1"> </h1>
          </div>

          <div class="col-12 col-lg-3">


            <div id="container2" style="margin-top:20px ; width: 230px;  height: 200px; position: relative;  "></div>
            <h1 style = "vertical-align:text-bottom;" id= "text2"></h1>
          </div>

          <div class="col-12 col-lg-3">


            <div id="container3" style="margin-top:20px ; width: 230px;  height: 200px; position: relative;  "></div>
            <h1 style = "vertical-align:text-bottom;" id= "text3"></h1>
          </div>

          <div class="col-12 col-lg-3">


            <div id="container4" style="margin-top:20px ; width: 230px;  height: 200px; position: relative;  "></div>
            <h1 style = "vertical-align:text-bottom;" id= "text4"></h1>
          </div>
        </div>

        <div class="row " style="margin-left: 10px; margin-top: 25px;">
          <div class="col-12 col-lg-3">


            <div id="container5" style=" margin-top:20px ;width: 230px;  height: 200px; position: relative;  "></div>
            <h1 style = "vertical-align:text-bottom;" id= "text5"></h1>
          </div>

          <div class="col-12 col-lg-3">


            <div id="container6" style="margin-top:20px ; width: 230px;  height: 200px; position: relative;  "></div>
            <h1 style = "vertical-align:text-bottom;" id= "text6"></h1>
          </div>

          <div class="col-12 col-lg-3">


            <div id="container7" style="margin-top:20px ; width: 230px;  height: 200px; position: relative;  "></div>
            <h1 style = "vertical-align:text-bottom;" id= "text7"></h1>
          </div>

          <div class="col-12 col-lg-3">


            <div id="container8" style="margin-top:20px ; width: 230px;  height: 200px; position: relative;  "></div>
            <h1 style = "vertical-align:text-bottom;" id= "text8"></h1>
          </div>
        </div>

        <div class="row" style="margin-top:50px;">

          <div class="col-12 col-lg-6">

            <div>
              <div class="container" style="margin-top: 80px; border: 5px solid #000f2c; border-radius: 25px; background: #ffffff;">


                <div class="col-sm">
                  <h2 style="font-weight: bold; text-align: justify;color:#1e2a78; font-size: 30px">Total Plasma:</h2>
                  <?php foreach ($plasmas as $plasma) : ?>
                  <h3 style="color:#ffd615; font-weight: bold; font-size: 30px"><?php echo $plasma['sum(`Amount`)']." ml" ?></h3>
                  <?php endforeach ?>
                </div>

              </div>
            </div>


          </div>

          <div class="col-12 col-lg-6">

            <div>
              <div class="container" style="margin-top: 10px; border: 5px solid #000f2c; border-radius: 25px; background: #ffffff;">

              






                <div class="col-sm">
                
                  <h2 style="font-weight: bold; text-align: justify;color:#1e2a78; font-size: 30px">Total Platlets:</h2>
                  
                  <table>
                  <?php foreach ($platelets as $platelet) : ?>
                    <tr>
                    <td style="color:#ffd615; font-weight: bold; font-size: 20px"><?php echo $platelet['BloodGroup'] ?> </td>
                    <td style="color:#ffd615; font-weight: bold; font-size: 20px"><?php echo $platelet['total']." ml" ?></td>
                  </tr>
                    <?php endforeach ?>
                  </table>
                  
                </div>

              </div>
            </div>


          </div>


        </div>





        <?php 
        $count = 1;
        foreach ($stocks as $stock) : ?>
          
        <script type="text/javascript">
          var bar = new ProgressBar.Circle(<?php echo 'container'.$count?>, {
            color: '#aaa',
            // This has to be the same size as the maximum width to
            // prevent clipping
            strokeWidth: 6,
            trailWidth: 6,
            easing: 'easeInOut',
            duration: 1400,
            text: {
              autoStyleContainer: false
            },
            from: {
              color: '#B10606',
              width: 6
            },
            to: {
              color: '#B10606',
              width: 6
            },
            // Set default step function for all animate calls
            step: function(state, circle) {
              circle.path.setAttribute('stroke', state.color);
              circle.path.setAttribute('stroke-width', state.width);

              var value = Math.round(circle.value() * 100);
              if (value === 0) {
                circle.setText('');

              } else {


                circle.setText("<center><font Size=33><?php echo $stock['BloodGroup'] ?></font></center>" + value + ('%'));

              }

            }
          });
          bar.text.style.fontFamily = "'Poppins', sans-serif";
          bar.text.style.fontSize = '2rem';

          bar.animate(<?php echo $stock['percent'] ?>);
          Document.getElementById(<?php echo 'text'.$count?>).setText = "<?php echo $stock['total']."ml" ?>";
        </script>
        <?php $count++; endforeach ?>
     </main>



    <div id="sidebar">
      <div class="sidebar__title">
        <div class="sidebar__img">
          <img src="assets/logo.png" alt="logo" />
          <h1 style="font-size: 24px; font-weight:bold">BLOOD BANK</h1>
        </div>
        <i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
      </div>

      <div class="sidebar__link">
        <div class="sidebar__link ">
          <i class="fa fa-line-chart" aria-hidden="true"></i>
          <a href="Dashboard.php" style="text-decoration: none;">Dashboard</a>
        </div>
        <div class="sidebar__link active_menu_link">
          <i class="fa fa-pie-chart"></i>
          <a href="BloodStock.php" style="text-decoration: none;">Blood Stock</a>
        </div>

        <div class="sidebar__link ">
          <i class="fa fa-user-plus" aria-hidden="true"></i>
          <a href="DonorRegistrations.php" style="text-decoration: none;">Donor Registration</a>
        </div>
        <div class="sidebar__link">
          <i class="fa fa-heartbeat" aria-hidden="true"></i>
          <a href="Donor.php" style="text-decoration: none;">Donor</a>
        </div>
        <div class="sidebar__link">
          <i class="fa fa-medkit" aria-hidden="true"></i>
          <a href="Donation.php" style="text-decoration: none;">Donation</a>
        </div>
        <div class="sidebar__link">
          <i class="fa fa-refresh" aria-hidden="true"></i>
          <a href="PendingRequests.php" style="text-decoration: none;">Pending Requests</a>
        </div>
        <div class="sidebar__link">
          <i class="fa fa-user-md" aria-hidden="true"></i>
          <a href="UserRegistration.php" style="text-decoration: none;">User Registrations</a>
        </div>
        <div class="sidebar__link">
          <i class="fa fa-hospital-o" aria-hidden="true"></i>
          <a href="DonationCampaign.php" style="text-decoration: none;">Donation Campaign</a>
        </div>


        <div class="sidebar__logout" style ="position:fixed; bottom:1rem;">
          <i class="fa fa-power-off"></i>
          <a href="logout.php">Log out</a>
        </div>
      </div>
    </div>





</body>

</html>