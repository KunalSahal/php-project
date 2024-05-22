<?php
	session_start();
	
	require "helper-methods.php";
	
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
		header("location:add-admin.php?err=1");
		exit;
	}
	if(strlen($adminNumber)==0 || empty($adminNumber))
	{
		header("location:add-admin.php?err=2");
		exit;
	}
	if(strlen($adminEmail)==0 || empty($adminEmail))
	{
		header("location:add-admin.php?err=3");
		exit;
	}
	if(strlen($adminPassword)==0 || empty($adminPassword))
	{
		header("location:add-admin.php?err=4");
		exit;
	}
	if(strlen($status)==0 || empty($status))
	{
		header("location:add-admin.php?err=5");
		exit;
	}
	if(strlen($adminUsername)==0 || empty($adminUsername))
	{
		header("location:add-admin.php?err=6");
		exit;
	}
	
	require "database1-connect.php";
	
	$query ="select * from tbladmin where adminEmail=:adminEmail";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':adminEmail',$adminEmail);
	$stmt->execute();
	$numRow=$stmt->rowcount();
	
	if($numRow==1)
	{
		$stmt=null;
		$conn=null;
		header("location:add-admin.php?err=7");
		exit;
	}
	
	$query1 ="select * from tbladmin where adminUsername=:adminUsername";
	$stmt1=$conn->prepare($query1);
	$stmt1->bindParam(':adminUsername',$adminUsername);
	$stmt1->execute();
	$numRow1=$stmt1->rowcount();
	
	if($numRow1==1)
	{
		$stmt=null;
		$conn=null;
		header("location:add-admin.php?err=8");
		exit;
	}
	
	$query1 ="select * from tbladmin where adminUsername=:adminUsername";
	$stmt1=$conn->prepare($query1);
	$stmt1->bindParam(':adminUsername',$adminUsername);
	$stmt1->execute();
	$numRow1=$stmt1->rowcount();
	
	if($numRow1==1)
	{
		$stmt1=null;
		$conn=null;
		header("location:add-admin.php?err=7");
		exit;
	}
	

	$query = "insert into tbladmin (adminName,adminEmail,adminNumber,adminUsername,adminPassword,status) 		values(:adminName,:adminEmail,:adminNumber,:adminUsername,:adminPassword,:status)";
	$stmt=$conn->prepare($query);
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
		header("location:admins.php?msg=1");
		exit;
	}
	
	$stmt=null;
	$conn=null;
?>