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
		margin-top	:	20px;
	}
	.rightpart .rightside
	{
		margin-top	 :	20px;
		margin-right :  10px; 
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
				  <strong>Alert!</strong> Please enter a valid Test Name.
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
				  <strong>Alert!</strong> Test already exists.
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
						if($_REQUEST["err"]==1 || $_REQUEST["err"]==2)
						{
				?>			
							<option class=0 ><?php echo $_SESSION["className"]?></option>
							<option class=1 value=-1>-- select class --</option>
				<?php
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
								<option class="<?php echo $i?>" style="background-color:red;font-weight:bold;" value=-1>
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
			<div id="subject">
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
							<option class=1 value=-1>
								-- select subject --
							</option>
					<?php		
						}
						else
						{
					?>
							<option class=1 value=-1>
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
				<label for="chapterName" class="form-label" >
					<b>Chapter</b>
				</label>
				<select type="text" class="form-select" id="chapter1" name="chapterName" required aria-describedby="nameHelp">
					<?php
						if(isset($_SESSION["className"]))
						{	
					?>
							<option class=1>
								<?php echo $_SESSION["chapterName"]?>
							</option>
					<?php		
						}
						else
						{
					?>
							<option class=1 value=-1>
								-- select chapter --
							</option>
					<?php
						}
						require "database1-connect.php";
						
						$query ="select * from tblchapter where subjectName=:subjectName";
						$stmt=$conn->prepare($query);
						$stmt->bindParam(':subjectName',$_SESSION["subjectName"]);
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
			</div>
			<br>
			<div id="test">
			</div>	
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
			var chapterName=$("#chapter1").val();			
			$.post("get-test.php",{className:className,subjectName:subjectName,chapterName:chapterName},function(data){
				$("#test").html(data);
			});		
			$("#class1").change(function(){
				$("#chapter").fadeOut();
				$("#test").fadeOut();
				var className=$("#class1").val();
				$.post("get-subject.php",{className:className},function(data){
					$("#subject").html(data);
				});
			});		
			$("#subject").change(function(){
				var subjectName=$("#subject1").val();
				var className=$("#class1").val();
				$("#chapter").fadeIn();
				$("#test").hide();
				$.post("test-chapter.php",{className:className,subjectName:subjectName},function(data){
					$("#chapter").html(data);
				});	
			});
			$("#chapter").change(function(){
				var subjectName=$("#subject1").val();
				var chapterName=$("#chapter1").val();
				var className=$("#class1").val();
				$("#test").fadeIn();
				$.post("get-test.php",{className:className,subjectName:subjectName,chapterName:chapterName},function(data){
					$("#test").html(data);
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
		<div class="row">
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
				<div class="col">
					<div class="container">
						<div class="col-md-12">
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
											<option value="<?php echo $row["classId"]?>" class=0 ><?php echo $_SESSION["className"]?></option>
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
						</div>	
						<br>
						<div id="subject">
						</div>
						<br>
						<div id="test"></div>
						<br>
						<div id="status">
							<input class="form-check-input" type="radio" name="flexRadioDefault" value=1 id="status1" checked>
								Active
							</input>	
							<input class="form-check-input" type="radio" name="flexRadioDefault" value=2 id="status1">
								Inactive
							</input>
						</div>
						<p id="t1"></p>
						<div class="button">
							<br>
							<button type="button" class="btn btn-primary" id="btn1">
								Add Test
							</button>
							<br>	
						</div>
					</div>
				</div>
				<div class="col">
					<div class="rightside">
						<div class="col-md-12" id="chapter"></div>
						<p id="data1"></p>
					</div>	
				</div>
		</div>		
	</div>
	<?php
		
		include "include/footer.php";
		
		unset($_SESSION["subjectName"]);
		unset($_SESSION["className"]);
	?>
	<script>
		$(document).ready(function(){
			$("#navName").text("Welcome To Test Management Panel");
			$("#btn1").hide();
			$("#status").hide();
			$("#class1").change(function(){
				$("#chapter").fadeOut();
				$("#test").fadeOut();
				$("#btn1").fadeOut();
				$("#status").fadeOut();
				var classId=$("#class1").val();
				$.post("test-subject.php",{classId:classId},function(data){
					$("#subject").html(data);
				});
			});
			$("#subject").change(function(){
				var classId=$("#class1").val();
				var array = [];
				$('#subId[type="checkbox"]:checked').each(function(){
					array.push($(this).val());
				});
				if(array.length==0)
				{
					$("#chapter").fadeOut();
					$("#test").fadeOut();
					$("#status").fadeOut();
					$("#btn1").fadeOut();
				}
				var count = array.length;
				$("#chapter").fadeIn();
				$.post("test-chapter.php",{array:array,count:count,classId:classId},function(data){
					$("#chapter").html(data);
				});
			});
			$("#chapter").change(function(){
				$("#test").fadeIn();
				$("#btn1").fadeIn();
				$("#status").fadeIn();
				var arrray = [];
				$('#chapterId[type="checkbox"]:checked').each(function(){
					arrray.push($(this).val());
				});
				$.post("get-test.php",{arrray:arrray},function(data){
					$("#test").html(data);
				});
				if(arrray.length==0)
				{
					$("#test").fadeOut();
					$("#status").fadeOut();
					$("#btn1").fadeOut();
				}
			});	
			$("#btn1").click(function(){
				var classId=$("#class1").val();
				var array = [];
				$('#subId[type="checkbox"]:checked').each(function(){
					array.push($(this).val());
				});
				var arrray = [];
				$('#chapterId[type="checkbox"]:checked').each(function(){
					arrray.push($(this).val());
				});
				var marks=$.trim($("#marks").val());
				if(marks.length == 0) 
				{
					alert('Please! Enter valid Marks');
					exit;
				}
				var testName=$.trim($("#testName").val());
				if(testName.length == 0) 
				{
					alert('Please! Enter valid Test Name');
					exit;
				}
				$('#status1[type="radio"]:checked').each(function(){
					var status=$(this).attr("value");
					$.post("add-test-process.php",{array:array,arrray:arrray,status:status,classId:classId,testName:testName,marks:marks},function(data){
						$("#data1").html(data);
						var numRow=$("#numRow").val();
						if(numRow==1)
						{	
							alert("Test Already Exists.");
							exit;
						}	
						var val=$("#val").val();
						if(val==1)
						{	
							alert("Please Insert Valid Values.");
							exit;
						}
						if(val==2)
						{
							document.location.href="tests.php?msg=1";
						}	
					});
				});
			});
		})
	</script>
<?php
}
?>	
