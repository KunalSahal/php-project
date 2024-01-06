<?php
	
	$stUsername    = 	$_REQUEST["userName"];
	$stPassword    = 	$_REQUEST["password"];
	
	include "database1-connect.php";
	
	$query ="select * from tblstudents where studentEmail=:studentEmail and studentPassword=:studentPassword";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':studentEmail',$stUsername);
	$stmt->bindParam(':studentPassword',$stPassword);
	$stmt->execute();
	$numRow=$stmt->rowcount();
	
	if($numRow==1)
	{
		while ($row=$stmt->fetch())
		{	
			$stId= $row["studentId"];
		}
		setcookie("stId",$stId,time() + 3600,"/");
		$stmt=null;
		$conn=null;
		header("location:../../student/home.php");
		exit;
	}
	else
	{
		setcookie("stId","",time() - 3600,"/");
		$stmt=null;
		$conn=null;
		header("location:login.php?err=1");
		exit;
	}
//../ is used to access a folder outside the main folder 
?>