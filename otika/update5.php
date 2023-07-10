<?php 
include_once('./include/conn.php');
$upid=$_GET['upid'];
$getsql="SELECT * FROM `register` WHERE `id`='$upid'";
$exe1=mysqli_query($conn,$getsql);
$row=mysqli_fetch_assoc($exe1);
include_once('./include/head.php');
include_once('./include/sidebar.php');
?>

<div class="main-content">
<section class="section">
    <div class="section-body">
        <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <form id="u_form" >
            <div class="card-header">
                <h4>Add New User</h4>
            </div>
            <div class="card-body">
                <div class="form-group mb-0">
                <label>First Name<span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="fname" name="fname" required value="<?php echo $row['fname']?>"/>
                </div>
                <div class="form-group mb-0">
                <label>Last Name<span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="lname" required name="lname" value="<?php echo $row['lname']?>"/>
                </div>
                <div class="form-group mb-0">
                <label>Email<span style="color:red;">*</span></label>
                <input type="email" class="form-control" id="email" required name="email" value="<?php echo $row['email']?>"/>
                </div>
                <div class="form-group mb-0">
                <label>Country<span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="country" required name="country" value="<?php echo $row['country']?>"/>
                </div>
                <div class="form-group mb-0">
                <label>Address(Line 1)<span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="address1" required name="address1" value="<?php echo $row['address1']?>">
                </div>
                <div class="form-group mb-0">
                <label>Address 2</label>
                <input type="text" class="form-control" id="address2" required name="address2" value="<?php echo $row['address2']?>">
                </div>
                <div class="form-group mb-0">
                <label>State<span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="state" required name="state" value="<?php echo $row['state']?>">
                </div>
                <div class="form-group mb-0">
                <label>Postal Code<span style="color:red;">*</span></label>
                <input type="number" class="form-control" id="postalcode" required name="postalcode" value="<?php echo $row['postalcode']?>">
                </div>
                <div class="form-group mb-0">
                <label>Phone<span style="color:red;">*</span></label>
                <input type="number" class="form-control" id="phone" name="phone" required value="<?php echo $row['phone']?>"/>                 
                </div>
                <div class="form-group mb-0">
                <label>Password<span style="color:red;">*</span></label>
                <input type="password" class="form-control" id="password" required name="password" value="<?php echo $row['password']?>"/>                         
                </div>
                <div class="form-group mb-0">
                <label>Confirm Password<span style="color:red;">*</span></label>
                <input type="password" class="form-control" id="cpassword" required name="cpassword" value="<?php echo $row['cpassword']?>"/>
                </div>
                <div class="form-group mb-0">
                <label>Select your gender</label><br>
                <input type="radio" name="gender" id="male" class="gender" value="male">Male<br>
                <input type="radio" name="gender" id="female" class="gender" value="female">Female
                </div>
            </div>
            <div class="card-footer text-right">
                <input type="button" name="submit" id="sub" class="btn btn-primary" value="submit">
            </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {

      // AJAX
    $("#sub").on("click", (e) => {
        e.preventDefault();
        var formData = new FormData(u_form);
        $.ajax({
        url: "./ajax/up5.php",
        method: "POST",
        contentType: false,
        processData: false,
        data: formData,
        success: function (res) {
            alert(res);
            if (res == 1) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: 'DATA HAS BEEN UPDATED'
            })
            } else if (res == 2) {
            alert("DATA HAS not BEEN UPDATED");
            } else {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
            })
            }
        }
        });
    });
    });  
</script>

<?php
include_once('./include/footer.php');
?>