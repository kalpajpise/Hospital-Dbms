<?php
	ob_start();
	session_start();

	$_SESSION['r_id'] = null ;
    $_SESSION['r_username'] = null;
    $_SESSION['errmsg'] = null;


    header("Location: ../../login_recep.php");

?>