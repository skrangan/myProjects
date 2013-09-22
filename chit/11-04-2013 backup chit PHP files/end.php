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
<fieldset><h3>Month End Transaction Successfull</h3></fieldset>
<?php
include "functions.php";
function untransact($id,$date)
{
 $prev=transaction($id,"prev");
 $total=addchit($id,"total");
 $nchit=addchit($id,"nchit");
 $newprev=$prev+$total;
 $count=addchit($id,"count");
 $sql="update transaction set prev='$newprev',lprev='$newprev' where id='$id'";
 mysql_query($sql);
 $mnth="month";
 $sql="insert into transact(id,date,ctotal,prev,newbal,mode,chitl,nchits) values('$id','$date','$total','$prev','$newprev','$mnth','$nchit','$count')";
 mysql_query($sql);
 }
 function utransact($id,$date)
{
 $prev=transaction($id,"prev");
 $total=addchit($id,"total");
 $nchit=addchit($id,"nchit");
 $count=addchit($id,"count");
 $newprev=$prev;
 $mnth="month";
 $sql="insert into transact(id,date,ctotal,prev,newbal,mode,chitl,nchits) values('$id','$date','$total','$prev','$newprev','$mnth','$nchit','$count')";
 mysql_query($sql);
 }
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$date=$_POST['jday'].$_POST['jmonth'].$_POST['jyear'];
$sql="select * from transaction where ind='1'";
$k=mysql_query($sql);
while($row=mysql_fetch_array($k))
{
 untransact($row['id'],$date);

}
$sql="select * from transaction where ind='0'";
$k=mysql_query($sql);
while($row=mysql_fetch_array($k))
{
 utransact($row['id'],$date);
}
?>

<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>