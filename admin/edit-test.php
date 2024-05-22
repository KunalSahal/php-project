<?php
	session_start();
	$testId = trim($_REQUEST["testId"]);
	$status = trim($_REQUEST["status"]);
	
	require "database1-connect.php";
	
	$query ="select * from tbltest1 where testId=:testId and status=:status";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':testId',$testId);
	$stmt->bindParam(':status',$status);
	$stmt->execute();
	$numRow=$stmt->rowcount();
	
	if($numRow!=1)
	{
		$conn=null;
		header("location:tests.php?err=3");
		exit;
	}
	
	$query ="select * from tbltest1 where testId=:testId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':testId',$testId);
	$stmt->execute();
	while($row=$stmt->fetch())
	{	
		$testId    = $row["testId"];
		$classId   = $row["classId"];
		$testName  = $row["testName"];
		$marks     = $row["marks"];
		$subId     = explode ("#",$row["subjectId"]);
		$chapId    = explode ("#",$row["chapterId"]);
	}
	
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
		width		:	80%;
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
	<input type="hidden" id="testId" value="<?php echo $testId?>"/>		
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<label for="className" class="form-label" >
					<b>Class</b>
				</label>		
				<select type="text" class="form-select" id="class1" name="className" required aria-describedby="nameHelp" placeholder="Select Class">
					<option class=0 value="<?php echo $classId?>">
						<?php 
							$stmt3=$conn->prepare("select className from tblclass where classId=:classId");
							$stmt3->bindParam(':classId',$classId);
							$stmt3->execute();
							while($row3=$stmt3->fetch())
							{
								echo $row3["className"];
							}	
						?>
					</option>	
					<option class=1 value=-1>-- select class --</option>
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
							<option class="<?php echo $i?>" value="<?php echo $row["classId"]?>">			
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
				<div class="subject2" id="subject">
					<label for="subjectName" id="subject3" class="form-label" >
						<b>Subject</b>
					</label>
					<br>
					<?php
						$query ="select * from tblsubject where classId=:classId ";
						$stmt=$conn->prepare($query);
						$stmt->bindParam(':classId',$classId);
						$stmt->execute();
						$numRow=$stmt->rowcount();
						
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
								<input 
								<?php
								foreach($subId as $value)
								{
									if($value == $row["subjectId"])
									{
								?>
								checked
								<?php
									}
								}
								?> 
								id="subId" class="form-check-input" type="checkbox" name="subjectId[]" value="<?php echo 
								$row["subjectId"]?>"/>
						<?php	
								echo $row["subjectName"]."<br>";
							}	
						?>	
					<?php
						}
					?>
				</div>
				<br>
				<div id="marks1">
					<label for="marks" class="form-label" >
						<b>Marks</b>
					</label>
					<input type="integer" class="form-control" value="<?php echo $marks;?>" id="marks" name="marks" required aria-describedby="nameHelp" placeholder="Enter Marks">
					</input>
				</div>
				<br>
				<div id="test1">
					<label for="testName" class="form-label" >
						<b>Test</b>
					</label>
					<input type="text" class="form-control" value="<?php echo $testName;?>" id="testName" name="testName" required aria-describedby="nameHelp" placeholder="Enter Test Name">
					</input>
				</div>
				<br>
				<div class="col-md-11" id="status1">
					<label for="status" class="form-label" >
						<b>Status</b>
					</label>
					<div class="form-check">
						<input class="form-check-input" id="status" value=1 type="radio" name="status" 
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
						<input class="form-check-input" id="status" value=2 type="radio" name="status" 
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
				<div class="button" id="button">
					<br>
					<button type="btn" class="btn btn-primary" id="btn1">
						Update
					</button>
					<br>	
				</div>
			</div>
			<div class="col-md-6">	
				<div class="chapter2" id="chap1">
					<?php
						foreach($subId as $value)
						{
					?>		
							<label for="chapterName" id="chapter3" class="form-label" >
								<b>
									Chapters of
									<?php
										$query ="select subjectName from tblsubject where subjectId=:subjectId ";
										$stmt=$conn->prepare($query);
										$stmt->bindParam(':subjectId',$value);
										$stmt->execute();
									
										while($row=$stmt->fetch())
										{
											echo $row["subjectName"];	
										}	
									?>
								</b>
							</label>
					<?php	
							$query ="select * from tblchapter where subjectId=:subjectId ";
							$stmt=$conn->prepare($query);
							$stmt->bindParam(':subjectId',$value);
							$stmt->execute();
							$numRow1=$stmt->rowcount();	
							for($i=1;$row=$stmt->fetch();$i++)
							{
					?>		
							<?php
								if($row["status"]==-1 || $cId==1)
								{
									echo "No"."Chapters"."Found.";			
								}	
								else
								{									
							?>
									<br>
									<input 
									<?php
									foreach($chapId as $value1)
									{
										if($value1 == $row["chapterId"])
										{
									?>
									checked
									<?php
										}
									}
									?> 
									<input id="chapterId"class="form-check-input" type="checkbox" name="subjectId[]" value="<?php echo $row["chapterId"]?>"/>		
							<?php	
									echo $row["chapterName"];
								}	
							?>	
					<?php
							}
					?>
							<br>
					<?php
						}
					?>
					<?php
						if($_REQUEST["err"]==6)
						{
					?>
							<div class="alert alert-warning alert-dismissible fade show" role="alert">
							  <strong>Alert!</strong> Please select a valid chapter.
							  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
					<?php		
						}
					?>
				</div>
				<p id="t1"></p>
			</div>	
		</div>		
	</div>	
