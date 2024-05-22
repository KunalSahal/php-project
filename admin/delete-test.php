<?php

	$testId = $_REQUEST["testId"]; 
	
	include "database1-connect.php";
	
	$query ="delete from tbltest1 where testId=:testId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':testId',$testId);
	$stmt->execute();
	
	if($stmt->execute())
	{
		header("location:tests.php?msg=2");
		exit;
	}
?>