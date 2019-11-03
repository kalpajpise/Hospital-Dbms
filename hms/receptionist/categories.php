<?php include "include/recep_header.php" ?>
    
<?php include 'functions.php'; ?>
    <div id="wrapper">
       

        
  

        <!-- Navigation -->
 
        <?php include "include/recep_navigation.php" ?>
        
        
    

<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">


            <h1 class="page-header">
                Welcome Receptionist
                <small></small>
            </h1>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Title</th>
                    </tr>
                </thead>
                <tbody>

            <?php 


                $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<tr>";
                    
                echo "<td>{$cat_id}</td>";
                echo "<td>{$cat_title}</td>";
                echo "</tr>";

                }




            ?>
        

      

        </tbody>
    </table>

                        
                        
                        
                </div>        


            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>

  
        
     
        
        <!-- /#page-wrapper -->
<?php include "include/recep_footer.php" ?>
