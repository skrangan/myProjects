<?php
session_start();
if(!isset($_SESSION['user']))
header("location:index.php");
?><!DOCTYPE html>
<html>
<head>
<title>Delete User</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="description goes here" />
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
<a href="view.php">View</a> 
<a class="active" href="monthly.php">Month Transaction</a>
<a href="logout.php">Logout</a>
<a href="contact.php">Contact</a>
</div>
<h3>Version info:</h3>
<p>v1.1 (Jan 28, 2013)</p>
</div>
<div id="content">
<h1>Delete</h1>
<h3>Delete the User</h3>
<br>
<?php
$id=$_POST['id'];
$sql="select * from chusers where id='$id'";
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$k=mysql_query($sql);
while($row=mysql_fetch_array($k))
{
  $name=$row['name'];
  $prof=$row['prof'];
  $mob1=$row['mob1'];
  $mob2=$row['mob2'];
  $email=$row['email'];
  $date=$row['date'];
}
 $sql="insert into delusers values('$id','$name','$prof','$mob1','$mob2','$email','$date')";
 mysql_query($sql);
 $sql="delete from chusers where id='$id'";
 mysql_query($sql);


?>
<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>