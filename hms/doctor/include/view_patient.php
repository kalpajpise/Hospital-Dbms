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

                <?php 

                    if (isset($_GET['delete'])) {
                        $pat_id = $_GET['delete'];

                        // $query = "DELETE FROM room_patient where p_id = {$pat_id} ";
                        // $patient_room = mysqli_query($connection,$query);
                        // if (!$patient_room) {
                        //     # code..
                        //     die("Not Deleted " . mysqli_error($patient_room));
                        // }

                        $query = "DELETE FROM patient where p_id = {$pat_id} ";
                        $patient_delete = mysqli_query($connection,$query);
                        if (!$patient_delete) {
                            # code..
                            die("Not Deleted " . mysqli_error($patient_delete));
                        }
                        header("Location: patient.php");
                     }
                 ?>






                <?php 

                    if (isset($_GET['delete'])) {
                        $pat_id = $_GET['delete'];

                        $query = "DELETE FROM patient where p_id = $pat_id ";
                        $emplyoee_delete = mysqli_query($connection,$query);
                        if (!$emplyoee_delete) {
                            # code..
                            die("Not Deleted ");
                        }
                        header("Location: patient.php");
                     }
                 ?>

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
                            <th scope="col">Prescribe</th>
                            <th scope="col">Treatment</th>
                       </tr>
                    </thead>
                  <tbody>
                <?php 
                    if (isset($_POST['room_submit'])) {
                        $room_category = $_POST['room_name'];
                         $query = " SELECT * FROM employee e , consults c, patient p , room ro NATURAL JOIN room_patient rp where p.p_id = rp.p_id  AND e.e_id = c.e_id AND c.p_id=p.p_id AND r_name ='{$room_category}' AND p.mask_del_pat = 0 AND c.e_id = {$login_id} AND p.mask_del_pat = 0 ORDER BY p.p_id DESC ";

                
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
                            
                            


                            echo "<tr>";
                            echo "<td>$pat_id</td>";
                            echo "<td>$pat_name</td>";
                            echo "<td>$pat_gender</td>";
                            echo "<td>$pat_dob</td>";
                            echo "<td>$pat_email</td>";
                            echo "<td>$pat_phone</td>";
                            echo "<td>$pat_address</td>";
                            echo "<td><a href='patient.php?source=precibe_pat&prescribe={$pat_id}'>Prescribe</a></td>";
                            echo "<td><a href='patient.php?source=treatment&edit={$pat_name}'>Done</a></td>";
                            
                            echo "</tr>";

                         }


                        
                    }
                    else{
                 
                            $query = "SELECT * FROM employee e , consults c, patient p , room ro NATURAL JOIN room_patient rp where p.p_id = rp.p_id  AND e.e_id = c.e_id AND c.p_id=p.p_id AND p.mask_del_pat = 0 AND c.e_id = {$login_id}  ORDER BY p.p_id DESC ";
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
                                


                                echo "<tr>";
                                echo "<td>$pat_id</td>";
                                echo "<td>$pat_name</td>";
                                echo "<td>$pat_gender</td>";
                                echo "<td>$pat_dob</td>";
                                echo "<td>$pat_email</td>";
                                echo "<td>$pat_phone</td>";
                                echo "<td>$pat_address</td>";  
                                echo "<td><a href='patient.php?source=prescribe_pat&pat_id={$pat_id}'>Prescribe</a></td>";
                                echo "<td><a href='patient.php?source=treatment&edit={$pat_id}'>Done</a></td>";
                                echo "</tr>";

                        }
                    }


                 ?>

                 </tbody>
            </table>
