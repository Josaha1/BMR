<?php include("class_lib/db_conf.php"); ?>
<?php include("class_lib/database.php"); ?>
<?php $db=new Database(); ?>
<div align="center"><img src="assets/waite.gif" width="200" height="200"></div>
<?php
session_start(); 
if(isset($_POST['Cid'])){
			  if($_POST['btnSave']=="Login")
			  {
				$Cid=$_POST['Cid'];
			  	$sql="SELECT * FROM `predmregis` WHERE `Cid`= '$Cid'; ";
				//echo $sql;
				if($db->count_rows($sql)>0)
				{
					?>
					
					
                    <?php
					
					foreach($db->to_Obj($sql) as $rows)
					{
					  if($rows['Cid']!="")
					  {
						  
                        $_SESSION["Cid"] = $_POST['Cid'];
						echo "<meta http-equiv='refresh' content='2;url=index.php'>";
						exit;
					  }else{
						?>
                        	<script type="text/javascript">
								alert("Not Found!! your data?\r\nPlease contract your administrator system");
							</script>
							<?php echo "<meta http-equiv='refresh' content='2;url=Login.php'>"; ?>
                        <?php  
					  }
					}
				}else{
						?>
                        	<script type="text/javascript">
								alert("Not Found!! your data?\r\nPlease contract your administrator system");
								
							</script>
							<?php echo "<meta http-equiv='refresh' content='2;url=Login.php'>"; ?>
                        <?php  
						
					  }			  					
                 
				} 
			}
			  ?>