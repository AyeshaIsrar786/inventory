<?php 
include_once('./include/conn.php');
$upid=$_GET['upid'];
$getsql="SELECT * FROM `supplier` WHERE `sid`='$upid'";
$exe1=mysqli_query($conn,$getsql);
$row=mysqli_fetch_assoc($exe1);

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
                  <form id="sp_upform">
                    <div class="card-header">
                      <h4>Update Supplier</h4>
                    </div>
                    <input type="hidden" name="sid" value="<?php echo $row['sid']?>" class="form-control" required="">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Supplier Name</label>
                        <input type="text" name="sname" value="<?php echo $row['sname'] ?>" class="form-control" required="">
                      </div>
                      <div class="form-group">
                        <label>Supplier Email</label>
                        <input type="email" name="semail" value="<?php echo $row['semail'] ?>" class="form-control" required="">
                      </div>
                      <div class="form-group">
                        <label>Supplier Contact Number</label>
                        <input type="number" name="snum" value="<?php echo $row['snum'] ?>" class="form-control" required="">
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
      $("#sub").on("click", (e) => {
        e.preventDefault();
        var formData = new FormData(sp_upform);
        $.ajax({
          url: "./ajax/up2.php",
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
    })
    </script>
<?php
include_once('./include/footer.php');
?>