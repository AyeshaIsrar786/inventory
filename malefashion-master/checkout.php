<?php
include_once('./include/conn.php');
include_once('./include/header.php'); 
?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <a href="./shop.php">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form id="oform">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                            here</a> to enter your code</h6>
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                            <?php
                            @$email=$_SESSION['email'];
                            $rsql="SELECT * FROM `register` WHERE `email` = '$email'";
                            $rexe=mysqli_query($conn,$rsql);
                            while($rfet=mysqli_fetch_array($rexe)){
                            ?>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="oname" id="oname" value="<?php echo $rfet['fname'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="olname" id="olname" value="<?php echo $rfet['lname'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name="ocountry" id="ocountry" value="<?php echo $rfet['country'] ?>">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" class="checkout__input__add" name="oaddress1" id="oaddress1" value="<?php echo $rfet['address1'] ?>">
                                <input type="text" name="oaddress2" id="oaddress2" value="<?php echo $rfet['address2'] ?>">
                            </div>
                            <div class="checkout__input">
                                <p>State<span>*</span></p>
                                <input type="text" name="ostate" id="ostate" value="<?php echo $rfet['state'] ?>">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="number" name="opcode" id="opcode" value="<?php echo $rfet['postalcode'] ?>">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="number" name="oph" id="oph" value="<?php echo $rfet['phone'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="oemail" id="oemail" value="<?php echo $rfet['email'] ?>">
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <?php 
                                @$email=$_SESSION['email'];
                        $sql="SELECT * FROM `cart` WHERE `pemail`='$email'";
                        $exe=mysqli_query($conn,$sql);
                        $gt=0;
                        while($row=mysqli_fetch_array($exe)){
                            ?>
                                <ul class="checkout__total__products">
                                    <li><?php echo $row['pname'] ?> <span><?php echo  $row['tprice'] ?></span></li>
                                </ul> 
                                <?php $gt=$gt+$row['tprice']?>                      
                                <?php } ?>
                                <ul class="checkout__total__all">
                                    <li>Subtotal <span><?php echo $gt ?></span></li>
                                    <li>Total <span><?php echo $gt ?></span></li>
                                </ul>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment" name="op_method" value="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal" name="op_method" value="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="button" name="submit" id="submit" value="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

    <script>
    $(document).ready(function(){           
    $("#submit").on("click", (e) => {
    e.preventDefault();
    var formData = new FormData(oform);
    $.ajax({
    url: "./ajax/order.php",
        method: "POST",
        contentType: false,
        processData: false,
        data: formData,
        success: function (res) {
            alert(res);
            if ($msg= "run") {
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
            } else if ($msg= "not run") {
            alert("DATA HAS not BEEN INSERTD");
            } else {
            Swal.fire(
                'Your work has been saved',
            )
            }
        }
        });
    });
})
    </script>
<?php
include_once('./include/footer.php');
?>