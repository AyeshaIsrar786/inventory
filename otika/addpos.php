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
            <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                    <h4>Product Table</h4>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tr>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Quantity</th>
                            <th>ADD</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM `product`";
                        $exe=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($exe)){
					    ?>
                        <tr>
                            <td><?php echo $row['pcode'] ?></td>
                            <td><?php echo $row['pname'] ?></td>
                            <td><?php echo $row['srp'] ?></td>
                            <td><?php echo $row['stock'] ?></td>
                            <td class="quantity__item">
                            <input type="hidden" id="pid" name="pid" value="<?php echo $row['pid'] ?>">
                            <input type="hidden" id="pcode" name="pcode" value="<?php echo $row['pcode'] ?>">
                            <input type="hidden" id="srp" name="srp" value="<?php echo $row['srp'] ?>">
                            <div class="input-group plus-minus-input">
                            <input class="input-group-field" type="number" name="quantity" id="field" value="<?php echo $row['qty'] ?>">
                            </div>
                            </td>
                            <td><button class="btn btn-success add" id="add">ADD</button></td>
                        </tr>
                        <?php } ?>
                    </table>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
            <form id="posform">
                <div class="card-header">
                <h4>POS Form</h4>
                </div>
                <div class="card-body">
                <div class="form-group">
                    <label>Invoice Number</label>
                    <input type="number" class="form-control" id="uinvoice" name="uinvoice" required="" readonly>
                </div>
                <div class="form-group mb-0">
                    <label>User Name</label>
                    <input type="text" class="form-control" id="u_name" name="u_name" required="">
                </div>
                <div class="form-group mb-0">
                    <label>Contact #</label>
                    <input type="number" class="form-control" id="uph" name="uph" required="">
                </div>
                <div class="form-group mb-0">
                <?php
                        $sql = "SELECT * FROM `pos_cart`";
                        $exe=mysqli_query($conn,$sql);
                        $gt=0;
                        while($row=mysqli_fetch_array($exe)){
                            $gt=$gt+$row['tprice'];
                        }
					    ?>
                    <label>Total Price</label>
                    <input type="text" class="form-control" id="t_price" name="t_price" required="" value="<?php
                    if($gt>0){
                                echo $gt;
                            } 
                            else{
                            echo 0;
                            }
                            ?>" 
                    readonly>
                </div>
                <div class="form-group mb-0">
                    <label>Payment Status</label>
                    <select class="form-control" name="ustatus">
                        <option value="#">Select Status</option>
                        <option id="pending" value="pending">Pending</option>
                        <option id="complete" value="complete"> Complete</option>
                    </select>
                </div>
            </div>
                <div class="card-footer text-right">
                <input type="button" name="submit" id="sub" class="btn btn-primary" value="submit">
                </div>
            </form>
            </div>
                <div class="card">
                <div class="card-header">
                    <h4>Cart Table</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <thead>
                        <tr>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Stock</th>
                            <th>Total Price</th>
                            <th>Email</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody id="data">
                        <?php
                        $psql = "SELECT * FROM `pos_cart`";
                        $pexe=mysqli_query($conn,$psql);
                        $gt=0;
                        while($prow=mysqli_fetch_array($pexe)){
					    ?>
                        <tr>
                            <td><?php echo $prow['pcode'] ?></td>
                            <td><?php echo $prow['pname'] ?></td>
                            <td><?php echo $prow['rprice'] ?></td>
                            <td class="quantity__item">
                                <div class="quantity">
                                    <div class="pro-qty-2">
                                    <input type="hidden" id="pcid" name="pcid" value="<?php echo $prow['pcid'] ?>">
                                    <input type="hidden" id="rprice" name="rprice" value="<?php echo $prow['rprice'] ?>">
                                        <input type="number" id="field1" value="<?php echo $prow['qty'] ?>">
                                    </div>
                                </div></td>
                            <td><?php echo $prow['stock'] ?></td>
                            <td id="a"><?php echo $prow['tprice'] ?></td>
                            <td><?php echo $prow['posemail'] ?></td>
                            <td><button class="btn btn-danger remove" data-del="<?php echo $prow['pcid'];?>">Remove</button></td>
                            <?php $gt=$gt+$prow['tprice'] ?>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="3" style="font-size:20px" cellpadding="5"><?php echo "Total"; ?></td>
                            <td colspan="3" style="font-size:20px" cellpadding="5" id="tp"><?php
                            if($gt>0){
                                echo $gt;
                            } 
                            else{
                            echo 0;
                            }
                            ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function(){

    //  _________________ADD TO POS_CART & PRODUCT QTY___________________________
    $(document).on("click",".add",function(e) {
    e.preventDefault();

    var myform=$(this).closest("tr");
    var pid= myform.find("#pid").val();
    var pcode= myform.find("#pcode").val();
    var srp= myform.find("#srp").val();
    var qty=myform.find("#field").val();

    $.ajax({
    url:"./ajax/insertpos.php",
    method:"POST",
    data:{
        pid:pid,
        pcode:pcode,
        srp:srp,
        qty:qty
    },
    success:function(res) {
            alert(res);
            if (res == 1) {
                window.location.reload();
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
                title: 'INSERTED'
            })
            } else if (res == 2) {
            alert("not INSERTD");
            } else {
                Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Not Saved! Try Again',
                showConfirmButton: false,
                timer: 1500
            })
            }
        }
        });
    })

    //  _________________POS_CART INC/DEC___________________________
    $(document).ready(function(){
                $(".dec,.inc").on("click",function(){
                    var $btn1=$(this);
                    var data=$(this).closest("td");

                    var pcid=data.find("#pcid").val();
                    var rprice=data.find("#rprice").val();

                    if($btn1.hasClass('inc')){
                        var value=data.find("#field1").val();
                        value++;
                    }
                    else{
                        var value=data.find("#field1").val();
                        if(value>1){
                            value--;
                        }
                        else{
                            alert("no val");
                            value=value;
                        }
                    }
                    $.ajax({
                    url:"./ajax/insertpos.php",
                    method:"POST",
                    data: {
                        pcid:pcid,
                        rprice:rprice,
                        qty:value
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

    //  _________________POS_CART DEL___________________________
    $(document).ready(function(){
        $(document).on("click", ".remove", function () {
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
                            url: "./ajax/posdel.php",
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
    })

    //  _________________INVOICE NUM___________________________
    invoice_num();
    function invoice_num(){
    $.ajax({
        url: "./ajax/pos_invoicenum.php",
        method: "POST",
        data:{
            invoicenum:'mynum'
        },
        success: function (res) {
        alert(res);
        $("#uinvoice").val(res);   
        }
})
}

// ===========================POS_FORM TPRICE==========================

   // load_price();
   // function load_price(){
   //     $.ajax({
   //         url: "./ajax/addpos.php",
  //         method: "POST",
   //         data: "cart",
   //         success: function (res) { 
  //         $("#data").html(res);
   //         var tp= $("#tp").html();
   //         $("#t_price").val(tp);       
   //         }
    // }

// $(document).ready(function(){
   // $("#data").change(function(){
    //    var tp= $("#tp").html();
    //     $.ajax({
    //         method: "POST";
    //         data: {"t_price",t_price},
    //         success: function(res){
    //             $("#t_price").val(tp);
    //         }
    //     })
   // })
// })

//  _________________ADD POS_FORM VALUES + VALIDATION___________________________
    $(document).ready(function(){
    $("#sub").on("click", (e) => {
    e.preventDefault();

    var formData = new FormData(posform);
        //var myform=$(this).closest("posform");
        // var uinvoice= myform.find("#uinvoice").val();
        // var u_name= myform.find("#u_name").val();
        // var uph= myform.find("#uph").val();
        // var t_price= myform.find("#t_price").val();
        // var ustatus= myform.find("#ustatus").val();

        $.ajax({
        url: "./ajax/posform.php",
        method: "POST",
        contentType: false,
        processData: false,
        data: formData,
        // data:{
        //     uinvoice:uinvoice,
        //     u_name:u_name,
        //     uph:uph,
        //     t_price:t_price,
        //     ustatus:ustatus
        // },
        success: function (res) {
            alert(res);
            if (res == 5) {
                window.location.reload();
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
            } else if (res == 6) {
            alert("DATA HAS not BEEN INSERTD");
            } else {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Not Saved',
                showConfirmButton: false,
                timer: 1500
            })
            }
        }
        });
    });
})
//  ______________________________END____________________________________
})

</script>

<script src="./assets/js/qty.js"></script>
<?php
include_once('./include/footer.php');
?>
