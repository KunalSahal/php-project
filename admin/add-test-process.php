<?php
	
	session_start();
	require "helper-methods.php";	
	$classId   = checkinput($_REQUEST["classId"]);
	$testName  = checkinput($_REQUEST["testName"]);
	$status    = checkinput($_REQUEST["status"]);
	$marks     = checkinput($_REQUEST["marks"]);
	$subjectId = implode("#",$_POST["array"]);
	$chapterId = implode("#",$_POST["arrray"]);
	
	if($classId==0 || $testName==0 || $status==0 || $marks==0)
	{
		$val=0
?>
		<input type="hidden" value="<?php echo $val?>" id="val"/>
<?php	
		exit;	
	}
	
	require 'database1-connect.php';
	
	$stmt=$conn->prepare("select * from tbltest1 where classId=:classId and testName=:testName");
	$stmt->bindParam(':classId',$classId);
	$stmt->bindParam(':testName',$testName);
	$stmt->execute();
	$numRow=$stmt->rowcount();
	if($numRow==1)
	{
?>
		<input type="hidden" value=1 id="numRow"/>
<?php	
		exit;	
	}
	
	$query = "insert into tbltest1 (classId,subjectId,chapterId,testName,marks,status) values(:classId,:subjectId,:chapterId,:testName,:marks,:status)";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':classId',$classId);
	$stmt->bindParam(':subjectId',$subjectId);
	$stmt->bindParam(':chapterId',$chapterId);
	$stmt->bindParam(':testName',$testName);
	$stmt->bindParam(':marks',$marks);
	$stmt->bindParam(':status',$status);
	if($stmt->execute())
	{
?>
		<input type="hidden" value=2 id="val"/>
<?php		
		$stmt=null;
		$conn=null;
		exit;
	}	
?>	
		