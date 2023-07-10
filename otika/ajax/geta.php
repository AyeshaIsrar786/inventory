<?php 
include_once('../include/conn.php');

					$sql = "SELECT * FROM `admin`";
            $exe=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($exe)){
					?>
                        
                          <tr>
                          <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['aname'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['password'] ?></td>
                            <td><?php echo $row['cpassword'] ?></td>
                            <td><?php echo $row['arole']?></td>                        
                            <td><a type="button" class="btn btn-success" href="update7.php?upid=<?php echo $row['id'];?>">UPDATE</a></td>
                            <td><button class="btn btn-danger delete" data-del="<?php echo $row['id'];?>">DELETE</button></td>
                          </tr>
                          
                          <?php } ?>