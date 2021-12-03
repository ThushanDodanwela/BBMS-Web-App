<?php
session_start();
include('connection.php');
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedinAdmin"]) || $_SESSION["loggedinAdmin"] !== true) {

  echo "<script> window.open('login.php','_self')</script>";
  exit;
}
$d = date("Y/m/d");
$day = date("d", strtotime($d));
$month = date("m", strtotime($d));
$year = date("y", strtotime($d));
$query = "SELECT * FROM `campreg` WHERE date>='$day' AND month>='$month' AND year>='$year' ";
$result = mysqli_query($Con, $query);
$camps = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- <link -->
  <!-- rel="stylesheet" -->
  <!-- href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" -->
  <!-- integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" -->
  <!-- crossorigin="anonymous" -->
  <!-- /> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link rel="stylesheet" type="text/css" href="form1.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script src="https://kit.fontawesome.com/9b296763ff.js" crossorigin="anonymous"></script>


  <script type="text/javascript" src="js/bootstrap.js"></script>
  <title>Blood Bank Managment System</title>
  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>

<body id="body">
  <?php include('modal.php') ?>


  <div class="container1">
    <nav class="navbar">
      <div class="nav_icon" onclick="toggleSidebar()">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </div>
      <div class="navbar__left">

        <i class="fa fa-hospital-o fa-2x  a" aria-hidden="true"></i>
        <h7 style="font-size: 25px; font-weight:bold; vertical-align: text-bottom;" class="active_link">Donation Campaigns</h7>
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

      <div class="main__container" style="margin-top: 20px; margin-left:30px ;">

        <div class="row">
          <div class="col-12 col-lg-7">





            <table class="table">
              <thead class="table-dark">
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">NIC</th>
                  <th scope="col">Address</th>
                  <th scope="col">ContactNO</th>
                  <th scope="col">Date</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($camps as $camp) : ?>
                  <tr>
                    <td><span id="name<?php echo $camp['NIC'] ?>"><?php echo $camp['Name'] ?></span></td>
                    <td><span id="nic<?php echo $camp['NIC'] ?>"><?php echo $camp['NIC'] ?></span></td>
                    <td><span id="address<?php echo $camp['NIC'] ?>"><?php echo $camp['Address'] ?></span></td>
                    <td><span id="contact<?php echo $camp['NIC'] ?>"><?php echo $camp['ContactNo'] ?></span></td>
                    <td><span id="date<?php echo $camp['NIC'] ?>"><?php echo "20" . $camp['Year'] . "-" . $camp['Month'] . "-" . $camp['Date'] ?></span></td>
                    <td>
                      <button type='button' id='edit' onclick="setDetails('<?php echo $camp['NIC'] ?>')" value='<?php echo $camp['NIC'] ?>' class='btn btn-success edit'><i class="fas fa-user-edit"></i></button>
                    </td>
                    <td>
                      <form action="delCamp.php" method="POST" id="delCamp">
                      <input type="hidden" name="campId" value="<?php echo $camp['NIC'] ?>">
                        <button type="submit" name="updateDonor" class="btn btn-danger"><i class="fas fa-trash-alt"></i></i></button>
                      </form>
                    </td>

                  </tr>

                <?php endforeach ?>
              </tbody>
            </table>

          </div>


          <div class="col-12 col-lg-5">

            <form action="addCamp.php" method="POST" id="addCamp">
              <div class="user-details">
                <div class="input-box">
                  <span class="details">Name</span>
                  <input type="text" placeholder="Enter Your Name" id="campName" name="campName">
                  <p id="err_campName" style="color: lightcoral;display:none"></p>
                </div>
                <div class="input-box">
                  <span class="details">Contact No</span>
                  <input type="text" placeholder="+94" id="contactNo" name="contactNo">
                  <p id="err_contactNo" style="color: lightcoral;display:none"></p>
                </div>
                <div class="input-box">
                  <span class="details">Date</span>
                  <input type="date" id="Date" name="Date">
                  <p id="err_date" style="color: lightcoral;display:none"></p>
                </div>


                <div class="input-box">
                  <span class="details">NIC</span>
                  <input type="text" placeholder="Enter NIC" id="NIC" name="NIC">
                  <p id="err_NIC" style="color: lightcoral;display:none"></p>
                </div>
                <div class="input-box">
                  <span class="details">Address</span>
                  <textarea id="address" name="address" rows="4" cols="30"></textarea>
                  <p id="err_address" style="color: lightcoral;display:none"></p>

                  </textarea>
                </div>

              </div>




              <div class="row">
                <div class="column">

                  <div class="button button-small" id="add">
                    <input type="button" name="add" value="Add">

                  </div>
                </div>

                <div class="column">

                  <div class="button" id="reset" style="width: 75px;">
                    <input type="button" name="reset" value="Reset">

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
        <div class="sidebar__link active_menu_link">
          <i class="fa fa-hospital-o" aria-hidden="true"></i>
          <a href="DonationCampaign.php" style="text-decoration: none;">Donation Campaign</a>
        </div>


        <div class="sidebar__logout" style="position:fixed; bottom:1rem;">
          <i class="fa fa-power-off"></i>
          <a href="logout.php" ;>Log out</a>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="script.js"></script>
  <script src="validation.js"></script>

  <!-- <script src="custom.js"></script> -->

  <script>
    function setDetails(id) {
      document.getElementById('ename').value = document.getElementById('name' + id).innerHTML;
      document.getElementById('eNIC').value = document.getElementById('nic' + id).innerHTML;
      document.getElementById('econtact').value = document.getElementById('contact' + id).innerHTML;
      document.getElementById('eaddress').value = document.getElementById('address' + id).innerHTML;
      document.getElementById('eDate').value = document.getElementById('date' + id).innerHTML;

      document.getElementById('updateModal').click();

    }

    document.getElementById("add").addEventListener('click', () => {
      let isNicValid = ValidateNic("NIC", "err_NIC");
      let isNameValid = ValidateText("campName", "err_campName");
      let isAddressValid = ValidateText("address", "err_address");
      let isDateValid = ValidateDate("Date", "err_date");
      let isContactValid = ValidatePhoneNo("contactNo", "err_contactNo", "This ")



      if (isNicValid && isNameValid && isAddressValid && isDateValid && isContactValid) {

        document.getElementById("addCamp").submit();

      }

    });

    document.getElementById("reset").addEventListener('click', () => {
      document.getElementById("campName").value = '';
      document.getElementById("contactNo").value = '';
      document.getElementById("NIC").value = '';
      document.getElementById("Date").value = '';
      document.getElementById("address").value = '';


    });
  </script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>