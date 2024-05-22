<?php
	
	include "database1-connect.php";
	
	$stmt1 = $conn->prepare("select * from tbltest order by testId desc");
	$stmt1->execute();
	$row1 = $stmt1->fetch();
	echo $testId = $row1["testId"];
	exit;
	
?>