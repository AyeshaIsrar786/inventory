<?php
include_once('../include/conn.php');
			$sql = "SELECT * FROM `user`";
            $exe=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($exe)){
			?>
                        
                          <tr>
                            <td><?php echo $row['uorder'] ?></td>
                            <td><?php echo $row['oname'] ?></td>
                            <td><?php echo $row['oph'] ?></td>
                            <td><?php echo $row['op_status'] ?></td>
                            <td><input type="checkbox" name="checkbox" class="checkbox" data-ord="<?php echo $row['oid']?>"> 
                          </td>
                            <td><a type="button" class="btn btn-success" href="invoice.php?uinvoice=<?php echo $row['uorder'];?>">Invoice</a></td>
                            <td><button class="btn btn-danger delete" data-del="<?php echo $row['oid'];?>">DELETE</button></td>
                          </tr>
                          
                          <?php } ?>