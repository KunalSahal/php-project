<?php	
	
	require "helper-methods.php";
	
	$subjectId           = checkinput($_REQUEST["subjectId"]);
	$status              = checkinput($_REQUEST["status"]);
	
	require "database1-connect.php";
	
	$query="update tblsubject set status=:status where subjectId=:subjectId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':subjectId',$subjectId);
	$stmt->bindParam(':status',$status);
	
	if($stmt->execute())
	{
		$conn=null;
		header("location:subjects.php?msg=3");
		exit;
	}
	
?>	