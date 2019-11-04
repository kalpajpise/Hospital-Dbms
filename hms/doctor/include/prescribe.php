<?php
    $connection = mysqli_connect("localhost", "root", "", "hospital"); 
    if (isset($_SESSION['pat_prescribe_id'])) {
      $pat_id =$_SESSION['pat_prescribe_id']; 
      $prescibe_pat = "SELECT * FROM prescribtion WHERE p_id = $pat_id";
      $prescibe_patient_query = mysqli_query($connection, $prescibe_pat);  
      confirmQuery($prescribe_patient_query);
      while ($row = mysqli_fetch_assoc($prescribe_patient_query) {
          $prescribe_id = $row['pes_id'];
      }
   }


    $number = count($_POST["name"]);  
    if($number > 0)  
   {  
        for($i=0; $i<$number; $i++)  
        {  
             if(trim($_POST["name"][$i] != ''))  
             {  
                  $sql = "INSERT INTO prescribe VALUES( $prescribe_id  '".mysqli_real_escape_string($connect, $_POST["name"][$i])."')";  
                  mysqli_query($connection, $sql);  
             }  
        }  
        echo "Data Inserted";  
   }  
   else  
   {  
        echo "Please Enter Again";  
   }  
    
?>