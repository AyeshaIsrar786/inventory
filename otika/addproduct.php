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
            <form id="pform">
              <div class="card-header">
                <h4>Add New Product</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <div class="form-group mb-0">
                    <label>Main Category<span style="color:red;">*</span></label>
                    <select class="form-control" name="mc" id="pmc">
                      <option value="">Select Category</option>
                      <?php 
                        $csql="SELECT * FROM `category`";
                        $cexe=mysqli_query($conn,$csql);
                        while($crow=mysqli_fetch_array($cexe)){
                      ?>
                      <option value="<?php echo $crow['cid'] ?>">
                        <?php echo $crow['cname'] ?>
                      </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group mb-0">
                    <label>Sub Category<span style="color:red;">*</span></label>
                    <select class="form-control" name="sc" id="psc" disabled>
                      <option value="">
                        Select Sub Category
                      </option>
                    </select>
                  </div>
                  <div class="form-group mb-0">
                    <label>Supplier<span style="color:red;">*</span></label>
                    <select class="form-control" name="sup" id="psup" disabled>
                      <option value="">Select Supplier</option>
                      <?php 
                        $ssql="SELECT * FROM `supplier`";
                        $sexe=mysqli_query($conn,$ssql);
                        while($srow=mysqli_fetch_array($sexe)){
                      ?>
                      <option value="<?php echo $scrow['sid'] ?>">
                        <?php echo $srow['sname'] ?>
                      </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div>
                    <label>Product Code<span style="color:red;">*</span></label>
                    <input type="number" name="pcode" id="pcode" disabled class="form-control" required="">
                    <span id="span_pcode" style="color:red;"></span>
                  </div>
                  <div>
                    <label>Product Name<span style="color:red;">*</span></label>
                    <input type="text" name="pname" id="pname" disabled class="form-control" required="">
                    <span id="span_pname" style="color:red;"></span>
                  </div>
                  <div>
                    <label>Product Description<span style="color:red;">*</span></label>
                    <textarea name="pdes" id="pdes" disabled class="form-control" required=""></textarea>
                    <span id="span_pdes" style="color:red;"></span>
                  </div>
                  <div>
                    <label>SRP<span style="color:red;">*</span></label>
                    <input type="number" name="up" id="up" disabled class="form-control" required="">         
                    <span id="span_up" style="color:red;"></span>
                  </div>
                  <div>
                    <label>Unit Price<span style="color:red;">*</span></label>
                    <input type="number" name="srp" id="srp" disabled class="form-control" required="">
                    <span id="span_srp" style="color:red;"></span>                  </div>     
                  <label>Quantity<span style="color:red;">*</span></label>
                    <input type="number" name="qty" id="qty" disabled class="form-control" required=""> 
                    <span id="span_qty" style="color:red;"></span>
                    </div>
                  <div class="form-group mb-0">
                    <label>Quantity Type<span style="color:red;">*</span></label>
                    <select class="form-control" name="qw" id="qw" disabled>
                      <option value="">Select QTY type</option>
                    <?php 
                        $qsql="SELECT * FROM `quantity`";
                        $qexe=mysqli_query($conn,$qsql);
                        while($qrow=mysqli_fetch_array($qexe)){
                      ?>
                      <option value="<?php echo $qrow['qid'] ?>">
                        <?php echo $qrow['qweight'] ?>
                      </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div>
                    <label>Stock<span style="color:red;">*</span></label>
                    <input type="text" name="stock" id="stock" disabled class="form-control" required="">
                    <span id="span_stock" style="color:red;"></span>
                  </div>
                  <div>
                    <label>Picture<span style="color:red;">*</span></label>
                    <input type="file" name="ppic" id="ppic" disabled class="form-control" required="">
                    <span id="span_ppic" style="color:red;"></span>
                  </div>
                  <div>
                    <label>Status<span style="color:red;">*</span></label><br>
                    <input type="radio" name="pstatus" id="online" class="status" disabled value="online">Online<br>
                    <input type="radio" name="pstatus" id="offline" class="status" disabled value="offline">Offline
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

      // FORM VALIDATION MAIN CATEGORY
      $('#pmc').on("change", (e) => {
        $("#psc").removeAttr("disabled");
      });

      // FORM VALIDATION SUBCATEGORY
      $('#psc').on("change", (e) => {
        $("#psup").removeAttr("disabled");
      });

      // FORM VALIDATION SUPPLIER
      $('#psup').on("change", (e) => {
        $("#pcode").removeAttr("disabled");
      });

      // FORM VALIDATION PRODUCT CODE
      $('#pcode').on("input", (e) => {
        let code = $('#pcode').val();
        if (!code.match(/^[0-9]+$/)) {
          $("#span_pcode").html("Code must only contain numbers.");
        }
        else {
          $("#pname").removeAttr("disabled");
          $("#span_pcode").html("");
        }
      });

      // FORM VALIDATION PRODUCT NAME
      $('#pname').on("input", (e) => {
        let p_name = $('#pname').val();
        if (!p_name.match(/^[A-Za-z ]*$/)) {
          $("#span_pname").html("Name must only contain letters.");
        }
        else {
          $("#pdes").removeAttr("disabled");
          $("#span_pname").html("");
        }
      });

      // FORM VALIDATION PRODUCT DESCRIPTION
      $('#pdes').on("input", (e) => {
        let pdesc = $('#pdes').val();
        if (!pdesc.match(/^(.|\s)*[a-zA-Z0-9 ]+(.|\s)*$/)) {
          $("#span_pdes").html("Description must only contain numbers and letters.");
        }
        else {
          $("#up").removeAttr("disabled");
          $("#span_pdes").html("");
        }
      });

      // FORM VALIDATION PRODUCT SRP
      $('#up').on("input", (e) => {
        let pup = $('#up').val();
        if (!pup.match(/^[0-9]+$/)) {
          $("#span_up").html("Unit Price must only contain number.");
        }
        else {
          $("#srp").removeAttr("disabled");
          $("#span_up").html("");
        }
      });
      // FORM VALIDATION PRODUCT UP
      $('#srp').on("input", (e) => {
        let psrp = $('#srp').val();
        if (!psrp.match(/^[0-9]+$/)) {
          $("#span_srp").html("Retail Price must only contain number.");
        }
        else {
          $("#qty").removeAttr("disabled");
          $("#span_srp").html("");
        }
      });
       // FORM VALIDATION QTY
      $('#qty').on("input", (e) => {
        let pqty = $('#qty').val();
        if (!pqty.match(/^[0-9]+$/)) {
          $("#span_qty").html("Unit Price must only contain number.");
        }
        else {
          $("#qw").removeAttr("disabled");
          $("#span_qty").html("");
        }
      });

      // FORM VALIDATION QUANTITY TYPE
      $('#qw').on("change", (e) => {
        $("#stock").removeAttr("disabled");
      })

      // FORM VALIDATION STOCK
      $('#stock').on("input", (e) => {
        let pstock = $('#stock').val();
        if (!pstock.match(/^[0-9]+$/)) {
          $("#span_stock").html("Unit Price must only contain number.");
        }
        else {
          $("#ppic").removeAttr("disabled");
          $("#span_stock").html("");
        }
      });

      // FORM VALIDATION PPIC
      $('#ppic').on("change", (e) => {
        var file= $("#ppic");
        if (file.size > 200000) {
          $("#span_ppic").html("Please select image size less than 2 MB");
        }
        else {
        $(".status").removeAttr("disabled")
        $("#span_ppic").html("");
        }
      });

      // FORM VALIDATION STATUS
      $("#online").on("click", (e) => {
        $("#sub").removeAttr("disabled");
      });
      $("#offline").on("click", (e) => {
        $("#sub").removeAttr("disabled");
      });

      // AJAX
      $("#sub").on("click", (e) => {
        e.preventDefault();
        var formData = new FormData(pform);
        $.ajax({
          url: "./ajax/insertp.php",
          method: "POST",
          contentType: false,
          processData: false,
          data: formData,
          success: function (res) {
            alert(res);
            if (res == 1) {
              window.location.assign("viewproduct.php");
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
            }
            else {
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

      // CAT ON CHANGE
      $("#pmc").on("change",function(){
        var pmc_id= $(this).val();
        $.ajax({
          url: "./ajax/cat.php",
          method: "POST",
          data:{
            pmc_id:pmc_id
          },
          success: function (res) {
            $("#psc").html(res);
            // console.log(pmc_id);
          }
        })
      })
    });

</script>
  <?php
include_once('./include/footer.php');
?>