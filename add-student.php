<?php
	session_start();
	require "include/head.php";
?>
	.container .btn1
	{
		float : right;
		margin-right : 35px;
	}
<?php		
	require "include/top.php";
?>
<form action="add-student-process.php" method="post">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<label for="student-Name" class="form-label" ><b>Student Full Name</b></label>
				<input type="text" class="form-control" name="studentName" value="<?php echo $_SESSION["studentName"] ?>" required aria-describedby="nameHelp" placeholder="Enter Name">
				<?php
					if($_REQUEST["err"]==1)
					{
				?>
						<div class="alert alert-danger alert-dismissible fade show a1" role="alert">
						  <strong>Alert!</strong> Please enter valid Name.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
				<label for="birthDate" class="form-label"><b>Date Of Birth</b></label>
				<input type="date" class="form-control" name="birthDate" value="<?php echo $_SESSION["birthDate"] ?>" required aria-describedby="dateHelp" placeholder="Enter Date Of Birth" required>
				<?php
					if($_REQUEST["err"]==2)
					{
				?>
						<div class="alert alert-danger alert-dismissible fade show a1" role="alert">
						  <strong>Alert!</strong> Please enter valid Birth Date
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
				<label for="select-session" class="form-label" ><b>Select Class</b></label>
				<select type="text" class="form-control" name="selectClass" value="<?php echo $_SESSION["selectClass"] ?>" required aria-describedby="nameHelp" placeholder="Select Class">
				<option selected="-1" value="-1">--select class--</option>
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
						<option class="<?php $i?>" value="<?php echo $row["classId"]?>">			
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
						<div class="alert alert-danger alert-dismissible fade show a1" role="alert">
						  <strong>Alert!</strong> Please Select Valid Class.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
				<label for="select-session" class="form-label" ><b>Select Session</b></label>
				<select type="text" class="form-control" name="selectSession" value="<?php echo $_SESSION["selectSession"] ?>" required aria-describedby="nameHelp" placeholder="Select Session">
					<option selected="-1" value="-1">--select session--</option>
					<option value="1">2022-2023</option>
				</select>	
				<?php
					if($_REQUEST["err"]==4)
					{
				?>
						<div class="alert alert-danger alert-dismissible fade show a1" role="alert">
						  <strong>Alert!</strong> Please Select Valid Session.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
				<label for="studentNumber" class="form-label"><b>Student's Mobile Number</b></label>
				<input type="number" class="form-control" name="studentNumber" value="<?php echo $_SESSION["studentNumber"] ?>" aria-describedby="numberHelp" placeholder="Student Mobile Number" required>
				<?php
					if($_REQUEST["err"]==5)
					{
				?>
						<div class="alert alert-danger alert-dismissible fade show a1" role="alert">
						  <strong>Alert!</strong> Please enter valid Mobile Number.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
				<label for="schoolName" class="form-label" ><b>Student School Name</b></label>
				<input type="text" class="form-control" name="schoolName" value="<?php echo $_SESSION["schoolName"] ?>" required aria-describedby="nameHelp" placeholder="Student School">
				<?php
					if($_REQUEST["err"]==6)
					{
				?>
						<div class="alert alert-danger alert-dismissible fade show a1" role="alert">
						  <strong>Alert!</strong> Please enter valid School Name.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
				<label for="studentGender" class="form-label" ><b>Student's Gender</b></label>
				<select type="text" class="form-control" name="studentGender" value="<?php echo $_SESSION["studentGender"] ?>" required aria-describedby="nameHelp">
					<option class="-1" value="-1">--select gender--</option>
					<option class="1">Male</option>
					<option class="2">Female</option>
					<option class="3">Other</option>
				</select>
				<?php
					if($_REQUEST["err"]==7)
					{
				?>
						<div class="alert alert-danger alert-dismissible fade show a1" role="alert">
						  <strong>Alert!</strong> Please enter valid Gender.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
				<label for="studentEmail" class="form-label" ><b>Student Mail Id</b>
				</label>
				<input type="text" class="form-control" name="studentEmail" value="<?php echo $_SESSION["studentEmail"] ?>" required aria-describedby="nameHelp" placeholder="Student Mail Id">
				<?php
					if($_REQUEST["err"]==8)
					{
				?>
						<div class="alert alert-danger alert-dismissible fade show a1" role="alert">
						  <strong>Alert!</strong> Please enter valid Email.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
				<label for="inputPassword" class="col-md-9 col-form-label"><b>Student Login Password</b>
					<span style="color:Green;">
						(Atleast 6 characters)
					</span>
				</label>
				<input type="password" class="form-control" name="studentPassword" value="<?php echo $_SESSION["studentPassword"] ?>" required placeholder="Student Password">
				<?php
					if($_REQUEST["err"]==9)
					{
				?>
						<div class="alert alert-danger alert-dismissible fade show a1" role="alert">
						  <strong>Alert!</strong> Please enter valid Password.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
			</div>
			<div class="col-md-6">	
				<label for="fatherName" class="form-label"><b>Father's Name</b></label>
				<div class="input-group">
					<span class="input-group-text" id="basic-addon1">Mr.</span>
					<input type="text" class="form-control" name="fatherName" value="<?php echo $_SESSION["fatherName"] ?>" required placeholder="Father's Name" aria-label="Username" aria-describedby="basic-addon1">
				</div>
				<?php
					if($_REQUEST["err"]==10)
					{
				?>
						<div class="alert alert-danger alert-dismissible fade show a1" role="alert">
						  <strong>Alert!</strong> Please enter valid Father Name.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
				<label for="motherName" class="form-label"><b>Mother's Name</b></label>
				<div class="input-group">
					<span class="input-group-text" id="basic-addon1">Mrs.</span>
					<input type="text" class="form-control" name="motherName" value="<?php echo $_SESSION["motherName"] ?>" required placeholder="Mother's Name" aria-label="Username" aria-describedby="basic-addon1">
				</div>
				<?php
					if($_REQUEST["err"]==11)
					{
				?>
						<div class="alert alert-danger alert-dismissible fade show a1" role="alert">
						  <strong>Alert!</strong> Please enter valid Mother Name.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
				<label for="fatherNumber" class="form-label"><b>Father's Mobile Number</b></label>
				<input type="number" class="form-control" name="fatherNumber" value="<?php echo $_SESSION["fatherNumber"] ?>" aria-describedby="numberHelp" placeholder="Father Mobile Number" required>
				<?php
					if($_REQUEST["err"]==15)
					{
				?>
						<div class="alert alert-danger alert-dismissible fade show a1" role="alert">
						  <strong>Alert!</strong> Please enter valid Phone Number.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
				<label for="motherNumber" class="form-label"><b>Mother's Mobile Number </b></label>
				<input type="number" class="form-control" name="motherNumber" value="<?php echo $_SESSION["motherNumber"] ?>" aria-describedby="numberHelp" placeholder="Mother Mobile Number" >
				<?php
					if($_REQUEST["err"]==16)
					{
				?>
						<div class="alert alert-danger alert-dismissible fade show a1" role="alert">
						  <strong>Alert!</strong> Please enter valid Phone Number.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
				<label for="exampleFormControlInput1" class="form-label"><b>Parent Mail Id</b></label>
				<input type="email" class="form-control" name="parentEmail" value="<?php echo $_SESSION["parentEmail"] ?>" placeholder="Parent Mail Id">
				<?php
					if($_REQUEST["err"]==12)
					{
				?>
						<div class="alert alert-danger alert-dismissible fade show a1" role="alert">
						  <strong>Alert!</strong> Please enter valid Email Id.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
				<label for="inputPassword" class="col-md-11 col-form-label"><b>Password</b>
					<span style="color:Green;">
						(Atleast 6 characters)
					</span>
				</label>
				<input type="password" class="form-control" name="inputPassword"value="<?php echo $_SESSION["inputPassword"] ?>" required>
				<?php
					if($_REQUEST["err"]==13)
					{
				?>
						<div class="alert alert-danger alert-dismissible fade show a1" role="alert">
						  <strong>Alert!</strong> Please enter valid Password.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
				<label for="exampleFormControlTextarea1" class="form-label"><b>Address</b></label>
				<textarea class="form-control" name="address" value="<?php echo $_SESSION["address"] ?>" rows="3" required ></textarea>
				<?php
					if($_REQUEST["err"]==14)
					{
				?>
						<div class="alert alert-danger alert-dismissible fade show a1" role="alert">
						  <strong>Alert!</strong> Please enter valid Address.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
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
				<div class="button btn1">
					<button type="submit" class="btn btn-primary mb-3">Add Student</button>
				</div>	
			</div>
		</div>
	</div>
</form>	
<?php	
	unset($_SESSION["studentName"]);    
	unset($_SESSION["birthDate"]);      
	unset($_SESSION["selectClass"]);    
	unset($_SESSION["selectSession"]);  
	unset($_SESSION["studentNumber"]);  
	unset($_SESSION["schoolName"]);     
	unset($_SESSION["studentGender"]);  
	unset($_SESSION["studentEmail"]);   
	unset($_SESSION["studentPassword"]);
	unset($_SESSION["fatherName"]);     
	unset($_SESSION["motherName"]);     
	unset($_SESSION["fatherNumber"]);   
	unset($_SESSION["motherNumber"]);   
	unset($_SESSION["parentEmail"]);    
	unset($_SESSION["inputPassword"]);  
	unset($_SESSION["address"]);
	
	require "include/footer.php";
	
?>