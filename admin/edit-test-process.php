<?php

	include "helper-methods.php";
	
	$testId      = checkinput($_REQUEST["testId"]);
	$classId     = checkinput($_REQUEST["classId"]);
	$chapterId   = implode ("#",$_POST["array2"]);
	$subjectId   = implode ("#",$_POST["array"]);
	$testName    = checkinput($_REQUEST["testName"]);
	$marks       = checkinput($_REQUEST["marks"]);
	$status      = checkinput($_REQUEST["status"]);
	
	if($classId==-1)
	{
?>
		<input type="hidden" value=1 id="flag"/>
<?php		
		exit;
	}
	
	if(strlen($testId)==0 || empty($testId) || strlen($classId)==0 || empty($classId) || strlen($testName)==0 || empty($testName) || strlen($status)==0 || empty($status) || strlen($marks)==0 || empty($marks))
	{
?>
		<input type="hidden" value="<?php echo $val1=1?>"/ id="val1">
<?php		
		exit;
	}
	
	include "database1-connect.php";
	
	$stmt1=$conn->prepare("select * from tbltest1 where classId=:classId and testId<>:testId and testName=:testName");
	$stmt1->bindParam(':classId',$classId);
	$stmt1->bindParam(':testId',$testId);
	$stmt1->bindParam(':testName',$testName);
	$stmt1->execute();
	$numRow=$stmt1->rowcount();
	if($numRow==1)
	{
?>
		<input type="hidden" value=2 id="val1"/>
<?php
		exit;	
	}	
	
	
	$query="update tbltest1 set classId=:classId, testName=:testName, status=:status, subjectId=:subjectId, chapterId=:chapterId, marks=:marks where testId=:testId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':testId',$testId);
	$stmt->bindParam(':classId',$classId);
	$stmt->bindParam(':subjectId',$subjectId);
	$stmt->bindParam(':chapterId',$chapterId);
	$stmt->bindParam(':testName',$testName);
	$stmt->bindParam(':marks',$marks);
	$stmt->bindParam(':status',$status);
	if($stmt->execute())
	{
		$stmt=null;
		$conn=null;
?>
		<input type="hidden" value=1 id="val"/>
<?php		
		exit;	
	}
?>	

