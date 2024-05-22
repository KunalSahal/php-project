<?php

	echo $adminId = $_REQUEST["adminId"]; 
	
	include "database1-connect.php";
	
	$query ="delete from tbladmin where adminId=:adminId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':adminId',$adminId);
	$stmt->execute();
	
	if($stmt->execute())
	{
		header("location:admins.php?msg=3");
		exit;
	}
?>