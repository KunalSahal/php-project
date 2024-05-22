<?php
	
	require 'helper-methods.php';
	
	$userName = checkinput($_REQUEST["userName"]);
	$password = checkinput($_REQUEST["password"]);
	
	if(strlen($userName)==0 || empty($userName))
	{
		header("location:login.php?err=1");
		exit;
	}
	
	if(strlen($password)==0 || empty($password))
	{
		header("location:login.php?err=2");
		exit;
	}
	
	require 'database1-connect.php';
	
	$query = "insert into tblclass (userName, password) value (:userName, :password)";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':userName',$userName);
	$stmt->bindParam(':password',$password);
	$stmt-> execute();
	
	if($stmt-> execute())
	{
		$conn=null;
		header("location:login.php?msg=1");
		exit;
	}
?>