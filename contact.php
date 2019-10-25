<?php include 'hms/include/header.php';  ?>
<?php include 'hms/include/navbar.php';  ?>
<?php include 'hms/include/config.php';  ?>
<?php
	
	if (isset($_POST['submit'])) {
		$name = $_POST['names'];
		$emailid = $_POST['emailid'];
		$phone = $_POST['mobile_number'];
		$description = $_POST['description'];
		


		$query = "INSERT INTO contact_us VALUES('$name','$emailid','$phone','$description')";

		$result = mysqli_query($conn,$query);
		if (!$result) {
			die("Not Performed Contact Us" );
		}
	}

 ?>

	
		
			
	<div class="container" id="contact">
		<div class="row">
			<div class="col-4">
				<div class="company_address">
			     	<h2 class="display-4" id="contact-header">Hospital Address  :</h2>
					    	<p>500 Lorem Ipsum Dolor Sit,<br>
					   			22-56-2-9 Sit Amet, Lorem,<br>
					   			India<br>

						   		Phone:(00) 222 666 444<br>
						   		Fax: (000) 000 00 00 0<br>
						 		Email: <span>codeprojectsorg@gmail.com</span>
						 	</p>

				</div>
			
			</div>
			<div class="col-8">
				<h2 class="display-4" id= contact-header>Contact Us:</h2>
				<form id="form-contact" method="post" action="contact.php">
					<div class="form-group">
				    	<label for="name">Name</label>
				    	<input type="text" class="form-control" id="names" name="names" aria-describedby="emailHelp" placeholder="Enter name" required>
				  	</div>
					<div class="form-group">
				    	<label for="emailid">Email address</label>
				    	<input type="email" class="form-control" id="emailid" name="emailid" aria-describedby="emailHelp" placeholder="Enter email" required>
				  	</div>
					<div class="form-group">
					    <label for="mobile_number">Number</label>
					    <input type="number" class="form-control" id="mobile_number" name="mobile_number" placeholder="number" min="5999999999" max="9999999999" required>
					</div>
					<div class="form-group">
					    <label for="description">Description</label>
					    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter the Problem" required></textarea>
					</div>
					<button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
				</form>
			</div>
		</div>	
	</div>

<?php include 'hms/include/footer.php';  ?>