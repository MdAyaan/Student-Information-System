<?php
session_start();
require '../components/db_connect.php';
?>
<?php

if(!((isset($_SESSION['loggedin'])) && $_SESSION['loggedin']==true)){
  echo "<script>alert('You dont have permission to view this page!".'\n'."Please Login to continue!')</script>";

  header( "refresh:0;url=/info/admin-login" );
  
  // header("location: /proje/admin-login");
  exit;
}



if($_SERVER["REQUEST_METHOD"]=="POST"){
  // $passworderror = "Hey there!"
  $fname_form = $_POST["first-name"];
  $lname_form = $_POST["last-name"];
  $rollno_form = $_POST["rollno"];
  $rollkey_form = $_POST["rollkey"];
  $session_form = $_POST["session"];
  $semester_form = $_POST["semester"];
  $branch_form = $_POST["branch"];
  $year_form = $_POST["year"];
  $email_form = $_POST["email"];
  $dob_form = $_POST["dob"];
  $address_form = $_POST["address"];
  
  // echo $rollno_form;
// echo $fname_form." ".$lname_form." ".$rollno_form." ".$session_form." ".$rollno_form." ".$branch_form." ".$year_form." ".$semester_form." ".$dob_form;

  //  $signup_insert = "INSERT INTO `students` (`fname`, `lname`, `session` , `rno` ,`branch` ,`year` , `semester`,`dob`,`email`,`address`) VALUES ('$fname_form' ,'$lname_form','$session_form' ,'$rollno_form','$branch_form','$year_form' ,'$semester_form','$dob_form','$email_form' ,'$address_form')";
   $signup_update = "UPDATE  `students` SET `fname` = '$fname_form', `lname` = '$lname_form', `session` = '$session_form', `rno` = '$rollno_form'  ,`course_id_fk` = '$branch_form' ,`year` = '$year_form' , `semester` = '$semester_form',`dob` = '$dob_form',`email` = '$email_form',`address` = '$address_form' WHERE `rno` = '$rollkey_form'";
    if(mysqli_query($connect, $signup_update)){
      echo "<script>alert('Value updated successfuly!')</script>";
  header( "refresh:0;url=/info/edit/" );

    }
    else{
      echo "<script>alert('Data already exists for this student!')</script>";
  header( "refresh:0;url=/info/edit/" );

    }
  }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Update Entry Portal</title>
</head>
<body>
<?php 
require '../components/navbar.php'
?>

<section class="hero">
      <div class="container">
        <div class="logo">
          <!-- <img src="/info/assets/logo.png" alt="" srcset="" /> -->
          <a href="http://ietlucknow.ac.in"><img src="/info/assets/logo.png" alt="" srcset="" /></a>

        </div>
        <div class="title"><h2>Update Student Record</h2></div>
        <div class="sub-title"><p>Welcome to Student Record Portal of IET Lucknow!<br>Click below to edit an entry!</p></div>
        <div class="btn-group">
          <a href="./info/edit#entries"><button class="new-entry">Edit Entry</button></a>
        </div>
      </div>
      </div>
</section>


<section id="entries">
  <div class="container">
    <div class="table-wrapper">
    <fieldset class="filter-fieldset">
      <legend>Filters <i class = "fa fa-filter"></i></legend>
    <input type="text" class = "filters-input" id="name-filter" onkeyup="myFilterFunction(1)" placeholder="Name">
    <input type="hidden" class = "filters-input" id="rollno-filter" onkeyup="myFilterFunction(2)" placeholder="Rollno">
    <input type="text" id= "branch-filter" class = "filters-input" onkeyup="myFilterFunction(3)" placeholder="Branch">
    </fieldset>
  <table class="table" id="myTable" class="display nowrap">
  <thead class="view-entries">
    <tr>
      <th>Sno.</th>
      <th>Name</th>
      <th>Roll Number</th>
      <th>Branch</th>
      <th>Session</th>
      <th>Semester</th>
      <th>Year</th>
      <th>DOB</th>
      <th>Email Address</th>
      <th>Address</th>
      <th class="fixed-col">Update</th>
    </tr>
  </thead>
  <tbody>

  <?php
  $sql = "SELECT * from `students` , `courses` where `students`.course_id_fk = `courses`.course_id";
  $sno = 0;
  $result = mysqli_query($connect,$sql);

    while($row = mysqli_fetch_assoc($result))
    {
      $sno=$sno+1;
      echo "<tr>
      <td>" .$sno."</td>
      <td>".$row['fname']." ".$row['lname']."</td>
      <td>".$row['rno']."</td>
      <td>".$row['course_name']."</td>
      <td>".$row['session']."</td>
      <td>".$row['semester']."</td>
      <td>".$row['year']."</td>
      <td>".$row['dob']."</td>
      <td>".$row['email']."</td>
      <td>".$row['address']."</td>
      <td class='btn-function'><button title = 'Edit Entry' class = 'edit-entry' id = '#".$row['rno']."'><i class = 'fa fa-pencil'></i></button><button class = 'delete-entry' title = 'Delete Entry' id = '$".$row['rno']."'><i class = 'fa fa-trash-alt'></i></button></td>
      
    </tr>";
      // echo $row['Sno.'].$row['Description'].$row['Title'];
      // echo "<br>";
    }
  ?>
  <!-- <td><button class='btn btn-primary edit' data-bs-target='#editModal' data-bs-toggle='modal' id=".$row['Sno.'].">Edit Note</button><button class='btn btn-primary delete mx-1' id=d".$row['Sno.'].">Delete Note</button>
      </td> -->
  </tbody>
  </table>
  </div>
  </div>
</section>

<section class="body modal modal-visibility" id = "edit-record">
      <div class="container">
        <!-- <div class="title"> -->
        <!-- <h2>Entry Form</h2>
          </div> -->
        <div class="cross"><i class="fas fa-times"></i></div>
        <form id="entry-form" action="/info/edit/" method="post">
          <!-- <div class="image">
            <img src="/STUDENT ENTRY.png" alt="" srcset="" />
          </div> -->
          <div class="wrapper">
            <div class="step step-1">
              <input type="hidden" name="rollkey" id="rollkey">
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
            <button class="submit" type="submit">Update</button>
          </div>
        </form>
      </div>
</section>




</body>

<script src="/info/js/navbar.js"></script>
<script src="/info/js/entry-form.js"></script>
<script src="/info/js/filter.js"></script>
<script defer src="/info/js/edit.js"></script>
<script
      src="https://kit.fontawesome.com/3d4c57c88a.js"
      crossorigin="anonymous"
    ></script>
</html>
