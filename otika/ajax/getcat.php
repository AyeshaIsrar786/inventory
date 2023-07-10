<?php
include_once('../include/conn.php');

					$sql = "SELECT * FROM `category`";
              $exe=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_array($exe)){
					?>
                        
                          <tr>
                            <td><?php echo $row['cname'] ?></td>
                            <td><?php echo $row['cdes'] ?></td>
                            <td><?php echo $row['cdate'] ?></td>
                            <td><a type="button" class="btn btn-success" href="update.php?upid=<?php echo $row['cid'];?>">UPDATE</a></td>
                            <td><button class="btn btn-danger delete" data-del="<?php echo $row['cid'];?>">DELETE</button></td>
                          </tr>
                          
                          <?php } ?>