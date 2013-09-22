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
<h3>Viewing the Current Value of the User</h3>
<br>
<?php
function transacti($id)
{
 $sql="select * from transact where id='$id'";
 $k=mysql_query($sql);
 $c=mysql_num_rows($k);
//$prev=$ctotal=$newbal=$chitl=0;
 while($row=mysql_fetch_array($k))
 {
   $prev=$row['prev'];
   $ctotal=$row['ctotal'];
   $newbal=$row['newbal'];
   $chitl=$row['chitl'];
 }
 if($c!=0)
  echo "<tr><td>".$id."</td><td>".chusers($id,"name")."</td><td>".$prev."</td><td>".$chitl."</td><td>".$ctotal."</td><td><form action=indiv2.php method=POST><input type=hidden name=id value=".$id."><input type=submit value=".$newbal."></form></form></td></tr>";
 
}
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$sql="select * from chusers";
$k=mysql_query($sql);
$c=mysql_num_rows($k);
if($c!=0)
{
echo "<table border='1'><tr><th>Id</th><th>Name</th><th>Previous Balance</th><th>Chit Selected</th><th>Tot Chit Value</th><th>New Balance</th></tr>";
while($row=mysql_fetch_array($k))
{
  transacti($row['id']);
}echo "</table>";}
else
 echo "No transactions took place";
?><form><input type="button" value=" Print this page "
onclick="window.print();return false;" /></form>
<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>