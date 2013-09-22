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
<a href="adduser.php">Add new User</a> 
<a href="addchit.php">Add Chit</a> 
<a href="chitselect.php">Chit Select</a> 
<a href="pay.php">PayAmount</a> 
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
<h3>Delete the Chit values</h3>
<br>
<hr>
<?php
mysql_connect("127.0.0.1".""."");
mysql_select_db("test");
$cname=$_POST['cname'];
$date=$_POST['jday'].$_POST['jmonth'].$_POST['jyear'];
  $sql="delete from addchit where cname='$cname'";
  mysql_query($sql);
  $sql="delete from selchits where cname='$cname'";
  mysql_query($sql);
  $sql="insert into mchit values('$cname',0000,'$date')";
  mysql_query($sql);
  echo "<h3 color=blue>Chit Deleted Successfully...</h3>";
  $sql="select * from halves where chit='$cname'";
  $k=mysql_query($sql);
  if(mysql_num_rows($k)==1)
  {
    while($row=mysql_fetch_array($k))
	{
	 $cname=$row['half'];
	
	}
	$sql="delete from addchit where cname='$cname'";
  mysql_query($sql);
  $sql="delete from selchits where cname='$cname'";
  mysql_query($sql);
  $sql="insert into mchit values('$cname',0000,'$date')";
  mysql_query($sql);
  }
  $sql="select * from halves where half='$cname'";
  $k=mysql_query($sql);
  if(mysql_num_rows($k)==1)
  {
    while($row=mysql_fetch_array($k))
	{
	 $cname=$row['chit'];
	
	}
    $sql="delete from addchit where cname='$cname'";
  mysql_query($sql);
  $sql="delete from selchits where cname='$cname'";
  mysql_query($sql);
  $sql="insert into mchit values('$cname',0000,'$date')";
  mysql_query($sql);
  }
?>
<h4>NOTE:</h4>The value changed is independent of Month transaction..<br>
<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>