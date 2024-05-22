<?php
	$classId   = $_REQUEST["classId"];
	$chapterId = $_REQUEST["chapterId"];
?>
<label for="subjectName" class="form-label" >
	<b>Subject</b>
</label>
<select type="text" class="form-select" id="subject1" name="subjectName" required aria-describedby="nameHelp">
	<?php
		require "database1-connect.php";
		
		$query1 ="select subjectId from tblchapter where classId=:classId and chapterName=:chapterId";
		$stmt1=$conn->prepare($query1);
		$stmt1->bindParam(':classId',$classId);
		$stmt1->bindParam(':chapterId',$chapterId);
		$stmt1->execute();
		$numRow=$stmt1->rowcount();
	
		if($numRow==1)
		{
			while($row1=$stmt1->fetch())
			{
				$query2 ="select * from tblsubject where subjectId=:subjectId";
				$stmt2=$conn->prepare($query2);
				$stmt2->bindParam(':subjectId',$row1["subjectId"]);
				$stmt2->execute();
				for($i=1;$row2=$stmt2->fetch();$i++)
				{
	?>
				<option value="<?php echo $row2["subjectId"]?>" class="<?php echo $i?>">
				<?php
					echo $row2["subjectName"];
				}	
				?>	
				</option>
	<?php
			}
		}
	?>	
			<option class=1 value=-1>-- select subject --</option>
	<?php	
		$query ="select * from tblsubject where classId=:classId";
		$stmt=$conn->prepare($query);
		$stmt->bindParam(':classId',$classId);
		$stmt->execute();
		for($i=1;$row=$stmt->fetch();$i++)
		{
	?>	
			<?php
				if($row["status"]==-1)
				{
			?>
					<option class="<?php echo $i?>" style="background-color:red;font-weight:bold;" value="-1">
					<?php	
						echo $row["subjectName"]." "."(inactive)";	
					?>
					</option>			
			<?php
				}
				else
				{
			?>
			<option value="<?php echo $row["subjectId"]?>" class="<?php echo $i?>">
				<?php
					echo $row["subjectName"];
				}	
				?>	
			</option>
	<?php
		}
	?>
</select>