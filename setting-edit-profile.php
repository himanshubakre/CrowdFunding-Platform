<?php
session_start();
error_reporting(0);
$conn = new mysqli('localhost','root', '','crowdfunding');
$id=$_SESSION['user']['id'];
$sql=mysqli_query($conn,"SELECT * FROM `registration` WHERE id='$id'");
$fetch=mysqli_fetch_array($sql);
if(isset($_POST['update'])){

$phone=$_POST['phone'];
$birthday=$_POST['birthday'];
$address=$_POST['address'];
$country=$_POST['country'];
$city=$_POST['city'];
// $photo=$_FILE['photo'];
$pincode=$_POST['pincode'];
$src = $_FILES['photo']['tmp_name'];
      $dest = 'photo/'.$_FILES['photo']['name'];
      $passport_photo = '';
      if(move_uploaded_file($src,$dest))
      $photo1 = $_FILES['photo']['name'];
    if(empty($photo1)){
$photo=$fetch['photo'];
    }else{
$photo=$photo1;
    }

$update=mysqli_query($conn,"UPDATE `registration` SET `phone`='$phone',`birthday`='$birthday',`address`='$address',`country`='$country',`city`='$city',`photo`='$photo',`pincode`='$pincode' WHERE id='$id'");

if($update){

$success="Upadated Successfully.";
            // header("Location:corporate_edit");
            }
            else{
                  $error= "Not Upadated Successfully";
            }
         }

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
                                 <a href="dashboard.php" class="nav-link">
                                 <i class="feather-settings"></i> Dashboard
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
                  <div class="col-xl-9 col-md-8">
                     <div class="settings-widget profile-details">
                        <div class="settings-menu p-0">
                           <div class="profile-heading">
                              <h3>Profile Details</h3>
                               <?php
                if ($success) {
                  ?>
                  <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success</strong> <?php echo $success?>                
                  </div>
                  <?php
                }
                elseif ($error){
                  ?>
                  <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>failed</strong> <?php echo $error?>
                  </div>
                  <?php
                }
              ?>
                              <!-- <p>You have full control to manage your own account setting.</p> -->
                           </div>
                          <!--  <div class="course-group mb-0 d-flex">
                              <div class="course-group-img d-flex align-items-center">
                                 <a href="student-profile.html"><img src="assets/img/user/user11.jpg" alt="" class="img-fluid"></a>
                                 <div class="course-name">
                                    <h4><a href="student-profile.html">Your avatar</a></h4>
                                    <p>PNG or JPG no bigger than 800px wide and tall.</p>
                                 </div>
                              </div>
                              <div class="profile-share d-flex align-items-center justify-content-center">
                                 <a href="javascript:;" class="btn btn-success">Update</a>
                                 <a href="javascript:;" class="btn btn-danger">Delete</a>
                              </div>
                           </div> -->
                           <div class="checkout-form personal-address add-course-info ">
                              <div class="personal-info-head">
                                 <h4>Personal Details</h4>
                                 <p>Edit your personal information and address.</p>
                              </div>
                              <form method="post" enctype="multipart/form-data">
                                 <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                           <input type="hidden" class="form-control" value="<?php echo $_SESSION['user']['id']; ?>" >
                                          <label class="form-control-label">Registration Id</label>
                                          <input type="text" class="form-control" value="<?php echo $_SESSION['user']['reg_id']; ?>" disabled>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label class="form-control-label"> Name</label>
                                          <input type="text" class="form-control" value="<?php echo $_SESSION['user']['name']; ?>" disabled>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label class="form-control-label">Phone</label>
                                          <input type="text" class="form-control" name="phone" placeholder="Enter your Phone" value="<?php echo $fetch['phone'];?>" >
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label class="form-control-label">Email</label>
                                          <input type="text" class="form-control" value="<?php echo $_SESSION['user']['email']; ?>" disabled>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label class="form-control-label">Birthday</label>
                                          <input type="date" class="form-control" name="birthday" placeholder="Birth of Date" value="<?php echo $fetch['birthday'];?>">
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label class="form-label">Country</label>
                                          <select class="form-select select country-select" name="country">
                                             <option>Select country</option>
                                             <option>India</option>
                                             <option>America</option>
                                             <option>London</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label class="form-control-label">Address </label>
                                          <input type="text" class="form-control" placeholder="Address" name="address" value="<?php echo $fetch['address'];?>">
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label class="form-control-label">Photo</label>
                                          <input type="file" class="form-control" name="photo" placeholder="" >
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label class="form-control-label">City</label>
                                          <input type="text" class="form-control" name="city" placeholder="Enter your City" value="<?php echo $fetch['city'];?>">
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label class="form-control-label">ZipCode</label>
                                          <input type="text" class="form-control" name="pincode" placeholder="Enter your Zipcode" value="<?php echo $fetch['pincode'];?>">
                                       </div>
                                    </div>
                                    <div class="update-profile">
                                       <input type="submit" class="btn btn-primary" name="update" value="Update Profile">
                                    </div>
                                 </div>
                              </form>
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
