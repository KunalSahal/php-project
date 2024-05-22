<?php

	session_start();
	
	require "helper-methods.php";
	
	$classId	 =	checkinput($_REQUEST["classId"]);
	$_SESSION["classId"] = $classId;
	
	if($classId==-1||0)
	{
?>	
		
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <strong>Alert!</strong> Please select a valid class.
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
<?php		
	exit;
	}	
?>
<input type="hidden" id="classId" value="<?php echo $classId?>"></input>
<label for="subjectName" class="form-label" >
	<b>Subject</b>
</label>
<select type="text" class="form-select" id="subject1" name="subjectName" required aria-describedby="nameHelp">
			<option class=1 value=-1>-- select subject --</option>
	<?php
		require "database1-connect.php";
		
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
					<option value="<?php echo $row["subjectId"]?>" class="<?php echo $i?>" style="background-color:red;font-weight:bold;" value="-1">
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
<?php
	if($_REQUEST["err"]==2)
	{
?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <strong>Alert!</strong> Please enter a valid subject name.
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
<?php		
	}
?>
<?php
	if($_REQUEST["err"]==4)
	{
?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <strong>Alert!</strong> Subject already exists.
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
<?php		
	}
?>