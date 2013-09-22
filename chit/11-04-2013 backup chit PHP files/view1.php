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
<link rel="stylesheet" href="print.css" type="text/css" media="print" />
<meta name="keywords" content="keywords,goes,here" />
<link rel="stylesheet" href="andreas07.css" type="text/css" />
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
<h3>Viewing the records</h3>
<br>
<?php
$trans=$_POST['trans'];
if($trans=="month")
{
$date=$_POST['mmonth'].$_POST['myear'];
echo "The records for the month of".$date."<br>";
$date="%".$date;$month="month";
$sql = "SELECT * FROM `transact` WHERE date like '$date' and mode<>'$month' order by date";
}
else
{
$date=$_POST['jday'].$_POST['jmonth'].$_POST['jyear'];
echo "The records for the date=".$date;
$sql="select * from transact where date='$date'";
}
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$k=mysql_query($sql);
$c=mysql_num_rows($k);
if($c==0)
{
 echo "No transaction in this days";
}
else
{
 echo "<table border='1'>";
 echo "<tr><th>Name</th><th>Date</th><th>NumberOfChits</th><th>SelectedChit</th><th>Chit total</th><th>Previous</th><th>Total</th><th>Int PAY</th><th>Int Coll</th><th>Star</th><th>LIC</th><th>Amount</th><th>Balance</th><th>Mode</th></tr>";
 $am=0;
 while($row=mysql_fetch_array($k))
{ 
 $id=$row['id'];
 echo "<tr><td>".chusers($id,"name")."</td>";
 echo "<td>".$row['date']."</td>";
 echo "<td>".$row['nchits']."</td>";
 echo "<td>".$row['chitl']."</td>";
 echo "<td>".$row['ctotal']."</td>";
 echo "<td>".$row['prev']."</td>";
 echo "<td>".$row['total']."</td>";
 echo "<td>".$row['intadd']."</td>";
 echo "<td>".$row['intsub']."</td>";
 echo "<td>".$row['star']."</td>";
 echo "<td>".$row['lic']."</td>";
 echo "<td>".$row['amount']."</td>";
 $am+=$row['amount'];
 echo "<td>".$row['newbal']."</td>";
 echo "<td>".$row['mode']."</td></tr>";
 }
 echo "</table>";
 echo "The total Amount".$am;
 }
?>
<form><input type="button" value=" Print this page "
onclick="window.print();return false;" /></form>
<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>