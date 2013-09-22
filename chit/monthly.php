<?php
session_start();
if(!isset($_SESSION['user']))
header("location:index.php");
?><!DOCTYPE html>
<html>
<head>
<title>Month Transaction</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="description goes here" />
<meta name="keywords" content="keywords,goes,here" />
<link rel="stylesheet" href="andreas07.css" type="text/css" />
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
<a class="active" href="monthly.php">Month Transaction</a>
<a href="logout.php">Logout</a>
<a href="contact.php">Contact</a>
</div>
<h3>Version info:</h3>
<p>v1.1 (Jan 28, 2013)</p>
</div>
<div id="content">
<h1>Month Transaction</h1>
<h2>Month End Work</h2>
<br>
<ul>
<li><a href="endmonth.php">End the month</a>
<li><a href="editchit.php">Edit Chit values</a>
<li><a href=delchit.php>Delete Chits</a>
<li><a href=delusr.php>Delete Users</a>
<?php //<li><a href=monthend.php>Month End Transaction</a>
?><li><a href=delusrchit.php>Remove Chits from Users</a>
<li><a href="monthstart.php">Start new month</a>
</ul>
<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>