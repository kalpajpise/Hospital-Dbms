<?php
 	if (isset($_GET['edit'])) {
 		$pat_id = $_GET['edit'];
 		
        $query = "UPDATE patient SET amt = 100 where p_id = $pat_id ";
        $patient_amt_done = mysqli_query($connection,$query);
        if (!$patient_amt_done) {
        	die("Not Deleted " . mysqli_error($patient_amt_done));


		}
        header("Location: patient.php");
  	}
?>