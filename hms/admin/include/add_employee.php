<?php
   

   if(isset($_POST['create_post'])) {
   
            $doc_fname         = escape($_POST['fname']);
            $doc_lname         = escape($_POST['lname']);
            $doc_name 		   = $doc_fname . " " . $doc_lname;
            $doc_gender        = escape($_POST['gender']);
            $doc_email        = escape($_POST['email']);
            $doc_phone        = escape($_POST['phone']);
            $doc_category_id  = escape($_POST['category']);
            $doc_dob          = escape($_POST['dob']);
    
            $doc_salary        = escape($_POST['salary']);
            $doc_address      = escape($_POST['addres1']." " .$_POST['addres2']);
       
      $query = "INSERT INTO employee(e_name,e_gender,e_email,e_phone,e_job,c_id,e_address,e_salary) ";
             
      $query .= "VALUES({$doc_name},'{$doc_gender}','{$doc_email}',{$doc_phone},'{$doc_dob}','{$doc_address}','{$doc_salary}') "; 
             
      $create_post_query = mysqli_query($connection, $query);  
          
      confirmQuery($create_post_query);
   }
    

    
    
?>









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
		     	<input type="tell" class="form-control" name="phonenumber" placeholder="Phone Number" name="phone">
		      		
		    </div>
		    <div class="form-group col-md-3">
		     	<!-- <label for="inputState">State</label --><!-- > -->
		     	<input type="text" class="form-control" name="bloodgroup" placeholder="Job" name="category">
		      		
		    </div>
		    <div class="form-group col-md-3">
		      	<!-- <label for="inputZip">Zip</label> -->
		      	<input type="date" class="form-control" name="dob" placeholder="DD-MM-YYYY" name="dob">
		      		
		    </div>
		    <div class="form-group col-md-3">
		     	<!-- <label for="inputState">State</label --><!-- > -->
		     	<input type="number" class="form-control" name="bloodgroup" placeholder="Salary" name="salary">
		      		
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