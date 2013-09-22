<!DOCTYPE HTML>
<html>
<head>
<title>Log-In</title>
<meta charset="UTF-8" />
<meta name="Designer" content="Kasthuri Rangan">
<meta name="Author" content="$hekh@r d-Ziner, CSSJUNTION.com">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/structure.css">
</head>

<body>
<form class="box login" action="login.php" method="POST">
	<fieldset class="boxBody">
	  <label>Username</label>
	  <input type="text" name="user" tabindex="1" placeholder="Enter username" required>
	  <label><a href="#" class="rLink" tabindex="5">Forget your password?</a>Password</label>
	  <input type="password" name="pass" tabindex="2" required>
	</fieldset>
	<footer>
	  <label><input type="checkbox" tabindex="3">Keep me logged in</label>
	  <input type="submit" class="btnLogin" value="Login" tabindex="4">
	</footer>
</form>
<footer id="main">
  &copy; 2010-2014 Adhiyamaan College of Engineering.
</footer>
</body>
</html>
