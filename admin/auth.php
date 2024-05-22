<?php
	echo $userName    = 	$_REQUEST["userName"];
	echo $password    = 	$_REQUEST["password"];
	
	include "database1-connect.php";
	
	$query ="select * from tblstudents where studentEmail=:studentEmail and studentPassword=:studentPassword";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':studentEmail',$userName);
	$stmt->bindParam(':studentPassword',$password);
	$stmt->execute();
	echo $numRow=$stmt->rowcount();
	
	exit;
?>