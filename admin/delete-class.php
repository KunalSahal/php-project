<?php

	echo $classId = $_REQUEST["classId"]; 
	
	include "database1-connect.php";
	
	$query ="delete from tblclass where classId=:classId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':classId',$classId);
	$stmt->execute();
	
	if($stmt->execute())
	{
		header("location:class.php?msg=2");
		exit;
	}
?>