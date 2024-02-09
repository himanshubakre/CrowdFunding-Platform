<?php
session_start();
$conn = new mysqli('localhost','root', '','crowdfunding');
if(isset($_POST['submit'])){

   $email=$_POST['email'];
  $password=$_POST['password'];
// echo "SELECT * FROM `registration` WHERE email='$email' AND password='$password'";
$sql=mysqli_query($conn,"SELECT * FROM `registration` WHERE email='$email' AND password='$password'");

$fetch=mysqli_fetch_array($sql);
$email1=$fetch['email'];

if($email == $email1){
   $_SESSION['user']['id']=$fetch['id'];
   $_SESSION['user']['reg_id']=$fetch['reg_id'];

   $_SESSION['user']['name']=$fetch['name'];
   $_SESSION['user']['email']=$fetch['email'];
   
      echo '<script>alert("Login Successfully") </script>';
       echo "<script>window.location.href='setting-edit-profile.php'</script>";
     // header('Location:login.html');
   }else{
       echo '<script>alert("Email & Password is incorrect") </script>';
     echo "<script>window.location.href='login.html'</script>";
   }
}
?>
