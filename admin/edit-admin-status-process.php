<?php

	include "helper-methods.php";
	
	$adminStatus  = checkinput($_REQUEST["status"]);
	$adminId      = checkinput($_REQUEST["adminId"]);
	
	include "database1-connect.php";
	
	$query="update tbladmin set status=:adminStatus where adminId=:adminId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':adminId',$adminId);
	$stmt->bindParam(':adminStatus',$adminStatus);
	
	if($stmt->execute())
	{
		$stmt=null;
		$conn=null;
		header("location:admins.php?msg=4");
		exit;
	}
?>	