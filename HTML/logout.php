<?php
session_start();
unset($_SESSION['user']['name']);
 	unset($_SESSION['user']['id']);
unset($_SESSION['user']['email']);

  echo '<script>alert("Logout Successfull") </script>';
     echo "<script>window.location.href='login.html'</script>";
?>