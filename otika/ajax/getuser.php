<?php 
include_once('../include/conn.php');
			$sql = "SELECT * FROM `register`";
            $exe=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($exe)){
					?>
                        
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['fname'] ?></td>
                            <td><?php echo $row['lname'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['country'] ?></td>
                            <td><?php echo $row['address1'] ?></td>
                            <td><?php echo $row['address2'] ?></td>
                            <td><?php echo $row['state'] ?></td>
                            <td><?php echo $row['postalcode'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['password'] ?></td>
                            <td><?php echo $row['cpassword'] ?></td>
                            <td><?php echo $row['gender'] ?></td>
                            <td><?php echo $row['rdate'] ?></td>
                            <td><a type="button" class="btn btn-success" href="update5.php?upid=<?php echo $row['id'];?>">UPDATE</a></td>
                            <td><button class="btn btn-danger delete" data-del="<?php echo $row['id'];?>">DELETE</button></td>
                        </tr>                         
                        <?php } ?>