<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
		include 'master.php';

		try
		{
			echo '<pre>';
			print_r($_POST);
			echo '</pre>'; 
			$login_user=login_token();
			if(!can_edit_page($_POST['page'],$login_user))
			{
				throw new Exception('You don\'t have permission to edit page');
			}
			$conn = new mysqli(DB_SERVER_NAME, DB_USER, DB_PASSWORD, DB_NAME);
			// Check connection
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}

			$sql = 
				"UPDATE `bemo-page` ".
				"SET Content = '". mysql_escape($_POST['mytextarea'])."' ".
				"WHERE slug = '".$_POST['page']."'";

			if ($conn->query($sql) === TRUE) {
			  echo "New record created successfully";
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
			header('location:index.php');
		}
		catch(Exception $e)
		{
			echo '<h1>Failed to update</h1>';
			echo '<h2>'.$e->getMessage().'</h2>';
		}
		
	?>
</head>
<body>

</body>
<script type="text/javascript">
	location.replace('<?=$_POST['page']?>.php');
</script>
</html>