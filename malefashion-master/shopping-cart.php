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
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <a href="./shop.php">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product Picture</th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Product Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Email</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
@$email=$_SESSION['email'];
	$sql = "SELECT * FROM `cart` WHERE `pemail` = '$email'";
    $exe=mysqli_query($conn,$sql);
    $abc=0;
    $gt=0;
    while($row=mysqli_fetch_array($exe)){
        $abc++;
?>
                        <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="<?php echo '../otika/pic/'.$row['pic'] ?>" alt="">
                                        </div>
                            </td>
                            <td class="product__cart__item">  
                            <div class="product__cart__item__text">
                            <h6><?php echo $row['pname'] ?></h6>         
                            </div></td>
                            
                            <td class="product__cart__item">  
                            <div class="product__cart__item__text">
                            <h6><?php echo $row['pcode'] ?></h6>         
                            </div></td>
                            
                            <td class="product__cart__item">  
                            <div class="product__cart__item__text">
                            <h6><?php echo $row['rprice'] ?></h6>         
                            </div></td>
                            
                            <td class="quantity__item">
                            <input type="hidden" id="cartid" name="cartid" value="<?php echo $row['cartid'] ?>">
                            <input type="hidden" id="rprice" name="rprice" value="<?php echo $row['rprice'] ?>">
                                <div class="quantity">
                                    <div class="pro-qty-2">
                                        <input type="text" id="field" value="<?php echo $row['cqty'] ?>">
                                    </div>
                                </div>
                            </td>
                            
                            <td class="product__cart__item">  
                            <div class="product__cart__item__text">
                            <h6><?php echo $row['tprice'] ?></h6>         
                            </div></td>

                            <td class="product__cart__item">  
                            <div class="product__cart__item__text">
                            <h6><?php echo $row['pemail'] ?></h6>         
                            </div></td>

                            <td><button class="btn btn-danger delete" data-del="<?php echo $row['cartid'];?>">Remove</button></td>

                            <?php $gt=$gt+$row['tprice'] ?>
                        </tr>
                        <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="shop.php">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#" class="delete1"><i class="fa fa-remove"></i>Remove All</a>
                            </div>
                        </div>
                    </div>
                <div class="row mt-4">
                    <div class="col-lg-6 col-md-6 col-sm-6 mt-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mt-4">
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                        <li>Subtotal <span>RS. <?php echo $gt; ?></span></li>  
                        <li>Discount <span>RS. 00</span></li>                     
                        <li>Total <span>RS. <?php echo $gt; ?></span></li>
                        </ul>
                        <a href="./checkout.php" class="primary-btn">Proceed to checkout</a>              
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        $(document).ready(function(){
            $(document).on("click", ".delete", function () {
                var del = $(this).data("del");
                var msg = this;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "./ajax/ajaxshop.php",
                            method: "POST",
                            data: { mydel: del },
                            success: function (res) {
                                if (res == 1) {
                                    $(msg).closest("tr").fadeOut();
                                    Swal.fire(
                                        'Deleted!',
                                        'Your Data has been deleted.',
                                        'success'
                                    )
                                }
                            }
                        });
                    }
                })
            });
            $(document).on("click", ".delete1", function () {
                var msg = this;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "./ajax/ajaxshop.php",
                            method: "POST",
                            data: { myempty: "empty" },
                            success: function (res) {
                                if (res == 1) {
                                    $(msg).closest("table").fadeOut();
                                    Swal.fire(
                                        'Deleted!',
                                        'Your Table has been deleted.',
                                        'success'
                                    )
                                }
                            }
                        });

                    }
                })

            });

            $(document).ready(function(){
                $(".dec,.inc").on("click",function(){
                    var $btn1=$(this);
                    var data=$(this).closest("td");

                    var cartid=data.find("#cartid").val();
                    var rprice=data.find("#rprice").val();

                    if($btn1.hasClass('inc')){
                        var value=data.find("#field").val();
                        value++;
                    }
                    else{
                        var value=data.find("#field").val();
                        if(value>1){
                            value--;
                        }
                        else{
                            alert("no val");
                            value=value;
                        }
                    }
                    $.ajax({
                    url:"./ajax/ajaxshop.php",
                    method:"POST",
                    data: {
                        cartid:cartid,
                        rprice:rprice,
                        cqty:value
                    },
                    success:function(res) {
                        alert(res);
                        if(res==10){
                            window.location.reload();
                        }
                        else{
                        alert("error");
                    }
                    }
                    })
                })
            })
        })
        </script>

<?php include_once('./include/footer.php') ?>