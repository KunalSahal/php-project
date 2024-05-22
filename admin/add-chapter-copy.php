<?php
	session_start();
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
		float:right;
		margin-bottom:15px;
	}
	.button a
	{
		text-decoration:none;
	}
	<?php	
		include "include/footer-style.php";
	?>
</style>
<?php
	include "include/head.php";
	include "include/leftpart.php";
?>
<?php
if(isset($_SESSION["className"]))
{
?>
	<div class="rightpart">		
		<?php
			if($_REQUEST["err"]==1)
			{
		?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Alert!</strong> Please enter a valid Chapter Name.
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php		
			}
		?>
		<?php
			if($_REQUEST["err"]==2)
			{
		?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Alert!</strong> Chapter already exists.
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php		
			}
		?>
		<div class="container">
			<label for="className" class="form-label" >
				<b>Class</b>
			</label>		
			<select type="text" class="form-control" id="class1" name="className" required aria-describedby="nameHelp" placeholder="Select Class">		
				<?php
					if(isset($_SESSION["className"]))
					{	
						if($_REQUEST["err"]==1 || $_REQUEST["err"]==2)
						{
				?>			
							<option class=0 ><?php echo $_SESSION["className"]?></option>
				<?php
						}
					}	
					else
					{
				?>	
						<option class=1>-- select class --</option>
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
			<br>
			<div>
				<label for="subjectName" class="form-label" >
						<b>Subject</b>
				</label>
				<select type="text" class="form-select" id="subject1" name="subjectName" required aria-describedby="nameHelp">
					<?php
						if(isset($_SESSION["className"]))
						{	
					?>
							<option class=1>
								<?php echo $_SESSION["subjectName"]?>
							</option>
					<?php		
						}
						else
						{
					?>
							<option class=1>
								-- select subject --
							</option>
					<?php
						}
						require "database1-connect.php";
						
						$query ="select * from tblsubject where className=:className";
						$stmt=$conn->prepare($query);
						$stmt->bindParam(':className',$_SESSION["className"]);
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
			</div>
			<br>
			<div id="chapter">
			</div>
			<br>
		</div>	
	</div>
	<?php
		
		include "include/footer.php";
		
		unset($_SESSION["subjectName"]);
		unset($_SESSION["className"]);
	?>
	<script>
		$(document).ready(function(){
			var subjectName=$("#subject1").val();
			var className=$("#class1").val();	
			$.post("get-chapter.php",{className:className,subjectName:subjectName},function(data){
				$("#chapter").html(data);
			});	
		})
	</script>	
<?php
}
else
{
?>	
	<div class="rightpart">	
		<?php
			if($_REQUEST["err"]==2)
			{
		?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Alert!</strong> Chapter already exists.
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php		
			}
		?>	
		<?php
			if($_REQUEST["msg"]==1)
			{
		?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<h4 class="alert-heading">Subject has been added successfully!</h4>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php		
			}
		?>
		<div class="container">
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
			<br>
			<div><p id="subject"></p></div>
			<div><p id="chapter"></p></div>
		</div>	
	</div>
	<?php
		
		include "include/footer.php";
		
		unset($_SESSION["subjectName"]);
		unset($_SESSION["className"]);
	?>
	<script>
		$(document).ready(function(){
			$("#class1").click(function(){
				$("#chapter").fadeOut();
				var className=$("#class1").val();
				$.post("get-subject.php",{className:className},function(data){
					$("#subject").html(data);
				});	
			});
			$("#subject").click(function(){
				var subjectName=$("#subject1").val();
				var className=$("#className").val();
				$("#chapter").fadeIn();
				$.post("get-chapter.php",{className:className,subjectName:subjectName},function(data){
					$("#chapter").html(data);
				});
			});		
		})
	</script>
<?php
}
?>	
