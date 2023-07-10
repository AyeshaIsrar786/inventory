<?php
include_once('../otika/include/conn.php');
session_start();
?>
<?php
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $qry="SELECT * FROM `register` WHERE `email`='$email' and `password`='$password'";
    $exe_qry = mysqli_query($conn,$qry);
    $result=mysqli_fetch_array($exe_qry);
        if($email == $result['email'] && $password == $result['password'])
        {
        $_SESSION['email'] = $result['email'];
        header("location:shop.php");
        }
        else
        {
        header("location:login.php?error=password");
        }
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
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
                <h4>Login</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" id="email" name="email" tabindex="1" required autofocus>
                </div>
                <div class="form-group">
                    <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                    <div class="float-right">
                        <a href="forgot.php" style="color:black;" class="text-small">
                        Forgot Password?
                        </a>
                    </div>
                    </div>
                    <?php if(isset($_GET['error']) == "password"){ ?>
                    <div><span style="color:red">Invalid Password:</span></div>
                    <?php } ?>
                    <input id="password" type="password" id="password" class="form-control" name="password" tabindex="2" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" value="submit" class="btn btn-dark btn-lg btn-block" tabindex="4">
                    Login
                    </button>
                </div>
                </form>
            </div>
            </div>
            <div class="mt-5 text-muted text-center">
            Don't have an account? <a href="register.php" style="color:black;">Create One</a>
            </div>
        </div>
        </div>
    </div>
    </section>
</div>
<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>