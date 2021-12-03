<?php

    session_start();
 
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedinAdmin"]) || $_SESSION["loggedinAdmin"] !== true){
        
      echo "<script> window.open('login.php','_self')</script>";
        exit;
    }
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

<body id="body">
  <div class="container1">
    <nav class="navbar">
      <div class="nav_icon" onclick="toggleSidebar()">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </div>
      <div class="navbar__left">

        <i class="fa fa-user-plus fa-2x  a" aria-hidden="true"></i>
        <h7 style="font-size: 25px; font-weight:bold; vertical-align: text-bottom;" class="active_link">Donor Registrations</h7>
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


        <div class="container-form-1">

          <div class="content">
            <form id="donarReg" method="POST" action="addDonar.php">
              <div class="user-details">
                <div class="input-box">
                  <span class="details">First Name</span>
                  <input type="text" placeholder="Enter Your First Name" id="firstName" name="firstName">
                  <p id="err_firstName" style="color: lightcoral;display:none"></p>
                </div>
                <div class="input-box">
                  <span class="details">Last Name</span>
                  <input type="text" placeholder="Enter Your Last Name" id="lastName" name="lastName">
                  <p id="err_lastName" style="color: lightcoral;display:none"></p>
                </div>
                <div class="input-box">
                  <span class="details">NIC</span>
                  <input type="text" placeholder="Enter NIC" id="NIC" name="NIC">
                  <p id="err_nic" style="color: lightcoral;display:none"></p>
                </div>

                <div class="input-box">
                  <span class="details">Contact No</span>
                  <input type="text" placeholder="Enter Your Contact No" id="contactNo" name="contactNo">
                  <p id="err_contactNo" style="color: lightcoral;display:none"></p>
                </div>

                <div class="input-box">
                  <span class="details">DOB</span>
                  <input type="date" id="Date" name="Date" name="Date" onchange="calculateAge()">
                  <p id="err_dob" style="color: lightcoral;display:none"></p>
                </div>
                <div class="input-box">
                  <span class="details">AGE</span>
                  <input type="text" required id="age" name="age" readonly>
                  <p id="err_age" style="color: lightcoral;display:none"></p>
                </div>
                <div class="input-box">
                  <span class="details">Address</span>
                  <input class="my-1" type="text" placeholder="Line 1" id="line1" name="line1">
                  <input class="my-1" type="text" placeholder="Line 2" id="line2" name="line2">
                  <input class="my-1" type="text" placeholder="Street" id="street" name="street">
                  <input class="my-1" type="text" placeholder="City" id="city" name="city">
                  <p id="err_city" style="color: lightcoral;display:none"></p>
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
                  <p id="err_bloodGrp" style="color: lightcoral;display:none"></p>

                </div>
                <input type="radio" name="gender" id="dot-1" value="male">
                <input type="radio" name="gender" id="dot-2" value="female">
                <input type="radio" name="gender" id="dot-3" value="prefer not to say">
                <div class="category input-box">
                  <label for="dot-1">
                    <span class="dot one"></span>
                    <span class="gender">Male</span>
                  </label>
                  <label for="dot-2">
                    <span class="dot two"></span>
                    <span class="gender">Female</span>
                  </label>
                  <label for="dot-3">
                    <span class="dot three"></span>
                    <span class="gender">Prefer not to say</span>
                  </label>
                  <p id="err_gender" style="color: lightcoral;display:none"></p>
                </div>
              </div>
              <div class="row">
                <div class="column">
                  <div class="button" id="reset" style="margin-top: 0px; ">
                    <input type="button" value="Reset">
                  </div>
                </div>



                <div class="column">
                  <div class="button" id="add" style="margin-top: 0px;">
                    <input type="button" value="Add">
                  </div>
                </div>
              </div>
          </div>
          </form>
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
      <div class="sidebar__link ">
        <i class="fa fa-line-chart" aria-hidden="true"></i>
        <a href="Dashboard.php" style="text-decoration: none;">Dashboard</a>
      </div>
      <div class="sidebar__link">
        <i class="fa fa-pie-chart"></i>
        <a href="BloodStock.php" style="text-decoration: none;">Blood Stock</a>
      </div>

      <div class="sidebar__link active_menu_link">
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
      <div class="sidebar__link a">
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
  <script src="./validation.js">
  </script>
  <Script src="ageCalculator.js"></Script>
  <script>
    document.getElementById("Blood").selectedIndex = -1;
  </script>

  <script>
    document.getElementById("add").addEventListener('click', () => {
      let isFirstNameValid = ValidateText("firstName", "err_firstName", "First Name ");
      let isLastNameValid = ValidateText("lastName", "err_lastName", "Last Name ");
      let isNicValid = ValidateNic("NIC", "err_nic");
      let isTelephoneValid = ValidatePhoneNo("contactNo", "err_contactNo", "Contact Number ");
      let isDobValid = ValidateDob("Date", "err_dob");
      let isCityValid = ValidateText("city", "err_city","City");
      let isDowndropValid = validateDropdown("Blood", "err_bloodGrp");
      let isRadioValid = validateRadio("dot-1", "dot-2", "dot-3", "err_gender");

      if (isFirstNameValid && isLastNameValid && isNicValid && isTelephoneValid &&
        isDobValid && isCityValid && isDowndropValid && isRadioValid) {

        document.getElementById("donarReg").submit();

      }

    });
  </script>
</body>

</html>