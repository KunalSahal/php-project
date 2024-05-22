<?php	
	include "include/top-most.php";
?>
<title>
	Admin
</title>
<style>
	<?php	
		include "include/top.php";
	?>
	.rightpart .container 
	{
		width		:	60%;
		margin-top	:	20px;
	}
	.container .button
	{
		float	:	right;
	}
	<?php	
		include "include/footer-style.php";
	?>
</style>
<?php
	include "include/head.php";
	include "include/leftpart.php";
?>
<div class="rightpart">
	<div class="container">
		<form action="subjects.php" method="post">
			<label for="className" class="form-label" >
				<b>Class</b>
			</label>
			<?php
					
				require "database1-connect.php";
				
				$query ="select * from tblclass";
				$stmt=$conn->prepare($query);
				$stmt->execute();
			?>		
			<select type="text" class="form-control" name="classId" required aria-describedby="nameHelp" placeholder="Select Class">
				<option class=-1>--select class--</option>
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
								<option class="<?php $i?>" style="background-color:red;font-weight:bold;" value="<?php echo $row["classId"]?>">
								<?php	
									echo $row["className"]." "."(inactive)";	
								?>
								</option>			
						<?php
							}
							else
							{
						?>
						<option class="<?php $i?>" value="<?php echo $row["classId"]?>">			
						<?php	
								echo $row["className"];
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
					  <strong>Alert!</strong> Please enter a valid class name.
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
			<?php		
				}
			?>
			<br>
			<div class="button">
				<button type="submit" class="btn btn-primary">
					Submit
				</button>
			</div>
		</form>
	</div>	
</div>
<?php
	include "include/footer.php";
?>		
