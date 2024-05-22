<?php
	include "include/top-most.php";
?>
<title>
	Admin
</title>
<style>
	<?php	
		include "include/top.php";
	?>
	.rightpart .sub-header
	{
		text-align:center;
		font-size:30px;
		font-weight:500;
		margin-right:auto;
		margin-top:20px;
	}
	.rightpart .col
	{
		margin:30px 200px;
	}
	.button
	{
		text-align:right;
		margin-top:20px;
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
			<div class="sub-header" style="margin-top:none">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<h4 class="alert-heading">Class has been added Successfully!</h4>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
	<?php		
		}	
	?>
	<div class="sub-header">
		Class Management
	</div>
	<form action="add-class-process.php" method="post">
		<div class="row">
			<div class="col">
				<label for="className" class="form-label" >
					<b>Enter Class</b>
				</label>
				<input type="text" class="form-control" value="<?php $_SESSION["className"]?>" name="className" required aria-describedby="nameHelp" placeholder="Enter Class">
				</input>
				<?php
					if($_REQUEST["err"]==1)
					{
				?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
						  <strong>Alert!</strong> Enter Valid Class Name.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
				<?php
					if($_REQUEST["err"]==2)
					{
				?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
						  <strong>Alert!</strong> Class already exists.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
				<input type="hidden" value=2 name="status">
				</input>	
				<div class="button">
					<button type="submit" class="btn btn-primary mb-3">
						Add Class
					</button>
				</div>
			</div>
		</div>	
	</form>
</div>
<?php
	include "include/footer.php";
?>		
<script>
	$(document).ready(function(){
		$("#navName").text("Welcome To Class Management Panel");
	});
</script>	