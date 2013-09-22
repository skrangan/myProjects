<?php
session_start();
if(!isset($_SESSION['user']))
header("location:index.php");
?><!DOCTYPE html>
<html>
<head>
<title>Add Chit</title>
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
<a href="adduser.php">Add new User</a> 
<a class="active" href="addchit.php">Add Chit</a> 
<a href="chitselect.php">Chit Select</a> 
<a href="pay.php">PayAmount</a> 
<a href="view.php">View</a> 
<a href="monthly.php">Month Transaction</a>
<a href="logout.php">Logout</a>
<a href="contact.php">Contact</a>
</div>
<h3>Version info:</h3>
<p>v1.1 (Jan 28, 2013)</p>
</div>
<div id="content">
<h1>Chit Addition</h1>
<h3>Chit Added</h3>
<br>
<?php
$cname=strtoupper($_POST['cname']);$cvalue=$_POST['cvalue'];
$jdate=$_POST['jday'].$_POST['jmonth'].$_POST['jyear'];
$sql="insert into addchit values('$cname','$cvalue','$jdate')";
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
mysql_query($sql);
$sql="insert into mchit values('$cname','$cvalue','$jdate')";
mysql_query($sql);
$cn=$cname;
$cname=$cname."-half";
$cvalue=$cvalue/2;
$sql="insert into addchit values('$cname','$cvalue','$jdate')";
mysql_query($sql);
$sql="insert into mchit values('$cname','$cvalue','$jdate')";
mysql_query($sql);
$sql="insert into halves values('$cn','$cname')";
mysql_query($sql);
echo "<br> Chit Added Successfully<br>";
echo "<hr>The added chits are...<br>";
$k=mysql_query("select * from addchit");
echo "The total number of Chits are".mysql_num_rows($k);
echo "<br><table border='1' style=width:250px;>";
echo "<tr><th>Chit Name</th><th>Chit Value</th><th>Chit Added Date</th></tr>";
while($row=mysql_fetch_array($k))
{
echo "<tr><td>".$row['cname']."</td><td>".$row['cvalue']."</td><td>".$row['jdate']."</td></tr>";
}
?></table>
<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>