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
<h3>Month End Transaction</h3>
<br>
<hr>
Change the chit value and then proceed to the newMonth Transaction<br><br>
<fieldset><h3>New Month Transaction Successfull</h3></fieldset>
<?php
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$date=$_POST['jday'].$_POST['jmonth'].$_POST['jyear'];
$jd=$_POST['jmonth'].$_POST['jyear'];
$jd="%".$jd;
$k=mysql_query("select * from addchit");
while($row=mysql_fetch_array($k))
{
  $cname=$row['cname'];
  $cvalue=$row['cvalue'];
  $sql="select * from mchit where date like '$jd' and cname='$cname'";
  $t=mysql_query($sql);
  $c=mysql_num_rows($t);
  if($c==0)
  {
    $sql="insert into mchit values('$cname','$cvalue','$date')";
    mysql_query($sql);
	}
 }
 mysql_query("update transaction set ind='1'");
?>


<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>