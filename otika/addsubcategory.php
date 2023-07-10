<?php
session_start();
if(!$_SESSION['email']){
  header("location:auth-login.php");
}
?>
<?php
include_once('./include/conn.php');
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
                  <form id="scform" method="post" enctype="multipart/form-data">
                    <div class="card-header">
                      <h4>Add New Sub Category</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                      <div class="form-group mb-0">
                        <label>Main Category<span style="color:red;">*</span></label>
                        <select class="form-control" name="mc" id="mc">
                      <?php 
                        $csql="SELECT * FROM category";
                        $cexe=mysqli_query($conn,$csql);
                        while($crow=mysqli_fetch_array($cexe)){
                      ?>
                    <option value="<?php echo $crow['cid'] ?>"><?php echo $crow['cname'] ?></option>
                    <?php } ?>
                    </select>
                      </div>
                      <div>
                        <label>Sub Category Name<span style="color:red;">*</span></label>
                        <input type="text" name="scname" id="scname" disabled class="form-control" required="">
                        <span id="span_scname" style="color:red;"></span>
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
        var mc= $("#mc");
        var scname= $("#scname");

        mc.on("change",(e) => {
            $("#scname").removeAttr("disabled");
        });

          scname.on("input",(e) => {
            let sc_name= scname.val();
            if(!sc_name.match(/^[a-zA-Z ]*$/)){
            $("#span_scname").html("Description must only contain letter or number");
          }
          else{
            $("#sub").removeAttr("disabled");
            $("#span_scname").hide();
          }
        });

        $("#sub").on("click", (e) => {
          e.preventDefault();
          var formData = new FormData(scform);
          $.ajax({
            url: "./ajax/insertsc.php",
            method: "POST",
            contentType: false,
            processData: false,
            data: formData,
            success: function(res) {
              alert(res);
              if (res == 1) {
                window.location.assign("viewsubcategory.php");
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