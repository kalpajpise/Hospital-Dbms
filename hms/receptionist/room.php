<?php include"include/recep_header.php" ?>
<?php include"functions.php" ?>
<?php 
    
    // $query_no_of = "SELECT COUNT(DISTINCT e_id ) FROM room_patient WHERE r_id = 1 ";
    // $result = mysqli_query($connection,$query_no_of);
    // confirmQuery($result);

 ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'include/recep_navigation.php';  ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Receptionist
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


                            echo "<tr>";
                            echo "<td>$room_id</td>";
                            echo "<td>$room_name</td>";
                            echo "<td>$room_incharge</td>";
                            
                            echo "</tr>";
                        }
                    ?>  



                  </tbody>
                    
                </table>




            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include 'include/recep_footer.php'; ?>

