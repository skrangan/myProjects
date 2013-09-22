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
<h3>Select View</h3>
<br>
<?php
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$sql="select * from chusers order by name";
$k=mysql_query($sql);
$c=mysql_num_rows($k);
if($c!=0)
{ $cvalue=$intadd=$intsub=$lic=$star=$amount=$balance=$lprev=0;
  echo "<table border='1'><tr><th>id</th><th>Name</th><th> Chit Selected </th><th>Total Chitvalue</th><th>Last month Balance</th><th>Interest Add</th><th>Interest Sub</th><th>LIC Amount</th><th>Star</th><th>Amount Paid</th><th>Balance</th></tr>";
  while($row=mysql_fetch_array($k))
  {
    echo "<tr><td align=center>".$row['id']."</td>";
	$id=$row['id'];
    echo "<td>".$row['name']."</td>";
    echo "<td align=left>".addchit($row['id'],"nchit")."</td>";
    echo "<td align=center>".addchit($row['id'],"total")."</td>";$cvalue+=addchit($row['id'],"total");
	echo "<td align=center>".transaction($id,"lprev")."</td>";$lprev+=transaction($id,"lprev");
    echo "<td align=center>".transact($row['id'],"intadd")."</td>";$intadd+=transact($row['id'],"intadd");
	echo "<td align=center>".transact($row['id'],"intsub")."</td>";$intsub+=transact($row['id'],"intsub");
	echo "<td align=center>".transact($row['id'],"lic")."</td>";$lic+=transact($row['id'],"lic");
	echo "<td align=center>".transact($row['id'],"star")."</td>";$star+=transact($row['id'],"star");
	echo "<td align=center><b>".transact($row['id'],"amount")."</td>";$amount+=transact($row['id'],"amount");
	echo "<td align=right><form action=indiv2.php method=POST><input type=hidden name=id value=".$id."><input type=submit value=".transact($row['id'],"balance")."></form></td></tr>";$balance+=transact($row['id'],"balance");
  }echo "</table>";
?>
  <?php
echo "<table border=0>";
echo "<tr><td><b>Total Chit Value</td><td>".$cvalue."</td></tr>";
echo "<tr><td><b>Last month Balance amount</td><td>".$lprev."</td></tr>";
echo "<tr><td><b>Total Interest Add</td><td>".$intadd."</td></tr>";
echo "<tr><td><b>Total Interest Sub</td><td>".$intsub."</td></tr>";
echo "<tr><td><b>Total LIC</td><td>".$lic."</td></tr>";
echo "<tr><td><b>Total Star</td><td>".$star."</td></tr>";
echo "<tr><td><b>Total Amount Paid</td><td>".$amount."</td></tr>";
echo "<tr><td><b>Total Balance</td><td>".$balance."</td></tr>";
?></table>
  <?php
  }
?><form><input type="button" value=" Print this page "
onclick="window.print();return false;" /></form>
<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>