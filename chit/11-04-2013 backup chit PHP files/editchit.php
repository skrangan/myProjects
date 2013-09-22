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
<h3>Change the Chit values</h3>
<br>
<hr>
Click the change button near the Chit to change..<br><br>
<?php
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$sql="select * from addchit";
$k=mysql_query($sql);
$c=mysql_num_rows($k);
echo "There are ".$c." Active Chits..<br><br>";
echo "<table border='1'><tr><th>Chit Name</th><th>Chit Value</th><th>Chit Added Date</th><th>Change</th></tr>";
while($row=mysql_fetch_array($k))
{
  echo "<tr><td>".$row['cname']."</td>";
  echo "<td>".$row['cvalue']."</td>";
  echo "<td>".$row['jdate']."</td>";
  echo "<td><form action=editchit1.php method=POST><input type=hidden value=".$row['cname']." name=cname><input type=submit value=change></form></tr>";
}echo "</table>";
?>
<br>
<h4>NOTE:</h4>The value change is independent of Month transaction..<br>
<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>