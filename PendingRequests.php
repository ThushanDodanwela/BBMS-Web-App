<?php
session_start();
include('connection.php');
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedinAdmin"]) || $_SESSION["loggedinAdmin"] !== true){
        
      echo "<script> window.open('login.php','_self')</script>";
        exit;
    }
/*if(isset($_SESSION['deleteMsg'])){
  echo $_SESSION['deleteMsg'];
  unset($_SESSION['deleteMsg']);
}*/
$query = "SELECT `Request_ID`, `Patient_name`, `Ward_No`,`Blood_Group`, `NoOfUnits`, `StaffID`, `Status`,b.total FROM `requests` INNER JOIN
(SELECT BloodGroup,sum(amount)as total from bloodtbl GROUP by BloodGroup)AS b  
ON b.BloodGroup = requests.`Blood_Group` where requests.`Status`= 'pending';";
$result = mysqli_query($Con, $query);
$requests = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link rel="stylesheet" type="text/css" href="form1.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <title>Blood Bank Managment System</title>
  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>

<body id="body" onload="GetCellValues()">
  <div class="container1">
    <nav class="navbar">
      <div class="nav_icon" onclick="toggleSidebar()">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </div>
      <div class="navbar__left">

        <i class="fa fa-refresh fa-2x  a" aria-hidden="true"></i>
        <h7 style="font-size: 25px; font-weight:bold; vertical-align: text-bottom;" class="active_link">Pending Requests</h7>
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


      <div class="table-responsive" style="margin-top: 20px;">

        <table class="table " id="PendingTable">
          <thead class="table-dark">
            <tr>
              <th scope="col">Patient Name</th>
              <th scope="col">Ward No</th>
              <th scope="col">Blood Group</th>
              <th scope="col">Available Units</th>
              <th scope="col">Requested Units</th>
              <th scope="col">Staff ID</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($requests as $request) : ?>

              <tr>

                <td><?php echo $request['Patient_name'] ?></td>
                <td><?php echo $request['Ward_No'] ?></td>
                <td><?php echo $request['Blood_Group'] ?></td>
                <td><?php echo $request['total'] ?></td>
                <td><?php echo $request['NoOfUnits'] ?></td>
                <td><?php echo $request['StaffID'] ?></td>

                <td>
                  <form action="ApproveRequest.php" method="POST">
                    <input type="hidden" name="requestId" value="<?php echo $request['Request_ID'] ?>">
                    <input type="hidden" name="bloodGroup" value="<?php echo $request['Blood_Group'] ?>">
                    <input type="hidden" name="units" value="<?php echo $request['NoOfUnits'] ?>">
                    <button type='submit' id='approve'  <?php if($request['total']<$request['NoOfUnits']){ echo "disabled";} ?> 
                    class='btn <?php if($request['total']<$request['NoOfUnits']){ echo " btn-secondary ";} else{echo " btn-success";} ?>'>Approve</i></button>
                  </form>
                </td>
              </tr>
            <?php endforeach ?>

          </tbody>
        </table>

      </div>

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
        <div class="sidebar__link">
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
        <div class="sidebar__link active_menu_link">
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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
    <script>
      
    </script>
</body>

</html>