<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Form</title>
		<link href="https://cdn.jsdelivr.net/npm/
		bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
		<?php
			if($_REQUEST["msg"]==1)
			{
		?>
			<div class="sub-header" style="margin-top:none">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				<h4 class="alert-heading">Successfull!</h4>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php		
			}	
		?>
		<style>
			.container
			{
				width:80%;
			}
		</style>
	</head>
	<body>
		<div class="container">	
			<form action="login-process.php" method="post">
				<div class="col">
					<label for="exampleFormControlInput1" class="form-label">
						Username
					</label>
				  <input type="email" class="form-control" name="userName" id="exampleFormControlInput1" placeholder="username" required>
				</div>
				<?php
					if($_REQUEST["err"]==1)
					{
				?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
						  <strong>Alert!</strong> Please Enter Valid Username.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
				  <div class="col">
					<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
					  <input type="password" class="form-control" name="password" required id="inputPassword" placeholder="password" required>
				</div>
				<?php
					if($_REQUEST["err"]==2)
					{
				?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
						  <strong>Alert!</strong> Please Enter Valid Password.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>  
				<button type="submit" class="btn btn-primary mb-3">
					Register
				</button>  
			</form>
		</div>	
	</body>
</html>	