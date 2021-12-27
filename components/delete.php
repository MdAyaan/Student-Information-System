<?php 
require '../components/db_connect.php';
$key = $_POST['riddel'];
$sql = "DELETE from `students` where rno = '$key' ";
  
  if($result = mysqli_query($connect,$sql)){
      echo "True";
  }
  else{
      echo "False";
  }

?>