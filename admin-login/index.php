<?php
session_start()
?>

<?php

if(((isset($_SESSION['loggedin'])) && $_SESSION['loggedin']==true)){
  echo "<script>alert('You are logged in successfully!')</script>";

  header( "refresh:0;url=/info/" );
  
  // header("location: /proje/admin-login");
  exit;
}

?>


<?php

// require '';
require '../components/db_connect.php';

$error = 0;

if($_SERVER["REQUEST_METHOD"]=="POST"){
  // $passworderror = "Hey there!"
  $username_form = $_POST["username"];
  $password = $_POST["password"];

  
$sql = "SELECT * from `users` where username = '$username_form' AND password = '$password' ";
$result = mysqli_query($connect,$sql);
$num = mysqli_num_rows($result);
// echo($num);
if($num == 1){
  // echo "Login Successful";
  $error = 1;
  session_start();
  $_SESSION['loggedin'] = true;
  $_SESSION['username'] = $username_form;
  header("Location: /info");
}

else{
  // echo "Wrong Password";
  $error = 2;
}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Administrator Portal Login</title>
  </head>
  <body>
  <?php 
require '../components/navbar.php'
?>


    <section class="hero">
      <div class="container">
        <div class="logo">
          <!-- <img src="/proje/logo.png" alt="" srcset="" /> -->
          <a href="http://ietlucknow.ac.in"><img src="/info/assets/logo.png" alt="" srcset="" /></a>

        </div>
        <div class="title"><h2>Administrator Login</h2></div>
        <div class="sub-title"><p>Welcome to Student Record Admin Portal of IET Lucknow!<br>Click below to sign in!</p></div>
        <div class="btn-group">
          <a href="/info/admin-login#sign-in"><button class="new-entry">Sign In</button></a>
        </div>
      </div>
      </div>
    </section>
    <section class="body" id = "sign-in">
      <div class="container">
        
        <form id="entry-form" action="/info/admin-login/" method="post">
          <!-- <div class="image">
            <img src="/STUDENT ENTRY.png" alt="" srcset="" />
          </div> -->
          <div class="wrapper">
            <div class="step step-1">
            <div class="title">
        <h2>Login</h2>
          </div>
              <div class="form-group">
                <fieldset>
                  <legend><label for="username">Username</label></legend>
                  <input
                    type="text"
                    placeholder="Enter your Username"
                    id="username"
                    name="username"
                  />
                  <i class="fa fa-user-tie icon "></i>
                </fieldset>
                <small class="error-username"></small>
                <!-- <i class="fa fa-user-tie success-icon "></i> -->
              </div>
              <div class="form-group">
                <fieldset>
                  <legend><label for="password">Password</label></legend>
                  <input
                    type="password"
                    placeholder="Enter your Password"
                    id="password"
                    name="password"
                  />
                  <i class="fa fa-key icon"></i>
                </fieldset>
                <small class="error-password"></small>
                <!-- <i class="fa fa-key success-icon"></i> -->
              </div>
              <input type="checkbox" onclick="showpwd()" id="show-pwd"><label for="show-pwd">Show Password</label>
            </div>
          </div>
          <div class="form-group btn-group">
            <button class="reset" type="reset">Reset</button>
            <button class="submit" type="submit">Submit</button>
          </div>

        </form>
      </div>
    </section>

  </body>
  <script defer src="info/js/navbar.js"></script>
  <script src="info/js/login.js"></script>
  <!-- <script src="info/js/index.js"></script> -->
<script
      src="https://kit.fontawesome.com/3d4c57c88a.js"
      crossorigin="anonymous"
    ></script>

  <script defer>
    var check = "<?php echo ($error) ?>";
    if(check === "1")
    alert("Login Successful!")
    
    else if(check === "2"){
      // console.log("false");
      alert("Please enter Valid Credentials or contact Administrator support!")

    }
  </script>
</html>

<!-- <button disabled="disabled"></button> -->
