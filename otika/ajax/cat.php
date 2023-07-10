<?php
include_once('../include/conn.php');

if(isset($_POST['pmc_id'])){
$pmc=mysqli_escape_string($conn,$_POST['pmc_id']);
$scsql="SELECT * FROM `subcategory` WHERE `mc`='$pmc'";
                                            $scexe=mysqli_query($conn,$scsql);
                                            while($scrow=mysqli_fetch_assoc($scexe)){
                                              ?>
                                                <option value="<?php echo $scrow['subid'] ?>">
                                                <?php echo $scrow['scname'] ?>
                                              </option>
                                              <?php
                                            }
                                          }
?>