<?php include"include/doctor_header.php" ?>
<?php include"functions.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'include/doctor_navigation.php';  ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Doctor
                            <small></small>
                        </h1>
                    </div>
                </div>



               

                 <?php

                if(isset($_GET['source'])){

                $source = $_GET['source'];

                } else {

                $source = '';

                }

                switch($source) {
                    
                    case 'prescribe_pat';
                    
                     include "include/patient_prescribe.php";
                    
                    break; 
                    
                    
                    case 'treatment';
                    
                    include "include/patient_treatment.php";
                    break;
                    
                    default:
                    
                    include "include/view_patient.php";
                    
                    break;
                    
                    
                    
                    
                }
             ?>








            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include 'include/doctor_footer.php'; ?>
