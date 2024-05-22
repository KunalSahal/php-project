<?php
	$studentId = trim($_REQUEST["studentId"]);
	$status    = trim($_REQUEST["status"]);
	
	include "database1-connect.php";
	
	$query ="select * from tblstudents where studentId=:studentId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':studentId',$studentId);
	$stmt->execute();
	$numRow=$stmt->rowcount();
	
	if($numRow!=1)
	{
		$conn=null;
		header("location:students.php?err=17&studentId=$studentId");
		exit;
	}
	
	if(!is_numeric($studentId))
	{
		$conn=null;
		header("location:students.php?err=17&studentId=$studentId");
		exit;
	}

	$query ="select * from tblstudents where studentId=:studentId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':studentId',$studentId);
	$stmt->execute();
	$row=$stmt->fetch();
	$studentId       = $row["studentId"];
	$studentName     = $row["studentName"];
	$birthDate       = $row["birthDate"];
	$selectClass     = $row["selectClass"];
	$selectSession   = $row["selectSession"];
	$studentNumber   = $row["studentNumber"];
	$schoolName      = $row["schoolName"];
	$studentGender   = $row["studentGender"];
	$studentEmail    = $row["studentEmail"];
	$studentPassword = $row["studentPassword"];
	$fatherName      = $row["fatherName"];
	$motherName      = $row["motherName"];
	$fatherNumber    = $row["fatherNumber"];
	$motherNumber    = $row["motherNumber"];
	$parentEmail     = $row["parentEmail"];
	$inputPassword   = $row["inputPassword"];
	$address         = $row["address"];
	
	$stmt=null;
	$conn=null;
?>	
<?php
	if($_REQUEST["err"]==18)
	{
?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <strong>Alert!</strong> Email Id already exists.
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
<?php		
	}
