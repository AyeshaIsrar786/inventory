<?php
include_once('./include/conn.php');
include_once('./include/head.php');
include_once('./include/sidebar.php');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="invoice">
              <div class="invoice-print">
                <div class="row">
                <?php
                $uinvoice=$_GET['uinvoice'];
                $sql = "SELECT * FROM `pos_info` WHERE `uinvoice`='$uinvoice'";
                $exe=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($exe)){
                ?>
                  <div class="col-lg-12">
                    <div class="invoice-title">
                      <h2>Invoice</h2>
                      <div class="invoice-number"><?php echo $row['uinvoice'] ?></div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Billed To:</strong><br>
                          <?php echo $row['u_name'] ?><br>
                          <?php echo $row['uph'] ?><br>
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Shipped To:</strong><br>
                          <?php echo $row['u_name'] ?><br>
                          <?php echo $row['uph'] ?><br>
                        </address>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Order Status:</strong><br>
                          <?php echo $row['ustatus'] ?><br>
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Order Date:</strong><br>
                          <?php echo $row['udate'] ?><br><br>
                        </address>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                </div>
                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="section-title">Order Summary</div>
                    <p class="section-lead">All items here cannot be deleted.</p>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-md">
                        <tr>
                          <th>Item</th>
                          <th class="text-center">Price</th>
                          <th class="text-center">Quantity</th>
                          <th class="text-right">Totals</th>
                        </tr>
                        <?php
                        $uinvoice=$_GET['uinvoice'];
                $sql = "SELECT * FROM `pos_orderinfo` WHERE `uinvoice`='$uinvoice'";
                $exe=mysqli_query($conn,$sql);
                $gt=0;
                while($row=mysqli_fetch_array($exe)){
			          ?>
                        <tr>
                          <td><?php echo $row['pname'] ?></td>
                          <td class="text-center"><?php echo $row['rprice'] ?></td>
                          <td class="text-center"><?php echo $row['qty'] ?></td>
                          <td class="text-right"><?php echo $row['tprice'] ?></td>
                        </tr>
                      <?php $gt=$gt+$row['tprice']; ?>
                        <?php } ?>
                      </table>
                    </div>
                    <div class="row mt-4">
                      <div class="col-lg-8">
                        <div class="section-title">Payment Method</div>
                        <p class="section-lead">The payment method that we provide is to make it easier for you to pay
                          invoices.</p>
                        <div class="images">
                          <img src="assets/img/cards/visa.png" alt="visa">
                          <img src="assets/img/cards/jcb.png" alt="jcb">
                          <img src="assets/img/cards/mastercard.png" alt="mastercard">
                          <img src="assets/img/cards/paypal.png" alt="paypal">
                        </div>
                      </div>
                      <div class="col-lg-4 text-right">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Subtotal</div>
                          <div class="invoice-detail-value"><?php echo $gt ?></div>
                        </div>
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Shipping</div>
                          <div class="invoice-detail-value">250</div>
                        </div>
                        <hr class="mt-2 mb-2">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Total</div>
                          <div class="invoice-detail-value invoice-detail-value-lg"><?php echo $gt+250 ?></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                  <a href="viewpos.php" type="button" class="btn btn-primary btn-icon icon-left"><i data-feather="briefcase"></i><strong> Back to Orders</a>
                </div>
                <button class="btn btn-warning btn-icon icon-left" id="print" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
              </div>
            </div>
          </div>
        </section>
      </div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<!-- <script>
function printPageArea(areaID){
    var printContent = document.getElementById(areaID).innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}
</script> -->

<?php
include_once('./include/footer.php');
?>