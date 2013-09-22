<?php
session_start();
session_destroy();
?><!DOCTYPE html>
<html>
<head>
<title>Logout</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="description goes here" />
<meta name="keywords" content="keywords,goes,here" />
<link rel="stylesheet" href="andreas07.css" type="text/css" />
<!--[if IE 6]>
<link rel="stylesheet" href="fix.css" type="text/css" />
<![endif]-->
</head>

<body>
<div id="sidebar">
<h1>Chits Management</h1>
<h2>ACE</h2>
<div id="menu">
<a href="menu.php">Menu</a>
<a href="adduser.php">Add New User</a> 
<a href="addchit.php">Add Chit</a> 
<a href="chitselect.php">Chit Select</a> 
<a href="pay.php">Pay Amount</a> 
<a href="view.php">View</a> 
<a href="monthly.php">Month Transaction</a>
<a class="active" href="logout.php">Logout</a>
<a href="contact.php">Contact</a>
</div>
<h3>Version info:</h3>
<p>v1.1 (Jan 28, 2013)</p>
</div>

<div id="content">
<h1>Logout</h1>
<h2>view details</h2>
<br><br><h3>Log Out Successful....</h3>

<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College of Engineering.
</div>
</body>
</html>