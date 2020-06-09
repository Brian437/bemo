<?php include 'master.php' ?>
<?php 
	// include 'master.php';
	/*
		Created by Brian Chaves
		Created on June 08, 2020
		Updated on June 08, 2020
	*/
	$conn = new mysqli(DB_SERVER_NAME, DB_USER, DB_PASSWORD, DB_NAME);
	session_start();
	$sql = 
		"UPDATE user ".
		"SET login_token = '' ".
		// "WHERE username = '".$_COOKIE['user']."'";
		"WHERE username = '".$_SESSION['user']."'";

	if ($conn->query($sql) === TRUE) {
	  echo "loged out";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	setcookie("user", "", time() - 3600);
	setcookie("user-token", "", time() - 3600);
	$_SESSION['user']="";
	$_SESSION['user_token']="";
	if(LOGIN_REQUIRED)
	{
		$location="login.php";
	}
	else
	{
		$location="index.php";
	}
	header("location:$location");
	?>

		<script type="text/javascript">location.replace('<?=$location?>')</script>
	<?php
?>
<html>
	<head>

	</head>
	<body>
	</body>
</html>