<?php
	session_start();
	$classId = $_REQUEST["classId"];
	$status  = $_REQUEST["status"];
	
	require "database1-connect.php";
	
	$query ="select * from tblclass where classId=:classId and status=:status";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':classId',$classId);
	$stmt->bindParam(':status',$status);
	$stmt->execute();
	$numRow=$stmt->rowcount();
	
	if($numRow!=1)
	{
		$conn=null;
		header("location:class.php?err=1");
		exit;
	}
	
	$query ="select * from tblclass where classId=:classId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':classId',$classId);
	$stmt->execute();
	$row=$stmt->fetch();
	$classId   = $row["classId"];
	$className = $row["className"];
	
	$stmt=null;
	$conn=null;
	
	include "include/top-most.php";
?>
<title>
	Admin
</title>
<style>
	<?php	
		include "include/top.php";
	?>
	.rightpart .container 
	{
		width		:	60%;
		margin-top	:	20px;
	}
	.container .button
	{
		float:right;
		margin-bottom:15px;
	}
	.button a
	{
		text-decoration:none;
	}
	<?php	
		include "include/footer-style.php";
	?>
</style>
<?php
	include "include/head.php";
	include "include/leftpart.php";
?>
<div class="rightpart">		
	<div class="container">
		<form action="edit-class-process.php?classId=<?php echo $classId?>" method="post">
			<label for="className" class="form-label" >
				<b>Class</b>
			</label>		
			<select type="text" class="form-select" name="className" required aria-describedby="nameHelp" placeholder="Select Class">		
				<?php	
					if($_REQUEST["return"]==1)
					{
				?>			
						<option class=0 ><?php echo $className?></option>
				<?php
					}	
				?>	
						<option class=0>-- select class --</option>
				<?php
					
					require "database1-connect.php";
					
					$query ="select * from tblclass";
					$stmt=$conn->prepare($query);
					$stmt->execute();
					for($i=1;$row=$stmt->fetch();$i++)
					{
				
				?>
						<?php
							if($row["status"]==2)
							{
						?>
								<option class="<?php $i?>" style="background-color:red;font-weight:bold;" value="-1">
								<?php	
									echo $row["className"]." "."(inactive)";	
								?>
								</option>			
						<?php
							}
							else
							{
						?>
						<option class="<?php $i?>">			
						<?php	
								echo $row["className"];
							}	
						?>
						</option>	
				<?php
					}
				?>
			</select>
			<?php
				if($_REQUEST["err"]==1)
				{
			?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  <strong>Alert!</strong> Please enter a valid Class Name.
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
			<?php		
				}
			?>
			<br>
			<div class="col-md-11">
				<label for="status" class="form-label" >
					<b>Status</b>
				</label>
				<div class="form-check">
					<input class="form-check-input" value=1 type="radio" name="status" 
					<?php 
						if($status==1) 
							{
					?> 
						checked 
					<?php
							}
					?>  required ></input>
					<label class="form-check-label" for="flexRadioDefault1">
						Active
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" value=-1 type="radio" name="status" 
					<?php 
						if($status==2) 
							{
					?> 
						checked 
					<?php
							}
					?>  required ></input>
					<label class="form-check-label" for="flexRadioDefault1">
						Inactive
					</label>
				</div>
			</div>
			<br>			
			<div class="button">
				<br>
				<button type="submit" class="btn btn-primary">
					Update
				</button>
				<br>	
			</div>
		</form>	
	</div>	
</div>
<?php
	
	include "include/footer.php";
	
	unset($_SESSION["subjectName"]);
	unset($_SESSION["className"]);
?>
<script>
	$(document).ready(function(){
		$("#navName").text("Class Edit Panel");
	});	
</script>