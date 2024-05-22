<label for="className" class="form-label" >
	<b>Class</b>
</label>		
<select type="text" class="form-select" id="class1" name="className" required aria-describedby="nameHelp" placeholder="Select Class">		
	<?php
		if(isset($_SESSION["className"]))
		{	
			if($_REQUEST["err"]==4)
			{
	?>			
				<option class=0 ><?php echo $_SESSION["className"]?></option>
	<?php
			}
		}	
		else
		{
	?>	
		<option class=-1>-- select class --</option>
	<?php
		}
	?>
	<?php
		
		require "database1-connect.php";
		
		$query ="select * from tblclass";
		$stmt=$conn->prepare($query);
		$stmt->execute();
		for($i=1;$row=$stmt->fetch();$i++)
		{
	
	?>
			<?php
				if($row["status"]==2)
				{
			?>
					<option class="<?php echo $i?>" style="background-color:red;font-weight:bold;" value="-1">
					<?php	
						echo $row["className"]." "."(inactive)";	
					?>
					</option>			
			<?php
				}
				else
				{
			?>
			<option class="<?php echo $i?>">			
			<?php	
					echo $row["className"];
				}	
			?>	
			</option>
	<?php
		}
	?>
</select>
<label for="subjectName" class="form-label" >
	<b>Subject</b>
</label>
<select type="text" class="form-select" id="subject1"name="subjectName" required aria-describedby="nameHelp">
		<option class=-1>-- select subject --</option>
	<?php
		require "database1-connect.php";
		
		$query ="select * from tblsubject where className=:className";
		$stmt=$conn->prepare($query);
		$stmt->bindParam(':className',$className);
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
			<option class="<?php echo $i?>">			
			<?php	
					echo $row["subjectName"];
				}	
			?>	
			</option>
	<?php
		}
	?>
</select>
<label for="chapterName" class="form-label" >
	<b>Chapter</b>
</label>
<input type="text" class="form-control" value="<?php $_SESSION["chapterName"]?>" name="chapterName" required aria-describedby="nameHelp" placeholder="Enter Chapter">
</input>
<input type="hidden" value=1 name="status" required>
</input>	
