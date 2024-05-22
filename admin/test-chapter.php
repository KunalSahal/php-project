<?php
	require "helper-methods.php";
	$testId    = $_REQUEST["testId"];
	$subjectId = $_POST["array"];
	$classId   = checkinput($_REQUEST["classId"]);	
	
	if($_REQUEST["err"]==1)
	{
?>
		<label for="chapterName" class="form-label" >
			<b>Chapters</b>
		</label><br>
		<p>No Chapters Found.</p>
<?php		
		exit;
	}
		
	require "database1-connect.php";
	
	$stmt1=$conn->prepare("select * from tbltest1 where testId=:testId and classId=:classId");
	$stmt1->bindParam(':testId',$testId);
	$stmt1->bindParam(':classId',$classId);
	$stmt1->execute();
	$numRow1=$stmt1->rowcount();
	
	$stmt2=$conn->prepare("select * from tbltest1 where testId=:testId and classId=:classId");
	$stmt2->bindParam(':testId',$testId);
	$stmt2->bindParam(':classId',$classId);
	$stmt2->execute();
	while($row2=$stmt2->fetch())	
	{
		$cId = explode("#",$row2["chapterId"]);
	}
	
	if($numRow1==1)
	{
		foreach($subjectId as $value) 	
		{
			
			$query ="select * from tblchapter where classId=:classId and subjectId=:subjectId";
			$stmt=$conn->prepare($query);
			$stmt->bindParam(':classId',$classId);
			$stmt->bindParam(':subjectId',$value);
			$stmt->execute();
			$numRow=$stmt->rowcount();
		?>
			<br>
			<label for="chapterName" class="form-label" >
				<b>
					Chapters of
				<?php	
					$query1 ="select subjectName from tblsubject where subjectId=:subjectId";
					$stmt1=$conn->prepare($query1);
					$stmt1->bindParam(':subjectId',$value);
					$stmt1->execute();
					while($row1=$stmt1->fetch())	
					{
						echo $row1["subjectName"];
					}	
				?>	
				</b>
			</label>
			<?php
			if($numRow==0 )
			{
				echo "<br>"."No Chapters Found";
				exit;
			}
			for($i=0;$row=$stmt->fetch();$i++)
			{
				foreach($cId as $value1)
				{
					if($row["chapterId"]==$value1)
					{
						$flag=1;
						break;
					}
					else
					{
						$flag=0;
						continue;
					}
				}	
				if($row["status"]==-1)
				{	
					echo "<br>".$row["chapterName"]." "."(inactive)";	
				}
				else
				{
					
			?>	
				<br>
				<input
				<?php
				if($numRow1=1)
				{	
					if($flag==1)
					{
				?>
				checked
				<?php
					}
				}
				?>	
				value="<?php echo $row["chapterId"]?>" class="form-check-input" type="checkbox" name="chapterId<?php echo $i?>" id="chapterId"/>
			<?php	
					echo $row["chapterName"];
				}	
			}
		}	
	}
	else
	{
		foreach($subjectId as $value) 	
		{
			
			$query ="select * from tblchapter where classId=:classId and subjectId=:subjectId";
			$stmt=$conn->prepare($query);
			$stmt->bindParam(':classId',$classId);
			$stmt->bindParam(':subjectId',$value);
			$stmt->execute();
			$numRow1=$stmt->rowcount();
			
			if($numRow1==0 )
			{
				exit;
			}
		?>
			<br>
			<label for="chapterName" class="form-label" >
				<b>
					Chapters of
				<?php	
					$query1 ="select subjectName from tblsubject where subjectId=:subjectId";
					$stmt1=$conn->prepare($query1);
					$stmt1->bindParam(':subjectId',$value);
					$stmt1->execute();
					while($row1=$stmt1->fetch())	
					{
						echo $row1["subjectName"];
					}	
				?>	
				</b>
			</label>
			<?php
			for($i=0;$row=$stmt->fetch();$i++)
			{
				if($row["status"]==-1)
				{	
					echo "<br>".$row["chapterName"]." "."(inactive)";				
				}
				else
				{	
			?>	
				<br>
				<input value="<?php echo $row["chapterId"]?>" class="form-check-input" type="checkbox" name="chapterId<?php echo $i?>" id="chapterId"/>
			<?php	
					echo $row["chapterName"];
				}	
			}
		}
	}	
?>	

