<?php
	session_start();
	$chapterId = trim($_REQUEST["chapterId"]);
	$status    = trim($_REQUEST["status"]);
	
	require "database1-connect.php";
	
	$query ="select * from tblchapter where chapterId=:chapterId and status=:status";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':chapterId',$chapterId);
	$stmt->bindParam(':status',$status);
	$stmt->execute();
	$numRow=$stmt->rowcount();
	
	if($numRow!=1)
	{
		$conn=null;
		header("location:chapters.php?err=3");
		exit;
	}
	
	if(!is_numeric($chapterId))
	{
		$conn=null;
		header("location:chapters.php?err=3");
		exit;
	}
	
	$query ="select * from tblchapter where chapterId=:chapterId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':chapterId',$chapterId);
	$stmt->execute();
	$row=$stmt->fetch();
	$chapterId   = $row["chapterId"];
	$classId     = $row["classId"];
	$classId1    = $row["classId"];
	$subjectId   = $row["subjectId"];
	$chapterName = $row["chapterName"];
	
	$stmt=null;
	$conn=null;
	
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
<div class="rightpart">		
	<div class="container">
		<form action="edit-chapter-process.php?chapterId=<?php echo $chapterId?>" method="post">
			<div>
				<label for="className" class="form-label" >
					<b>Class</b>
				</label>		
				<select type="text" class="form-select" id="class1" name="className" required aria-describedby="nameHelp" placeholder="Select Class">
					<option value="<?php echo $classId?>" class=0 >
						<?php
							
							require "database1-connect.php";
							
							$query1 ="select className from tblclass where classId=:classId";
							$stmt1=$conn->prepare($query1);
							$stmt1->bindParam(':classId',$classId);
							$stmt1->execute();
							for($i=1;$row1=$stmt1->fetch();$i++)
							{
								echo $row1["className"];
							}	
						?> 
					</option>	
					<option class=1 value=-1>-- select class --</option>
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
			</div>
			<?php
				if($_REQUEST["err"]==4)
				{
			?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  <strong>Alert!</strong> Please select a valid class.
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
			<?php		
				}
			?>
			<br>
			<div class="subject2">
				<label for="subjectName" id="subject3" class="form-label" >
					<b>Subject</b>
				</label>
				<select type="text" class="form-select" id="subject1" name="subjectName" required aria-describedby="nameHelp">
							<option value="<?php echo $subjectId?>" class=0>
								<?php
									$query2 ="select subjectName from tblsubject where subjectId=:subjectId";
									$stmt2=$conn->prepare($query2);
									$stmt2->bindParam(':subjectId',$subjectId);
									$stmt2->execute();
									for($i=1;$row2=$stmt2->fetch();$i++)
									{
										echo $row2["subjectName"];
									}
								?>
							</option>
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
						$stmt=null;
						$conn=null;
					?>
				</select>
			</div>
			<?php
				if($_REQUEST["err"]==5)
				{
			?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  <strong>Alert!</strong> Please select a valid subject.
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
			<?php		
				}
			?>
			<br>
			<div>
				<label for="chapterName" class="form-label" >
					<b>Chapter</b>
				</label>
				<input type="text" class="form-control" id="chapterName" value="<?php echo $chapterName?>" name="chapterName" required aria-describedby="nameHelp" placeholder="Enter Chapter">
				</input>
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
					if($_REQUEST["err"]==3)
					{
				?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
						  <strong>Alert!</strong> Chapter already exists.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php		
					}
				?>
			</div>
			<br>
			<div class="col-md-11">
				<label for="status" class="form-label" >
					<b>Status</b>
				</label>
				<div class="form-check">
					<input class="form-check-input" value=1 type="radio" name="status" 
					<?php 
						if($status==1) 
							{
					?> 
						checked 
					<?php
							}
					?>  required ></input>
					<label class="form-check-label" for="flexRadioDefault1">
						Active
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" value=2 type="radio" name="status" 
					<?php 
						if($status==2) 
							{
					?> 
						checked 
					<?php
							}
					?>  required ></input>
					<label class="form-check-label" for="flexRadioDefault1">
						Inactive
					</label>
				</div>
			</div>
			<br>			
			<div class="button">
				<br>
				<button type="submit" class="btn btn-primary">
					Update
				</button>
				<br>	
			</div>
		</form>	
	</div>	
</div>
<?php
	
	include "include/footer.php";
	
	unset($_SESSION["subjectName"]);
	unset($_SESSION["className"]);
?>
<script>
	$(document).ready(function(){
		$("#navName").text("Chapter Edit Panel");
		$("#class1").change(function(){	
			var classId   = $("#class1").val();
			var chapterId = $("#chapterName").val();
			$("#subject1").hide();
			$("#subject3").hide();
			$.post("get-className.php",{classId:classId,chapterId:chapterId},function(data){
				$(".subject2").html(data);
			});
		});	
	});
</script>	