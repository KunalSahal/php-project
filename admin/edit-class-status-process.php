<?php	
	
	require "helper-methods.php";
	
	$classId             = checkinput($_REQUEST["classId"]);
	$status              = checkinput($_REQUEST["status"]);
	
	require "database1-connect.php";
	
	$query="update tblclass set status=:status where classId=:classId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':classId',$classId);
	$stmt->bindParam(':status',$status);
	
	if($stmt->execute())
	{
		$conn=null;
		header("location:class.php?msg=4&classId=$classId");
		exit;
	}
	
?>	