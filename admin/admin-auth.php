<?php
	
	require "helper-methods.php";
	
	$adminId       = checkinput($_REQUEST["adminId"]);
	$status        = checkinput($_REQUEST["status"]);
	$adminUsername = checkinput($_REQUEST["adminUsername"]);
	$adminPassword = checkinput($_REQUEST["adminPassword"]);
	
	if($status==2)
	{
		header("location:admins.php?err=7");
		exit;
	}
	
	if(strlen($adminUsername)==0 || empty($adminUsername))
	{
		header("location:admins.php?err=5");
		exit;
	}
	
	if(strlen($adminPassword)==0 || empty($adminPassword))
	{
		header("location:admins.php?err=5");
		exit;
	}
	
	require "database1-connect.php";
	
	$stmt=$conn->prepare("select * from tbladmin where adminId=:adminId and adminUsername=:adminUsername and adminPassword=:adminPassword");
	$stmt->bindParam(':adminId',$adminId);
	$stmt->bindParam(':adminUsername',$adminUsername);
	$stmt->bindParam(':adminPassword',$adminPassword);
	$stmt->execute();
	$numRow=$stmt->rowcount();
	if($numRow==1)
	{
		$stmt=null;
		$conn=null;
		header("location:edit-admin.php?adminId=$adminId");
		exit;
	}
	else
	{
		$stmt=null;
		$conn=null;
		header("location:admins.php?err=5");
		exit;
	}
	
?>