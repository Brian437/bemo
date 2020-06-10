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
	<img src="<?=$image_url?>" />

	<?php echo $content ?>

	<form id='contact-us-form'>
		Name:
		<input 
			type="text"
			name="user-name"
			id='user-name' 
		>
		Email Address:
		<input 
			type="text"
			id='user-email'
			name='user-email'
		>
		How can We help you
		<textarea
			id='how-can-we-help'
			name='how-can-we-help'
		></textarea>
		<input 
			type="submit" 
			name="btn-submit"
			id='btn-submit'
			value="Submit" 
		>
	</form>



	<p>Note: If you are having difficulties with our contact us form above, send us an email to info@bemoacademicconsulting.com (copy & paste the email address)
	</p>
	<?php include 'part-footer.php' ?>
</body>
</html>