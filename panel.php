<!DOCTYPE html>
<?php include 'master.php'; ?>
<html lang="en">
	<head>
		<?php
		/*
			Created by Brian Chaves
			Created on June 07, 2020
			Updated on June 08, 2020
		*/
			if(!can_edit_page($_GET['page'],$login_user))
			{
				header('location:login.php');
				?>
					<script type="text/javascript">location.replace('login.php')</script>
				<?php
				die();
			}
			$conn = new mysqli(DB_SERVER_NAME, DB_USER, DB_PASSWORD, DB_NAME);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				$sql = 
						"SELECT * ".
						"FROM `bemo-page` ".
						"WHERE slug = '".$_GET['page']."' "
				;
				$result = $conn->query($sql);
				if (!$result) {
						trigger_error('Invalid query: ' . $conn->error);
				}
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$content=$row['Content'];
						$page_name=$row['Title'];
						$no_index=$row['no_index'];
						$meta_title=$row['meta_title'];
						$meta_description=$row['meta_description'];
						$image_url=$row['image_url'];
					}
				}
				$conn->close();
		?>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<script src="https://cdn.tiny.cloud/1/<?=TINY_MCE_API_KEY?>/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

		<script>
			tinymce.init({
				selector: '#mytextarea',
					height: 500,
			menubar: false,
			plugins: [
				'advlist autolink lists link image charmap print preview anchor',
				'searchreplace visualblocks code fullscreen',
				'insertdatetime media table paste code help wordcount',
				'image code'
			],
			toolbar: 'undo redo | formatselect | ' +
			'bold italic backcolor | alignleft aligncenter ' +
			'alignright alignjustify | bullist numlist outdent indent | ' +
			'removeformat | help | image code',
			content_css: '//www.tiny.cloud/css/codepen.min.css'
			});
		</script>

	</head>

	<body>

		<form 
			id='edit-page-form'
			method="post"
			action='updating-page.php'
		>
			<h2>Title</h2>
			<input 
				type='text' 
				value="<?=$page_name?>" 
				id='page-title' 
				name='page-title'
			>
			<h2>Header Image URL</h2>
			<input 
				type='text' 
				value="<?=$image_url?>" 
				id='header-imgage-url' 
				name='header-imgage-url'
			>
			<h2>
				No Index
				<input 
					type="checkbox" 
					id='no-index' 
					name='no-index'
					value="no-index"
					<?php if($no_index) { ?>

						checked='checked'
					<?php } ?> 

				>
			</h2>
			<h2>Meta Title</h2>
			<input 
				type='text' 
				value="<?=$meta_title?>" 
				id='meta-title' 
				name='meta-title'
			>
			<h2>Meta Description</h2>
			<textarea
				id='meta-description'
				name='meta-description'
				style="
					width: 85%;
					border: none;
					background-color: #cccccc;
					margin-left: auto;
					margin-right: auto;
				"
			><?=$meta_description?></textarea>
			
			<h2>Content</h2>
			<textarea id="mytextarea" name='mytextarea'><?=$content?></textarea>
			<input type="hidden" id='page' name='page' value="<?=$_GET['page']?>">
			<input type="submit" name="btn-submit" id='btn-submit' value="Submit">
		</form>
	</body>
	<script type="text/javascript">
	</script>
</html>
