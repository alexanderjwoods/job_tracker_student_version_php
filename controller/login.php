<?php
/* ALL GET PAGE FUNCTIONS HERE */
function loginPage(){
	$pageData['base'] = "";
	$pageData['title'] = "Login Page";
	$pageData['heading'] = "Job Tracker Login Page";
	$pageData['nav'] = false;
	$pageData['content'] = file_get_contents('views/admin/login.html');
	$pageData['js'] = "Util^general^login";
	$pageData['security'] = false;

	return $pageData;

}


/* ALL XHR FUNCTIONS HERE */
function login($dataObj){
	require '../classes/Pdo_methods.php';
	$pdo = new PdoMethods();

	/* CHECK IF THE EMAIL EXISTS */
	$sql = "SELECT email, password FROM admin WHERE email = :email";
    $bindings = array(
		array(':email',$dataObj->email,'str'),
	);
    $records = $pdo->selectBinded($sql, $bindings);
    if($records == 'error'){
    	echo 'error^^^There has been and error processing your request';
    }
    /* IF EMAIL AND PASSWORD EXIST THEN ALLOW ACCESS */
    else {
    	if(count($records) != 0){
        	foreach ($records as $row) {
        		if (password_verify($dataObj->password, $row['password'])) {
				    $response = (object) [
				    	'masterstatus' => 'success',
					];
					echo json_encode($response);
				    session_start();
				    $_SESSION["access"] = "approved";
				}
				else {
					$response = (object) [
				    	'masterstatus' => 'error',
				    	'msg' => 'Your login credentials are not correct',
					];
					echo json_encode($response);
					
				} 
        	}
	    }
	    else {
	    	$response = (object) [
			    	'masterstatus' => 'error',
			    	'msg' => 'Your login credentials are not correct',
				];
				echo json_encode($response);
	    }
    }
}

function logout(){
	// Initialize the session.
	// If you are using session_name("something"), don't forget it now!
	session_start();

	// Unset all of the session variables.
	$_SESSION = array();

	// If it's desired to kill the session, also delete the session cookie.
	// Note: This will destroy the session, and not just the session data!
	if (ini_get("session.use_cookies")) {
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000,
	        $params["path"], $params["domain"],
	        $params["secure"], $params["httponly"]
	    );
	}

	// Finally, destroy the session.
	session_destroy();

	header("Location: http://159.203.125.47/cps276/solutions/job_tracker/"); 
}
