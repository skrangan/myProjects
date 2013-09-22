<?php
session_start();
if(!isset($_SESSION['user']))
header("location:index.php");
?><!DOCTYPE html>
<html>
<head>
<title>View</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="description goes here" />
<meta name="keywords" content="keywords,goes,here" />
<link rel="stylesheet" href="andreas07.css" type="text/css" />
<link rel="stylesheet" href="print.css" type="text/css" media="print" />
<?php
include "functions.php";
?>
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
<a class="active" href="view.php">View</a> 
<a href="monthly.php">Month Transaction</a>
<a href="logout.php">Logout</a>
<a href="contact.php">Contact</a>
</div>
<h3>Version info:</h3>
<p>v1.1 (Jan 28, 2013)</p>
</div>
<div id="content" class="print">
<h1>View</h1>
<h3>Untransacted Lists</h3>
<br>
<?php
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$sql="select * from transaction where ind='1'";
$k=mysql_query($sql);
$c=mysql_num_rows($k);
if($c!=0)
{
  echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Chits Selected</th><th>Chit Total</th><th>Old Balance</th><th>Total toPay</th></tr>";
  while($row=mysql_fetch_array($k))
  {
    echo "<tr><td>".$row['id']."</td>";
	echo "<td>".chusers($row['id'],"name")."</td>";
	echo "<td>".addchit($row['id'],"nchit")."</td>";
    echo "<td>".addchit($row['id'],"total")."</td>";
	echo "<td>".$row['prev']."</td>";
	echo "<td>".($row['prev']+addchit($row['id'],"total"))."</td></tr>";
  }echo "</table>";
}
?><form><input type="button" value=" Print this page "
onclick="window.print();return false;" /></form>
<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>