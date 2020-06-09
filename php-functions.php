<?php 
/*
	Created by Brian Chaves
	Created on June 06, 2020
	Updated on June 09, 2020
*/
	include_once('data.php');
function random_string($length=20)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_';

    $randstring = '';
    for ($i = 0; $i < $length; $i++) {
        $randstring = $randstring.$characters[rand(0, strlen($characters)-1)];
    }
    return $randstring;
}
function login_token()
{
	try
	{
		if(!isset($_SESSION['user']) || !isset($_SESSION['user_token'])) 
		
		{
			return "<Logged Out>";
		}
		$conn = new mysqli(DB_SERVER_NAME, DB_USER, DB_PASSWORD, DB_NAME);
		$sql = 
			"SELECT * ".
			"FROM `user` ".
			"WHERE `username` = '".$_SESSION['user']."'"
		;
		$result = $conn->query($sql);
		if (!$result) {
		    trigger_error('Invalid query: ' . $conn->error);
		    $GLOBALS['login']="";
		}
		if ($result->num_rows > 0) {
		  while($row = $result->fetch_assoc()) {
		    $user_token=$row['login_token'];
		  }
		} else {
		  // 0 results;
		  return "<Logged Out>";
		}
		$conn->close();
		if($_SESSION['user_token']==$user_token)
		{
			return $_SESSION['user'];
		}
		else
		{
			return "<Logged Out>";
		}
		
	}
	catch(Exception $e)
	{
		return "<Logged Out>";
	}
}
function mysql_escape($string)
{
	$new_string=str_replace("'","''",$string);
	return $new_string;
}
function can_edit_page($page,$user)
{
	if($user=='admin')
	{
		return true;
	}
	return false;
}
function can_view_page($page,$user)
{
	if(!LOGIN_REQUIRED)
	{
		return true;
	}
	if($user=='admin' || $user=='user')
	{
		return true;
	}
	return false;
}
?>