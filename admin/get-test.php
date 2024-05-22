<?php

	session_start();

	require "helper-methods.php";
	$classId	= checkinput($_REQUEST["classId"]);
	$subjectId  = $_POST["array"];
	$chapterId  = $_POST["arrray"];
	
	$_SESSION["chapterId"] = $chapterId;
	
	if($classId==-1)
	{
?>	
			
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <strong>Alert!</strong> Please select a valid class.
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
<?php		
	exit;
	}
	if($subjectId==-1)
	{
?>	
			
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <strong>Alert!</strong> Please select a valid subject.
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
<?php		
	exit;
	}	
?>
<label for="testName" class="form-label" >
	<b>Marks</b>
</label>
<input type="text" class="form-control" id="marks" name="marks" required aria-describedby="nameHelp" placeholder="Enter Marks">
</input>
<br>	
<label for="testName" class="form-label" >
	<b>Test</b>
</label>
<input type="text" class="form-control" id="testName" value="<?php $_SESSION["testName"]?>" name="testName" required aria-describedby="nameHelp" placeholder="Enter Test Name">
</input>
			
