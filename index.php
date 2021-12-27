<?php
session_start()
?>


<?php

if(!((isset($_SESSION['loggedin'])) && $_SESSION['loggedin']==true)){
  echo "<script>alert('You dont have permission to view this page!".'\n'."Please Login to continue!')</script>";

  header( "refresh:0;url=/info/admin-login" );
  
  // header("location: /proje/admin-login");
  exit;
}

?>

<?php

require './components/db_connect.php';


if($_SERVER["REQUEST_METHOD"]=="POST"){
    // $passworderror = "Hey there!"
    $fname_form = $_POST["first-name"];
    $lname_form = $_POST["last-name"];
    $rollno_form = $_POST["rollno"];
    $session_form = $_POST["session"];
    $semester_form = $_POST["semester"];
    $branch_form = $_POST["branch"];
    $year_form = $_POST["year"];
    $email_form = $_POST["email"];
    $dob_form = $_POST["dob"];
    $address_form = $_POST["address"];
    
    // echo $rollno_form;
// echo $fname_form." ".$lname_form." ".$rollno_form." ".$session_form." ".$rollno_form." ".$branch_form." ".$year_form." ".$semester_form." ".$dob_form;

     $signup_insert = "INSERT INTO `students` (`fname`, `lname`, `session` , `rno` , `course_id_fk` ,`year` , `semester`,`dob`,`email`,`address`) VALUES ('$fname_form' ,'$lname_form','$session_form' ,'$rollno_form','$branch_form','$year_form' ,'$semester_form','$dob_form','$email_form' ,'$address_form')";
      if(mysqli_query($connect, $signup_insert))
        echo "<script>alert('Value are inserted successfully!')</script>";
        else{
        echo "<script>alert('Data already exists for this student!')</script>";
      }
      // }
      // else{
      //   echo "Not inserted";
      }
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
require './components/navbar.php'
?>

<section class="hero">
      <div class="container">
        <div class="logo">
          <a href="http://ietlucknow.ac.in"><img src="/info/assets/logo.png" alt="" srcset="" /></a>
        </div>
        <div class="title"><h2>Student Record Entry</h2></div>
        <div class="sub-title"><p>Welcome to Student Record Portal of IET Lucknow!<br>Click below to create a new entry!</p></div>
        <div class="btn-group">
          <a href="#new-record"><button class="new-entry">Create Entry</button></a>
        </div>
      </div>
      </div>
