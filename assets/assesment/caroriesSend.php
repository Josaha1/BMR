<?php
ob_start();
session_start();
if (!$_SESSION["Cid"]) {  //check session

    Header("Location: Login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

} else {
?>
    <?php include("../../class_lib/db_conf.php"); ?>
    <?php include("../../class_lib/database.php"); ?>
    <?php $db = new Database(); ?>
    <div align="center"><img src="../../assets/waite.gif" width="200" height="200"></div>
    <?php
    $CalForFood = $_POST['total'];
    $Cid = $_SESSION['Cid'];

    $sql = "UPDATE `bmrcal` SET `CalForFood`='$CalForFood' WHERE `Cid` = '$Cid' ORDER BY `bmrcal`.`RegisId`  DESC
    LIMIT 1";
    if ($db->todb($sql)) {
        echo "<meta http-equiv='refresh' content='2;url=../../carorie.php'>";
    }
    ?>
<?php } ?>