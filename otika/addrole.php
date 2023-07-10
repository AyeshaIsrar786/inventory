<?php
session_start();
if(!$_SESSION['email']){
header("location:auth-login.php");
}
?>
<?php
include_once('./include/head.php');
include_once('./include/sidebar.php');
?>
<style>
  li{
    list-style:none;
  }
</style>
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <form id="data" >
              <div class="card-header">
                <h4>Add New Role</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Name<span style="color:red;">*</span></label>
                  <input type="text" name="rname" id="rname" class="form-control" required="">
                  <!-- <span id="span_rname" style="color:red;"></span> -->
                </div>
                <div class="form-group mb-0">
                <label>Access<span style="color:red;">*</span></label>
                <select class="form-control" name="raccess" id="raccess">
                <option>Select Access</option>
                <option id="all" value="all">All</option>
                <option id="custom" value="custom">Custom</option>
                </select>            
                </div>
              </div>
              <div class="hide">
            <div class="row">

              <div class="col-lg-6">
                <div id="category">
                <input type="checkbox" name="mc[]" id="mcat" class="rcat" value="category">Main Category
                <ul>
                  <li><input type="checkbox" name="mc[]" class="cat" id="addcat" value="addcat">Add Category</li>
                  <li><input type="checkbox" name="mc[]" class="cat" id="viewcat" value="viewcat">View Category</li>
                  <li><input type="checkbox" name="mc[]" class="cat" id="updatecat" class="updatecat" value="updatecat" disabled>Update Category</li>
                  <li><input type="checkbox" name="mc[]" class="cat" id="deletecat" class="deletecat" value="deletecat" disabled>Delete Category</li>
                </ul>
                </div>
              </div>

              <div class="col-lg-6">
                <div id="subcategory">
                <input type="checkbox" name="sc[]" id="subcat" class="rscat" value="subcategory">SubCategory
                <ul>
                  <li><input type="checkbox" name="sc[]" class="scat" id="addsubcat" value="addsubcat">Add SubCategory</li>
                  <li><input type="checkbox" name="sc[]" class="scat" id="viewsubcat" value="viewsubcat">View SubCategory</li>
                  <li><input type="checkbox" name="sc[]" class="scat" id="updatesubcat" class="updatesubcat" value="updatesubcat" disabled>Update SubCategory</li>
                  <li><input type="checkbox" name="sc[]" class="scat" id="deletesubcat" class="deletesubcat" value="deletesubcat" disabled>Delete SubCategory</li>
                </ul>
                </div>
              </div> 

              <div class="col-lg-6">
                <div id="supplier">
                <input type="checkbox" name="s[]" id="supplier" class="rsup" value="supplier">Supplier
                <ul>
                  <li><input type="checkbox" name="s[]" class="sup" id="addsupplier" value="addsupplier">Add Supplier</li>
                  <li><input type="checkbox" name="s[]" class="sup" id="viewsupplier" value="viewsupplier">View Supplier</li>
                  <li><input type="checkbox" name="s[]" class="sup" id="updatesupplier" class="updatesupplier" value="updatesupplier" disabled>Update Supplier</li>
                  <li><input type="checkbox" name="s[]" class="sup" id="deletesupplier" class="deletesupplier" value="deletesupplier" disabled>Delete Supplier</li>
                </ul>
                </div>
              </div> 
                
              <div class="col-lg-6">
                <div id="quantity">
                <input type="checkbox" name="qty[]" id="qty" class="rqty" value="quantity">Quantity
                <ul>
                  <li><input type="checkbox" name="qty[]" class="qty" id="addqty" value="addqty">Add Quantity</li>
                  <li><input type="checkbox" name="qty[]" class="qty" id="viewqty" value="viewqty">View Quantity</li>
                  <li><input type="checkbox" name="qty[]" class="qty" id="updateqty" class="updateqty" value="updateqty" disabled>Update Quantity</li>
                  <li><input type="checkbox" name="qty[]" class="qty" id="deleteqty" class="deleteqty" value="deleteqty" disabled>Delete Quantity</li>
                </ul>
                </div>
              </div> 

              <div class="col-lg-6">
                <div id="product">
                <input type="checkbox" name="p[]" id="product" class="rpro" value="product">Product
                <ul>
                  <li><input type="checkbox" name="p[]" class="pro" id="addproduct" value="addproduct">Add Product</li>
                  <li><input type="checkbox" name="p[]" class="pro" id="viewproduct" value="viewproduct">View Product</li>
                  <li><input type="checkbox" name="p[]" class="pro" id="updateproduct" class="updateproduct" value="updateproduct" disabled>Update Product</li>
                  <li><input type="checkbox" name="p[]" class="pro" id="deleteproduct" class="deleteproduct" value="deleteproduct" disabled>Delete Product</li>
                </ul>
                </div>
              </div> 

              <div class="col-lg-6">
                <div id="order">
                <input type="checkbox" name="order[]" id="order" class="rord" value="order">Order
                <ul>
                  <li><input type="checkbox" name="order[]" class="ord" id="vieworder" value="vieworder">View Order</li>
                  <!-- <li><input type="checkbox"></li> -->
                  <li><input type="checkbox" name="order[]" class="ord" id="invoiceorder" class="invoiceorder" value="invoiceorder" disabled>Invoice</li>
                  <li><input type="checkbox" name="order[]" class="ord" id="deleteorder" class="deleteorder" value="deleteorder" disabled>Delete Order</li>
                </ul>
                </div>
              </div> 

              <div class="col-lg-6">
                <div id="user">
                <input type="checkbox" name="user[]" id="user" class="rur" value="user">User
                <ul>
                  <li><input type="checkbox" name="user[]" class="ur" id="adduser" value="adduser">Add User</li>
                  <li><input type="checkbox" name="user[]" class="ur" id="viewuser" value="viewuser">View User</li>
                  <li><input type="checkbox" name="user[]" class="ur" id="updateuser" class="updateuser" value="updateuser" disabled>Update User</li>
                  <li><input type="checkbox" name="user[]" class="ur" id="deleteuser" class="deleteuser" value="deleteuser" disabled>Delete User</li>
                </ul>
                </div>
              </div> 

              <div class="col-lg-6">
                <div id="pos">
                <input type="checkbox" name="pos[]" id="pos" class="rpos" value="pos">POS
                <ul>
                  <li><input type="checkbox" name="pos[]" class="pos" id="addpos" value="addpos">Add POS</li>
                  <li><input type="checkbox" name="pos[]" class="pos" id="viewpos" value="viewpos">View POS</li>
                  <li><input type="checkbox" name="pos[]" class="pos" id="updatepos" class="updatepos" value="updatepos" disabled>Update POS</li>
                  <li><input type="checkbox" name="pos[]" class="pos" id="deletepos" class="deletepos" value="deletepos" disabled>Delete POS</li>
                </ul>
                </div>
              </div> 

              <div class="col-lg-6">
                <div id="u_management">
                <input type="checkbox" name="u_management[]" id="u_management" class="ru_management" value="u_management">User Management
                <ul>
                  <li><input type="checkbox" name="u_management[]" class="u_management" id="addrole" value="addrole">Add Role</li>
                  <li><input type="checkbox" name="u_management[]" class="u_management" id="viewrole" value="viewrole">View Role</li>
                  <li><input type="checkbox" name="u_management[]" class="u_management" id="updaterole" class="updaterole" value="updaterole" disabled>Update Role</li>
                  <li><input type="checkbox" name="u_management[]" class="u_management" id="deleterole" class="deleterole" value="deleterole" disabled>Delete Role</li>
                  <li><input type="checkbox" name="u_management[]" class="u_management" id="addadmin" value="addadmin">Add Admin</li>
                  <li><input type="checkbox" name="u_management[]" class="u_management" id="viewadmin" value="viewadmin">View Admin</li>
                  <li><input type="checkbox" name="u_management[]" class="u_management" id="updateadmin" class="updateadmin" value="updateadmin" disabled>Update Admin</li>
                  <li><input type="checkbox" name="u_management[]" class="u_management" id="deleteadmin" class="deleteadmin" value="deleteadmin" disabled>Delete Admin</li>
                
                </ul>
                </div>
              </div> 

            </div>
          </div>
              <div class="card-footer text-right">
                <input type="button" name="submit" id="sub" class="btn btn-primary" value="Submit">
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
    $(".hide").hide();

    $('#raccess').on("change", (e) => {
      let access = $('#raccess').val();
      if(access=="custom"){
        $(".hide").show();
      }
      else{
      $(".hide").hide();
      }
      if (access == "all") {
                $("#mcat").prop('checked', true);
                $(".cat").prop('checked', true);
                $("#updatecat").removeAttr("disabled");
                $("#deletecat").removeAttr("disabled");

                $("#subcat").prop('checked', true)
                $(".scat").prop('checked', true);
                $("#updatesubcat").removeAttr("disabled");
                $("#deletesubcat").removeAttr("disabled");

                $("#suplier").prop('checked', true)
                $(".sup").prop('checked', true);
                $("#updatesupplier").removeAttr("disabled");
                $("#deletesupplier").removeAttr("disabled");

                $("#qty").prop('checked', true)
                $(".qty").prop('checked', true);
                $("#updateqty").removeAttr("disabled");
                $("#deleteqty").removeAttr("disabled");

                $("#product").prop('checked', true)
                $(".pro").prop('checked', true);
                $("#updateproduct").removeAttr("disabled");
                $("#deleteproduct").removeAttr("disabled");

                $("#order").prop('checked', true)
                $(".ord").prop('checked', true);
                $("#invoiceorder").removeAttr("disabled");
                $("#deleteorder").removeAttr("disabled");

                $("#user").prop('checked', true)
                $(".ur").prop('checked', true);
                $("#updateuser").removeAttr("disabled");
                $("#deleteuser").removeAttr("disabled");

                
                $("#pos").prop('checked', true)
                $(".pos").prop('checked', true);
                $("#updatepos").removeAttr("disabled");
                $("#deletepos").removeAttr("disabled");

                $("#u_management").prop('checked', true)
                $(".u_management").prop('checked', true);
                $("#updaterole").removeAttr("disabled");
                $("#deleterole").removeAttr("disabled");
                $("#updateadmin").removeAttr("disabled");
                $("#deleteadmin").removeAttr("disabled");

      }

      if (access != "all") {          
                $("#updatecat").attr("disabled");
                $("#deletecat").attr("disabled");
                
                $("#updatesubcat").attr("disabled");
                $("#deletesubcat").attr("disabled");
          
                $("#updatesupplier").attr("disabled");
                $("#deletesupplier").attr("disabled");

                $("#updateqty").attr("disabled");
                $("#deleteqty").attr("disabled");
        
                $("#updateproduct").attr("disabled");
                $("#deleteproduct").attr("disabled");

                $("#invoiceorder").attr("disabled");
                $("#deleteorder").attr("disabled");

                $("#updateuser").attr("disabled");
                $("#deleteuser").attr("disabled");
  
                $("#updatepos").attr("disabled");
                $("#deletepos").attr("disabled");
        
                $("#updaterole").attr("disabled");
                $("#deleterole").attr("disabled");
                $("#updateadmin").attr("disabled");
                $("#deleteadmin").attr("disabled");
            }
    })

    //  CHECKBOXES

    //  CATEGORY

    $(".cat").on("change", function(e) {
            if ($(".cat:checked").length > 0) {
                $('#mcat').prop('checked', true);
            } else {
                $('#mcat').prop('checked', false);
            }
        })
        $("#mcat").on("change", function(e) {
            e.preventDefault();
            if ($('#mcat').is(':checked') == true) {
                $(".cat").prop('checked', true);
            } else {
                $(".cat").prop('checked', false);
                $("#updatecat").attr('disabled', true);
                $("#deletecat").attr('disabled', true);
            }
        });
        $("#viewcat").on("change", function(e) {
            e.preventDefault();
            if ($("#viewcat").is(":checked") == true) {
                $("#updatecat").removeAttr("disabled");
                $("#deletecat").removeAttr("disabled");
            } else {
                $("#updatecat").attr('disabled', true);
                $("#deletecat").attr('disabled', true);
            }
    })

    //  SUBCATEGORY
      
    $(".scat").on("change", function(e) {
            if ($(".scat:checked").length > 0) {
                $('.rscat').prop('checked', true);
            } else {
                $('.rscat').prop('checked', false);
            }
        })
        $(".rscat").on("change", function(e) {
            e.preventDefault();
            if ($('.rscat').is(':checked') == true) {
                $(".scat").prop('checked', true);
            } else {
                $(".scat").prop('checked', false);
                $("#updatesubcat").attr('disabled', true);
                $("#deletesubcat").attr('disabled', true);
            }
        });
        $("#viewsubcat").on("change", function(e) {
            e.preventDefault();
            if ($("#viewsubcat").is(":checked") == true) {
                $("#updatesubcat").removeAttr("disabled");
                $("#deletesubcat").removeAttr("disabled");
            } else {
                $("#updatesubcat").attr('disabled', true);
                $("#deletesubcat").attr('disabled', true);
            }
    })

    //   SUPPLIER

    $(".sup").on("change", function(e) {
            if ($(".sup:checked").length > 0) {
                $('.rsup').prop('checked', true);
            } else {
                $('.rsup').prop('checked', false);
            }
        })
        $(".rsup").on("change", function(e) {
            e.preventDefault();
            if ($('.rsup').is(':checked') == true) {
                $(".sup").prop('checked', true);
            } else {
                $(".sup").prop('checked', false);
                $("#updatesupplier").attr('disabled', true);
                $("#deletesupplier").attr('disabled', true);
            }
        });
        $("#viewsupplier").on("change", function(e) {
            e.preventDefault();
            if ($("#viewsupplier").is(":checked") == true) {
                $("#updatesupplier").removeAttr("disabled");
                $("#deletesupplier").removeAttr("disabled");
            } else {
                $("#updatesupplier").attr('disabled', true);
                $("#deletesupplier").attr('disabled', true);
            }
    })

    // Quantity
    $(".qty").on("change", function(e) {
            if ($(".qty:checked").length > 0) {
                $('.rqty').prop('checked', true);
            } else {
                $('.rqty').prop('checked', false);
            }
        })
        $(".rqty").on("change", function(e) {
            e.preventDefault();
            if ($('.rqty').is(':checked') == true) {
                $(".qty").prop('checked', true);
            } else {
                $(".qty").prop('checked', false);
                $("#updateqty").attr('disabled', true);
                $("#deleteqty").attr('disabled', true);
            }
        });
        $("#viewqty").on("change", function(e) {
            e.preventDefault();
            if ($("#viewqty").is(":checked") == true) {
                $("#updateqty").removeAttr("disabled");
                $("#deleteqty").removeAttr("disabled");
            } else {
                $("#updateqty").attr('disabled', true);
                $("#deleteqty").attr('disabled', true);
            }
    })

    // Product
    
    $(".pro").on("change", function(e) {
            if ($(".pro:checked").length > 0) {
                $('.rpro').prop('checked', true);
            } else {
                $('.rpro').prop('checked', false);
            }
        })
        $(".rpro").on("change", function(e) {
            e.preventDefault();
            if ($('.rpro').is(':checked') == true) {
                $(".pro").prop('checked', true);
            } else {
                $(".pro").prop('checked', false);
                $("#updateproduct").attr('disabled', true);
                $("#deleteproduct").attr('disabled', true);
            }
        });
        $("#viewproduct").on("change", function(e) {
            e.preventDefault();
            if ($("#viewproduct").is(":checked") == true) {
                $("#updateproduct").removeAttr("disabled");
                $("#deleteproduct").removeAttr("disabled");
            } else {
                $("#updateproduct").attr('disabled', true);
                $("#deleteproduct").attr('disabled', true);
            }
    })

    // Order

    $(".ord").on("change", function(e) {
            if ($(".ord:checked").length > 0) {
                $('.rord').prop('checked', true);
            } else {
                $('.rord').prop('checked', false);
            }
        })
        $(".rord").on("change", function(e) {
            e.preventDefault();
            if ($('.rord').is(':checked') == true) {
                $(".ord").prop('checked', true);
            } else {
                $(".ord").prop('checked', false);
                $("#invoiceorder").attr('disabled', true);
                $("#deleteorder").attr('disabled', true);
            }
        });
        $("#vieworder").on("change", function(e) {
            e.preventDefault();
            if ($("#vieworder").is(":checked") == true) {
                $("#invoiceorder").removeAttr("disabled");
                $("#deleteorder").removeAttr("disabled");
            } else {
                $("#invoiceorder").attr('disabled', true);
                $("#deleteorder").attr('disabled', true);
            }
    })

    // REGISTER USER

    $(".ur").on("change", function(e) {
            if ($(".ur:checked").length > 0) {
                $('rur').prop('checked', true);
            } else {
                $('rur').prop('checked', false);
            }
        })
        $("rur").on("change", function(e) {
            e.preventDefault();
            if ($('rur').is(':checked') == true) {
                $(".ur").prop('checked', true);
            } else {
                $(".ur").prop('checked', false);
                $("#updateuser").attr('disabled', true);
                $("#deleteuser").attr('disabled', true);
            }
        });
        $("#viewuser").on("change", function(e) {
            e.preventDefault();
            if ($("#viewuser").is(":checked") == true) {
                $("#updateuser").removeAttr("disabled");
                $("#deleteuser").removeAttr("disabled");
            } else {
                $("#updateuser").attr('disabled', true);
                $("#deleteuser").attr('disabled', true);
            }
    })

    // POS

    $(".pos").on("change", function(e) {
            if ($(".pos:checked").length > 0) {
                $('.rpos').prop('checked', true);
            } else {
                $('.rpos').prop('checked', false);
            }
        })
        $(".rpos").on("change", function(e) {
            e.preventDefault();
            if ($('.rpos').is(':checked') == true) {
                $(".pos").prop('checked', true);
            } else {
                $(".pos").prop('checked', false);
                $("#updatepos").attr('disabled', true);
                $("#deletepos").attr('disabled', true);
            }
        });
        $("#viewpos").on("change", function(e) {
            e.preventDefault();
            if ($("#viewpos").is(":checked") == true) {
                $("#updatepos").removeAttr("disabled");
                $("#deletepos").removeAttr("disabled");
            } else {
                $("#updatepos").attr('disabled', true);
                $("#deletepos").attr('disabled', true);
            }
    })

    // User Management
      
    $(".u_management").on("change", function(e) {
            if ($(".u_management:checked").length > 0) {
                $('.ru_management').prop('checked', true);
            } else {
                $('.ru_management').prop('checked', false);
            }
        })
        $(".ru_management").on("change", function(e) {
            e.preventDefault();
            if ($('.ru_management').is(':checked') == true) {
                $(".u_management").prop('checked', true);
            } else {
                $(".u_management").prop('checked', false);
                $("#updaterole").attr('disabled', true);
                $("#deleterole").attr('disabled', true);
                $("#updateadmin").attr('disabled', true);
                $("#deleteadmin").attr('disabled', true);
            }
        });
        $("#viewrole").on("change", function(e) {
            e.preventDefault();
            if ($("#viewrole").is(":checked") == true) {
                $("#updaterole").removeAttr("disabled");
                $("#deleterole").removeAttr("disabled");
            } else {
                $("#updaterole").attr('disabled', true);
                $("#deleterole").attr('disabled', true);
            }
    })
    $("#viewadmin").on("change", function(e) {
            e.preventDefault();
            if ($("#viewadmin").is(":checked") == true) {
                $("#updateadmin").removeAttr("disabled");
                $("#deleteadmin").removeAttr("disabled");
            } else {
                $("#updateadmin").attr('disabled', true);
                $("#deleteadmin").attr('disabled', true);
            }
    })

// FORM SUBMISSION
    $("#sub").on("click", (e) => {
        e.preventDefault();
        var formData = new FormData(data);
        $.ajax({
          url: "./ajax/insertrole.php",
          method: "POST",
          contentType: false,
          processData: false,
          data: formData,
          success: function (res) {
            alert(res);
            if (res == 1) {
              window.location.assign("viewrole.php");
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
    })


//});  
</script>

<?php
include_once('./include/footer.php');
?>