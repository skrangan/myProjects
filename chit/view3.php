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
<a href="adduser.php">Add new User</a> 
<a href="addchit.php">Add Chit</a> 
<a href="chitselect.php">Chit Select</a> 
<a href="pay.php">PayAmount</a> 
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
<h3>Viewing the Monthly Transaction</h3>
<br>
<?php
$date=$_POST['mmonth'].$_POST['myear'];
echo "The records for the month of<b> ".$date."</b><br>";
$date="%".$date;$m="month";
$sql="select * from transact where date like '$date' and mode='$m'";
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$k=mysql_query($sql);
$c=mysql_num_rows($k);
if($c==0)
{
echo "No Month End Transaction in this month";
}
else
{
 echo "<table border='1'>";
 echo "<tr><th>Name</th><th>Date</th><th>NumberOfChits</th><th>SelectedChit</th><th>Chit total</th></tr>";
 while($row=mysql_fetch_array($k))
{
 $id=$row['id'];
 echo "<tr><td>".chusers($id,"name")."</td>";
 echo "<td>".$row['date']."</td>";
 echo "<td>".$row['nchits']."</td>";
 echo "<td>".$row['chitl']."</td>";
 echo "<td>".$row['ctotal']."</td>";
echo "</tr>";
}echo "</table>";
}
?><form><input type="button" value=" Print this page "
onclick="window.print();return false;" /></form>
<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>