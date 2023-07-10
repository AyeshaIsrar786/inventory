<?php 
include_once('../include/conn.php');

$sql = "SELECT * FROM `subcategory` sc INNER JOIN `category` c ON sc.mc=c.cid";
$exe=mysqli_query($conn,$sql);
while(@$row=mysqli_fetch_array($exe)){
?>
      <tr>
        <td><?php echo $row['cname'] ?></td>
        <td><?php echo $row['scname'] ?></td>
        <td><?php echo $row['scdate'] ?></td>
        <td><a class="btn btn-success" href="update1.php?upid=<?php echo $row['subid'];?>">UPDATE</a></td>
        <td><button class="btn btn-danger delete" data-del="<?php echo $row['subid'];?>">DELETE</button></td>
      </tr>
      <?php } ?>