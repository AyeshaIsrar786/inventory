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
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4>Roles</h4>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                    <tr>
                    <th>Sr#</th>
                    <th>Name</th>
                    <th>Access</th>
                    <th>Date</th>
                    <th>View</th>
                    <?php
                    if(in_array("update_role", $srole)) {
                        ?>
                        <th>Update</th>
                        <?php
                       }
                       if(in_array("delete_role", $srole)) {
                        ?>
                        <th>Delete</th>
                        <?php
                       }
                        ?>
                    </tr>
                </thead>
                <tbody>

<?php
$qry = "SELECT * FROM `u_management`";
$exe=mysqli_query($conn,$qry);
if ($exe) {
    while ($fet = mysqli_fetch_assoc($exe)) {

        $fetcat = unserialize($fet['rmcat']);
        $fetsubcat = unserialize($fet['rsubcat']);
        $fetsup = unserialize($fet['rsup']);
        $fetqty = unserialize($fet['rqty']);
        $fetpro = unserialize($fet['rpro']);
        $fetorder = unserialize($fet['rorder']);     
        $fetuser = unserialize($fet['ruser']);
        $fetpos = unserialize($fet['rpos']);
        $fetrole = unserialize($fet['rrole']);
?>
        <tr>
            <td><?php echo $fet['rid'] ?></td>
            <td><?php echo $fet['rname'] ?></td>
            <td><?php echo $fet['raccess'] ?></td>
            <td><?php echo $fet['rdate'] ?></td>
            <td>

                <button type="button" class="btn btn-success vbtn" id="vbtn" data-toggle="modal" data-target="#exampleModal" style="text-decoration:none; background-color:green; color:white" data-view="<?php echo $fet['rid'] ?>">
                    View
                </button>
            </td>

            <?php
            if (in_array("update_role", $srole)) {
            ?>
                <td><a class=" btn btn-success" href="./update7.php?upid=<?php echo $fet['rid'] ?>" style="text-decoration:none; background-color:green; color:white;">Update</a>
                </td>
            <?php
           }
           if (in_array("delete_role", $srole)) {
            ?>
                <td><button class="delete btn btn-danger" data-del="<?php echo $fet['rid'] ?> "> Delete</button></td>
            <?php
           }
            ?>
        </tr>
<?php
    }
}
?>
</tbody>
</table>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
<div class=" modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class=" modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Roles</h5>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tableExport" style="width:100%;">

                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>SubCategory</th>
                                    <th>Supplier</th>
                                    <th>Quantity</th>
                                    <th>Product</th>
                                    <th>Order</th>
                                    <th>Users</th>
                                    <th>POS</th>
                                    <th>Roles</th>
                                </tr>
                            </thead>
                            <tbody id="rtable">
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="close">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function () {

    $("#close").on("click", function(e) {
            $("#exampleModal").hide();
            e.preventDefault();
            location.assign("./viewrole.php");
        })

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
            url: "./ajax/getr.php",
            method: "POST",
            data: { mydel: del },
            success: function (res) {
              alert(res);
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

    $(document).on("click", ".vbtn", function(e) {
            var id = $(this).data("view");
            var mid = "id";
            $.ajax({
                url: "./ajax/getr.php",
                method: "POST",
                data: {
                    myid: id,
                    mydata: mid

                },
                success: function(res) {
                    $("#rtable").html(res);
                }
            })
        })

});
</script>
<?php
include_once('./include/footer.php');
?>