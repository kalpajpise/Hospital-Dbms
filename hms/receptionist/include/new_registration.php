<h2 id="main_header">Enter the details</h2>
	<form id="form" method="post" action="">
		<div class="form-row">
			<div class="form-group col-md-6">
			    <!-- <label for="Name">Name</label> -->
			      	<input type="text" class="form-control" id="FName" placeholder="First Name" name="fname">
			</div>
			<div class="form-group col-md-6">
			    <!-- <label for="inputEmail4">Email</label> -->
			     	<input type="text" class="form-control" id="LName" placeholder="Last Name" name="lname">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6" >
				<select id="select-op" class="form-control" placeholder name="gender">
					<option selected="">Gender</option>
					<option>Male</option>
					<option>Female</option>
					<option>Others</option>
				</select>
				
			</div>
			<div class="form-group col-md-6">
			    <!-- <label for="inputEmail4">Email</label> -->
			     	<input type="email" class="form-control" id="Email" placeholder="Email" name="email">
			</div>
		</div>
		<div class="form-row">
		    <div class="form-group col-md-3">
		     	<!-- <label for="inputCity">City</label> -->
		     	<input type="number" class="form-control" placeholder="Phone Number" name="phonenumber">
		      		
		    </div>
		    <div class="form-group col-md-3">
		     	<!-- <label for="inputState">State</label --><!-- > -->
		     	<select id="select-op" class="form-control" name="room_assign" >
		     		<?php 
		     			$query = "SELECT * FROM room";
					    $select_categories = mysqli_query($connection,$query);
					    while($row = mysqli_fetch_assoc($select_categories)) {
						    $room_id = $row['r_id'];
						    $room_name = $row['r_name'];
						    echo "<option value='{$room_id}'>{$room_name}</option>";
						}


		     		 ?>
		     		 
		        		
		        		
		      	</select>
		      </div>
		      <div class="form-group col-md-3">
		     	<!-- <label for="inputState">State</label --><!-- > -->
		     	<select id="select-op" class="form-control" name="doctor_assign" >
		     		<?php  
		     			$query = "SELECT * FROM  categories c ,employee e where cat_title = 'Doctor' AND  c.cat_id = e.c_id";
					    $select_doctor = mysqli_query($connection,$query);
					    confirmQuery($select_doctor);	
					    while($row = mysqli_fetch_assoc($select_doctor)) {
						    $emp_id = $row['e_id'];
						    $doc_name = $row['e_name'];
						    echo "<option value='{$emp_id}'>{$doc_name}</option>";
						}


		     		 ?>
		     	</select>
		 
		      		
		    </div>
		    <div class="form-group col-md-3">
		      	<!-- <label for="inputZip">Zip</label> -->
		      	<input type="date" class="form-control"  placeholder="DD-MM-YYYY" name="dob">
		      		
		    </div>
		 </div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<!-- <label for="inputAddress">Address</label> -->
				  	<input type="text" class="form-control" id="Address1" placeholder="Address Line 1" name="addres1">
			</div>
			<div class="form-group col-md-6">
			    <!-- <label for="inputAddress2">Address 2</label> -->
			   		<input type="text" class="form-control" id="Address2" placeholder="Address Line 2" name="addres2">
			</div>
		</div>	
		
		<div class="form-row">
		    <div class="form-group col-md-4">
		     	<!-- <label for="inputCity">City</label> -->
		     	<select id="select-op" class="form-control" name="country" >
		        		<option selected>Country</option>
		        		<option>India</option>
		      	</select>
		      		
		    </div>
		    <div class="form-group col-md-4">
		     	<!-- <label for="inputState">State</label --><!-- > -->
		      		<select id="select-op" class="form-control" name="state">
		        		<option selected>State</option>
		        		<option>Karnataka</option>
		      		</select>
		    </div>
		    <div class="form-group col-md-4">
		      	<!-- <label for="inputZip">Zip</label> -->
		      		<select id="select-op" class="form-control" name="city" >
		        		<option selected>City</option>
		        		<option>Bangalore</option>
		      		</select>
		    </div>
		</div>
		<div class="form-row col-md-12">
			<button type="submit" class="btn btn-primary" id="btn"  name="submit">Submit
			</button>
		</div>
	</form>