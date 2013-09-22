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
<div id="content">
<h1>View</h1>
<h3>Select Chit View</h3>
<br>
<?php
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$sql="select * from addchit";
$k=mysql_query($sql);
$c=mysql_num_rows($k);
if($c!=0)
{
  echo "<form action=chitview1.php method=POST>Select chit:";
  echo "<select name=chit>";
  while($row=mysql_fetch_array($k))
  {
  echo "<option value=".$row['cname'].">".$row['cname']."</option>";
  }
  echo "</select><input type=submit value=View></form>";
}
?>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>