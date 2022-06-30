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
    $Rice1 = $_POST['DiffRice1'];
    $Meet1 = $_POST['DiffMeet1'];
    $Fruit1 = $_POST['DiffFruit1'];
    $Milk1 = $_POST['DiffMilk1'];
    $Rice2 = $_POST['DiffRice2'];
    $Meet2 = $_POST['DiffMeet2'];
    $Fruit2 = $_POST['DiffFruit2'];
    $Milk2 = $_POST['DiffMilk2'];
    $Rice3 = $_POST['DiffRice3'];
    $Meet3 = $_POST['DiffMeet3'];
    $Fruit3 = $_POST['DiffFruit3'];
    $Milk3 = $_POST['DiffMilk3'];
    $Cid = $_SESSION['Cid'];

    $sql = "UPDATE `bmrcal` SET `Rice1`='$Rice1',`Meet1`='$Meet1',`Fruit1`='$Fruit1',`Milk1`='$Milk1',`Rice2`='$Rice2',`Meet2`='$Meet2',`Fruit2`='$Fruit2',`Milk2`='$Milk2',`Rice3`='$Rice3',`Meet3`='$Meet3',`Fruit3`='$Fruit3',`Milk3`='$Milk3' WHERE `Cid` = '$Cid' ORDER BY `bmrcal`.`RegisId`  DESC
    LIMIT 1";
    if ($db->todb($sql)) {
        echo "<meta http-equiv='refresh' content='2;url=../../showFinishFood.php?Cid=$Cid'>";
    }
    ?>
<?php } ?>