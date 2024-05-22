<!doctype html>
<html lang="en">
<?php
	session_start();
	if($_REQUEST["err"]==1)
	{
?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <strong>Alert!</strong> Enter Valid Name.
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
		  <strong>Alert!</strong> Enter Valid Father Name.
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
		  <strong>Alert!</strong> Enter Mobile Number.
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
		  <strong>Alert!</strong> Enter DOB.
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
<?php		
	}
?>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Form</title>
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	</head>
	<body style="background-color:lightblue">
		<form action="form-process.php" method="post">
			<div class="row">
			<div class="col-md-1"></div>
				<div class="col-md-6">
					<div class="mb-3">
						<label for="student-Name" class="form-label" ><h4>Name</h4></label>
						<input type="text" class="form-control" name="studentName" value="<?php echo $_SESSION["studentName"]?>" required aria-describedby="nameHelp" placeholder="Enter Name">
					</div>
					<div class="mb-3">
						<label for="fatherName" class="form-label"><h4>Father's Name</h4></label>
						<input type="text" class="form-control" name="fatherName" value="<?php echo $_SESSION["fatherName"]?>" required aria-describedby="nameHelp" placeholder="Enter Father's Name" required>
					</div>
					<div class="mb-3">
						<label for="mobileNumber" class="form-label"><h4>Mobile Number</h4></label>
						<input type="number" class="form-control" name="mobileNumber" value="<?php echo $_SESSION["mobileNumber"]?>" required aria-describedby="numberHelp" placeholder="Enter Mobile Number" required>
					</div>
					<div class="mb-3">
						<label for="birthDate" class="form-label"><h4>Date Of Birth</h4></label>
						<input type="date" class="form-control" name="birthDate" value="<?php echo $_SESSION["birthDate"]?>" required aria-describedby="dateHelp" placeholder="Enter Date Of Birth" required>
					</div>
					<div class="mb-3">
						<label for="eamilAddress" class="form-label"><h4>Email Id</h4></label>
						<input type="email" class="form-control" name="emailAddress" value="<?php echo $_SESSION["emailAddress"]?>" required aria-describedby="emailHelp" placeholder="Enter Email Id" required>
					</div>	
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>	
			</div>	
		</form>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	</body>
</html>