<?php
$username = "root";
$password = "";
$database = "student information database";
$server = "localhost";
// $username = "epiz_30640302";
// $password = "0b9Su0iTF7";
// $database = "epiz_30640302_studentinformationdatabase";
// $server = "sql300.epizy.com";

$connect = mysqli_connect( $server, $username, $password , $database);

// if($connect){
//     echo " connection successful";
// }
// else {
//     die(mysqli_connect_error());
// }
?>