<?php

	$classId	=	trim($_REQUEST["classId"]);
	
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
	
	if(!is_numeric($classId))
	{
		$conn=null;
		header("location:class.php?err=3");
		exit;
	}
	
	include "include/top-most.php";
?>
<title>
	Admin
</title>
<style>
	<?php	
		include "include/top.php";
	?>
	.rightpart .container 
	{
		width		:	60%;
		margin-top	:	20px;
	}
	.container .button
	{
		float	:	right;
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
		<form action="add-subjects-process.php?classId=<?php echo $classId?>" method="post">
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
		</form>
	</div>	
</div>
<?php
	include "include/footer.php";
?>		
