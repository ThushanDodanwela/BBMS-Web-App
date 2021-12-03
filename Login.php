
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="loginStyle.css"><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>Blood Bank Managment System</title>
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  </head>
  <body>
    <div class="main">
      <div class="container a-container" id="a-container">
        <form class="form" id="a-form" method="POST" action="CheckLogin.php">
          <img src="Logo.png" alt="" style="width:200px ; height:200px" >
          <span></span>
          <br>
          <br>
         
          <input class="form__input" type="text" name ="userName" placeholder="Username">
          <input class="form__input" type="password"  name="password" placeholder="Password">
          
          <button class="form__button button ">SIGN IN</button>
        </form>
      </div>
      <div class="container b-container" id="b-container">
        <form class="form" id="forgot" method="POST" action="forgotPassword.php">
          <h2 class="form_title title">Change your Password</h2>
          
          <input class="form__input" id="staffID" name="staffID" type="text" placeholder="Staff ID">
          <input class="form__input" id="nic" name="nic" type="text" placeholder="NIC">
          <input class="form__input" id="newPassword" name="newPassword" type="password" placeholder="New Password">
          <input class="form__input" id="conPassword" name="conPassword" type="password" placeholder="Confirm Password">
          <p id="err_conPassword" style="color: lightcoral;display:none"></p>
          <button class="form__button button " id="change">Change Password</button>
        </form>
      </div>
      <div class="switch" id="switch-cnt">
        <div class="switch__circle"></div>
        <div class="switch__circle switch__circle--t"></div>
        <div class="switch__container" id="switch-c1">
          <h1 style="font-style: italic;font-weight: bold; color: red;"> Your Blood is Replacable! <br> a Life is Not</h1>
          <img src="LogoLogin.png" alt="" >
          <br>
          <br>


          <button class="switch__button button switch-btn">Forget Password</button>
        </div>

        <div class="switch__container is-hidden" id="switch-c2" >
          <h1 style="font-style: italic;font-weight: bold; color: red;"> Your Blood is Replacable! <br> a Life is Not</h1>
          <img src="logo.png" alt="" style="width:300px;height:300px"  >
           
          <button class="switch__button button switch-btn">SIGN IN</button>
          
          
          
        </div>
      </div>
    </div>
    <script src="main.js"></script>
    <script src="validation.js"></script>
    <script>
       document.getElementById("change").addEventListener('click', () => {
        let matchingPassword;
      if (document.getElementById("newPassword").value == document.getElementById("conPassword").value){
        matchingPassword = true;
      document.getElementById("err_conPassword").style.display="none";
      }else{
        matchingPassword=false;
      document.getElementById("err_conPassword").innerHTML="Password do not match";
      document.getElementById("err_conPassword").style.display="block";


      }
      

      if (matchingPassword) {

        document.getElementById("forgot").submit();

      }

    });
  
    </script>
  </body>
</html>