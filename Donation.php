<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedinAdmin"]) || $_SESSION["loggedinAdmin"] !== true) {

  echo "<script> window.open('login.php','_self')</script>";
  exit;
}

$error = -1;
include('connection.php');
if (isset($_SESSION['addDonationStatus'])) {
  if ($_SESSION['addDonationStatus'] == 1) {
    $error = 1;
  } else if (($_SESSION['addDonationStatus'] == 0)) {
    $error = 0;
  }
  unset($_SESSION['addDonationStatus']);
}
if ($error == 1) {
  echo "<script> alert('Donation Added successfully ')</script>";
} else if ($error == 0) {
  echo "<script> alert('Donation Adding Failed ')</script>";
}

$query = "SELECT max(`BarcodeNO`)+1 FROM `donation`";
$result = mysqli_query($Con, $query);
$donors = mysqli_fetch_array($result);
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
  <script>
    function printDiv(id) {
      var restorepage = document.body.innerHTML;
      var printContent = document.getElementById(id).innerHTML;
      document.body.innerHTML = printContent;
      window.print();
      document.body.innerHTML = restorepage;

    }
  </script>
  <script>
    function getDetails(str) {
      if (str.length == 0) {
        document.getElementById("date").value = "";
        document.getElementById("Blood").value = "";
        return
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            document.getElementById("Blood").value = myObj[0];
            document.getElementById("date").value = myObj[1];
          }
        };
        xmlhttp.open("GET", "findDetails.php?nic=" + str, true);
        xmlhttp.send();
      }
    }
  </script>
</head>

<body id="body">
  <div class="container1">
    <nav class="navbar">
      <div class="nav_icon" onclick="toggleSidebar()">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </div>
      <div class="navbar__left">

        <i class="fa fa-medkit fa-2x  a" aria-hidden="true"></i>
        <h7 style="font-size: 25px; font-weight:bold; vertical-align: text-bottom;" class="active_link">Donations</h7>
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
          <!-- <div class="charts__left"> -->
          <div class="charts__left__title">
            <div>
              <div class="body1">
                <div class="container-form-1">

                  <div class="content">
                    <form action="addDonation.php" method="POST" id="addDonation">
                      <div class="user-details">
                        <div class="input-box">
                          <span class="details">BarCode Number</span>
                          <input type="text" value="<?php echo md5($donors['max(`BarcodeNO`)+1']) ?>" required readonly>
                        </div>
                        <div class="input-box">
                          <!-- <form action="" method="POST"> -->
                          <span class="details">Donor NIC</span>
                          <input type="text" name="Nic" id="Nic" placeholder="Enter your NIC" required onkeyup="getDetails(this.value)">
                          <p id="err_nic" style="color: lightcoral;display:none"></p>
                          <!-- </form> -->
                        </div>
                        <div class="input-box">
                          <span class="details">Last Donate Date</span>
                          <input type="text" name="date" id="date" readonly>
                        </div>


                        <div class="input-box">
                          <span class="details">Units</span>
                          <input type="text" name="units" id="units" placeholder="Enter Units" required>
                          <p id="err_units" style="color: lightcoral;display:none"></p>
                        </div>
                        <div class="input-box">
                          <span class="details">Plasma Unit(ml)</span>
                          <input type="text" name="plasma" id="plasma" placeholder="Enter Plasma Units">
                          <p id="err_plasma_units" style="color: lightcoral;display:none"></p>
                        </div>
                        <div class="input-box">
                          <span class="details">Platelet Unit(ml)</span>
                          <input type="text" name="platelet" id="platelet" placeholder="Platelet Unit">
                          <p id="err_platelet_units" style="color: lightcoral;display:none"></p>
                        </div>
                        <div class="input-box">
                          <span class="details">Blood Group</span>
                          <select name="Blood" id="Blood">
                            <option value=""></option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                          </select>
                          <!-- <input type="text" placeholder="Enter your Blood Group" required> -->
                        </div>
                      </div>
                      <div id="printArea">
                        <?php

                        include('barcode128.php');
                        echo bar128(md5($donors['max(`BarcodeNO`)+1']));
                        ?>

                      </div>
                      <div class="button" style="width: 150px;">
                        <input type="submit" onclick="printDiv('printArea')" value="Print">

                      </div>

                      <input type="checkbox" id="check" name="check">
                      <label for="check">Donnor has no any recent diseases</label>
                      <p id="err_checkbox" style="color: lightcoral;display:none"></p>
                      <!-- </div> -->
                      <div class="button" id="add" style="width: 250px;">
                        <input type="button" name="submitDonation" value="Add Donation">
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
        <i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
      </div>

      <div class="sidebar__link">
        <div class="sidebar__link">
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
        <div class="sidebar__link active_menu_link">
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


        <div class="sidebar__logout" style="position:fixed; bottom:1rem;">
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
      let isNicValid = ValidateNic("Nic", "err_nic");
      let isUnitsValid = ValidateUnits("units", "err_units");
      let isPlasmaUnitsValid = ValidateUnits2("plasma", "err_plasma_units");
      let isPlateletUnitsValid = ValidateUnits2("platelet", "err_platelet_units");
      let isCheckBoxChecked = validateCheckbox("check", "err_checkbox");



      if (isNicValid && isUnitsValid && isPlasmaUnitsValid && isPlateletUnitsValid && isCheckBoxChecked) {

        document.getElementById("addDonation").submit();

      }

    });
  </script>
  <script src="print.js"></script>

</body>

</html>