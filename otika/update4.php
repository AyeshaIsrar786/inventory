<?php 
include_once('./include/conn.php');
$upid=$_GET['upid'];
$getsql="SELECT * FROM `product` WHERE `pid`='$upid'";
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
                  <form id="p_upform">
                    <div class="card-header">
                      <h4>Update Product</h4>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $row['pid']?>" class="form-control" required="">
                    <div class="card-body">
                      <div class="form-group">
                      <div class="form-group mb-0">
                        <label>Main Category</label>
                        <select class="form-control" name="mc">
                      <?php 
                        $csql="SELECT * FROM category";
                        $cexe=mysqli_query($conn,$csql);
                        while($crow=mysqli_fetch_array($cexe)){
                      ?>
                    <option value="<?php echo $crow['cid'] ?>"><?php echo $crow['cname'] ?></option>
                    <?php } ?>
                    </select>
                      </div>
                      <div class="form-group mb-0">
                        <label>Sub Category</label>
                        <select class="form-control" name="sc">
                    <?php 
                        $scsql="SELECT * FROM subcategory";
                        $scexe=mysqli_query($conn,$scsql);
                        while($scrow=mysqli_fetch_array($scexe)){
                    ?>
                    <option value="<?php echo $scrow['subid'] ?>"><?php echo $scrow['scname'] ?></option>
                    <?php } ?>
                    </select>
                      </div>
                      <div class="form-group mb-0">
                        <label>Supplier</label>
                        <select class="form-control" name="sup">
                      <?php 
                        $ssql="SELECT * FROM supplier";
                        $sexe=mysqli_query($conn,$ssql);
                        while($srow=mysqli_fetch_array($sexe)){
                      ?>
                    <option value="<?php echo $srow['sid'] ?>"><?php echo $srow['sname'] ?></option>
                    <?php } ?>
                    </select>
                      </div>
                      <div>
                        <label>Product Code</label>
                        <input type="number" name="pcode" value="<?php echo $row['pcode'] ?>" class="form-control" required="">
                      </div>
                    <div>
                        <label>Product Name</label>
                        <input type="text" name="pname" value="<?php echo $row['pname'] ?>" class="form-control" required="">
                      </div>
                      <div>
                        <label>Product Description</label>
                        <textarea name="pdes" value="<?php echo $row['pdes'] ?>" class="form-control" required=""></textarea>
                      </div>
                      <div>
                        <label>SRP</label>
                        <input type="number" name="srp" value="<?php echo $row['srp'] ?>" class="form-control" required="">
                      </div>
                      <div>
                        <label>Unit Price</label>
                        <input type="number" name="up" value="<?php echo $row['up'] ?>" class="form-control" required="">
                      </div>
                      <div class="form-group mb-0">
                        <label>Quantity Type</label>
                        <select class="form-control" name="qty" value="<?php echo $row['qty'] ?>">
                      <option value="single">Single</option>
                      <option value="pair">Pair</option>
                      </select>
                      </div>
                      <div>
                        <label>Stock</label>
                        <input type="text" name="stock" value="<?php echo @$row['stock'] ?>" class="form-control" required="">
                      </div>
                      <div>
                        <label>Picture</label>
                        <input type="file" name="ppic" class="form-control" required="">
                      </div>
                      <div>
                      <label>Status</label><br>
                        <?php 
                        if(@$row['pstatus']=="online"){
                        $pon="checked";
                        }
                        else{
                            $pof="checked";
                            }
                            ?>
                          <input type="radio" name="pstatus" <?php echo @$pon; ?> value="online">Online<br>
                          <input type="radio" name="pstatus" <?php echo @$pof; ?> value="offline">Offline
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
        var formData = new FormData(p_upform);
        $.ajax({
          url: "./ajax/up4.php",
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