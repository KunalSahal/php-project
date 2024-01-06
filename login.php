<?php
	require "include/head.php";
?>
	.container .sub-header
	{
		text-align:center;
		font-size:30px;
		font-weight:550;
		margin:22px 0px 40px 0px;
	}
	.container h6
	{
		font-size:20px;
		font-weight:bold;
		margin-top:17px;
	}
	.container .mainpart
	{
		width:50%;
		margin: 40px 253px;
		padding-top : 40px;
		height: 370px;
		background-color: #c5c4c4;
	}
	.mainpart .a1 
	{
		background-color : grey;
	}
	.container .button
	{
		float:right;
		margin-top:30px;
	}	
<?php	
	require "include/top.php";
?>
<div class="container">
	<div class="mainpart">
		<?php
			if($_REQUEST["msg"]==1)
			{
		?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<h4 class="alert-heading">You logged out successfully!</h4>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php		
			}
		?>
		<?php
			if($_REQUEST["err"]==1)
			{
		?>
				<div class="alert alert-dismissible fade show a1" role="alert">
				  <strong>Alert!</strong> Please enter valid Name and Password.
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php		
			}
		?>
		<form action="login-process.php" method="post">
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-10">
					<label for="userName" class="form-label" >
						<h6>Email</h6>
					</label>
					<input type="text" class="form-control" name="userName" required aria-describedby="nameHelp" placeholder="Enter Username">
					</input>
					<label for="password" class="form-label" >
						<h6>Password</h6>
					</label>
					<input type="text" class="form-control" name="password" value="" required aria-describedby="nameHelp" placeholder="Enter Password">
					</input>
					<div class="button">
						<button type="submit" class="btn btn-outline-dark">Submit</button>
					</div>
				</div>
			</div>
		</form>	
	</div>	
</div>
<?php
include "include/footer.php";
?>
