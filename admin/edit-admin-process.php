<?php
	session_start();
	
	require "helper-methods.php";
	
	$adminId      = checkinput($_REQUEST["adminId"]);
	$adminName      = checkinput($_REQUEST["adminName"]);
	$adminNumber    = checkinput($_REQUEST["adminNumber"]);
	$adminEmail     = checkinput($_REQUEST["adminEmail"]);
	$adminUsername  = checkinput($_REQUEST["adminUsername"]);
	$adminPassword  = checkinput($_REQUEST["adminPassword"]);
	$status         = checkinput($_REQUEST["status"]);
	
	$_SESSION["adminName"]      = $adminName;      
	$_SESSION["adminNumber"]    = $adminNumber;   
	$_SESSION["adminEmail"]     = $adminEmail; 
	$_SESSION["adminUsername"]  = $adminUsername;	
	$_SESSION["adminPassword"]  = $adminPassword;        
	
	if(strlen($adminName)==0 || empty($adminName))
	{
		header("location:edit-admin.php?err=1&adminId=$adminId");
		exit;
	}
	if(strlen($adminNumber)==0 || empty($adminNumber))
	{
		header("location:edit-admin.php?err=2&adminId=$adminId");
		exit;
	}
	if(strlen($adminEmail)==0 || empty($adminEmail))
	{
		header("location:edit-admin.php?err=3&adminId=$adminId");
		exit;
	}
	if(strlen($adminPassword)==0 || empty($adminPassword))
	{
		header("location:edit-admin.php?err=4&adminId=$adminId");
		exit;
	}
	if(strlen($status)==0 || empty($status))
	{
		header("location:edit-admin.php?err=5&adminId=$adminId");
		exit;
	}
	if(strlen($adminUsername)==0 || empty($adminUsername))
	{
		header("location:edit-admin.php?err=6&adminId=$adminId");
		exit;
	}
	
	require "database1-connect.php";
	
	$query ="select * from tbladmin where adminId<>:adminId and adminEmail=:adminEmail";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':adminId',$adminId);
	$stmt->bindParam(':adminEmail',$adminEmail);
	$stmt->execute();
	$numRow=$stmt->rowcount();
	if($numRow==1)
	{
		$conn=null;
		header("location:edit-admin.php?err=7&adminId=$adminId");
		exit;
	}

	$query = "update tbladmin set adminName=:adminName, adminEmail=:adminEmail, adminNumber=:adminNumber, adminUsername=:adminUsername, adminPassword=:adminPassword, status=:status where adminId=:adminId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':adminId',$adminId);
	$stmt->bindParam(':adminName',$adminName);
	$stmt->bindParam(':adminEmail',$adminEmail);
	$stmt->bindParam(':adminNumber',$adminNumber);
	$stmt->bindParam(':adminUsername',$adminUsername);
	$stmt->bindParam(':adminPassword',$adminPassword);
	$stmt->bindParam(':status',$status);
	
	if($stmt->execute())
	{
		$stmt=null;
		$conn=null;
		header("location:admins.php?msg=2");
		exit;
	}
	
	$stmt=null;
	$conn=null;
?>