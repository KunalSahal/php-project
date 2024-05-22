<!doctype html>
<?php

	session_start();
	
	require "helper-methods.php";
	
	$className      = checkinput ($_REQUEST["className"]);
	$status         = checkinput ($_REQUEST["status"]);
	
	$_SESSION["className"]      =  $className;
	
	if(strlen($className)==0 || empty($className))
	{
		header("location:add-class.php?err=1");
		exit;
	}
	
	require 'database1-connect.php';
		
	$query ="select * from tblclass";
	$stmt=$conn->prepare($query);
	$stmt->execute();
	for($i=1;$row=$stmt->fetch();$i++)
	{
	
		if($row["className"]==$className)
		{
			$conn=null;
			header("location:add-class.php?err=2");
			exit;
		}
	}	
	
	
	$query = "insert into tblclass (className, status) value (:className, :status)";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':className',$className);
	$stmt->bindParam(':status',$status);
	
	if($stmt->execute())
	{
		$conn=null;
		header("location:class.php?msg=0");
		exit;
	}
	
	unset($_SESSION["className"]);
	
?>	
	