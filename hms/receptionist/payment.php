<?php include"include/recep_header.php" ?>
<?php include"functions.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'include/recep_navigation.php';  ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Payment
                            <small></small>
                        </h1>
                    </div>
                </div>
      

                <form action="" method="post">
                    <div class="form-group">
                        <label for="pat_id">Patient Id</label>
                        <input type="text" class="form-control" name="pat_id">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit_pat" value="Search">
                    </div>

                </form>




                <table class="table table-striped">
                  <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">DoB</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Consults</th>
                            <th scope="col">Room</th>
                            <th scope="col">Amount</th>
                       </tr>
                    </thead>
                  <tbody>
                <?php 


                    if (isset($_POST['submit_pat'])) {
                        $pat_id = $_POST['pat_id'];
                       

                        
                    $query = "SELECT * FROM employee e , consults c, patient p , room ro NATURAL JOIN room_patient rp where p.p_id = rp.p_id  AND e.e_id = c.e_id AND c.p_id=p.p_id AND p.mask_del_pat = 0 AND p.p_id = $pat_id";
                    $select_patient = mysqli_query($connection,$query); 
                    confirmQuery($select_patient);

                    while($row = mysqli_fetch_assoc($select_patient)) {
                        $pat_id            = $row['p_id'];
                        $pat_name          = $row['p_name'];
                        $pat_gender        = $row['p_gender']; 
                        $pat_dob           = $row['p_dob'];
                        $pat_email         = $row['p_email'];
                        $pat_phone         = $row['p_phone'];
                        $pat_address       = $row['p_address'];
                        $pat_room          = $row['r_name'];
                        $pat_consults      = $row['e_name'];
                        $pat_amt           = $row['amt'];
                        


                        echo "<tr>";
                        echo "<td>$pat_id</td>";
                        echo "<td>$pat_name</td>";
                        echo "<td>$pat_gender</td>";
                        echo "<td>$pat_dob</td>";
                        echo "<td>$pat_email</td>";
                        echo "<td>$pat_phone</td>";
                        echo "<td>$pat_address</td>";
                        echo "<td>$pat_consults</td>"; 
                        echo "<td>$pat_room</td>"; 
                        echo "<td>$pat_amt</td>"; 
                        echo "</tr>";

                }



        
               
            }
            
                     if (isset($_POST['submit_pay'])) {

                    
                        $query = "UPDATE patient SET mask_del_pat = 1 , amt = 0 where p_id = $pat_id ";
                        $emplyoee_delete = mysqli_query($connection,$query);
                        if (!$emplyoee_delete) {
                            die("Not Deleted ");
                        }
                        
                   
                    }

         ?>

         </tbody>
    </table>
                <form action="" method="post">
                    <div class="form-group">
                        <input class="btn btn-primary"  style="width: 70px;" type="submit" name="submit_pay" value="Pay">
                    </div>

                </form>






            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include 'include/recep_footer.php'; ?>
