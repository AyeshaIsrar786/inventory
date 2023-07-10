<?php
include_once("conn.php");
//session_start();
$email = $_SESSION['email'];
$run_qry = "SELECT * FROM `admin` WHERE `email`='$email'";
$exe_qry=mysqli_query($conn,$run_qry);
$arow = mysqli_fetch_array($exe_qry);
$rid = $arow['arole'];
$run1 = "SELECT * FROM `u_management` WHERE `rname`='$rid'";
$exe1=mysqli_query($conn,$run1); 
$row = mysqli_fetch_assoc($exe1);
@$scat = unserialize($row['rmcat']);
@$s_subcat = unserialize($row['rsubcat']);
@$s_sup = unserialize($row['rsup']);
@$sqty = unserialize($row['rqty']);
@$spro = unserialize($row['rpro']);
@$sorder = unserialize($row['rorder']);
@$suser = unserialize($row['ruser']);
@$spos = unserialize($row['rpos']);
@$srole = unserialize($row['rrole']);
?>

<div class="main-sidebar sidebar-style-2">
<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="index.php"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
        class="logo-name">Inventory</span>
    </a>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-header">Main</li>
    <li class="dropdown">
      <a href="index.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
    </li>           
    <li class="dropdown">
    <?php
        if ($scat != "") {
          if (in_array("category", @$scat)) {
        ?>
      <a href="#" class="menu-toggle nav-link has-dropdown"><i
          data-feather="layout"></i><span>Category</span></a>
      <ul class="dropdown-menu">
      <?php
              if (in_array('addcat', $scat)) {
              ?>
        <li><a class="nav-link" href="addcategory.php">Add New Category</a></li>
        <?php
              }
              if (in_array("viewcat", $scat)) {
              ?>
        <li><a class="nav-link" href="viewcategory.php">View Category</a></li>
        <?php } ?> 
      </ul>
        <?php 
            } 
          } 
        ?>
    </li>
    <li class="dropdown">
    <?php
        if ($s_subcat != "") {
          if (in_array("subcategory", $s_subcat)) {
        ?>
      <a href="#" class="menu-toggle nav-link has-dropdown"><i
          data-feather="copy"></i><span>Sub Category</span></a>
      <ul class="dropdown-menu">
      <?php
              if (in_array("addsubcat", $s_subcat)) {
              ?>
        <li><a class="nav-link" href="addsubcategory.php">Add New Sub Category</a></li>
        <?php
              }
              if (in_array("viewsubcat", $s_subcat)) {
              ?>
        <li><a class="nav-link" href="viewsubcategory.php">View Sub Category</a></li>
        <?php } ?>
      </ul>
      <?php 
      }
      }
      ?>
    </li>
    <li class="dropdown">
    <?php
        if ($s_sup != "") {
          if (in_array("supplier", @$s_sup)) {
        ?>
      <a href="#" class="menu-toggle nav-link has-dropdown"><i
          data-feather="command"></i><span>Supplier</span></a>
      <ul class="dropdown-menu">
      <?php
              if (in_array("addsupplier", $s_sup)) {
              ?>
        <li><a class="nav-link" href="addsupplier.php">Add New Supplier</a></li>
        <?php
              }
              if (in_array("viewsupplier", $s_sup)) {
              ?>
        <li><a class="nav-link" href="viewsupplier.php">View Supplier</a></li>
        <?php } ?>
      </ul>
      <?php
      }
      }
      ?>
    </li>
    <li class="dropdown">
    <?php
        if ($sqty != "") {
          if (in_array("quantity", @$sqty)) {
        ?>
      <a href="#" class="menu-toggle nav-link has-dropdown"><i
          data-feather="sliders"></i><span>Quantity</span></a>
      <ul class="dropdown-menu">
      <?php
              if (in_array("addqty", $sqty)) {
              ?>
        <li><a class="nav-link" href="addquantity.php">Add New Quantity</a></li>
        <?php
              }
              if (in_array("viewqty", $sqty)) {
              ?>
        <li><a class="nav-link" href="viewquantity.php">View Quantity</a></li>
        <?php } ?>
      </ul>
      <?php
      }
      }
      ?>
    </li>
    <li class="dropdown">
    <?php
        if ($spro != "") {
          if (in_array("product", @$spro)) {
        ?>
      <a href="#" class="menu-toggle nav-link has-dropdown"><i
          data-feather="shopping-bag"></i><span>Product</span></a>
      <ul class="dropdown-menu">
      <?php
              if (in_array("addproduct", $spro)) {
              ?>
        <li><a class="nav-link" href="addproduct.php">Add New Product</a></li>
        <?php
              }
              if (in_array("viewproduct", $spro)) {
              ?>
        <li><a class="nav-link" href="viewproduct.php">View Product</a></li>
        <?php } ?>
      </ul>
      <?php
      }
      }
      ?>
    </li>
    <li class="dropdown">
    <?php
        if ($sorder != "") {
          if (in_array("order", @$sorder)) {
        ?>
      <a href="#" class="menu-toggle nav-link has-dropdown"><i
          data-feather="briefcase"></i><span>Order</span></a>
      <ul class="dropdown-menu">
      <?php
              if (in_array("vieworder", $sorder)) {
              ?>
        <li><a class="nav-link" href="vieworder.php">View Order</a></li>
        <?php } ?>
      </ul>
    <?php 
    } 
    } 
    ?>
    </li>
    <li class="dropdown">
    <?php
        if ($suser != "") {
          if (in_array("user", @$suser)) {
        ?>
      <a href="#" class="menu-toggle nav-link has-dropdown"><i
          data-feather="user-check"></i><span>Registered User</span></a>
      <ul class="dropdown-menu">
      <?php
              if (in_array("adduser", $suser)) {
              ?>
        <li><a class="nav-link" href="adduser.php">Add User</a></li>
        <?php
              }
              if (in_array("viewuser", $suser)) {
              ?>
        <li><a class="nav-link" href="viewuser.php">View User</a></li>
        <?php } ?>
      </ul>
    <?php 
    } 
    } 
    ?>
    </li>
    <li class="dropdown">
    <?php
        if ($spos != "") {
          if (in_array("pos", @$spos)) {
        ?>
      <a href="#" class="menu-toggle nav-link has-dropdown"><i
          data-feather="grid"></i><span>POS</span></a>
      <ul class="dropdown-menu">
      <?php
              if (in_array("addpos", $spos)) {
              ?>
        <li><a class="nav-link" href="addpos.php">Add POS</a></li>
        <?php
              }
              if (in_array("viewpos", $spos)) {
              ?>
        <li><a class="nav-link" href="viewpos.php">View POS</a></li>
        <?php } ?>
      </ul>
      <?php 
      } 
      } 
      ?>
    </li>
    <li class="dropdown">
    <?php
        if ($srole != "") {
          if (in_array("u_management", @$srole)) {
        ?>
      <a href="#" class="menu-toggle nav-link has-dropdown"><i
          data-feather="map"></i><span>User Management</span></a>
      <ul class="dropdown-menu">
      <?php
              if (in_array("addrole", $srole)) {
              ?>
        <li><a class="nav-link" href="addrole.php">Add Role</a></li>
        <?php
              }
              if (in_array("viewrole", $srole)) {
              ?>
        <li><a class="nav-link" href="viewrole.php">View Role</a></li>
        <?php
              }
              if (in_array("addadmin", $srole)) {
              ?>
        <li><a class="nav-link" href="addadmin.php">Add User</a></li>
        <?php
              }
              if (in_array("viewadmin", $srole)) {
              ?>
        <li><a class="nav-link" href="viewadmin.php">View User</a></li>
        <?php } ?>
      </ul>
      <?php
      }
    }
      ?>
    </li>
    <li><a class="nav-link" href="blank.php"><i data-feather="file"></i><span>Blank Page</span></a></li>
</ul>
</aside>
</div>  