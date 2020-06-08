<html>

<head>
    <!--
		Created by Brian Chaves
		Created on June 06, 2020
		Updated on June 07, 2020
		Coppied from http://cdainterview.com/
		Time tooken 6.0 hours
	-->
    <?php
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $dbname = "phpmyadmin";

    	include 'master.php';
    	$login_user=login_token();
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
          }
        } else {
          echo "0 results";
        }
        $conn->close();
    ?>
	<link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
</head>
<style>

</style>

<body>
	
    <?php include 'part-nav-bar.php' ?>
    <div id='index-page-header'>
        <h1><?=$page_title?></h1>
    </div>
	<?php echo $content ?>
    <?php include 'part-footer.php' ?>
</body>

</html>