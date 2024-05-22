<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Form</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
		<style>
			.container 
			{
				width:100%;
			}
			.container .mainbody 
			{
				width:100%;
				overflow: hidden;
			}
			.mainbody .leftpart
			{
				width:50%;
				float:left;
				height:700px;
				padding-right:250px;
			}
			.mainbody .rightpart
			{
				width:50%;
				float:left;
				height:700px;
			}
		</style>
	</head>
		<div class="container">
			<form action="form-process.php" method="get">
				<div class="row">
					<div class="col-md-6">
						<label for="student-Name" class="form-label" ><b>Student Full Name</b></label>
						<input type="text" class="form-control" name="studentName" required aria-describedby="nameHelp" placeholder="Enter Name">
					</div>
					<div class="col-md-6">
						<label for="fatherName" class="form-label"><b>Father's Name</b></label>
						<input type="text" class="form-control" name="fatherName" required aria-describedby="nameHelp" placeholder="Enter Father's Name" required>
					</div>
					<div class="col-md-6">
						<label for="birthDate" class="form-label"><b>Date Of Birth</b></label>
						<input type="date" class="form-control" name="birthDate" required aria-describedby="dateHelp" placeholder="Enter Date Of Birth" required>
					</div>
					<div class="col-md-6">
						<label for="motherName" class="form-label"><b>Mother's Name</b></label>
						<input type="text" class="form-control" name="motherName" required aria-describedby="nameHelp" placeholder="Enter Mother's Name" required>
					</div>
					<div class="col-md-6">
						<label for="select-class" class="form-label" ><b>Select Class</b></label>
						<select type="text" class="form-control" name="selectClass" required aria-describedby="nameHelp" placeholder="Select Class">
							<option select="-1">--select class--</option>
							<option class="0">12th</option>
							<option class="1">11th</option>
							<option class="2">10th</option>
							<option class="3">9th</option>
							<option class="4">8th</option>
							<option class="5">7th</option>
							<option class="6">6th</option>
						</select>	
					</div>
					<div class="col-md-6">
						<label for="fatherNumber" class="form-label"><b>Father's Mobile Number</b></label>
						<input type="number" class="form-control" name="fatherNumber" aria-describedby="numberHelp" placeholder="Father Mobile Number" required>
					</div>
					<div class="col-md-6">
						<label for="select-session" class="form-label" ><b>Select Session</b></label>
						<select type="text" class="form-control" name="selectSession" required aria-describedby="nameHelp" placeholder="Select Session">
							<option class="-1">--select session--</option>
							<option class="0">2022-2023</option>
						</select>	
					</div>
					<div class="col-md-6">
						<label for="motherNumber" class="form-label"><b>Mother's Mobile Number<b style="color:red;font-weight:normal;">(optional)</b></b></label>
						<input type="number" class="form-control" name="motherNumber" aria-describedby="numberHelp" placeholder="Mother Mobile Number" >
					</div>
					<div class="col-md-6">
						<label for="studentNumber" class="form-label"><b>Student's Mobile Number<b style="color:red;font-weight:normal;">(optional)</b></b></label>
						<input type="number" class="form-control" name="studentNumber" aria-describedby="numberHelp" placeholder="Student Mobile Number" required>
					</div>
					<div class="col-md-6">
						<label for="exampleFormControlInput1" class="form-label"><b>Parent Mail Id</b></label>
						<input type="email" class="form-control" name="parentEmail" placeholder="Parent Mail Id">
					</div>
					<div class="col-md-6">
						<label for="schoolName" class="form-label" ><b>Student School Name</b></label>
						<input type="text" class="form-control" name="schoolName" required aria-describedby="nameHelp" placeholder="Student School">
					</div>
					<div class="col-md-6">
						<label for="inputPassword" class="col-sm-2 col-form-label"><b>Password</b></label>
						<input type="password" class="form-control" id="inputPassword">
					</div>
					<div class="col-md-6">
						<label for="studentGender" class="form-label" ><b>Student's Gender</b></label>
						<select type="text" class="form-control" name="studentGender" required aria-describedby="nameHelp">
							<option class="-1">--select gender--</option>
							<option class="0">Male</option>
							<option class="0">Female</option>
							<option class="0">Other</option>
						</select>
					</div>
					<div class="col-md-6">
						<label for="exampleFormControlTextarea1" class="form-label"><b>Address</b></label>
						<textarea class="form-control" name="address" rows="3" required ></textarea>
					</div>
					<div class="col-md-6">
						<label for="studentEmail" class="form-label" ><b>Student Mail Id</b></label>
						<input type="text" class="form-control" name="studentEmail" required aria-describedby="nameHelp" placeholder="Student Mail Id">
					</div>
					<div class="col-md-6">
						<label for="student-Name" class="form-label" ><b>Student Full Name</b></label>
						<input type="text" class="form-control" name="studentName" required aria-describedby="nameHelp" placeholder="Enter Name">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>		
			</form>		
		</div>			
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	</body>
</html>