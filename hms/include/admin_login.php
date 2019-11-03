<?php
  include 'config.php';
  ob_start();
  session_start();

  if(isset($_POST['submit'])){
    
    $username_l=$_POST['username'];
    $password_l=$_POST['password'];

    if($username_l && $password_l){

      $username_l=mysqli_real_escape_string($connection,$username_l);
      $password_l=mysqli_real_escape_string($connection,$password_l);

      $query = "SELECT * FROM login WHERE username='{$username_l}' AND l_type = 'admin'";
      $selet_user_query = mysqli_query($connection,$query);
      
      if(!$selet_user_query){
        die("Not query " . mysqli_error($selet_user_query));

      }
      while ($row = mysqli_fetch_assoc($selet_user_query)) {
        $username = $row['username'];
        $password = $row['password'];
        $emp_id   = $row['e_id'];
      }

      if($username_l === $username && $password_l === $password){
        $_SESSION['e_id'] = $emp_id ;
        $_SESSION['username'] = $username;
        header("Location: ../admin/ " );
      } 
      else{
        echo "Invaid ";
        $_SESSION['errmsg'] = "Invalid Username and Password";
        header("Location: ../login_admin.php");
        
      } 
    }

    
    else{
      
       $_SESSION['errmsg'] = "Invalid Username and Password";
        header("Location: ../login_admin.php");
     }
  }
?>
