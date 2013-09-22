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
<h3>Monthend Work</h3>
<br>
<fieldset>
<legend><b>The Procedure</b></legend>
<p> It is a two step process(monthend process and startNewmonth process)</p>
<p> The Month-end transaction starts by clicking the "Month End" button.</p>
<p> It is the first step process</p>
<p> Once the first Process is over the new chit values(if the old chits selected but not altered)
will be added to the previous balance to give the total balance.</p>
<p> After the completion of the MonthTransaction the values of the chits has to be changed or deleted.</p>
<p> Meanwhile the previous month balance(new) will be added to this month prev balance.</p>
<p> Also the previous month untransacted records will have their last months chit value added to their previous balance.</p>
<p> This is <b>Unilateral</b> and <u>cannot be revoked</u> back.</p>
<p> The second button has to be clicked only when the total transactions for this month is completed and the next month transaction has to be started.</p>
<hr>
<?php //Click here to start the Month End process <form action=monthend1.php method=POST><input type=hidden value=end name=new><input type=submit value=MonthEnd></form><hr>
?>Click here to start the New Month process <form action=monthend1.php method=POST><input type=hidden value=start name=new><input type=submit value=NewMonth></form>
</fieldset>
<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>