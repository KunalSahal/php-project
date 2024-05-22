<?php
	$subjectName = $_REQUEST["subjectName"];
?>
<label for="chapterName" class="form-label" >
	<b>Chapter</b>
</label>
<select type="text" class="form-select" id="chapter1" name="chapterName" required aria-describedby="nameHelp">
			<option class=1 value=-1>-- select chapter --</option>
	<?php
		require "database1-connect.php";
		
		$query ="select * from tblchapter where subjectName=:subjectName";
		$stmt=$conn->prepare($query);
		$stmt->bindParam(':subjectName',$subjectName);
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
						echo $row["chapterName"]." "."(inactive)";	
					?>
					</option>			
			<?php
				}
				else
				{
			?>
			<option class="<?php echo $i?>">			
			<?php	
					echo $row["chapterName"];
				}	
			?>	
			</option>
	<?php
		}
	?>
</select>