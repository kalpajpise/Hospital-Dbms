<?php include"include/admin_header.php" ?>
<?php include"functions.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'include/admin_navigation.php';  ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin
                            <small></small>
                        </h1>
                    </div>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Incharge</th>
                            <th scope="col">No Of Patients</th>
                        </tr>
                  </thead>
                  <tbody>
                    <?php 
                        
                        $query = "SELECT * FROM room NATURAL JOIN employee";
                        $select_room = mysqli_query($connection,$query);
                        confirmQuery($select_room);

                        while ($row = mysqli_fetch_assoc($select_room)) {
                            $room_id        = $row['r_id'];
                            $room_name      = $row['r_name'];
                            $room_incharge  = $row['e_name'];
                            $room_patients  = $row['no_of_patient'];


                            echo "<tr>";
                            echo "<td>$room_id</td>";
                            echo "<td>$room_name</td>";
                            echo "<td>$room_incharge</td>";
                            echo "<td>$room_patients</td>";
                            echo "</tr>";
                        }
                    ?>  



                  </tbody>
                    
                </table>




            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include 'include/admin_footer.php'; ?>

