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
            <form id="udata" >
              <div class="card-header">
                <h4>Add New User</h4>
              </div>
              <div class="card-body">
                <div class="form-group mb-0">
                <label>First Name<span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="fname" name="fname" required placeholder="Enter your First Name"/>
                <span id="span_fname" style="color:red;"></span>
                </div>
                <div class="form-group mb-0">
                <label>Last Name<span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="lname" disabled required name="lname" placeholder="Enter Your Last Name"/>
                <span id="span_lname" style="color:red;"></span>
                </div>
                <div class="form-group mb-0">
                <label>Email<span style="color:red;">*</span></label>
                <input type="email" class="form-control" id="email" disabled required name="email" placeholder="Enter Your Email"/>
                <span id="span_email" style="color:red;"></span>
                </div>
                <div class="form-group mb-0">
                <label>Country<span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="country" disabled required name="country" placeholder="Enter Your Country Name"/>
                <span id="span_country" style="color:red;"></span>
                </div>
                <div class="form-group mb-0">
                <label>Address(Line 1)<span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="address1" disabled required name="address1" placeholder="Enter Your Address">
                <span id="span_address1" style="color:red;"></span>
                </div>
                <div class="form-group mb-0">
                <label>Address 2</label>
                <input type="text" class="form-control" id="address2" disabled required name="address2" placeholder="Enter Your Address(optional)">
                <span id="span_address2" style="color:red;"></span>
                </div>
                <div class="form-group mb-0">
                <label>State<span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="state" disabled required name="state" placeholder="Enter Your State Name">
                <span id="span_state" style="color:red;"></span> 
                </div>
                <div class="form-group mb-0">
                <label>Postal Code<span style="color:red;">*</span></label>
                <input type="number" class="form-control" id="postalcode" disabled required name="postalcode" placeholder="Enter Postal Code">
                <span id="span_postalcode" style="color:red;"></span>
                </div>
                <div class="form-group mb-0">
                <label>Phone<span style="color:red;">*</span></label>
                <input type="number" class="form-control" id="phone" disabled name="phone" required placeholder="Phone Number"/>
                <span id="span_phone" style="color:red;"></span>                  
                </div>
                <div class="form-group mb-0">
                <label>Password<span style="color:red;">*</span></label>
                <input type="password" class="form-control" id="password" disabled required name="password" placeholder=" Enter Password"/>
                <span id="span_password" style="color:red;"></span>                          
                </div>
                <div class="form-group mb-0">
                <label>Confirm Password<span style="color:red;">*</span></label>
                <input type="password" class="form-control" id="cpassword" required name="cpassword" placeholder="Enter Conform password"/>
                </div>
                <div class="form-group mb-0">
                <label>Select your gender</label><br>
                <input type="radio" name="gender" id="male" disabled class="gender" value="male">Male<br>
                <input type="radio" name="gender" id="female" disabled class="gender" value="female">Female
                </div>
            </div>
            <div class="card-footer text-right">
                <input type="button" name="submit" id="sub" disabled class="btn btn-primary" value="submit">
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
        $('#fname').on("input", (e) => {
        let f_name = $('#fname').val();
        if (!f_name.match(/^[A-Za-z ]+$/)) {
        $("#span_fname").html("Name must only contain letters.");
        }
        else {
        $("#lname").removeAttr("disabled");
        $("#span_fname").html("");
        }
    });
            
       // FORM VALIDATION LAST NAME
    $('#lname').on("input", (e) => {
        let l_name = $('#lname').val();
        if (!l_name.match(/^[A-Za-z ]+$/)) {
        $("#span_lname").html("Name must only contain letters.");
        }
        else {
        $("#email").removeAttr("disabled");
        $("#span_lname").html("");
        }
    });

      // FORM VALIDATION EMAIL
    $("#email").on("input",(e) => {
        let mail= $("#email").val();
        if(!mail.match(/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/)){
            $("#span_email").html("Email must be in format of abc@gmail.com");
        }
        else{
            $("#country").removeAttr("disabled");
            $("#span_email").html("");
        }
        });


      // FORM VALIDATION COUNTRY
    $('#country').on("input", (e) => {
    let rcountry = $('#country').val();
        if (!rcountry.match(/^[A-Za-z ]+$/)) {
        $("#span_country").html("Country name must only contain letters.");
        }
        else {
        $("#address1").removeAttr("disabled");
        $("#span_country").html("");
        }
    });

      // FORM VALIDATION ADDRESS1
    $('#address1').on("input", (e) => {
    let address_1 = $('#address1').val();
        if (!address_1.match(/^[A-Za-z0-9 ]+$/)) {
        $("#span_address1").html("Address must only contain letters and numbers");
        }
        else {
        $("#address2").removeAttr("disabled");
        $("#span_address1").html("");
        }
    });

     // FORM VALIDATION ADDRESS2
    $('#address2').on("input", (e) => {
    let address_2 = $('#address2').val();
        if (!address_2.match(/^[A-Za-z0-9 ]+$/)) {
        $("#span_address2").html("Address must only contain letters and numbers");
        }
        else {
        $("#state").removeAttr("disabled");
        $("#span_address2").html("");
        }
    });

    // FORM VALIDATION STATE
    $('#state').on("input", (e) => {
    let rstate = $('#state').val();
        if (!rstate.match(/^[A-Za-z ]+$/)) {
        $("#span_state").html("State name must only contain letters");
        }
        else {
        $("#postalcode").removeAttr("disabled");
        $("#span_state").html("");
        }
    });

    // FORM VALIDATION POSTAL CODE
    $('#postalcode').on("input", (e) => {
    let postal_code = $('#postalcode').val();
        if (!postal_code.match(/^[0-9 ]+$/)) {
        $("#span_postalcode").html("Postal Code must only contain numbers");
        }
        else {
        $("#phone").removeAttr("disabled");
        $("#span_postalcode").html("");
        }
    });

    // FORM VALIDATION PHONE NUMBER
    $("#phone").on("input",(e) => {
        let phone_num= $("#phone").val();
            if(!phone_num.match(/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/)){
            $("#span_phone").html("Mobile Number must be in format 0300-1234567");
        }
        else{
            $("#password").removeAttr("disabled");
            $("#span_phone").html("");
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
            $(".gender").removeAttr("disabled");
            $("#span_password").html("");
        }
    });

      // FORM VALIDATION GENDER
    $("#male").on("click", (e) => {
        $("#sub").removeAttr("disabled");
    });
    $("#female").on("click", (e) => {
        $("#sub").removeAttr("disabled");
    });

      // AJAX
      $("#sub").on("click", (e) => {
        e.preventDefault();
        var formData = new FormData(udata);
        $.ajax({
          url: "./ajax/insertuser.php",
          method: "POST",
          contentType: false,
          processData: false,
          data: formData,
          success: function (res) {
            alert(res);
            if (res == 1) {
              window.location.assign("viewuser.php");
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
                title: 'DATA HAS BEEN INSERTED'
              })
            } else if (res == 2) {
              alert("DATA HAS not BEEN INSERTD");
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