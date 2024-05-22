<?php	
	
	require "helper-methods.php";
	
	$testId = checkinput($_REQUEST["testId"]);
	$status = checkinput($_REQUEST["status"]);
	
	require "database1-connect.php";
	
	$query="update tbltest1 set status=:status where testId=:testId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':testId',$testId);
	$stmt->bindParam(':status',$status);
	
	if($stmt->execute())
	{
		$conn=null;
		header("location:tests.php?msg=4");
		exit;
	}
	
?>	