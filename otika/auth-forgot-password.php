<?php
include_once('./include/conn.php');
  $userid=@$_SESSION['email'];
    if(isset($_POST['submit'])){
      $email=$_POST['email'];
      $newpass=$_POST['newpass'];
      $repass=$_POST['repass'];
                                
      $qry="SELECT * FROM `admin` WHERE email='$email'";
      $exe_qry = mysqli_query($conn,$qry);
      $data=mysqli_fetch_array($exe_qry);
    if($data['email']==$email){
      if($newpass==$repass){
                                        
      $qry=" UPDATE `admin` SET password='$newpass' WHERE email='$email'";
      $exe_qry = mysqli_query($conn,$qry);
      echo"<script>alert('Change Password Successfully');window.location='auth-login.php'</script>";
      }
      else
      {
      echo"<script>alert('Your New Password Does Not Match The Password Confirmation');window.location='auth-forgot-password.php'</script>";    
      }
    }
    else
    {
      echo"<script>alert('Your Old Password is Incorect');window.location='forgot.php'</script>";
    }
    }
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Inventory Store</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>
<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Forgot Password</h4>
              </div>
              <div class="card-body">
              <form method="post">
                <div class="row">
                  <div class="col-sm-6 col-lg-12">
                    <div class="form-group">
                      <input type="email" class="form-control" id="email" name="email" required placeholder="Enter Your Email">
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-12">
                    <div class="form-group">
                      <input type="password" class="form-control" id="re-password" name="newpass"  required placeholder="Enter Your New-Password">
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-12">
                    <div class="form-group">
                      <input type="password" class="form-control" id="password" name="repass"  required placeholder="Enter Your Rep-Password">
                    </div>
                  </div>                      
                </div>
                <button type="submit" name="submit" value="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">Update Password</button>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>
</html>