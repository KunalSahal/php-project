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
if(isset($_SESSION["classId"]))
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
			<select type="text" class="form-select" id="class1" name="classId" required aria-describedby="nameHelp" placeholder="Select Class">		
				<?php
					
					require "database1-connect.php";
					
					echo $_SESSION["classId"];
					
					if(isset($_SESSION["classId"]))
					{	
					
						$query1 ="select className from tblclass where classId=:classId";
						$stmt1=$conn->prepare($query1);
						$stmt1->bindParam(':classId',$_SESSION["classId"]);
						$stmt1->execute();
						for($i=1;$row1=$stmt1->fetch();$i++)
						{
						
							if($_REQUEST["err"]==1 || $_REQUEST["err"]==2)
							{
				?>			
								<option value="<?php echo $_SESSION["classId"]?>" class=0 ><?php echo $row1["className"]?></option>
								<option class=1 value=-1>-- select class --</option>
				<?php
							}
						}	
					}	
					else
					{
				?>	
						<option class=1 value=-1>-- select class --</option>
				<?php
					}
				?>
				<?php
					
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
								<option value="<?php echo $row["classId"]?>" class="<?php echo $i?>" style="background-color:red;font-weight:bold;" value=-1>
								<?php	
									echo $row["className"]." "."(inactive)";	
								?>
								</option>			
						<?php
							}
							else
							{
						?>
						<option value="<?php echo $row["classId"]?>" class="<?php echo $i?>">			
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
			<div id="subject">
				<label for="subjectName" class="form-label" >
					<b>Subject</b>
				</label>
				<select type="text" class="form-select" id="subject1" name="subjectName" required aria-describedby="nameHelp">
					<?php
						if(isset($_SESSION["classId"]))
						{
							
							$query2 ="select subjectName from tblsubject where subjectId=:subjectId";
							$stmt2=$conn->prepare($query2);
							$stmt2->bindParam(':subjectId',$_SESSION["subjectId"]);
							$stmt2->execute();
							for($i=1;$row2=$stmt2->fetch();$i++)
							{	
					?>
								<option value="<?php echo $_SESSION["subjectId"]?>" class=1>
									<?php echo $row2["subjectName"]?>
								</option>
					<?php		
							}
							$stmt2=null;		
						}	
						else
						{
					?>
							<option class=1 value=-1>
								-- select subject --
							</option>
					<?php
						}
						
						$query ="select * from tblsubject where classId=:classId";
						$stmt=$conn->prepare($query);
						$stmt->bindParam(':classId',$_SESSION["classId"]);
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
						$stmt=null;
						$conn=null;
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
		
		unset($_SESSION["subjectId"]);
		unset($_SESSION["classId"]);
	?>
	<script>
		$(document).ready(function(){
			var subjectId=$("#subject1").val();
			var classId=$("#class1").val();	
			$.post("get-chapter.php",{classId:classId,subjectId:subjectId},function(data){
				$("#chapter").html(data);
			});		
			$("#class1").change(function(){
				$("#chapter").fadeOut();
				var classId=$("#class1").val();
				$.post("get-subject.php",{classId:classId},function(data){
					$("#subject").html(data);
				});
			});		
			$("#subject").change(function(){
				var subjectId=$("#subject1").val();
				var classId=$("#class1").val();
				$("#chapter").fadeIn();
				$.post("get-chapter.php",{classId:classId,subjectId:subjectId},function(data){
					$("#chapter").html(data);
				});	
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
					if(isset($_SESSION["classId"]))
					{	
						if($_REQUEST["err"]==4)
						{
				?>			
							<option value="<?php echo $row["classId"]?>"class=0 ><?php echo $_SESSION["className"]?></option>
				<?php
						}
					}	
					else
					{
				?>	
						<option class=-1 value=-1>-- select class --</option>
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
								<option value="<?php echo $row["classId"]?>" class="<?php echo $i?>">			
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
		
		unset($_SESSION["subjectId"]);
		unset($_SESSION["classId"]);
		
		include "include/footer.php";
	?>
	<script>
		$(document).ready(function(){
			$("#navName").text("Welcome To Chapter Management Panel");
			$("#class1").change(function(){
				$("#chapter").fadeOut();
				var classId=$("#class1").val();
				$.post("get-subject.php",{classId:classId},function(data){
					$("#subject").html(data);
				});	
			});
			$("#subject").change(function(){
				var subjectId=$("#subject1").val();
				var classId=$("#class1").val();
				$("#chapter").fadeIn();
				$.post("get-chapter.php",{classId:classId,subjectId:subjectId},function(data){
					$("#chapter").html(data);
				});
			});		
		})
	</script>
<?php
}
?>	
