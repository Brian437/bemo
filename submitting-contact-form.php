<?php

$to = $_POST['user-email'];
$subject = "Bemo";
// $txt = "Hello world!";
$headers = "From: webmaster@example.com" . "\r\n" .
"CC: somebodyelse@example.com";

echo '<pre>';
print_r($_POST);
echo '</pre>';

$txt="You have submitted a form \r\n".
	"Name: ".$_POST['user-name']."\r\n".
	"Email: ".$_POST['user-email']."\r\n".
	"Message:\r\n".
	$_POST['how-can-we-help'];

mail($to,$subject,$txt,$headers);
header('location:contact-us.php');
?>
<script type="text/javascript">
	location.replace('contact-us.php');
</script>