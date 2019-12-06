<?php
    session_start();
    include '../functions.php';
    $connection = mysqli_connect("localhost", "root", "", "hospital"); 
    if (isset($_SESSION['pat_prescribe_id'])) {

      $pat_id =$_SESSION['pat_prescribe_id']; 
      
      $prescibe_pat = "SELECT * FROM prescribtion WHERE p_id = $pat_id";
      $prescribe_patient_query = mysqli_query($connection, $prescibe_pat);  
      confirmQuery($prescribe_patient_query);
      while ($row = mysqli_fetch_assoc($prescribe_patient_query)){
        print_r($row);
        $prescribe_id = $row['pes_id'];
      }      
   }

   $number = count($_POST["name"]); 
      echo $number;
      echo $prescribe_id ;
      if($number > 0)  
     {  
          for($i=0; $i<$number; $i++)  
          {  

               //if(trim($_POST["name"][$i] != ''))  
               {  
                    $sql = "INSERT INTO  prescibe  VALUES('$prescribe_id' , '".$_POST["name"][$i]."')";  
                    $res = mysqli_query($connection, $sql);  
                    if($res){
                      echo "done";
                    }
                    else{
                      print_r(mysqli_error($connection));
                    }
               }  
          }  
          echo "Data Inserted";  
     }  
     else  
     {  
          echo "Please Enter Again";  
     }  
    
?>