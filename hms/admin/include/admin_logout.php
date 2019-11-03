<?php
	ob_start();
	session_start();

	$_SESSION['e_id'] = null ;
    $_SESSION['username'] = null;
    $_SESSION['errmsg'] = null;


    header("Location: ../../login_admin.php");

?>