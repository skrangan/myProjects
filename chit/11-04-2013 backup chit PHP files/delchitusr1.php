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
<h1>Month Transaction</h1>
<h3>Monthend Work</h3>
<br>
<?php
$id=$_POST['id'];
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$sql="select * from chusers where id='$id'";
$k=mysql_query($sql);
echo "<table border='0'>";
while($row=mysql_fetch_array($k))
{
echo "<tr><td>Customer ID:</td><td>".$row['id']."</td></tr>";
echo "<tr><td>Customer Name:</td><td>".$row['name']."</td></tr>";
echo "<tr><td>Proffession:</td><td>".$row['prof']."</td></tr>";
echo "<tr><td>Mobile1:</td><td>".$row['mob1']."</td></tr>";
echo "<tr><td>Joined Date:</td><td>".$row['date']."</td></tr>";
echo "<tr><td>Email:</td><td>".$row['email']."</td></tr>";
}echo "</table>";

$sql="select * from selchits where id='$id'";
$k=mysql_query($sql);
$c=mysql_num_rows($k);
if($c==0)
{
 echo "<br><br>No Chits have been Added";
}
else
{echo "<form action=delchitusr2.php method=POST>";
echo "<input type=hidden name=id value=".$id.">"; 
echo "<br><table border ='0'><tr><td>Remove Chits:</td><td></td></tr>";
while($row=mysql_fetch_array($k))
{
echo "<tr><td></td><td><input type=checkbox name=chits[] value=".$row['cname'].">:".$row['cname']."<td></tr>";
}echo "</table>";echo "<input type=submit value=Remove></form>";
}
?>

<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>