?>
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
	.rightpart .sub-header
	{
		text-align:center;
		font-size:30px;
		font-weight:500;
		margin-right:auto;
	}
	.rightpart .button
	{
		margin-top:10px;
		float:right;
	}
	.rightpart .container 
	{
		width:95%;
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
		<form action="edit-student-process.php" method="post">
			<div class="row">
				<div class="col">
					<div class="sub-header">
						Edit Student Details
					</div>	
					<div class="col-md-11">
						<label for="student-Name" class="form-label" >
							<b>Student Full Name</b>
						</label>
						<input type="text" class="form-control" name="studentName" value="<?php echo $studentName?>" required aria-describedby="nameHelp" placeholder="Enter Name">
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
					</div>
					<div class="col-md-11">
						<label for="birthDate" class="form-label">
							<b>Date Of Birth</b>
						</label>
						<input type="date" class="form-control" name="birthDate" value="<?php echo $birthDate ?>" required aria-describedby="dateHelp" placeholder="Enter Date Of Birth" required>
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
					</div>
					<div class="col-md-11">
						<label for="select-class" class="form-label" >
							<b>Select Class</b>
						</label>
						<select type="text" class="form-select" name="selectClass" value="<?php echo$selectClass ?>" required aria-describedby="nameHelp" placeholder="Select Class">
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
					</div>
					<div class="col-md-11">
						<label for="select-session" class="form-label" >
							<b>Select Session</b>
						</label>
						<select type="text" class="form-select" name="selectSession" value="<?php echo $selectSession ?>" required aria-describedby="nameHelp" placeholder="Select Session">
							<option value="1">2022-2023</option>
						</select>
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
					</div>
					<div class="col-md-11">
						<label for="studentNumber" class="form-label">
							<b>Student's Mobile Number</b>
						</label>
						<input type="number" class="form-control" name="studentNumber" value="<?php echo $studentNumber ?>" aria-describedby="numberHelp" placeholder="Student Mobile Number" required>
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
					</div>
					<div class="col-md-11">
						<label for="schoolName" class="form-label" >
							<b>Student School Name</b>
						</label>
						<input type="text" class="form-control" name="schoolName" value="<?php echo $schoolName ?>" required aria-describedby="nameHelp" placeholder="Student School">
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
					</div>
					<div class="col-md-11">
						<label for="studentGender" class="form-label" >
							<b>Student's Gender</b></label>
						<select type="text" class="form-select" name="studentGender" value="<?php echo $studentGender ?>" required aria-describedby="nameHelp">
							<option class="0">Male</option>
							<option class="0">Female</option>
							<option class="0">Other</option>
						</select>
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
					</div>
					<div class="col-md-11">
						<label for="studentEmail" class="form-label" ><b>Student Mail Id</b>
						</label>
						<input type="text" class="form-control" name="studentEmail" value="<?php echo $studentEmail ?>" required aria-describedby="nameHelp" placeholder="Student Mail Id">
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
					</div>
					<div class="col-md-11">
						<label for="inputPassword" class="col-md-9 col-form-label"><b>Student Login Password</b>
						</label>
						<input type="password" class="form-control" name="studentPassword" value="<?php echo $studentPassword ?>" required placeholder="Student Password">
						<?php
							if($_REQUEST["err"]==9)
							{
						?>
								<div class="alert alert-warning alert-dismissible fade show" role="alert">
								  <strong>Alert!</strong> Enter Valid Student Login Password.
								  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
						<?php		
							}
						?>
					</div>
				</div>
				<div class="col">
					<div class="sub-header">
						Edit Parent Details
					</div>
					<div class="col-md-11">
						<label for="fatherName" class="form-label"><b>Father's Name</b></label>
					</div>
					<div class="input-group col-md-11">
						<span class="input-group-text" id="basic-addon1">Mr.</span>
						<input type="text" class="form-control" name="fatherName" value="<?php echo $fatherName ?>" required placeholder="Father's Name" aria-label="Username" aria-describedby="basic-addon1">
					</div>
					<div>	
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
					</div>
					<div class="col-md-11">
						<label for="motherName" class="form-label"><b>Mother's Name</b></label>
					</div>
					<div class="input-group col-md-11">
						<span class="input-group-text" id="basic-addon1">Mrs.</span>
						<input type="text" class="form-control" name="motherName" value="<?php echo $motherName ?>" required placeholder="Mother's Name" aria-label="Username" aria-describedby="basic-addon1">
					</div>
					<div>	
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
					</div>
					<div class="col-md-12">
						<label for="fatherNumber" class="form-label"><b>Father's Mobile Number</b></label>
						<input type="number" class="form-control" name="fatherNumber" value="<?php echo $fatherNumber?>" aria-describedby="numberHelp" placeholder="Father Mobile Number" required>
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
					</div>
					<div class="col-md-12">
						<label for="motherNumber" class="form-label"><b>Mother's Mobile Number</b></label>
						<input type="number" class="form-control" name="motherNumber" value="<?php echo $motherNumber?>" aria-describedby="numberHelp" placeholder="Mother Mobile Number" >
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
					</div>
					<div class="col-md-12">
						<label for="exampleFormControlInput1" class="form-label"><b>Parent Mail Id</b></label>
						<input type="email" class="form-control" name="parentEmail" value="<?php echo $parentEmail?>" placeholder="Parent Mail Id">
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
					</div>
					<div class="col-md-12">
						<label for="inputPassword" class="col-md-11 col-form-label"><b>Password</b>
						</label>
						<input type="password" class="form-control" name="inputPassword"value="<?php echo $inputPassword?>" required>
						<?php
							if($_REQUEST["err"]==13)
							{
						?>
								<div class="alert alert-warning alert-dismissible fade show" role="alert">
								  <strong>Alert!</strong> Enter Valid Password.
								  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
						<?php		
							}
						?>
					</div>
					<div class="col-md-12">
						<label>
							Address
						</label>
						<textarea style="height:115px" name="address" class="form-control"   type="text" required="" maxlength="300"><?php echo $address ?></textarea>
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
					</div>
					<div class="col-md-11">
						<label for="studentGender" class="form-label" >
							<b>Status</b>
						</label>
						<div class="form-check">
							<input class="form-check-input" value=-1 type="radio" name="status" 
							<?php 
								if($status==-1) 
									{
							?> 
								checked 
							<?php
									}
							?>  required ></input>
							<label class="form-check-label" for="flexRadioDefault1">
								Suspended 
							</label>
						</div>
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
						<?php
							if($_REQUEST["err"]==17)
							{
						?>
								<div class="alert alert-warning alert-dismissible fade show" role="alert">
								  <strong>Alert!</strong> Enter Status.
								  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
						<?php		
							}
						?>
					</div>
				</div>
			</div>
			<div class="row">		
				<div class="col">	
					<div class="button">
						<button type="submit" class="btn btn-primary mb-3">
							Edit Student
						</button>
						<input type="hidden" name="studentId" value="<?php echo $studentId?>">
						</input>
					</div>
				</div>
			</div>	
		</form>
	</div>
</div>
<?php
	include "include/footer.php";
?>
<script>
	$(document).ready(function(){
		$("#navName").text("Student Edit Panel");
	});	
</script>		
