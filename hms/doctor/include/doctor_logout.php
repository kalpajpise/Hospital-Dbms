<?php
	ob_start();
	session_start();

	$_SESSION['e_id'] = null ;
    $_SESSION['username'] = null;
    $_SESSION['errmsg'] = null;
    $_SESSION['login_name'] = null;
    $_SESSION['pat_prescribe_id']=nill;


    header("Location: ../../../index.php");

?>