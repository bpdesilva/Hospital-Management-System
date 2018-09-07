<?php 
        session_start();//start session
//validate usertype from the session
if(empty($_SESSION["USERTYPE"]))
{
            header("location: 403.php"); 
}
        session_destroy();//clear sessions
        //remove all details from session 
        unset($_SESSION["USERTYPE"]);
        unset($_SESSION["USERNAME"]);
        unset($_SESSION["USERID"]);
		// Redirect
		header('Location: login.php');
?>