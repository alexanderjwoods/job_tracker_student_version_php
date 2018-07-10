<?php
	/*INITIALIZE THE SESSION.
	IF YOU ARE USING SESSION_NAME("SOMETHING"), DON'T FORGET IT NOW!*/
	session_start();

	/*UNSET ALL OF THE SESSION VARIABLES.*/
	$_SESSION = array();

	/*IF IT'S DESIRED TO KILL THE SESSION, ALSO DELETE THE SESSION COOKIE.
	NOTE: THIS WILL DESTROY THE SESSION, AND NOT JUST THE SESSION DATA!*/
	if (ini_get("session.use_cookies")) {
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000,
	        $params["path"], $params["domain"],
	        $params["secure"], $params["httponly"]
	    );
	}

	/*FINALLY, DESTROY THE SESSION.*/
	session_destroy();

	header("Location: http://159.203.125.47/web250/solutions/job_tracker/"); 
?>