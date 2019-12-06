<?php
	if (isset($_POST['submit'])) {
		$pat_fname         = escape($_POST['fname']);
        $pat_lname         = escape($_POST['lname']);
        $pat_name 		   = $pat_fname . " " . $pat_lname;
        $pat_gender        = escape($_POST['gender']);
        $pat_email         = escape($_POST['email']);
        $pat_phone         = $_POST['phonenumber'];
        $doc_category_id   = escape($_POST['doctor_assign']);
        $pat_dob           =  $_POST['dob'];
        $pat_address       = escape($_POST['addres1'].", " .$_POST['addres2'].", ");
        $pat_address	  .= $_POST['city'].", ".$_POST['state'].", ".$_POST['country'].".";
        $d = time();
        $pat_admission 	   = date("d-m-Y h:i:sa", $d);
        $room_id 		   = $_POST['room_assign'];
        
        $query = "INSERT INTO patient(p_name,p_gender,p_dob,p_email,p_phone,p_address,d_o_admission) ";
             
	    $query .= "VALUES('{$pat_name}','{$pat_gender}','{$pat_dob}','{$pat_email}','{$pat_phone}','{$pat_address}','{$pat_admission}') "; 
	             
	    $add_patient_query = mysqli_query($connection, $query);  
	    confirmQuery($add_patient_query);
	    $retrieve = "SELECT * FROM patient WHERE d_o_admission = '{$pat_admission}' ";
	    $retrieve_patient_query = mysqli_query($connection, $retrieve);  
	        
	    confirmQuery($retrieve_patient_query);
	    while ($row = mysqli_fetch_assoc($retrieve_patient_query)) {
	    	$patient_id = $row['p_id'];
	    }

	    $consultation = "INSERT INTO consults VALUES({$doc_category_id},{$patient_id})";
	    $consults_patient_query = mysqli_query($connection, $consultation);  
	          
	    confirmQuery($consults_patient_query);

	    $assign_room = "INSERT INTO room_patient VALUES( $room_id , {$patient_id})";
	    $consults_patient_query = mysqli_query($connection, $assign_room);  
	    confirmQuery($consults_patient_query);

	    // $prescibe_pat = "INSERT INTO prescribtion(e_id, p_id) VALUES( {$doc_category_id} , {$patient_id})";
	    // $prescibe_patient_query = mysqli_query($connection, $prescibe_pat);  
	    // confirmQuery($prescibe_patient_query);

	    $prescribtion_pat = "UPDATE prescribtion SET e_id = {$doc_category_id} where p_id = {$patient_id}";
	    $prescibe_patient_query = mysqli_query($connection, $prescribtion_pat);  
	    confirmQuery($prescibe_patient_query);
	    //header("Location: index.php");

	
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
		     	<input type="number" class="form-control" placeholder="Phone Number" name="phonenumber">
		      		
		    </div>
		      <div class="form-group col-md-3">
		     	<!-- <label for="inputState">State</label --><!-- > -->
		     	<select id="select-op" class="form-control" name="doctor_assign" >
		     		<option value='0' selected >Select  Doctor</option>
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
		     	<!-- <label for="inputState">State</label --><!-- > -->
		     	<select id="select-op" class="form-control" name="room_assign" >
		     		<option value='0' selected >Select  Room</option>
		     		<?php  
		     			$query = "SELECT * FROM room ";
					    $select_room = mysqli_query($connection,$query);
					    confirmQuery($select_room);	
					    while($row = mysqli_fetch_assoc($select_room)) {
						    $room_id = $row['r_id'];
						    $room_name = $row['r_name'];
						    echo "<option value='{$room_id}'>{$room_name}</option>";
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