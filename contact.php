<?php
	require "include/head.php";
?>
	<style>
		.container .card 
		{
			margin-top : 50px; 
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
			transition: 0.3s;
			width: 100%;
			margin-bottom : 70px;
		}
		.card:hover 
		{
			box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
		}
		.card iframe 
		{
			float : left;
		}
		.card label
		{
			margin-top : 20px;
			margin-bottom : 10px;
		}
		input[type=text], select, textarea 
		{	
			width: 85%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-top: 5px;
			resize: vertical;
			margin : -3px 13px;
		}
		input[type=submit] 
		{
			background-color: grey	;
			color: white;
			padding: 7px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			margin: 30px 20px;
			float: right;
		}
		input[type=submit]:hover 
		{
			background-color: black;
		}
	</style>
<?php	
	require "include/top.php";
?>
<div class="container">
	<h3>
		Contact Us
	</h3>
			<div class="card">
			<div class="row">
				<div class="col-md-7 map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3560.7007738532434!2d75.7678469143534!3d26.817654770633386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396dca7a3a621f43%3A0x7766efcd6a96adfc!2sShakambhari%20Kohinoor%20Residency!5e0!3m2!1sen!2sin!4v1677821157990!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>	
				<div class="col-md-5">
					<form action="/action_page.php">
						<label for="fname">Name</label>
						<input type="text" id="fname" name="firstname" placeholder="Your name..">
						<label for="lname">Mobile No.</label>
						<input type="text" name="number" placeholder="Your number....">
						<label for="subject">Subject</label>
						<textarea id="subject" name="subject" placeholder="Write something.." style="height:100px"></textarea>
						<input type="submit" value="Submit">
					</form>
				</div>
			</div>	
	</div>	
</div>		
<?php
	require "include/footer.php";
?>	