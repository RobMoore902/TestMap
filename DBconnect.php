<?php
//function to connect to a Database
function Connect()
{
	//database server info goes here
	$connect = mysqli_connect("localhost","root", "password", "lostit");
	if(!$connect)
	{
		//Error message to be displayed
		die('Could not retrieve records from the Lostit Database: '.mysqli_error($db));
	}
	//return connection object
	return $connect;
}

//function to add slashes to any special characters to protect database from injection.
function protect($string){
	$string = trim(strip_tags(addslashes($string)));
	return $string;
}
?>