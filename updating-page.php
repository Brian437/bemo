<!DOCTYPE html>
<?php include 'master.php' ?>
<html>
<head>
	<title></title>
	<?php
		// include 'master.php';
		/*
			Created by Brian Chaves
			Created on June 07, 2020
			Updated on June 08, 2020
		*/

		try
		{
			// echo '<pre>';
			// print_r($_POST);
			// echo '</pre>'; 
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

			if(isset($_POST['no-index']) && $_POST['no-index']=='no-index')
			{
				$no_index=1;
			}
			else
			{
				$no_index=0;
			}

			$sql = 
				"UPDATE `bemo-page` ".
				"SET Content = '". mysql_escape($_POST['mytextarea'])."', ".
					"Title= '".mysql_escape($_POST['page-title'])."', ".
					"image_url = '".mysql_escape($_POST['header-imgage-url'])."', ".
					"no_index=$no_index, ".
					"meta_title = '".mysql_escape($_POST['meta-title'])."', ".
					"meta_description ='".mysql_escape($_POST['meta-description'])."' ".
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