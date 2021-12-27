<?php 
session_start();
session_unset();
session_destroy();

echo "<script>alert('You are successfully logged out!')</script>";

  header( "refresh:0;url=/info/admin-login" );
// header('location: /proje')
?>