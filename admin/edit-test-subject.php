<?php
	
	require "helper-methods.php";
	require "database1-connect.php";
	
	$classId = checkinput($_REQUEST["classId"]);
	$testId  = checkinput($_REQUEST["testId"]);
	
	if($classId==-1)
	{
?>
		<input type="hidden" value=1 id="flag"/>
<?php		
		exit;
	}
?>
<label for="subjectName" id="subject3" class="form-label" >
	<b>Subject</b>
</label>
<br>
<?php	
	$query1 ="select * from tbltest1 where testId=:testId ";
	$stmt1=$conn->prepare($query1);
	$stmt1->bindParam(':testId',$testId);
	$stmt1->execute();
	while($row1=$stmt1->fetch())
	{
		$subId = explode("#",$row1["subjectId"]);
	}
	$query ="select * from tblsubject where classId=:classId ";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':classId',$classId);
	$stmt->execute();
	$numRow=$stmt->rowcount();
	if($numRow == 0)
	{
		echo "No Subjects Found.";
	}
	
	for($i=0;$row=$stmt->fetch();$i++)
	{
		if($row["status"]==-1)
		{	
			echo "No Subjects Found.";				
		}
		else 
		{
			if($subId[$i]==$row["subjectId"])
			{
				$flag=1;
			}
			else 
			{
				$flag=0;
			}				
	?>
			<input
			<?php
			if($flag==1)
			{
				?>
				checked
				<?php
			}
		}
		?>	
		id="subId" class="form-check-input" type="checkbox" name="subjectId[]" value="<?php echo $row["subjectId"]?>"/>
<?php	
				echo $row["subjectName"]."<br>";
		
	}
$conn=null;	
?>	