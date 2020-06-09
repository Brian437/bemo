<?php include 'master.php' ?>
<html>

<head>
    <!--
		Created by Brian Chaves
		Created on June 06, 2020
		Updated on June 07, 2020
		Coppied from http://cdainterview.com/
	-->
	<?php
    	if(!can_view_page('index',$login_user))
    	{
    		header('location:login.php');
    		die();
    	}
    	$page_name='contact-us';

		// Create connection
		$conn = new mysqli(DB_SERVER_NAME, DB_USER, DB_PASSWORD, DB_NAME);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		$sql = 
			"SELECT * ".
			"FROM `bemo-page` ".
			"WHERE slug = 'contact-us'"
		;
		$result = $conn->query($sql);
		if (!$result) {
		    trigger_error('Invalid query: ' . $conn->error);
		}
		if ($result->num_rows > 0) {
		  while($row = $result->fetch_assoc()) {
		    $content=$row['Content'];
		  }
		} else {
		  echo "0 results";
		}
		$conn->close();
	?>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
</head>
<body>
	<?php include 'part-nav-bar.php' ?>
	<?php echo $content ?>
	<?php include 'part-footer.php' ?>
</body>
</html>