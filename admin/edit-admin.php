<?php

	session_start();
	
	require "database1-connect.php";

	$adminId = $_REQUEST["adminId"];
	
	$stmt=$conn->prepare("select * from tbladmin where adminId=:adminId");
	$stmt->bindParam(':adminId',$adminId);
	$stmt->execute();
	$numRow=$stmt->rowcount();
	if($numRow!=1)
	{
		$stmt=null;
		$conn=null;
		header("location:admins.php?err=6");
		exit;
	}
	
	$query ="select * from tbladmin where adminId=:adminId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':adminId',$adminId);
	$stmt->execute();
	$row=$stmt->fetch();
	$adminName     = $row["adminName"];
	$adminNumber   = $row["adminNumber"];
	$adminEmail    = $row["adminEmail"];
	$adminUsername = $row["adminUsername"];
	$adminPassword = $row["adminPassword"];
	$status        = $row["status"];
	
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
	.rightpart .sub-header1
	{
		text-align:center;
		font-size:40px;
		font-weight:500;
		margin-right:auto;
		margin-top:10px;
		margin-bottom:30px;
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
		<form action="edit-admin-process.php" method="post">
			<div class="row">
				<div class="sub-header1">					
					Editing Panel 
				</div>
				<div class="col">	
					<div class="col-md-11">
						<label for="admin-Name" class="form-label" >
							<b>Admin Full Name</b>
						</label>
						<input type="text" class="form-control" name="adminName" value="<?php echo $adminName?>" required aria-describedby="nameHelp" placeholder="Enter Name">
					<?php
						if($_REQUEST["err"]==1)
						{
					?>
							<div class="alert alert-warning alert-dismissible fade show" role="alert">
							  <strong>Error!</strong> Please insert valid Admin Name.
							  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
					<?php		
						}
					?>
					</div>
					<div class="col-md-11">
						<label for="adminNumber" class="form-label">
							<b>Admin's Mobile Number</b>
						</label>
						<input type="number" class="form-control" name="adminNumber" value="<?php echo $adminNumber?>" aria-describedby="numberHelp" placeholder="Admin Mobile Number" required>
					<?php
						if($_REQUEST["err"]==2)
						{
					?>
							<div class="alert alert-warning alert-dismissible fade show" role="alert">
							  <strong>Error!</strong> Please insert valid Admin Number.
							  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
					<?php		
						}
					?>
					</div>
					<div class="col-md-11">
						<label for="adminEmail" class="form-label" >
							<b>Admin Mail Id</b>
						</label>
						<input type="email" value="<?php echo $adminEmail?>" class="form-control" id="exampleFormControlInput1" placeholder="admin@gmail.com" name="adminEmail" required>
					<?php
						if($_REQUEST["err"]==3)
						{
					?>
							<div class="alert alert-warning alert-dismissible fade show" role="alert">
							  <strong>Error!</strong> Please insert valid Admin Email Id.
							  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
					<?php		
						}
					?>
					<?php
						if($_REQUEST["err"]==7)
						{
					?>
							<div class="alert alert-warning alert-dismissible fade show" role="alert">
							  <strong>Error!</strong> Admin Email Id Already Exists.
							  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
					<?php		
						}
					?>
					</div>
					<div class="col-md-11">
						<label for="admin-Username" class="form-label" >
							<b>Username</b>
						</label>
						<input type="text" class="form-control" name="adminUsername" value="<?php echo $adminUsername?>" required aria-describedby="nameHelp" placeholder="Enter Username">
					<?php
						if($_REQUEST["err"]==6)
						{
					?>
							<div class="alert alert-warning alert-dismissible fade show" role="alert">
							  <strong>Error!</strong> Please insert valid Admin Username.
							  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
					<?php		
						}
					?>
					</div>
					<div class="col-md-11">
						<label for="adminPassword" class="col-md-9 col-form-label">
							<b>Password</b>
						</label>
						<input type="password" class="form-control" name="adminPassword" value="<?php echo $adminPassword?>" required placeholder="Admin Password">
					<?php
						if($_REQUEST["err"]==4)
						{
					?>
							<div class="alert alert-warning alert-dismissible fade show" role="alert">
							  <strong>Error!</strong> Please insert valid Password.
							  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
					<?php		
						}
					?>
					</div>
					<div class="col-md-11">
						<label for="exampleFormControlTextarea1" class="form-label">
							<b>
								Status
							</b>
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
							<input class="form-check-input" value=2 type="radio" name="status" 
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
					<?php
						if($_REQUEST["err"]==5)
						{
					?>
							<div class="alert alert-warning alert-dismissible fade show" role="alert">
							  <strong>Error!</strong> Please select status.
							  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
					<?php		
						}
					?>					
					<div class="col-md-11">
						<button type="submit" class="btn btn-primary button">
							Submit
						</button>
					</div>
					<input type="hidden" value="<?php echo $adminId?>" name="adminId"/>	
				</div>
			</div>
		</form>	
	</div>	
</div>
<?php
	
	include "include/footer.php";
	
	unset($_SESSION["adminUsername"]);
	unset($_SESSION["adminName"]);
?>
<script>
	$(document).ready(function(){
		$("#navName").text("Admin Edit Panel");
	});	
</script>

?>