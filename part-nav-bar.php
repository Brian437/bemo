<?php/*
	Created by Brian Chaves
	Created on June 07, 2020
	Updated on June 07, 2020
*/?>
<div id="nav">
	<img src="assets/bemo-logo2.png" />
	<!-- This is navagation bar -->
	<div id="nav-links">
		<a href="index.php">Main</a>
		<!-- <a href="www.google.com">How To Prepare</a> -->
		<!-- <a href="www.google.com">CDA Interview Questions</a> -->
		<a href="contact-us.php">Contact Us</a>
		<a href="loggingout.php">Log Out</a>
		<?php if (can_edit_page($page_name,$login_user)){?>

			<a href="panel.php?page=<?=$page_name?>">Edit</a>
		<?php } ?>

	</div>
</div>