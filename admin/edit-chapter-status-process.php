<?php	
	
	require "helper-methods.php";
	
	$chapterId             = checkinput($_REQUEST["chapterId"]);
	$status                = checkinput($_REQUEST["status"]);
	
	require "database1-connect.php";
	
	$query="update tblchapter set status=:status where chapterId=:chapterId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':chapterId',$chapterId);
	$stmt->bindParam(':status',$status);
	
	if($stmt->execute())
	{
		$conn=null;
		header("location:chapters.php?msg=4");
		exit;
	}
	
?>	