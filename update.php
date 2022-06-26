<?php
ob_start(); 
session_start(); 
?>
<?php include("class_lib/db_conf.php"); ?>
<?php include("class_lib/database.php"); ?>
<?php $db=new Database(); ?>
<div align="center"><img src="assets/waite.gif" width="200" height="200"></div>
<?php 
                date_default_timezone_set('Asia/Bangkok');
			    $date = date('d/m/Y, H:i:s');
                
                $gender=$_POST['gender'];
                $weight=$_POST['weight'];
                $height=$_POST['height'];
                $age=$_POST['age'];
                $bmr=$_POST['bmr'];
                $bmr2=$_POST['bmr2'];
                $plan=$_POST['plan'];
                $Futureweight=$_POST['Futureweight'];
                $FixDay=$_POST['FixDay'];
                $DiffKcal=$_POST['DiffKcal'];
                $RecommendKcal=$_POST['RecommendKcal'];
                $DrinkMike=$_POST['DrinkMike'];

                $Cid=$_SESSION['Cid'];
                  
                    $sql="INSERT INTO `bmrcal`(`Cid`, `gender`, `weight`, `height`, `age`, `bmr`, `bmr2`, `plan`, `Futureweight`, `FixDay`, `DiffKcal`, `RecommendKcal`, `DrinkMike`, `date`) 
                    VALUES ('$Cid','$gender','$weight','$height','$age','$bmr','$bmr2','$plan','$Futureweight','$FixDay','$DiffKcal','$RecommendKcal','$DrinkMike','$date')";
                if($db->todb($sql))
				{    
                    echo "<meta http-equiv='refresh' content='2;url=showFoodDesign.php?DrinkMike=$DrinkMike?Cid=$Cid?Date=$date'>";
                    
				}
?>