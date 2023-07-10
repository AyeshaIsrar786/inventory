<?php
session_start();
if(!$_SESSION['email']){
header("location:auth-login.php");
}
?>
<?php
include_once('./include/head.php');
include_once('./include/sidebar.php');
?>

<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <form id="data" >
              <div class="card-header">
                <h4>Add Admin User</h4>
              </div>
              <div class="card-body">
                <form id="register">
                  
                    <div class="form-group">
                      <label for="aname">Full Name<span style="color:red;">*</span></label>
                      <input id="aname" type="text" class="form-control" name="aname" autofocus>
                      <span id="span_aname" style="color:red;"></span>
                    </div>
                  
                  <div class="form-group">
                    <label for="email">Email<span style="color:red;">*</span></label>
                    <input id="email" type="email" class="form-control" name="email" disabled>
                    <div class="invalid-feedback">
                    <span id="span_email" style="color:red;"></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password<span style="color:red;">*</span></label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                        name="password" disabled>
                        <span id="span_password" style="color:red;"></span>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="cpassword" class="d-block">Password Confirmation<span style="color:red;">*</span></label>
                      <input id="cpassword" type="password" class="form-control" name="cpassword">
                      <!-- <span id="span_cpassword" style="color:red;"></span> -->
                    </div>
                  </div>
                  <div class="form-group ">
                    <label>Role<span style="color:red;">*</span></label>
                    <select class="form-control" name="arole" id="arole" disabled>
                      <option value="">Select Role</option>
                      <?php 
                        $csql="SELECT * FROM `u_management`";
                        $cexe=mysqli_query($conn,$csql);
                        while($crow=mysqli_fetch_array($cexe)){
                      ?>
                      <option value="<?php echo $crow['rid'] ?>">
                        <?php echo $crow['rname'] ?>
                      </option>
                      <?php } ?>
                    </select>
                  </div>
              </div>
              <div class="card-footer text-right">
                <input type="button" name="submit" id="sub" disabled class="btn btn-primary" value="Register">
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

      // FORM VALIDATION FIRST NAME
    $('#aname').on("input", (e) => {
        let f_name = $('#aname').val();
        if (!f_name.match(/^[A-Za-z ]+$/)) {
        $("#span_aname").html("Name must only contain letters.");
        }
        else {
        $("#email").removeAttr("disabled");
        $("#span_aname").html("");
        }
    });
            
       // FORM VALIDATION LAST NAME
    $('#email').on("input", (e) => {
        let email = $('#email').val();
        if (!email.match(/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/)) {
        $("#span_email").html("Email must be in format of abc@gmail.com");
        }
        else {
        $("#password").removeAttr("disabled");
        $("#span_email").html("");
        }
    });


    // FORM VALIDATION PASSWORD
    $("#password").on("input",(e) => {
        var pass= $("#password").val();
        var password1=/([a-z].*[A-Z])|([A-Z].*[a-z])([0-9])+([!,%,&,@,#,$,^,*,?,_,~])/;
        var password2=/([0-9])/;
        var password3=/([!,%,&,@,#,$,^,*,?,_,~])/;
        if ( (pass.length<8 || password1.test(pass)==false || password2.test(pass)==false || password3.test(pass)==false)) {
            $("#span_password").html("Please Enter Strong Password(one uppercase,one lowercase and one special character");
        }
        else{
            $("#arole").removeAttr("disabled");
            $("#span_password").html("");
        }
    });

      // FORM VALIDATION Role
    $("#arole").on("change", (e) => {
        $("#sub").removeAttr("disabled");
    });

      // AJAX
    $("#sub").on("click", (e) => {
        e.preventDefault();
        var formData = new FormData(register);
        $.ajax({
        url: "./ajax/insertadmin.php",
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
                title: 'USER HAS BEEN REGISTERED SUCCESSFULY'
            })
            } else if (res == 2) {
            alert("USER HAS NOT BEEN REGISTERED SUSCCESSFULY");
            }
            else {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your data has been saved',
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