</div>
<?php
	
	include "include/footer.php";
	
	$stmt=null;
	$conn=null;
	
	unset($_SESSION["chapterName"]);
	unset($_SESSION["subjectName"]);
	unset($_SESSION["className"]);
?>
<script>
	$(document).ready(function(){
		var classId      = $("#class1").val();
		var testId   = $("#testId").val();
		var status   = $("#status").val();
		$("#navName").text("Test Editing Panel");
		var array   = [];
		$('#subId[type="checkbox"]:checked').each(function(){
			array.push($(this).val());
		});
		$("#class1").change(function(){
			$("#chap1").fadeIn();
			var classId = $("#class1").val();
			var testId  = $("#testId").val();
			$.post("edit-test-subject.php",{testId:testId,classId:classId},function(data){
				$("#subject").html(data);
				var flag = $("#flag").val();
				if(flag==1)
				{
					alert("Please select valid class.");
					exit;	
				}
			});
			$.post("test-chapter.php",{array:array,classId:classId,testId:testId},function(data){
				$("#chap1").html(data);
			});	
		});
		$("#subject").change(function(){
			var classId=$("#class1").val();
			$("#chap1").fadeIn();
			var array = [];
			$('#subId[type="checkbox"]:checked').each(function(){
				array.push($(this).val());
			});
			if(array.length == 0)
			{
				alert("Please select subject.");
				$("#chap1").hide();
				exit;
			}	
			$.post("test-chapter.php",{array:array,classId:classId,testId:testId},function(data){
				$("#chap1").html(data);
			});
		});
		$("#chap1").change(function(){
			$("#test1").fadeIn();
			$("#status1").fadeIn();
			$("#button").fadeIn();
			var array1 = [];
			$('#chapterId[type="checkbox"]:checked').each(function(){
				array1.push($(this).val());
			});
			if(array1.length == 0)
			{
				alert("Please select chapter.");
				exit;
			}	
		});
		$("#btn1").click(function(){
			var classId  = $("#class1").val();
			var testName = $.trim($("#testName").val());
			var marks    = $.trim($("#marks").val());
			var array = [];
			$('#subId[type="checkbox"]:checked').each(function(){
				array.push($(this).val());
			});
			var array2 = [];
			$('#chapterId[type="checkbox"]:checked').each(function(){
				array2.push($(this).val());
			});
			var status;
			$('#status[type="radio"]:checked').each(function(){
				 status=$(this).attr("value");
				if(array.length == 0)
				{
					alert("Please Select Subject.");
					exit;
				}
				if(array2.length==0)
				{
					alert("Please Select Chapter.");
					exit;
				}
				if(classId.length==0 || classId.length==-1)
				{
					alert("Please Select Class.");
					exit;
				}
				if(testName.length==0)
				{
					alert("Please Enter A Valid Test Name.");
					exit;
				}
				if(marks.length==0)
				{
					alert("Please Enter A Valid Marks.");
					exit;
				}
				if(status.length==0)
				{
					alert("Please Select Status.");
					exit;
				}
				$.post("edit-test-process.php",{array:array,array2:array2,classId:classId,testName:testName,testId:testId,status:status,marks:marks},function(data){
					$("#t1").html(data);
					var flag = $("#flag").val();
					if(flag==1)
					{
						alert("Please select valid class.");
						exit;	
					}
					var val1 = $("#val1").val();
					if(val1==1)
					{
						alert("Please insert valid values");
						exit;	
					}
					if(val1==2)
					{
						alert("Test Name Already Exists.");
						exit;	
					}
					var val = $("#val").val();
					if(val==1)
					{	
						document.location.href="tests.php?msg=3";	
					}	
				});
			});	
		});
	});
</script>	