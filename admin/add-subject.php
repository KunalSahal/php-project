<?php
	session_start();
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
		float	:	right;
		margin-bottom : 15px;
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
	<?php
		if($_REQUEST["msg"]==1)
		{
	?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<h4 class="alert-heading">Subject has been added successfully!</h4>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
	<?php		
		}
	?>
	<div class="container">
		<form action="add-subject-process.php" method="post">
			<label for="className" class="form-label" >
				<b>Class</b>
			</label>		
			<select type="text" class="form-select" name="classId" required aria-describedby="nameHelp" placeholder="Select Class">	
				<?php 
				if($_REQUEST["err"]!=4)
				{
				?>	
					<option class=0 value=-2>-- select class --</option>
				<?php
				}
				?>
				<?php
					
					require "database1-connect.php";
					
					$query ="select * from tblclass";
					$stmt=$conn->prepare($query);
					$stmt->execute();
					for($i=1;$row=$stmt->fetch();$i++)
					{
				?>
						<?php
						if($_REQUEST["err"]==4)
						{
							if(isset($_SESSION["className"]))
							{	
						?>			
							<option value="<?php echo $row["classId"]?>" class=0 ><?php echo $_SESSION["className"]?></option>
						<?php
							}	
							else
							{
						?>	
							<option class=0 value=-2>-- select class --</option>
						<?php
							}
						}	
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
						<option value="<?php echo $row["classId"]?>"class="<?php $i?>">			
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
				if($_REQUEST["err"]==2)
				{
			?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  <strong>Alert!</strong> Please select a valid class name.
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
			<?php		
				}
			?>
			<?php
				if($_REQUEST["err"]==3)
				{
			?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  <strong>Alert!</strong> Class is inactive.
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
			<?php		
				}
			?>
			<br>
			<label for="subjectName" class="form-label" >
				<b>Subject</b>
			</label>
			<input type="text" class="form-control" value="<?php echo $_SESSION["subjectName"]?>" name="subjectName" required aria-describedby="nameHelp" placeholder="Enter Subject">
			</input>
			<?php
				if($_REQUEST["err"]==1)
				{
			?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  <strong>Alert!</strong> Please enter a valid subject name.
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
			<?php		
				}
			?>
			<?php
				if($_REQUEST["err"]==4)
				{
			?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  <strong>Alert!</strong> Subject already exists.
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
			<?php		
				}
			?>
			<br>
			<input type="radio" name="status" value=1 checked>
				Active
			</input>
			<br>
			<input type="radio" name="status" value=-1>
				Inactive
			</input>
			<div class="button">
				<button type="submit" class="btn btn-primary">
					Add subject
				</button>
			</div>
		</form>
	</div>	
</div>
<?php

	unset($_SESSION["subjectName"]);
	unset($_SESSION["className"]);

	include "include/footer.php";
?>	
<script>
	$(document).ready(function(){
		$("#navName").text("Welcome to Subject Management Panel");
	});	
</script>	
