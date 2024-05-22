<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Form</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	</head>
	<body>
		<form action="form-process.php" method="get">
			<div class="row">
			<div class="col-md-1"></div>
				<div class="col-md-6">
					<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">@</span>
  <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
</div>
					<div class="mb-3">
						<label for="fatherName" class="form-label"><h4>Father's Name</h4></label>
						<input type="text" class="form-control" name="fatherName" required aria-describedby="nameHelp" placeholder="Enter Father's Name" required>
					</div>
					<div class="mb-3">
						<label for="mobileNumber" class="form-label"><h4>Mobile Number</h4></label>
						<input type="number" class="form-control" name="mobileNumber" required aria-describedby="numberHelp" placeholder="Enter Mobile Number" required>
					</div>
					<div class="mb-3">
						<label for="birthDate" class="form-label"><h4>Date Of Birth</h4></label>
						<input type="date" class="form-control" name="birthDate" required aria-describedby="dateHelp" placeholder="Enter Date Of Birth" required>
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label"><h4>Email address</h4></label>
						<input type="email" class="form-control" name="emai1Address" aria-describedby="emailHelp" placeholder="Enter Email address" required>
						<div id="emailHelp" class="form-text">
							We'll never share your email with anyone else.
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				<div class="col-md-6">
					<div class="mb-3">
						<label for="student-Name" class="form-label" ><h4>Name</h4></label>
						<input type="text" class="form-control" name="studentName" required aria-describedby="nameHelp" placeholder="Enter Name">
					</div>
					<div class="mb-3">
						<label for="fatherName" class="form-label"><h4>Father's Name</h4></label>
						<input type="text" class="form-control" name="fatherName" required aria-describedby="nameHelp" placeholder="Enter Father's Name" required>
					</div>
					<div class="mb-3">
						<label for="mobileNumber" class="form-label"><h4>Mobile Number</h4></label>
						<input type="number" class="form-control" name="mobileNumber" required aria-describedby="numberHelp" placeholder="Enter Mobile Number" required>
					</div>
					<div class="mb-3">
						<label for="birthDate" class="form-label"><h4>Date Of Birth</h4></label>
						<input type="date" class="form-control" name="birthDate" required aria-describedby="dateHelp" placeholder="Enter Date Of Birth" required>
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label"><h4>Email address</h4></label>
						<input type="email" class="form-control" name="emai1Address" aria-describedby="emailHelp" placeholder="Enter Email address" required>
						<div id="emailHelp" class="form-text">
							We'll never share your email with anyone else.
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>	
		</form>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	</body>
</html>