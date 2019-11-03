<?php include"recep_header.php" ?>



<form action="" method="post">
      <div class="form-group">
         <label for="cat-title">View Category</label>
          <select id="select-op" class="form-control" name="category" >
            <?php 

            // $query = "SELECT * FROM employee , categories where cat_id={$the_employee_id} ORDER BY e_id DESC ";
            // $select_employee = mysqli_query($connection,$query);  

            // while($row = mysqli_fetch_assoc($select_employee)) {
            //   echo "<option selected>{$cat_title}</option>";
            // }


              $query = "SELECT * FROM categories";
              $select_categories = mysqli_query($connection,$query);
              while($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                if(isset($_POST['cat_submit'])){
                    if($cat_title == $_POST['category'])
                        echo "<option selected>{$cat_title}</option>";
                    else
                        echo "<option>{$cat_title}</option>";
                }
                else
                    echo "<option>{$cat_title}</option>";
                }


             ?>
                
                
            </select>
      </div>
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="cat_submit" value="View Category">
      </div>

</form>
         

    <table class="table table-striped">
      <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Category </th>
            <th scope="col">Address</th>
      </thead>
      <tbody>

  <?php 

     if(isset($_POST['cat_submit'])){
        $cat_title = $_POST['category'];


        $query = "SELECT * FROM employee , categories where cat_id=c_id AND cat_title = '{$cat_title}' ORDER BY e_id DESC ";
        $select_employee = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_employee)) {
        $emp_id            = $row['e_id'];
        $emp_name          = $row['e_name'];
        $emp_gender        = $row['e_gender']; 
        $emp_email         = $row['e_email'];
        $emp_phone         = $row['e_phone'];
        $emp_cat           = $row['cat_title'];
        $emp_address       = $row['e_address'];


        echo "<tr>";
        echo "<td>$emp_id</td>";
        echo "<td>$emp_name</td>";
        echo "<td>$emp_gender</td>";
        echo "<td>$emp_email</td>";
        echo "<td>$emp_phone</td>";;
        echo "<td>$emp_cat</td>";   
        echo "<td>$emp_address</td>";
        echo "</tr>";

        }



    }
    else{
    
            $query = "SELECT * FROM employee , categories where cat_id=c_id ORDER BY e_id DESC ";
            $select_employee = mysqli_query($connection,$query);  

            while($row = mysqli_fetch_assoc($select_employee)) {
                $emp_id            = $row['e_id'];
                $emp_name          = $row['e_name'];
                $emp_gender        = $row['e_gender']; 
                $emp_email         = $row['e_email'];
                $emp_phone         = $row['e_phone'];
                $emp_cat           = $row['cat_title'];
                $emp_address       = $row['e_address'];
              


                echo "<tr>";
                echo "<td>$emp_id</td>";
                echo "<td>$emp_name</td>";
                echo "<td>$emp_gender</td>";
                echo "<td>$emp_email</td>";
                echo "<td>$emp_phone</td>";;
                echo "<td>$emp_cat</td>";   
                echo "<td>$emp_address</td>";
                echo "</tr>";

                }
        }
    ?>


     


   
    </tbody>
</table>

<?php include"recep_footer.php" ?>
