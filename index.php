<?php include 'master.php' ?>
<html>

<head>
	<!--
		Created by Brian Chaves
		Created on June 06, 2020
		Updated on June 08, 2020
		Coppied from http://cdainterview.com/
	-->
	<?php
		if(!can_view_page('index',$login_user))
		{
			header('location:login.php');
			?>
				<script type="text/javascript">
					location.replace('login.php');
				</script>
			<?php
			// die();
		}
		$page_name='index';
		// Create connection
		$conn = new mysqli(DB_SERVER_NAME, DB_USER, DB_PASSWORD, DB_NAME);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		$sql = 
			"SELECT * ".
			"FROM `bemo-page` ".
			"WHERE slug = 'index' "
		;
		$result = $conn->query($sql);
		if (!$result) {
			trigger_error('Invalid query: ' . $conn->error);
		}
		if ($result->num_rows > 0) {
		  while($row = $result->fetch_assoc()) {
			$content=$row['Content'];
			$page_title=$row['Title'];
			$image_url=$row['image_url'];
			$no_index=$row['no_index'];
			$meta_title=$row['meta_title'];
			$meta_description=$row['meta_description'];
		  }
		}
		$conn->close();
	?>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

	<?php if($meta_title!=NULL) {?>

		<meta name="application-name" content="<?=$meta_title?>">
	<?php } ?>
	<?php if($meta_description!=NULL) {?>

		<meta name="description" content="<?=$meta_description?>">
	<?php } ?>
	<?php if($no_index) { ?>

		<meta name="robots" content="noindex">
	<?php } ?>
</head>

<body>
	
	<?php include 'part-nav-bar.php' ?>
	<div id='index-page-header' style="background-image: url(<?=$image_url?>);">
		<h1><?=$page_title?></h1>
	</div>
	<?php echo $content ?>
	<?php include 'part-footer.php' ?>
</body>

</html>