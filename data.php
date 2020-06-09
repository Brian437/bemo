<?php 
/*
	Created by Brian Chaves
	Created on June 06, 2020
	Updated on June 08, 2020
*/


if($_SERVER['HTTP_HOST']=='brianchaves.000webhostapp.com')
{
	//online server
	define('DB_USER','id3825218_admin');
	define('DB_PASSWORD','tqxhY^d68OqlHxM&');
	define('DB_NAME','id3825218_bemo');
}
else//running server on local machine
{
	define('DB_NAME','bemo');
	define('DB_USER','root');
	define('DB_PASSWORD','');
}

define('DB_SERVER_NAME','localhost');
define('TINY_MCE_API_KEY','m4fvwye87rmu3e0vk6i1irsciqf94ejx3ig2qqr8ucwx7shb');
define('SECONDS_IN_DAY',60*60*24);
define('LOGIN_REQUIRED',1);

?>