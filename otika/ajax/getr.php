<?php
include("../include/conn.php");
if (isset($_POST['myid'])) {
    $myid = mysqli_escape_string($conn, $_POST['myid']);
    $qry_run ="SELECT * FROM `u_management` WHERE `rid` = '$myid'";
    $exe_qry= mysqli_query($conn,$qry_run); 
    $rfet = mysqli_fetch_assoc($exe_qry);
    $rcat = unserialize($rfet['rmcat']);
    $rsubcat = unserialize($rfet['rsubcat']);
    $rsup = unserialize($rfet['rsup']);
    $rqty = unserialize($rfet['rqty']);
    $rpro = unserialize($rfet['rpro']);
    $rorder = unserialize($rfet['rorder']);
    $ruser = unserialize($rfet['ruser']);
    $rpos = unserialize($rfet['rpos']);
    $rrole = unserialize($rfet['rrole']);

?>
    <tr>
        <td><?php echo @$rcat[1] ?><br><?php echo @$rcat[2] ?><br><?php echo @$rcat[3] ?><br><?php echo @$rcat[4] ?></td>
        <td><?php echo @$rsubcat[1] ?><br><?php echo @$rsubcat[2] ?><br><?php echo @$rsubcat[3] ?><br><?php echo @$rsubcat[4] ?></td>
        <td><?php echo @$rsup[1] ?><br><?php echo @$rsup[2] ?><br><?php echo @$rsup[3] ?><br><?php echo @$rsup[4] ?></td>
        <td><?php echo @$rqty[1] ?><br><?php echo @$rqty[2] ?><br><?php echo @$rqty[3] ?><br><?php echo @$rqty[4] ?></td>
        <td><?php echo @$rpro[1] ?><br><?php echo @$rpro[2] ?><br><?php echo @$rpro[3] ?><br><?php echo @$rpro[4] ?></td>
        <td><?php echo @$rorder[1] ?><br><?php echo @$rorder[2] ?><br><?php echo @$rorder[3] ?></td>
        <td><?php echo @$ruser[1] ?><br><?php echo @$ruser[2] ?><br><?php echo @$ruser[3] ?><br><?php echo @$ruser[4] ?></td>
        <td><?php echo @$rpos[1] ?><br><?php echo @$rpos[2] ?><br><?php echo @$rpos[3] ?><br><?php echo @$rpos[4] ?></td>
        <td><?php echo @$rrole[1] ?><br><?php echo @$rrole[2] ?><br><?php echo @$rrole[3] ?><br><?php echo @$rrole[4] ?><br><?php echo @$rrole[5] ?><br><?php echo @$rrole[6] ?><br><?php echo @$rrole[7] ?><br><?php echo @$rrole[8] ?></td>
    </tr>
    <?php
}


if (isset($_POST['data'])) {
    $run = "SELECT * FROM `u_management`";
    $sql=mysqli_query($conn,$run);
    if ($sql) {

        while ($fet = mysqli_fetch_assoc($sql)) {
    ?>
            <option value="<?php echo $fet['rid'] ?>"><?php echo $fet['rname'] ?></option>

<?php
        }
    }
}

// *********** Delete from View RoleManagment**********
if (isset($_POST['mydel'])) {
    $del = mysqli_escape_string($conn, $_POST['mydel']);
    $drun = "DELETE FROM `u_management` where `rid`='$del'";
    $dexe=mysqli_query($conn, $drun);
    if ($dexe) {
        // deleted
        echo 1;
    } else {
        // not deleted
        echo 2;
    }
}
