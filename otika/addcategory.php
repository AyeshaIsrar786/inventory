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
                <h4>Add New Category</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Category Name<span style="color:red;">*</span></label>
                  <input type="text" name="cname" id="cname" class="form-control" required="">
                  <span id="span_name" style="color:red;"></span>
                </div>
                <div class="form-group mb-0">
                  <label>Description<span style="color:red;">*</span></label>
                  <textarea name="cdes" id="cdesc" disabled class="form-control" required=""></textarea>
                  <span id="span_desc" style="color:red;"></span>
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

      $('#cname').on("input", (e) => {
        let name = $('#cname').val();
        if (!name.match(/^[A-Za-z ]*$/)) {
          $("#span_name").html("Name must only contain letters.");
          e.preventDefault();
        }else {
          $("#cdesc").removeAttr("disabled");
          $("#span_name").html("");
        }
      });

      $('#cdesc').on("input", (e) => {
        let desc = $('#cdesc').val();
        if (!desc.match(/^(.|\s)*[a-zA-Z0-9 ]+(.|\s)*$/)) {
          $("#span_desc").html("Description must only contain letter or number");
        }
        else {
          $("#sub").removeAttr("disabled");
          $("#span_desc").html("");
        }
      });

      $("#sub").on("click", (e) => {
        e.preventDefault();
        var formData = new FormData(data);
        $.ajax({
          url: "./ajax/insertcat.php",
          method: "POST",
          contentType: false,
          processData: false,
          data: formData,
          success: function (res) {
            alert(res);
            if (res == 1) {
              window.location.assign("viewcategory.php");
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