<?php
/*
      Created by Brian Chaves
      Created on June 07, 2020
      Updated on June 08, 2020
*/
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "phpmyadmin";

include 'master.php';
// Create connection
$conn = new mysqli(DB_SERVER_NAME, DB_USER, DB_PASSWORD, DB_NAME);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// $sql = 
// 	"INSERT INTO `test-table` ".
// 	"(`Data1`, `Data2`, `Data3`, `Data4`) ". 
// 	"VALUES (2,'another test data','2020-06-08',65) ";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }



// $sql = "SELECT * FROM `test-table` ";
// $result = $conn->query($sql);
// if (!$result) {
//     trigger_error('Invalid query: ' . $conn->error);
// }
// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//     echo '<pre>';
//     print_r($row);
//     echo '</pre>';
//   }
// } else {
//   echo "0 results";
// }
// $conn->close();



// function random_string($length=20)
// {
//     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_';

//     $randstring = '';
//     for ($i = 0; $i < $length; $i++) {
//         $randstring = $randstring.$characters[rand(0, strlen($characters))];
//     }
//     return $randstring;
// }
// //tMTil3Kes9
// echo crypt("tMTil3Kes9",'RmDkJFSQMr');
//NePA1YPKnZ
// echo crypt("NePA1YPKnZ",'35Ok1Kw3hX');




// $cookie_name = "user";
// $cookie_value = "John Doe";
// setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

// if(!isset($_COOKIE[$cookie_name])) {
//   echo "Cookie named '" . $cookie_name . "' is not set!";
// } else {
//   echo "Cookie '" . $cookie_name . "' is set!<br>";
//   echo "Value is: " . $_COOKIE[$cookie_name];
// }
// $login_user=login_token();
// echo "<h1>LOGIN ".$login_user."</h1>";
// echo '<h1>'.mysql_escape("This is 'Brian'").'</h1>';
// localStorage.setItem(‘name’, ‘Prashant Patil’);
// localStorage.setItem("lastname", "Smith");
// echo '<br/>';


// session_start();
/*session is started if you don't write this line can't use $_Session  global variable*/
// $_SESSION["newsession"]="WHAT!";

echo "<h1>".$_SESSION['newsession']."</h1>";
?>
<pre>
<?php 
	print_r($_SERVER);
	print_r($_COOKIE);
	print_r($_SESSION);
?>
</pre>