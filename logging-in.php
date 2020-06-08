<html>
<head>
	<?php
		try
		{
			include_once 'master.php';
			// $login_succeeded=true;
			$conn = new mysqli(DB_SERVER_NAME, DB_USER, DB_PASSWORD, DB_NAME);
			// Check connection
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}

			$sql = 
				"SELECT * ".
				"FROM `user` ".
				"WHERE username = '".$_POST['username']."'"
			;
			$result = $conn->query($sql);
			if (!$result) {
			    trigger_error('Invalid query: ' . $conn->error);
			}
			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {
			    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
			    echo '<pre>';
			    print_r($row);
			    echo '</pre>';
			    $db_password=$row['password'];
			    $password_salt=$row['password_salt'];
			  }
			} else {
				throw new Exception("User not found");
			  echo "0 results";
			  // $login_succeeded=false;
			}
			
			// echo $unhased_password;
			// echo "TEST";
			// $conn->close();
			$unhashed_password=crypt($_POST['password'],$password_salt);
			// echo "\$unhashed_password: $unhashed_password";
			if($db_password!=$unhashed_password)
			{
				throw new Exception("Password is incorect", 1);
			}
			$token=random_string(25);

			// setcookie('user',$_POST['username'],time()+SECONDS_IN_DAY*30,'/');
			// setcookie('user-token',$token,time()+SECONDS_IN_DAY*30,'/');
			session_start();
			// store session data
			$_SESSION['user'] =$_POST['username'];
			$SESSION['user-token']=$token;

			$sql = 
				"UPDATE user ".
				"SET `login_token` ='$token' ".
				"WHERE `username` = '".$_POST['username']."';";

			if ($conn->query($sql) === TRUE) {
			  // echo "New record created successfully";
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
			$conn->close();
			header('location:index.php');
			?>
				<script type="text/javascript">
					location.replace('index.php');
				</script>
			<?php
		}
		catch(Exception $e)
		{
			echo "Failed to login<br/>$e";
		}
	?>
</head>
<body>
	<pre>
		<?php print_r($_POST) ?>
	</pre>
</body>
</html>