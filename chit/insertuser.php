<?php
session_start();
if(!isset($_SESSION['user']))
header("location:index.php");
?><!DOCTYPE html>
<html>
<head>
<title>Add User</title>
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
<a class="active" href="adduser.php">Add New User</a> 
<a href="addchit.php">Add Chit</a> 
<a href="chitselect.php">Chit Select</a> 
<a href="pay.php">Pay Amount</a> 
<a href="view.php">View</a> 
<a href="monthly.php">Month Transaction</a>
<a href="logout.php">Logout</a>
<a href="contact.php">Contact</a>
</div>
<h3>Version info:</h3>
<p>v1.1 (Jan 28, 2013)</p>
</div>
<div id="content">
<h1> Add User</h1>
<h3>Add new user</h3>

<?php
$name=strtoupper($_POST['uname']);
$prof=$_POST['proff'];
$mob1=$_POST['mob1'];
if(!empty($_POST['mob2']))
$mob2=$_POST['mob2'];
else
$mob2=$mob1;
$email=$_POST['emailid'];
$date=$_POST['jday'].$_POST['jmonth'].$_POST['jyear'];
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$sql="insert into chusers(name,prof,mob1,mob2,email,date) values('$name','$prof','$mob1','$mob2','$email','$date')";
mysql_query($sql);
$k=mysql_query("select * from chusers");
while($row=mysql_fetch_array($k))
{
 $id=$row['id'];
}
echo "<h4>The Updated values are..</h4><br>";
echo "<table border=0>";
echo "<tr><td><b>Id</td><td>".$id."</td></tr>";
echo "<tr><td><b>Name</td><td>".$name."</td></tr>";
echo "<tr><td><b>Profession</td><td>".$prof."</td></tr>";
echo "<tr><td><b>Mobile-1</td><td>".$mob1."</td></tr>";
echo "<tr><td><b>Mobile-2</td><td>".$mob2."</td></tr>";
echo "<tr><td><b>Email</td><td>".$email."</td></tr>";
echo "<tr><td><b>Date</td><td>".$date."</td></tr>";
$sql="insert into transaction(id) values('$id')";
mysql_query($sql);
?></table>
<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>