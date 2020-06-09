<html>
<head>
	<!--
		Created by Brian Chaves
		Created on June 07, 2020
		Updated on June 07, 2020
	-->
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
</head>
<body>
	<form 
		id="login-form"
		action="logging-in.php"
		method="post" 
	>
		<input type="text" name="username" id="username" placeholder="username">
		<br/>
		<input type="password" name="password" id="password" placeholder="password">
		<br/>
		<input 
			type="button" 
			name="btn-login" 
			id="btn-login" 
			value="Login"
			onclick="btnLoginClick();"
		>
	</form>
</body>
<script type="text/javascript">
	function btnLoginClick()
	{
		document.getElementById('login-form').submit();
	}
</script>
</html>