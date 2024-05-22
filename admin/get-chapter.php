<?php

	require "helper-methods.php";
	$classId	 =	checkinput($_REQUEST["classId"]);
	$subjectId =	checkinput($_REQUEST["subjectId"]);
	
?>

<?php	
	if($subjectId==-1||0)
	{
?>	
			
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <strong>Alert!</strong> Please select a valid class.
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
<?php		
	exit;
	}	
?>
<form action="add-chapter-process.php?classId=<?php echo $classId?>&subjectId=<?php echo $subjectId?>" method="post">	
	<label for="chapterName" class="form-label" >
		<b>Chapter</b>
	</label>
	<input type="text" class="form-control" value="<?php $_SESSION["chapterName"]?>" name="chapterName" required aria-describedby="nameHelp" placeholder="Enter Chapter">
	</input>
	<input type="hidden" value=1 name="status" required>
	</input>
	<?php
		if($_REQUEST["err"]==3)
		{
	?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>Alert!</strong> Please enter a valid class name.
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
	<?php		
		}
	?>
	<br>
	<input type="radio" name="status" value=1 checked> Active</input>
	<input type="radio" name="status" value=2> Inactive</input>
	<div class="button btn2">
		<br>
		<button type="submit" class="btn btn-primary">
			Submit
		</button>
		<br>	
	</div>
</form>			
