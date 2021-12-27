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
   $signup_update = "UPDATE  `students` SET `fname` = '$fname_form', `lname` = '$lname_form', `session` = '$session_form'  ,`course_id_fk` = '$branch_form' ,`year` = '$year_form' , `semester` = '$semester_form',`dob` = '$dob_form',`email` = '$email_form',`address` = '$address_form' WHERE `rno` = '$rollno_form'";
    if(mysqli_query($connect, $signup_update)){
      echo "<script>alert('Value updated successfuly!')</script>";
  header( "refresh:0;url=/info/edit/" );

    }
    else{
      echo "Not inserted";
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
        <div class="title"><h2>View Records</h2></div>
        <div class="sub-title"><p>Welcome to Student Record Portal of IET Lucknow!<br>Click below view all the entries!</p></div>
        <div class="btn-group">
          <a href="./info/view#entries"><button class="new-entry">View Entry</button></a>
        </div>
      </div>
      </div>
</section>


<section id="entries">
  <div class="container">
    <div class="table-wrapper">
    <fieldset class="filter-fieldset">
      <legend>Filters <i class = "fa fa-filter"></i></legend>
    <div class="input-filters-view">
    <input type="text" class = "filters-input" id="name-filter" onkeyup="myFilterFunction(1)" placeholder="Name">
    <input type="hidden" class = "filters-input" id="rollno-filter" onkeyup="myFilterFunction(2)" placeholder="Rollno">
    <input type="text" id= "branch-filter" class = "filters-input" onkeyup="myFilterFunction(3)" placeholder="Branch">
    <input type="text" id= "session-filter" class = "filters-input" onkeyup="myFilterFunction(4)" placeholder="Session">
    <input type="text" id= "semester-filter" class = "filters-input" onkeyup="myFilterFunction(5)" placeholder="Semester">
    <!-- <button class="submit" onclick="exportData()">Export to CSV</button> -->
    </div>
    <div class="export-buttons">
    <button class="export" onclick="exportData()">CSV<i class = "fa fa-download"></i></button></div>
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
      <th>DOB</th>
      <th>Email Address</th>
      <th>Address</th>
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
      <td>".$row['dob']."</td>
      <td>".$row['email']."</td>
      <td>".$row['address']."</td>
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


    </body>

    <script src="/info/js/navbar.js"></script>
    <script src="/info/js/download.js"></script>
    <script src="/info/js/filter.js"></script>
   
    <script
      src="https://kit.fontawesome.com/3d4c57c88a.js"
      crossorigin="anonymous"
    ></script>
</html>
