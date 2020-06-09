<?php/*
	Created by Brian Chaves
	Created on June 07, 2020
	Updated on June 09, 2020
*/?>
<div id="nav">
	<img id='nav-img' src="assets/bemo-logo2.png" />
	<!-- This is navagation bar -->
	<img 
		id='nav-bar-hambuger-icon' 
		src='assets/hamburger.svg'  
		onclick='navHambugerIconClick();'
	/>
	<div id="nav-links">
		<a href="index.php">Main</a>
		<a href="contact-us.php">Contact Us</a>
		<?php if($login_user=="" || $login_user=="<Logged Out>") {?>

			<a href="login.php">Log In</a>
		<?php } else { ?>

			<a href="loggingout.php">Log Out</a>
		<?php } ?>
		<?php if (can_edit_page($page_name,$login_user)){?>

			<a href="panel.php?page=<?=$page_name?>">Edit</a>
		<?php } ?>

	</div>
</div>
<script type="text/javascript" src="nav-bar.js"></script> 