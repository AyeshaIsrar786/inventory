<?php 
include_once('../include/conn.php');

					$sql = "SELECT * FROM `product` p INNER JOIN `subcategory` sc ON p.sc=sc.subid INNER JOIN `category` c ON p.mc=c.cid INNER JOIN `supplier` s ON p.sup=s.sid INNER JOIN `quantity` q ON p.qw=q.qid";
            $exe=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($exe)){
					?>
                        
                          <tr>
                          <td><?php echo $row['pid'] ?></td>
                            <td><?php echo $row['cname'] ?></td>
                            <td><?php echo $row['scname'] ?></td>
                            <td><?php echo $row['sname'] ?></td>
                            <td><?php echo $row['pcode'] ?></td>
                            <td><?php echo $row['pname'] ?></td>
                            <td><?php echo $row['pdes'] ?></td>
                            <td><?php echo $row['srp'] ?></td>
                            <td><?php echo $row['up'] ?></td>
                            <td><?php echo $row['qty'] ?></td>
                            <td><?php echo $row['qweight'] ?></td>
                            <td><?php echo $row['stock'] ?></td>
                            <td>
                            <img src="<?php echo './pic/'.$row['ppic'] ?>" width="50" height="50">   
                            </td>
                            <td><?php echo $row['pstatus'] ?></td>
                            <td><?php echo $row['pdate'] ?></td>
                            <td><a type="button" class="btn btn-success" href="update4.php?upid=<?php echo $row['pid'];?>">UPDATE</a></td>
                            <td><button class="btn btn-danger delete" data-del="<?php echo $row['pid'];?>">DELETE</button></td>
                          </tr>
                          
                          <?php } ?>