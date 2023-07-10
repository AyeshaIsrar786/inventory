<?php 

include_once('../include/conn.php');

					$sql = "SELECT * FROM `supplier`";
          $exe=mysqli_query($conn,$sql);
          while($row=mysqli_fetch_array($exe)){
					?>
                          <tr>
                            <td><?php echo $row['sname'] ?></td>
                            <td><?php echo $row['semail'] ?></td>
                            <td><?php echo $row['snum'] ?></td>
                            <td><?php echo $row['sdate'] ?></td>
                            <td><a class="btn btn-success" href="update2.php?upid=<?php echo $row['sid'];?>">UPDATE</a></td>
                            <td><button class="btn btn-danger delete" data-del="<?php echo $row['sid'];?>">DELETE</button></td>
                          </tr>
          <?php } ?>                    