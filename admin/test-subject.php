<?php

	require "helper-methods.php";
	$classId   =	checkinput($_REQUEST["classId"]);
	
?>	

<label for="subjectId" class="form-label" >
	<b>Subjects</b>
</label>
<?php
	require "database1-connect.php";
	
	$query ="select * from tblsubject where classId=:classId ";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':classId',$classId);
	$stmt->execute();
	$numRow=$stmt->rowcount();

	if($numRow==0)
	{
		echo "<br>"."No subjects found.";
	}
	
	for($i=1;$row=$stmt->fetch();$i++)
	{
?>		
		<?php
			if($row["status"]==-1)
			{
		?>
				<br>
				<?php	
					echo $row["subjectName"]." "."(inactive)";	
				?>			
		<?php
			}
			else
			{
		?>
				<br>
				<input id="subId" class="form-check-input" type="checkbox" name="subjectId[]" value="<?php echo $row["subjectId"]?>"/>
		<?php	
				echo $row["subjectName"];
		?>
				
		<?php
			}	
		?>	
<?php
	}
?>
