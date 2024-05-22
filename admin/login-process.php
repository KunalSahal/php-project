<?php
	
	$adminUsername    = 	$_REQUEST["userName"];
	$adminPassword    = 	$_REQUEST["password"];
	
	include "database1-connect.php";
	
	$query ="select * from tbladmin where adminUsername=:adminUsername and adminPassword=:adminPassword";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':adminUsername',$adminUsername);
	$stmt->bindParam(':adminPassword',$adminPassword);
	$stmt->execute();
	$numRow=$stmt->rowcount();
	
	if($numRow==1)
	{
		while ($row=$stmt->fetch())
		{	
			$adminId= $row["adminId"];
		}
		setcookie("adminId",$adminId,time() + 3600,"/");
		$stmt=null;
		$conn=null;
		header("location:admin-panel.php");
		exit;
	}
	else
	{
		setcookie("adminId","",time() - 3600,"/");
		$stmt=null;
		$conn=null;
		header("location:login.php?err=1");
		exit;
	}
//../ is used to access a folder outside the main folder 
?>