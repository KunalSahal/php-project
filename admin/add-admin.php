<?php
	include "include/top-most.php";
?>
<title>
	Title
</title>
<style>
	<?php	
		include "include/top.php";
	?>
	.rightpart .sub-header1
	{
		text-align:center;
		font-size:40px;
		font-weight:500;
		margin-right:auto;
		margin-top:20px;
		margin-bottom:30px;
	}
	.rightpart .container 
	{
		width:65%;
	}
	.button
	{
		float : right;
		margin-top : 20px;
		margin-bottom : 20px;
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
		<form action="add-admin-process.php" method="post">
			<div class="row">
				<div class="sub-header1">					
					Admin Registration
				</div>
				<div class="col">	
					<div class="col-md-11">
						<label for="admin-Name" class="form-label" >
							<b>Admin Full Name</b>
						</label>
						<input type="text" class="form-control" name="adminName" value="<?php echo $_SESSION["adminName"] ?>" required aria-describedby="nameHelp" placeholder="Enter Name">
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
						<input type="number" class="form-control" name="adminNumber" value="<?php echo $_SESSION["adminNumber"] ?>" aria-describedby="numberHelp" placeholder="Admin Mobile Number" required>
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
						<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="admin@gmail.com" name="adminEmail" required value="<?php echo $_SESSION["adminEmail"]?>">
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
					</div>
					<div class="col-md-11">
						<label for="admin-Username" class="form-label" >
							<b>Username</b>
						</label>
						<input type="text" class="form-control" name="adminUsername" value="<?php echo $_SESSION["adminUsername"] ?>" required aria-describedby="nameHelp" placeholder="Enter Username">
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
						<input type="password" class="form-control" name="adminPassword" value="<?php echo $_SESSION["adminPassword"] ?>" required placeholder="Admin Password">
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
						<div class="form-check form-switch">
							<label class="form-check-label" for="flexSwitchCheckCheckedDisabled">
								Active
							</label>
							<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckCheckedDisabled" checked disabled>
						</div>
						<div class="form-check form-switch">
							<label class="form-check-label" for="flexSwitchCheckCheckedDisabled">
								Inactive
							</label>
							<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckCheckedDisabled" disabled>
							<input type="hidden" name="status" value=1></input>
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
					</div>	
					<div class="col-md-11">
						<button type="submit" class="btn btn-primary button">
							Submit
						</button>
					</div>	
				</div>
			</div>
		</form>
	</div>	
</div>
<?php
	unset($_SESSION["adminName"]);
	unset($_SESSION["adminUsername"]);	
	unset($_SESSION["adminNumber"]);      
	unset($_SESSION["adminEmail"]);   
	unset($_SESSION["status"]);
	unset($_SESSION["adminPassword"]);     
	
	include "include/footer.php";
	
?>		
<script>
	$(document).ready(function(){
		$("#navName").text("Welcome To Admin Management Panel");
	});
</script>