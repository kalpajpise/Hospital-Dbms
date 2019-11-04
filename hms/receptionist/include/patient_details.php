<?php

    if(isset($_GET['edit_emp'])){
    
    $the_employee_id =  escape($_GET['edit_emp']);

    }


    $query = "SELECT * FROM employee WHERE e_id = $the_employee_id  ";
    $select_emp_by_id = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_emp_by_id)) {
       $emp_id             = $row['e_id'];
        $emp_name          = $row['e_name'];
        $emp_gender        = $row['e_gender']; 
        $emp_email         = $row['e_email'];
        $emp_phone         = $row['e_phone'];
        $emp_cat           = $row['c_id'];
        $emp_dob           = $row['e_dob'];
        $emp_address       = $row['e_address'];
        $emp_salary        = $row['e_salary'];
        
         }


    if(isset($_POST['update_post'])) {
        
            $emp_name          = escape($_POST['names']);
            $emp_gender        = escape($_POST['gender']);
            $emp_email         = escape($_POST['email']);
            $emp_phone         = $_POST['phonenumber'];
            $emp_category_id   = escape($_POST['category']);
            $emp_dob           =  $_POST['dob'];
    
            $emp_salary        = $_POST['salary'];
            $emp_address       = escape($_POST['addres1']);


            $query = " UPDATE employee SET " ;
            $query .= "e_name     =  '{$emp_name}' ," ;
            $query .= "e_gender   =  '{$emp_gender}' ," ;
            $query .= "e_email    =  '{$emp_email}' ," ;
            $query .= "e_phone    =  '{$emp_phone}' ," ;
            $query .= "c_id       =   {$emp_category_id} ," ;
            $query .= "e_dob      =  '{$emp_dob}' ," ;
            $query .= "e_address  =  '{$emp_address}' " ;
            $query .= "WHERE e_id = $the_employee_id " ;
                   
            $create_post_query = mysqli_query($connection, $query);  
                
            confirmQuery($create_post_query);
           }






	if (isset($_POST['detail_submit'])) {
		
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
        
        $query = "INSERT INTO patient(p_name,p_gender,p_dob,p_email,p_phone,p_address,d_o_admission) ";
             
	    $query .= "VALUES('{$pat_name}','{$pat_gender}','{$pat_dob}','{$pat_email}','{$pat_phone}','{$pat_address}','{$pat_admission}') "; 
	             
	    $add_patient_query = mysqli_query($connection, $query);  
	    confirmQuery($add_patient_query);
	
	}
 

?> 

















 <form action="" method="post">
          <div class="form-group">
             <label for="select-op">View Room</label>
              <select id="select-op" class="form-control" name="room_name" >
                <?php 

                // $query = "SELECT * FROM employee , categories where cat_id={$the_employee_id} ORDER BY e_id DESC ";
                // $select_employee = mysqli_query($connection,$query);  

                // while($row = mysqli_fetch_assoc($select_employee)) {
                //   echo "<option selected>{$cat_title}</option>";
                // }


                  $query = "SELECT * FROM room";
                  $select_categories = mysqli_query($connection,$query);
                  while($row = mysqli_fetch_assoc($select_categories)) {
                    $room_id = $row['r_id'];
                    $room_name = $row['r_name'];
                    if(isset($_POST['room_submit'])){
                        if($room_name == $_POST['room_name'])
                            echo "<option selected>{$room_name}</option>";
                        else
                            echo "<option>{$room_name}</option>";
                    }
                    else
                        echo "<option>{$room_name}</option>";
                    }


                 ?>
                    
                    
                </select>
          </div>
           <div class="form-group">
              <input class="btn btn-primary" type="submit" name="room_submit" >
          </div>

    </form>







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
					<option selected=""><?php echo "$pat_gender";  ?></option>
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
		    <div class="form-group col-md-4">
		     	<!-- <label for="inputCity">City</label> -->
		     	<input type="number" class="form-control" placeholder="Phone Number" name="phonenumber">
		      		
		    </div>
		      <div class="form-group col-md-4">
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
		    <div class="form-group col-md-4">
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
			<button type="submit" class="btn btn-primary" id="btn"  name="detail_submit">Submit
			</button>
		</div>
	</form>