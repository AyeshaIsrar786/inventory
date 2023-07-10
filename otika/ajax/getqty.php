<?php 

include_once('../include/conn.php');

$sql = "SELECT * FROM `quantity`";
$exe=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($exe)){
?>

<tr>
    <td>
        <?php echo $row['qweight'] ?>
    </td>
    <td>
        <?php echo $row['qdes'] ?>
    </td>
    <td>
        <?php echo $row['qdate'] ?>
    </td>
    <td><a class="btn btn-success" href="update3.php?upid=<?php echo $row['qid'];?>">UPDATE</a></td>
    <td><button class="btn btn-danger delete" data-del="<?php echo $row['qid'];?>">DELETE</button></td>
</tr>
<?php } ?>