<!doctype html>
<?php 
	session_start();
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	</head>
	<style>
		body
		{
			background-image: linear-gradient(white,lightgrey);
		}
		.header
		{
			text-align:center;
			font-size:45px;
			font-weight:550;
			font-family:Copperplate, Papyrus, fantasy;
			width:100%;	
			background-image: linear-gradient(white,lightgrey);
			height:100px;
			padding-top:15px;
		}
		.nav-bar 
		{
			color:white;
			text-align:center;
			width:100%;
			border-top: 	2px solid #00b7ea;
			border-bottom:  2px solid #00b7ea;
			margin:0px;
			list-style-type:none;
			padding:0px;
			overflow:hidden;
			background: #020031;
			height:30px;
		}
		.mainbody 
		{
			width:100%;
			border:1px dashed #cccccc;
			height:490px;
		}
		.mainbody .sub-header
		{
			text-align:center;
			font-size:30px;
			font-weight:550;
			margin:22px 0px 40px 0px;
			font-family:Copperplate, Papyrus, fantasy;
		}
		.mainbody h6
		{
			font-size:20px;
			font-weight:bold;
			margin-top:17px;
			font-family:Copperplate, Papyrus, fantasy;
		}
		.mainbody .container
		{
			width:50%;
			margin-top : 20px;
			padding-top : 20px;
			height: 320px;
			border-radius:25px;
			background-color: #e6e6e6;
		}
		.mainbody .button
		{
			float:right;
			margin-top:15px;
		}
		.footer
		{
			width: 100%;
			background-color: #020031;
			padding-top:10px;
			text-align: center;
			border-top: 3px solid #00b7ea;
			height: 87px;
			overflow:hidden;
			float:bottom;
		}	
	</style>
</head>
<body>
	<div class="header">
		Login Panel
	</div>
	<div class="nav-bar">
		Welcome to login panel of potential tutorial 
	</div>
	<div class="mainbody">
		<div class="container">
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
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
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
							<h6>Username</h6>
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
</body>
<?php
include "include/footer.php";
?>