</section>

    
<section class="body" id = "new-record">
      <div class="container">
        <!-- <div class="title"> -->
        <!-- <h2>Entry Form</h2>
          </div> -->
        <form id="entry-form" action="/info/" method="post">
          <!-- <div class="image">
            <img src="/STUDENT ENTRY.png" alt="" srcset="" />
          </div> -->
          <div class="wrapper">
            <div class="step step-1">
              <div class="form-group">
                <fieldset>
                  <legend><label for="first-name">First Name</label></legend>
                  <input
                    type="text"
                    placeholder="Enter your First Name"
                    id="first-name"
                    name="first-name"
                  />
                </fieldset>
                <small class="error-first-name"></small>
                <i class="fa fa-exclamation-circle error-icon hide-icon"></i>
                <i class="fa fa-check-circle success-icon hide-icon"></i>
              </div>
              <div class="form-group">
                <fieldset>
                  <legend><label for="last-name">Last Name</label></legend>
                  <input
                    type="text"
                    placeholder="Enter your Last Name"
                    id="last-name"
                    name="last-name"
                  />
                </fieldset>
                <small class="error-first-name"></small>
                <i class="fa fa-exclamation-circle error-icon hide-icon"></i>
                <i class="fa fa-check-circle success-icon hide-icon"></i>
              </div>
              <div class="form-group">
                <fieldset>
                  <legend><label for="session">Session</label></legend>
                  <select name="session" id="session">
                    <option value="none" default>Select your session</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                  </select>
                </fieldset>
                <small class="error-session"></small>
                <i class="fa fa-exclamation-circle error-icon hide-icon"></i>
                <i class="fa fa-check-circle success-icon hide-icon"></i>
              </div>
              <div class="form-group">
                <fieldset>
                  <legend><label for="rollno">Roll Number</label></legend>
                  <input
                    type="number"
                    placeholder="Enter your Roll no"
                    id="rollno"
                    name="rollno"
                  />
                </fieldset>
                <small class="error-rollno"></small>
                <i class="fa fa-exclamation-circle error-icon hide-icon"></i>
                <i class="fa fa-check-circle success-icon hide-icon"></i>
              </div>
              <div class="form-group">
                <fieldset>
                  <legend>
                    <label for="branch">Branch</label>
                  </legend>
                  <select name="branch" id="branch">
                    <option value="none" default>Select your branch</option>
                    <?php
  $sql_courses = "SELECT * from `courses`";
  $sno = 0;
  $result = mysqli_query($connect,$sql_courses);

    while($row = mysqli_fetch_assoc($result))
    {
      $sno=$sno+1;
      // echo $row['course_id'];
                    
      echo "<option value=".$row['course_id'].">".$row['course_name']."</option>";
    }
  ?>
  
                  </select>
                </fieldset>
                <small class="error-branch"></small>
                <i class="fa fa-exclamation-circle error-icon hide-icon"></i>
                <i class="fa fa-check-circle success-icon hide-icon"></i>
              </div>
              <!-- <div class="form-group btn-group">
              <button class="next" type="button">Next</button>
            </div> -->
            </div>
            <div class="step">
              <div class="form-group">
                <fieldset>
                  <legend><label for="year">Year</label></legend>
                  <select name="year" id="year">
                    <option value="none" default>Select your year</option>
                    <option value="1">1st year</option>
                    <option value="2">2nd year</option>
                    <option value="3">3rd year</option>
                    <option value="4">4th year</option>
                  </select>
                </fieldset>
                <small class="error-year"></small>
                <i class="fa fa-exclamation-circle error-icon hide-icon"></i>
                <i class="fa fa-check-circle success-icon hide-icon"></i>
              </div>
              <div class="form-group">
                <fieldset>
                  <legend><label for="semester">Semester</label></legend>
                  <select name="semester" id="semester">
                    <option value="none" default>Select your semester</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                  </select>
                </fieldset>
                <small class="error-semester"></small>
                <i class="fa fa-exclamation-circle error-icon hide-icon"></i>
                <i class="fa fa-check-circle success-icon hide-icon"></i>
              </div>
              <div class="form-group">
                <fieldset>
                  <legend><label for="dob">Date of Birth</label></legend>
                  <input
                    type="date"
                    placeholder="Enter your DOB"
                    id="dob"
                    name="dob"
                  />
                </fieldset>
                <small class="error-dob"></small>
                <i class="fa fa-exclamation-circle error-icon hide-icon"></i>
                <i class="fa fa-check-circle success-icon hide-icon"></i>
              </div>
              <div class="form-group">
                <fieldset>
                  <legend>
                    <label for="email">Email Address</label>
                  </legend>
                  <input
                    type="email"
                    placeholder="example@example.com"
                    id="email"
                    name="email"
                  />
                </fieldset>
                <small class="error-email"></small>
                <i class="fa fa-exclamation-circle error-icon hide-icon"></i>
                <i class="fa fa-check-circle success-icon hide-icon"></i>
              </div>
              <div class="form-group">
                <fieldset>
                  <legend>
                    <label for="address">Address</label>
                  </legend>
                  <input
                    type="text"
                    placeholder="Enter your Address"
                    id="address"
                    name="address"
                  />
                </fieldset>
                <small class="error-address"></small>
                <i class="fa fa-exclamation-circle error-icon hide-icon"></i>
                <i class="fa fa-check-circle success-icon hide-icon"></i>
              </div>
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
<script src="/info/js/navbar.js"></script>
<script src="/info/js/entry-form.js"></script>
<script
      src="https://kit.fontawesome.com/3d4c57c88a.js"
      crossorigin="anonymous"
    ></script>
</html>
