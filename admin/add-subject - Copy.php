<!doctype html>
<?php
	
	require "helper-methods.php";
	
	$classId	=	checkinput($_REQUEST["classId"]);
	
	include "database1-connect.php";
	
	$query ="select * from tblclass where classId=:classId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':classId',$classId);
	$stmt->execute();
	$numRow=$stmt->rowcount();
	
	if($numRow!=1)
	{
		$conn=null;
		header("location:class.php?err=3");
		exit;
	}
	
	if($_REQUEST["msg"]==1)
	{
?>		
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<h4 class="alert-heading">Subject has been added successfully!</h4>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
<?php	
	}	
?>
<html>
	<head>
		<?php include "bootstrap.php";?>
		<style>
			.container
			{
				width:60%;
			}
			.button
			{
				float:right;
			}
		</style>
	</head>
	<body>
		Welcome
		<br>
		<div class="container">
			<form action="add-subject-process.php" method="post">
				<label for="subjectName" class="form-label" >
					<b>Subject</b>
				</label>
				<input type="text" class="form-control" value="<?php $_SESSION["subjectName"]?>" name="subjectName" required aria-describedby="nameHelp" placeholder="Enter Subject">
				</input>
				<?php
					if($_REQUEST["err"]==1)
					{
				?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
						  <strong>Alert!</strong> Please enter a valid subject name.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
				<br>
				<div class="button">
					<button type="submit" class="btn btn-primary">
						Add subject
					</button>
				</div>
				<input type="hidden" name="classId" value="<?php $classId?>">
				</input>
			</form>	
		</div>	
	</body>
</html>	