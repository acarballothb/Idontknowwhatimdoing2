<?php

function im_logged()
{
    @session_start();
    
	if (!isset($_SESSION['USER_ID'])) 
		return false; 
	if (!($_SESSION['USER_NAME'])) 
		return false; 
	
    //ALL OK- CAN ENTER
    return true;
}

function logout()
{
	@session_start();
    session_destroy();
	unset($_SESSION); 
    return true;
}

function connectToDBBBlink()
{
	$servername = 'thunderbqthunder.mysql.db';
	$username = 'thunderbqthunder';
	$password = 'Razorsedge90';
	$dbname = 'thunderbqthunder';
	$now = new DateTime();
	


	$conn = mysql_connect($servername,$username,$password);
	if (!$conn)
	{
		die('Could not connect: ' . mysql_error());
	}
	$con_result = mysql_select_db($dbname, $conn);
	if(!$con_result)
	{
		die('Could not connect to specific database: ' . mysql_error());	
	}
	return $con_result;
}

function escapeInjecton( $text )
{
	$link = connectToDBBBlink();
	$editedText = mysqli_real_escape_string($link, $text);
	
	return $editedText;

}
				
?>