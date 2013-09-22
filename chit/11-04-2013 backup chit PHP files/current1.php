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
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$k=mysql_query("select * from chusers order by name");
echo "<table border='1'><tr><th>Id</th><th>Name</th><th>Total Star</th><th>Total LIC</th><th>Interest Add</th><th>Interest Sub</th><th>Amount Paid</th><th>Balance</th></tr>";
$star=0;$lic=0;$intadd=0;$intsub=0;$amount=0;$balance=0;
while($row=mysql_fetch_array($k))
{
 $id=$row['id'];
 echo "<tr><td>".$id."</td>";
 echo "<td>".chusers($id,"name")."</td>";
 echo "<td>".transact($id,"star")."</td>";
 echo "<td>".transact($id,"lic")."</td>";
 echo "<td>".transact($id,"intadd")."</td>";
 echo "<td>".transact($id,"intsub")."</td>";
 echo "<td>".transact($id,"amount")."</td>";
 echo "<td>".transact($id,"balance")."</td></tr>";
 $star+=transact($id,"star");$lic+=transact($id,"lic");$intadd+=transact($id,"intadd");$intsub+=transact($id,"intsub");$amount+=transact($id,"amount");$balance+=transact($id,"balance");
}echo "</table>";
?>
<br>
<?php
echo "<table border=0>";
echo "<tr><td><b>Total Star</td><td>".$star."</td></tr>";
echo "<tr><td><b>Total LIC</td><td>".$lic."</td></tr>";
echo "<tr><td><b>Total Int Add</td><td>".$intadd."</td></tr>";
echo "<tr><td><b>Total Int Sub</td><td>".$intsub."</td></tr>";
echo "<tr><td><b>Total Amount Paid</td><td>".$amount."</td></tr>";
echo "<tr><td><b>Total Balance</td><td>".$balance."</td></tr>";
?></table><form><input type="button" value=" Print this page "
onclick="window.print();return false;" /></form>
<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>