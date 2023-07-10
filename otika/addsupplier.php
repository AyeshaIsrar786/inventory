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
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row justify-content-center">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <form id="spform" method="post" enctype="multipart/form-data">
                    <div class="card-header">
                      <h4>Add New Supplier</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Supplier Name<span style="color:red;">*</span></label>
                        <input type="text" name="sname" id="sname" class="form-control" required="">
                      </div>
                      <div class="form-group">
                        <label>Supplier Email<span style="color:red;">*</span></label>
                        <input type="email" name="semail" id="semail" disabled class="form-control" required="">
                        <span id="span_semail" style="color:red;"></span>
                      </div>
                      <div class="form-group">
                        <label>Supplier Contact Number<span style="color:red;">*</span></label>
                        <input type="number" name="snum" id="snum" disabled class="form-control" required="">
                        <span id="span_snum" style="color:red;"></span>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      $(document).ready(function(){
        var sname= $("#sname");
        var semail= $("#semail");
        var snum= $("#snum");

        sname.on("input",(e) => {
        let spname=sname.val();
          if(!spname.match(/^[A-Za-z ]*$/)){
            $("#span_sname").html("Name must only contain letters.");
          }
          else{
            $("#semail").removeAttr("disabled");
            $("#span_sname").hide();
          }
        });

          semail.on("input",(e) => {
            let smail= semail.val();
            if(!smail.match(/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/)){
            $("#span_semail").html("Email must be in format of abc@gmail.com");
          }
          else{
            $("#snum").removeAttr("disabled");
            $("#span_semail").hide();
          }
        });

        snum.on("input",(e) => {
            let num= snum.val();
            if(!num.match(/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/)){
            $("#span_snum").html("MobileNumber must be in format 0300-1234567");
          }
          else{
            $("#sub").removeAttr("disabled");
            $("#span_snum").hide();
          }
        });

        $("#sub").on("click", (e) => {
          e.preventDefault();
          var formData = new FormData(spform);
          $.ajax({
            url: "./ajax/insertsp.php",
            method: "POST",
            contentType: false,
            processData: false,
            data: formData,
            success: function(res) {
              alert(res);
              if (res == 1) {
                window.location.assign("viewsupplier.php");
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