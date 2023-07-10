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
            <form id="qtyform" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h4>Add New Quantity</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Weight<span style="color:red;">*</span></label>
                  <input type="text" name="qweight" id="qweight" class="form-control" required="">
                  <span id="span_qweight" style="color:red;"></span>
                </div>
                <div class="form-group">
                  <label>Description<span style="color:red;">*</span></label>
                  <textarea name="qdes" id="qdes" disabled class="form-control" required=""></textarea>
                  <span id="span_qdes" style="color:red;"></span>
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
    $(document).ready(function () {

      var qweight = $("#qweight");
      var qdes = $("#qdes");

      qweight.on("input", (e) => {
        let weight = qweight.val();
        if (!weight.match(/^[A-Za-z0-1 ]*$/)) {
          $("#span_qweight").html("Quantity must only contain letters or numbers.");
        }
        else {
          $("#qdes").removeAttr("disabled");
          $("#span_qweight").hide();
        }
      });

      qdes.on("input", (e) => {
        let qdesc = qdes.val();
        if (!qdesc.match(/^(.|\s)*[a-zA-Z0-9 ]+(.|\s)*$/)) {
          $("#span_qdes").html("Description must only contain letter or number");
        }
        else {
          $("#sub").removeAttr("disabled");
          $("#span_qdes").hide();
        }
      });

      $("#sub").on("click", (e) => {
        e.preventDefault();
        var formData = new FormData(qtyform);
        $.ajax({
          url: "./ajax/insertqty.php",
          method: "POST",
          contentType: false,
          processData: false,
          data: formData,
          success: function (res) {
            alert(res);
            if (res == 1) {
              window.location.assign("viewquantity.php");
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