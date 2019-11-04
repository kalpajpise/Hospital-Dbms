<?php

   

   if(isset($_POST['submit'])) {
   
            $emp_fname         = escape($_POST['fname']);
            $emp_lname         = escape($_POST['lname']);
            $emp_name 		   = $emp_fname . " " . $emp_lname;
            $emp_gender        = escape($_POST['gender']);
            $emp_email         = escape($_POST['email']);
            $emp_phone         = $_POST['phonenumber'];
            $emp_category_id   = escape($_POST['category']);
            $emp_dob           =  $_POST['dob'];
    
            $emp_salary        = $_POST['salary'];
            $emp_address       = escape($_POST['addres1'].", " .$_POST['addres2'].", ");
            $emp_address	  .= $_POST['city'].", ".$_POST['state'].", ".$_POST['country'].".";
            
            
       
      $query = "INSERT INTO employee(e_name,e_gender,e_email,e_phone,c_id,e_dob,e_address,e_salary) ";
             
      $query .= "VALUES('{$emp_name}','{$emp_gender}','{$emp_email}','{$emp_phone}',{$emp_category_id},'{$emp_dob}','{$emp_address}','{$emp_salary}') "; 
             
      $create_post_query = mysqli_query($connection, $query);  
          
      confirmQuery($create_post_query);
   }
    

    
    
?>








<script type="text/javascript" src="../js/city_state.js"></script>
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
		     	<select id="select-op" class="form-control" name="category" >
		     		<?php 
		     			$query = "SELECT * FROM categories";
					    $select_categories = mysqli_query($connection,$query);
					    while($row = mysqli_fetch_assoc($select_categories)) {
						    $cat_id = $row['cat_id'];
						    $cat_title = $row['cat_title'];
						    echo "<option value='{$cat_id}'>{$cat_title}</option>";
						}


		     		 ?>
		        		
		        		
		      	</select>
		      		
		    </div>
		    <div class="form-group col-md-3">
		      	<!-- <label for="inputZip">Zip</label> -->
		      	<input type="date" class="form-control"  placeholder="DD-MM-YYYY" name="dob">
		      		
		    </div>
		    <div class="form-group col-md-3">
		     	<!-- <label for="inputState">State</label --><!-- > -->
		     	<input type="number" class="form-control" placeholder="Salary" name="salary">
		      		
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
		     	<select id="countries-list" class="form-control" name="country" >
		        		<option selected>Country</option>
		      	</select>
		      		
		    </div>
		    <div class="form-group col-md-4">
		     	<!-- <label for="inputState">State</label --><!-- > -->
		      		<select id="sates-list" class="form-control" name="state">
		        		<option selected>State</option>
		        		<option>Karnataka</option>
		      		</select>
		    </div>
		    <div class="form-group col-md-4">
		      	<!-- <label for="inputZip">Zip</label> -->
		      		<select id="cities-list" class="form-control" name="city" >
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
	