<!DOCTYPE html>
<html lang="en">
  <head>
  	<?php
  		include 'master.php';
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
          }
        } else {
          echo "0 results";
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
      <input type='text' value="<?=$page_name?>" id='page-title' name='page-title'>
      <!-- <h2>header Image</h2> -->
      <h2>Content</h2>
      <textarea id="mytextarea" name='mytextarea'><?=$content?></textarea>
      <input type="hidden" id='page' name='page' value="<?=$_GET['page']?>">
      <input type="submit" name="btn-submit" id='btn-submit' value="Submit">
    </form>
  </body>
  <script type="text/javascript">
  </script>
</html>
