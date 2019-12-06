<?php

    if(isset($_GET['edit'])){
    
    $the_patient_id =  escape($_GET['edit']);

    }


    $query = "SELECT * FROM patient WHERE p_id = $the_patient_id  ";
    $select_pat_by_id = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_pat_by_id)) {
       $emp_id             = $row['p_id'];
        $emp_name          = $row['p_name'];
        $emp_gender        = $row['p_gender']; 
        $emp_email         = $row['p_email'];
        $emp_phone         = $row['p_phone'];
        $emp_dob           = $row['p_dob'];
        $emp_address       = $row['p_address'];
        
         }


    if(isset($_POST['update_post'])) {
        
            $emp_name          = escape($_POST['names']);
            $emp_gender        = escape($_POST['gender']);
            $emp_email         = escape($_POST['email']);
            $emp_phone         = $_POST['phonenumber'];
            $emp_dob           =  $_POST['dob'];
    
            $emp_address       = escape($_POST['addres1']);


            $query = " UPDATE patient SET " ;
            $query .= "p_name     =  '{$emp_name}' ," ;
            $query .= "p_gender   =  '{$emp_gender}' ," ;
            $query .= "p_email    =  '{$emp_email}' ," ;
            $query .= "p_phone    =  '{$emp_phone}' ," ;
            $query .= "p_dob      =  '{$emp_dob}' ," ;
            $query .= "p_address  =  '{$emp_address}' " ;
            $query .= "WHERE p_id = $the_patient_id " ;
                   
            $create_post_query = mysqli_query($connection, $query);  
                
            confirmQuery($create_post_query);
            header("Location: include/view_patient.php" );
           }

      // header("Location: ./index.php" )



?>


<h2 id="main_header">Edit the details</h2>
  <form id="form" method="post" action="">
    <div class="form-row">
      <div class="form-group col-md-12">
          <!-- <label for="Name">Name</label> -->
              <input type="text" class="form-control" id="FName" placeholder="First Name" name="names" value="<?php echo "$emp_name"?>">
      </div>
    <div class="form-row">
      <div class="form-group col-md-6" >
        <select id="select-op" class="form-control" placeholder name="gender">
          <option selected=""><?php echo "$emp_gender";  ?></option>
          <option>Male</option>
          <option>Female</option>
          <option>Others</option>
        </select>
        
      </div>
      <div class="form-group col-md-6">
          <!-- <label for="inputEmail4">Email</label> -->
            <input type="email" class="form-control" id="Email" placeholder="Email" name="email" value="<?php echo "$emp_email"  ?>">
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
          <!-- <label for="inputCity">City</label> -->
          <input type="number" class="form-control" placeholder="Phone Number" name="phonenumber" value="<?php echo "$emp_phone" ?>">
              
        </div>
                  
        <div class="form-group col-md-3">
            <!-- <label for="inputZip">Zip</label> -->
            <input type="date" class="form-control"  placeholder="DD-MM-YYYY" name="dob" value="<?php echo "$emp_dob" ?>">
              
        </div>
     </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <!-- <label for="inputAddress">Address</label> -->
            <input type="text" class="form-control" id="Address1" placeholder="Address Line 1" name="addres1" value="<?php echo "$emp_address" ?>">
      </div>
    </div>
    
    
    <div class="form-row col-md-12">
      <button type="submit" class="btn btn-primary" id="btn"  name="update_post">Submit
      </button>
    </div>
  </form>