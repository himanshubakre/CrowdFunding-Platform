<?php
error_reporting(0);
$conn = new mysqli('localhost','root', '','crowdfunding');
if(isset($_POST['submit'])){
   $name=$_POST['name'];
   $email=$_POST['email'];
   $password=$_POST['password'];
$num_str ='VV'.sprintf("%06d", mt_rand(1, 999999));
$select=mysqli_query($conn,"SELECT * FROM `registration` WHERE email='$email'");
$fetch=mysqli_fetch_array($select);
$email1=$fetch['email'];

if($email != $email1){
   $sql=mysqli_query($conn,"INSERT INTO `registration`(`reg_id`,`name`,`email`,`password`) VALUES ('$num_str','$name','$email','$password')");
   if ($sql) {
   	echo '<script>alert("Register Successfully") </script>';
   	 echo "<script>window.location.href='login.html'</script>";
     // header('Location:login.html');
   }else{
       echo '<script>alert("Not Registered") </script>';
     echo "<script>window.location.href='register.html'</script>";
   }
}else{
  echo '<script>alert("Email Already Exist!") </script>';
     echo "<script>window.location.href='register.html'</script>";
}
}
?>

