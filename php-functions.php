<?php 
/*
	Created by Brian Chaves
	Created on June 06, 2020
	Updated on June 07, 2020
*/
	include_once('data.php');
function random_string($length=20)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_';

    $randstring = '';
    for ($i = 0; $i < $length; $i++) {
        $randstring = $randstring.$characters[rand(0, strlen($characters))];
    }
    return $randstring;
}
function login_token()
{
	global $login_user;
	try
	{
		session_start();
		// if(!isset($_COOKIE['user']) || !isset($_COOKIE['user-token'])) 
		if(!isset($_SESSION['user']) || !isset($_SESSION['user-token'])) 
		
		{
			return '';
			// $login_user="0";
			return null;
		}
		$conn = new mysqli(DB_SERVER_NAME, DB_USER, DB_PASSWORD, DB_NAME);
		$sql = 
			"SELECT * ".
			"FROM `user` ".
			// "WHERE `username` = '".$_SESSION['user']."'"
			"WHERE user_token IS NOT NULL"
		;
		// echo $sql;
		$result = $conn->query($sql);
		// print_r($result);
		if (!$result) {
		    trigger_error('Invalid query: ' . $conn->error);
		    // return '';
		    $GLOBALS['login']="";
		}
		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
		    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
		    // print_r($row);
		    $user_token=$row['login_token'];
		    $user=$row['user'];
		  }
		} else {
		  echo "0 results";
		  // $login_user="0";
		  return null;
		}
		$conn->close();
		return $user;
		// if($_SESSION['user-token']==$user_token)
		// {
		// 	return $_SESSION['user'];
		// }
		// else
		// {
		// 	return null;
		// }
		
	}
	catch(Exception $e)
	{
		// $login_user="0";
		// echo 'error';
		return null;
	}

	// if()
}
function mysql_escape($string)
{
	$new_string=str_replace("'","''",$string);
	return $new_string;
}
function can_edit_page($page,$user)
// function setCookie()
{
	// if($user=='admin')
	// {
		return true;
	// }
	// return false;
}
function can_view_page($page,$user)
{
	// if($user=='admin' || $user=='user')
	// {
		return true;
	// }
	// return false;
}
?>