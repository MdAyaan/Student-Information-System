<?php

require '../components/db_connect.php';
$key = $_POST['rid'];
  $sql = "SELECT * from `students` where rno = '$key' ";
  $sno = 0;
  $result = mysqli_query($connect,$sql);
  while($row = mysqli_fetch_assoc($result)){
      echo ($row['rno'])."\n";
      echo ($row['fname'])."\n";
      echo ($row['lname'])."\n";
      echo ($row['course_id_fk'])."\n";
      echo ($row['session'])."\n";
      echo ($row['semester'])."\n";
      echo ($row['dob'])."\n";
      echo ($row['email'])."\n";
      echo ($row['address'])."\n";
      echo ($row['year']);
  }


?>