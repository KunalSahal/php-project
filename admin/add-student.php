<!doctype html>
<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Form</title>
		<link href="https://cdn.jsdelivr.net/npm/
		bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
		<style>
			.mainpart 
			{
				width:100%;
			}
			.mainpart .header
			{
				text-align:center;
				font-size:40px;
				font-weight:500;
				width:100;
			}
			.mainpart .sub-header
			{
				text-align:center;
				font-size:30px;
				font-weight:500;
				margin-right:auto;
			}
			.mainpart .button
			{
				margin-left: 386px;
				margin-top: 59px;
			}
		</style>
	</head>
	<body>
		<?php
			if($_REQUEST["msg"]==1)
			{
		?>
				<div class="sub-header">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					<h4 class="alert-heading">Student has been added Successfully!</h4>
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
				  <strong>Alert!</strong> Enter Valid DOB.
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
				  <strong>Alert!</strong> Select Class.
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
				  <strong>Alert!</strong> Select Session.
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php		
			}
		?>
		<?php
			if($_REQUEST["err"]==5)
			{
		?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Alert!</strong> Enter Valid Student Number.
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php		
			}
		?>
		<?php
			if($_REQUEST["err"]==6)
			{
		?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Alert!</strong> Enter Valid School Name.
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
				  <strong>Alert!</strong> Enter Valid Gender.
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php		
			}
		?>
		<?php
			if($_REQUEST["err"]==8)
			{
		?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Alert!</strong> Enter Valid Email.
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php		
			}
		?>
		<?php
			if($_REQUEST["err"]==9)
			{
		?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Alert!</strong> Enter Valid Student Password.
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php		
			}
		?>
		<?php
			if($_REQUEST["err"]==10)
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
			if($_REQUEST["err"]==11)
			{
		?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Alert!</strong> Enter Valid Mother Name.
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php		
			}
		?>
		<?php
			if($_REQUEST["err"]==12)
			{
		?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Alert!</strong> Enter Valid Parent Email.
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php		
			}
		?>
		<?php
			if($_REQUEST["err"]==13)
			{
		?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Alert!</strong> Enter Valid Parent Password.
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php		
			}
		?>
		<?php
			if($_REQUEST["err"]==14)
			{
		?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Alert!</strong> Enter Valid Address.
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php		
			}
		?>
		<?php
			if($_REQUEST["err"]==15)
			{
		?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Alert!</strong> Enter Valid Father Number.
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php		
			}
		?>
		<?php
			if($_REQUEST["err"]==16)
			{
		?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Alert!</strong> Enter Mother Number.
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php		
			}
		?>
		<?php
			if($_REQUEST["err"]==18)
			{
		?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Alert!</strong> EmailId Already Exists.
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php		
			}
		?>
		<div class="mainpart">
			<form action="add-student-process.php" method="post">
				<div class="row">
					<div class="header">					
						Student/Parents Registration
					</div>
					<div class="col">
						<div class="sub-header">
							Student Details
						</div>	
						<div class="col-md-11">
							<label for="student-Name" class="form-label" ><b>Student Full Name</b></label>
							<input type="text" class="form-control" name="studentName" value="<?php echo $_SESSION["studentName"] ?>" required aria-describedby="nameHelp" placeholder="Enter Name">
						</div>
						<div class="col-md-11">
							<label for="birthDate" class="form-label"><b>Date Of Birth</b></label>
							<input type="date" class="form-control" name="birthDate" value="<?php echo $_SESSION["birthDate"] ?>" required aria-describedby="dateHelp" placeholder="Enter Date Of Birth" required>
						</div>
						<div class="col-md-11">
							<label for="select-session" class="form-label" ><b>Select Class</b></label>
							<select type="text" class="form-control" name="selectClass" value="<?php echo $_SESSION["selectClass"] ?>" required aria-describedby="nameHelp" placeholder="Select Class">
							<option selected="-1">--select class--</option>
								<?php
									
									require "database1-connect.php";
									
									$query ="select * from tblclass";
									$stmt=$conn->prepare($query);
									$stmt->execute();
									for($i=1;$row=$stmt->fetch();$i++)
									{
								
								?>
									<?php
										if($row["status"]==2)
										{
									?>
									<option class="<?php $i?>" style="background-color:red;font-weight:bold;">
									<?php	
										echo $row["className"]." "."(inactive)";	
									?>
									</option>			
									<?php
										}
										else
										{
									?>
									<option class="<?php $i?>">			
									<?php	
											echo $row["className"];
										}	
									?>
									</option>	
								<?php
									}
								?>
							</select>	
						</div>
						<div class="col-md-11">
							<label for="select-session" class="form-label" ><b>Select Session</b></label>
							<select type="text" class="form-control" name="selectSession" value="<?php echo $_SESSION["selectSession"] ?>" required aria-describedby="nameHelp" placeholder="Select Session">
								<option selected="-1">--select session--</option>
								<option value="1">2022-2023</option>
							</select>	
						</div>
						<div class="col-md-11">
							<label for="studentNumber" class="form-label"><b>Student's Mobile Number<b style="color:red;font-weight:normal;">(optional)</b></b></label>
							<input type="number" class="form-control" name="studentNumber" value="<?php echo $_SESSION["studentNumber"] ?>" aria-describedby="numberHelp" placeholder="Student Mobile Number" required>
						</div>
						<div class="col-md-11">
							<label for="schoolName" class="form-label" ><b>Student School Name</b></label>
							<input type="text" class="form-control" name="schoolName" value="<?php echo $_SESSION["schoolName"] ?>" required aria-describedby="nameHelp" placeholder="Student School">
						</div>
						<div class="col-md-11">
							<label for="studentGender" class="form-label" ><b>Student's Gender</b></label>
							<select type="text" class="form-control" name="studentGender" value="<?php echo $_SESSION["studentGender"] ?>" required aria-describedby="nameHelp">
								<option class="-1">--select gender--</option>
								<option class="0">Male</option>
								<option class="0">Female</option>
								<option class="0">Other</option>
							</select>
						</div>
						<div class="col-md-11">
							<label for="studentEmail" class="form-label" ><b>Student Mail Id</b>
								<span style="color:red;">
									(optional)
								</span>
							</label>
							<input type="text" class="form-control" name="studentEmail" value="<?php echo $_SESSION["studentEmail"] ?>" required aria-describedby="nameHelp" placeholder="Student Mail Id">
						</div>
						<div class="col-md-11">
							<label for="inputPassword" class="col-md-9 col-form-label"><b>Student Login Password</b>
								<span style="color:Green;">
									(Atleast 6 characters)
								</span>
							</label>
							<input type="password" class="form-control" name="studentPassword" value="<?php echo $_SESSION["studentPassword"] ?>" required placeholder="Student Password">
						</div>
					</div>
					<div class="col">
						<div class="sub-header">
							Parents Details
						</div>
						<div class="col-md-11">
							<label for="fatherName" class="form-label"><b>Father's Name</b></label>
						</div>
						<div class="input-group col-md-11">
							<span class="input-group-text" id="basic-addon1">Mr.</span>
							<input type="text" class="form-control" name="fatherName" value="<?php echo $_SESSION["fatherName"] ?>" required placeholder="Father's Name" aria-label="Username" aria-describedby="basic-addon1">
						</div>
						<div class="col-md-11">
							<label for="motherName" class="form-label"><b>Mother's Name</b></label>
						</div>
						<div class="input-group col-md-11">
							<span class="input-group-text" id="basic-addon1">Mrs.</span>
							<input type="text" class="form-control" name="motherName" value="<?php echo $_SESSION["motherName"] ?>" required placeholder="Mother's Name" aria-label="Username" aria-describedby="basic-addon1">
						</div>
						<div class="col-md-11">
							<label for="fatherNumber" class="form-label"><b>Father's Mobile Number</b></label>
							<input type="number" class="form-control" name="fatherNumber" value="<?php echo $_SESSION["fatherNumber"] ?>" aria-describedby="numberHelp" placeholder="Father Mobile Number" required>
						</div>
						<div class="col-md-11">
							<label for="motherNumber" class="form-label"><b>Mother's Mobile Number<b style="color:red;font-weight:normal;">(optional)</b></b></label>
							<input type="number" class="form-control" name="motherNumber" value="<?php echo $_SESSION["motherNumber"] ?>" aria-describedby="numberHelp" placeholder="Mother Mobile Number" >
						</div>
						<div class="col-md-11">
							<label for="exampleFormControlInput1" class="form-label"><b>Parent Mail Id</b></label>
							<input type="email" class="form-control" name="parentEmail" value="<?php echo $_SESSION["parentEmail"] ?>" placeholder="Parent Mail Id">
						</div>
						<div class="col-md-11">
							<label for="inputPassword" class="col-md-11 col-form-label"><b>Password</b>
								<span style="color:Green;">
									(Atleast 6 characters)
								</span>
							</label>
							<input type="password" class="form-control" name="inputPassword"value="<?php echo $_SESSION["inputPassword"] ?>" required>
						</div>
						<div class="col-md-11">
							<label for="exampleFormControlTextarea1" class="form-label"><b>Address</b></label>
							<textarea class="form-control" name="address" value="<?php echo $_SESSION["address"] ?>" rows="3" required ></textarea>
						</div>
						<div class="col-md-11">
							<label for="exampleFormControlTextarea1" class="form-label">
								<b>Status</b>
							</label>
							<div class="form-check form-switch">
								<label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Suspended</label>
								<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckCheckedDisabled" disabled>
							</div>
							<div class="form-check form-switch">
								<label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Active</label>
								<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckCheckedDisabled" disabled>
							</div>
							<div class="form-check form-switch">
								<label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Inactive</label>
								<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckCheckedDisabled" checked disabled>
								<input type="hidden" name="status" value=1></input>
							</div>
						</div>
						<div class="button">
							<button type="submit" class="btn btn-primary mb-3">Add Student</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
<!-- CRUD (create,read,update,delet)-->