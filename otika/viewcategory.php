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
              <h4>Category</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                  <thead>
                    <tr>
                      <th>Category Name</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody id="record">

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
  integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(document).ready(function () {
      $.ajax({
        url: "./ajax/getcat.php",
        method: "GET",
        success: function (res) {
          $("#record").html(res);
        }
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
            url: "./ajax/delete.php",
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
  });
</script>
<?php
include_once('./include/footer.php');
 ?>