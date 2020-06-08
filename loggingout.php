<?php 
	include 'master.php';
	$conn = new mysqli(DB_SERVER_NAME, DB_USER, DB_PASSWORD, DB_NAME);
	session_start();
	$sql = 
		"UPDATE user ".
		"SET login_token = '' ".
		"WHERE username = '".$_SESSION['user']."'";

	if ($conn->query($sql) === TRUE) {
	  echo "loged out";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	// setcookie("user", "", time() - 3600);
	// setcookie("user-token", "", time() - 3600);
	header('location:login.php');
?>
<html>
	<head>

	</head>
	<body>
	</body>
</html>