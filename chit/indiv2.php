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
<h3>Viewing the records</h3>
<br>
<?php
$id=$_POST['id'];
$name=chusers($id,"name");
$prof=chusers($id,"proff");
$sql="select * from transact where id='$id'";
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$k=mysql_query($sql);
echo "<br><table border='0'><tr><td><b>Id</td><td>".$id."</td></tr><tr><td><b>Name</td><td>".$name."</td></tr>";
echo "<tr><td><b>Profession</td><td>".$prof."</td></tr></table>";
echo "The transaction for individual are";
echo "<table border='1'><tr><th>Date</th><th>No. Chits</th><th>Chit List</th><th>Chit Total</th><th>Prev Balance</th><th>Total</th><th>intadd</th><th>intsub</th><th>Star</th><th>LIC</th><th>Amount</th><th>New Balance</th><th>Mode</th><th>Account</th><th>Cheque No</th><th>Cheque Date</th><th>Bank</th></tr>";
while($row=mysql_fetch_array($k))
{
 echo "<tr><td><center><form action=edit.php method=POST><input type=hidden name=tid value=".$row['tid']."><input type=submit value=".$row['date']."></form></center></td>";
 echo "<td><center>".$row['nchits']."</center></td>";
 echo "<td>".$row['chitl']."</td>";
 echo "<td><center>".$row['ctotal']."</td>";
 echo "<td><center>".$row['prev']."</center></td>";
 echo "<td><center>".$row['total']."</center></td>";
 echo "<td><center>".$row['intadd']."</center></td>";
 echo "<td><center>".$row['intsub']."</center></td>";
 echo "<td><center>".$row['star']."</center></td>";
 echo "<td><center>".$row['lic']."</center></td>";
 echo "<td><center>".$row['amount']."</center></td>";
 echo "<td><center>".$row['newbal']."</center></td>";
 echo "<td>".$row['mode']."</td>";
 echo "<td><center>".$row['account']."</center></td>";
 echo "<td><center>".$row['cno']."</center></td>";
 echo "<td><center>".$row['cdate']."</center></td>";
 echo "<td>".$row['bank']."</td></tr>";
}
echo "</table>";

?><form><input type="button" value=" Print this page "
onclick="window.print();return false;" /></form><a href="indiv.php"><input type=button value=back></a>
<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>