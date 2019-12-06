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
            header("Location: include/view_employee.php" )
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
          <!-- <label for="inputState">State</label --><!-- > -->
          <select id="select-op" class="form-control" name="category" >
            <?php 

            // $query = "SELECT * FROM employee , categories where cat_id={$
            //the_employee_id} ORDER BY e_id DESC ";
            // $select_employee = mysqli_query($connection,$query);  

            // while($row = mysqli_fetch_assoc($select_employee)) {
            //   echo "<option selected>{$cat_title}</option>";
            // }


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
            <input type="date" class="form-control"  placeholder="DD-MM-YYYY" name="dob" value="<?php echo "$emp_dob" ?>">
              
        </div>
        <div class="form-group col-md-3">
          <!-- <label for="inputState">State</label --><!-- > -->
          <input type="number" class="form-control" placeholder="Salary" name="salary" value="<?php echo "$emp_salary" ?>">
              
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