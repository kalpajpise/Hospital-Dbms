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
                            Welcome Admin
                            <small></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->




                <?php

                if(isset($_GET['source'])){

                $source = $_GET['source'];

                } else {

                $source = '';

                }

                switch($source) {
                    
                    default:
                    
                    include "include/view_employee.php";
                    
                    break;
                    
                    
                    
                    
                }
             ?>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include 'include/recep_footer.php'; ?>