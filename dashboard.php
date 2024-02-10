<?php
session_start();
error_reporting(0);
$conn = new mysqli('localhost','root', '','crowdfunding');
$id=$_SESSION['user']['id'];
$sql=mysqli_query($conn,"SELECT * FROM `registration` WHERE id='$id'");
$fetch=mysqli_fetch_array($sql);

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>VentureVerse-The CrowdFunding Platform</title>
      <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.svg">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="assets/css/feather.css">
      <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body>
      <div class="main-wrapper">
         <header class="header header-page">
            <div class="header-fixed">
               <nav class="navbar navbar-expand-lg header-nav scroll-sticky">
                  <div class="container ">
                     <div class="navbar-header">
                        <a id="mobile_btn" href="javascript:void(0);">
                        <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                        </span>
                        </a>
                        <a href="index-2.html" class="navbar-brand logo">
                        <img src="assets/img/logo/Venture 2.png" class="img-fluid" alt="Logo">
                        </a>
                     </div>
         <ul class="main-nav ">
   
 <li class="has-submenu" >
 <span style="color:red; font-size:20px;font-weight:bold;"> <?php echo $_SESSION['user']['name']; ?></span>
 </li>
</ul>
                  </div>
               </nav>
            </div>
         </header>
         <div class="page-content">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-md-4 theiaStickySidebar">
                     <div class="settings-widget dash-profile mb-3">
                        <div class="settings-menu p-0">
                           <div class="profile-bg">
                              <!-- <h5>Beginner</h5> -->
                              <img src="assets/img/profile-bg.jpg" alt="">
                              <div class="profile-img">
                                 <?php if($fetch['photo'] == NULL){ ?>
                                 <img src="assets/img/pic.jpg" alt="">
                                 <?php }else{  ?>
                                 <img src="photo/<?php echo $fetch['photo']; ?> " alt="">
                              <?php } ?>
                              </div>
                           </div>
                           <div class="profile-group">
                              <div class="profile-name text-center">
                                 <h4><?php echo $_SESSION['user']['name']; ?></h4>
                                 <p>Student</p>
                              </div>
                              <div class="go-dashboard text-center">
                                 <a href="dashboard.php" class="btn btn-primary">Go to Dashboard</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="settings-widget account-settings">
                        <div class="settings-menu">
                           <h3>ACCOUNT SETTINGS</h3>
                           <ul>
                              <li class="nav-item active">
                                 <a href="setting-edit-profile.php" class="nav-link">
                                 <i class="feather-settings"></i> My Profile
                                 </a>
                              </li>
                              
                              <li class="nav-item">
                                 <a href="logout.php" class="nav-link">
                                 <i class="feather-power"></i> Sign Out
                                 </a>
                              </li>
                           </ul>
                           <!-- <h3>SUBSCRIPTION</h3>
                           <ul>
                              <li class="nav-item">
                                 <a href="setting-student-subscription.html" class="nav-link ">
                                 <i class="feather-calendar"></i> My Subscriptions
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a href="setting-student-billing.html" class="nav-link">
                                 <i class="feather-credit-card"></i> Billing Info
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a href="setting-student-payment.html" class="nav-link">
                                 <i class="feather-credit-card"></i> Payment
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a href="setting-student-invoice.html" class="nav-link">
                                 <i class="feather-clipboard"></i> Invoice
                                 </a>
                              </li>
                           </ul> -->
                        </div>
                     </div>
                  </div>
<div class="col-xl-9 col-lg-8 col-md-12">
<div class="row">
<div class="col-md-4 d-flex">
<div class="card instructor-card w-100">
<div class="card-body">
<div class="instructor-inner">
<h6>REVENUE</h6>
<h4 class="instructor-text-success">$467.34</h4>
<p>Earning this month</p>
</div>
</div>
</div>
</div>
<div class="col-md-4 d-flex">
<div class="card instructor-card w-100">
<div class="card-body">
<div class="instructor-inner">
<h6>STUDENTS ENROLLMENTS</h6>
<h4 class="instructor-text-info">12,000</h4>
<p>New this month</p>
</div>
</div>
</div>
</div>
<div class="col-md-4 d-flex">
<div class="card instructor-card w-100">
<div class="card-body">
<div class="instructor-inner">
<h6>COURSES RATING</h6>
<h4 class="instructor-text-warning">4.80</h4>
<p>Rating this month</p>
</div>
</div>
</div>
</div>
</div>




</div>
</div>
</div>

         <footer class="footer">
           
            <div class="footer-bottom">
               <div class="container">
                  <div class="copyright">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="privacy-policy">
                              <!-- <ul>
                                 <li><a href="term-condition.html">Terms</a></li>
                                 <li><a href="privacy-policy.html">Privacy</a></li>
                              </ul> -->
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="copyright-text">
                              <p class="mb-0">&copy; 2024 VentureVerse. All rights reserved.</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </footer>
      </div>
      <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="assets/js/bootstrap.bundle.min.js"></script>
      <script src="assets/plugins/select2/js/select2.min.js"></script>
      <script src="assets/plugins/feather/feather.min.js"></script>
      <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
      <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
      <script src="assets/js/script.js"></script>
   </body>
</html>
