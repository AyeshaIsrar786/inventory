<?php 
include_once('../include/conn.php');
			$sql = "SELECT * FROM `pos_info` ";
            $exe=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($exe)){
					?>
                        
                          <tr>
                          <td><?php echo $row['uinvoice'] ?></td>
                            <td><?php echo $row['u_name'] ?></td>
                            <td><?php echo $row['uph'] ?></td>
                            <td><?php echo $row['t_price'] ?></td>
                            <td><?php echo $row['ustatus'] ?></td>
                            <td><?php echo $row['udate'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><a type="button" class="btn btn-primary" href="invoice1.php?uinvoice=<?php echo $row['uinvoice'];?>">Invoice</a></td>
                            <td><a type="button" class="btn btn-success" href="update6.php?upid=<?php echo $row['iid'];?>">UPDATE</a></td>
                            <td><button class="btn btn-danger delete" data-del="<?php echo $row['iid'];?>">DELETE</button></td>
                          </tr>
                          
                          <?php } ?>