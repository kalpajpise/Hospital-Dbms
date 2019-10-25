<?php include"admin_header.php" ?>
<?php 
    if (isset($_GET['delete'])) {
        $emp_id = $_GET['delete'];

        $query = "DELETE FROM employee where e_id = $emp_id ";
        $emplyoee_delete = mysqli_query($connection,$query);
        if (!$emplyoee_delete) {
            # code..
            die("Not Deleted ");
        }
        header("Location: ./employee.php");
     }
 ?>
         

    <table class="table table-striped">
      <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Category </th>
            <th scope="col">DoB</th>
            <th scope="col">Address</th>
            <th scope="col">Salary</th>
            <th scope="col">Delete</th>
            <th scope="col">Edit</th>
      </thead>
      <tbody>

  <?php 
    
    $query = "SELECT * FROM employee , categories where cat_id=c_id ORDER BY e_id DESC ";
    $select_employee = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_employee)) {
        $emp_id            = $row['e_id'];
        $emp_name          = $row['e_name'];
        $emp_gender        = $row['e_gender']; 
        $emp_email         = $row['e_email'];
        $emp_phone         = $row['e_phone'];
        $emp_cat           = $row['cat_title'];
        $emp_dob           = $row['e_dob'];
        $emp_address       = $row['e_address'];
        $emp_salary        = $row['e_salary'];


        echo "<tr>";
        echo "<td>$emp_id</td>";
        echo "<td>$emp_name</td>";
        echo "<td>$emp_gender</td>";
        echo "<td>$emp_email</td>";
        echo "<td>$emp_phone</td>";;
        echo "<td>$emp_cat</td>";   
        echo "<td>$emp_dob</td>";
        echo "<td>$emp_address</td>";
        echo "<td>$emp_salary</td>";
        echo "<td><a href='employee.php?delete={$emp_id}'>Delete</a></td>";
        echo "<td><a href='employee.php?source=edit_employee&edit_emp={$emp_id}'>Edit</a></td>";
        echo "</tr>";

        }
    ?>


     


   
    </tbody>
</table>

<?php include"admin_footer.php" ?>
