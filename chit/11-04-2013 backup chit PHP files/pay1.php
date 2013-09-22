<?php
session_start();
if(!isset($_SESSION['user']))
header("location:index.php");
?><!DOCTYPE html>
<html>
<head>
<title>Pay Amount</title>
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
<a href="adduser.php">Add New User</a> 
<a href="addchit.php">Add Chit</a> 
<a href="chitselect.php">Chit Select</a> 
<a class="active" href="pay.php">Pay Amount</a> 
<a href="view.php">View</a> 
<a href="monthly.php">Month Transaction</a>
<a href="logout.php">Logout</a>
<a href="contact.php">Contact</a>
</div>
<h3>Version info:</h3>
<p>v1.1 (Jan 28, 2013)</p>
</div>
<div id="content">
<h1>Pay Amount</h1>
<h3>Select Customer</h3>
<br>


<?php
$i=$_POST['select']; 
switch($i)
{
case "id":
$id=$_POST['uid'];$sql="select * from chusers where id='$id'";
break;
case "name":
$name=strtoupper($_POST['uname']);$name="%".$name."%";
$sql="select * from chusers where name like '$name' order by name";
break;
case "prof":
$prof=$_POST['proff'];
$sql="select * from chusers where prof='$prof'";
break;
case "mobile":
$mobile=$_POST['umobile'];$sql="select * from chusers where mob1='$mobile'";
break;
case "email":
$email=$_POST['uemail'];$sql="select * from chusers where email='$email'";
break;
case "date":
$date=$_POST['jday'].$_POST['jmonth'].$_POST['jyear'];$sql="select * from chusers where date='$date'";
break;
}
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$r=mysql_query($sql);
$c=mysql_num_rows($r);
if($c==0)
{
 echo "No records found";
}
else
{
  echo "<br><b>There are ".$c." Records<br>";
  $tot1=0;$tot=0;
  echo "<table border='1'>
  <tr><th>ID</th><th>Name</th><th>Profession</th><th>Mobile</th><th>Email</th><th>Date</th><th>Select</th></tr>";
  while($row = mysql_fetch_array($r))
  {
  echo "<tr>";
  echo "<td><b>" . $row['id'] . "</b></td>";
  echo "<td><b>" . $row['name'] . "</b></td>";
  echo "<td><b>" . $row['prof'] . "</b></td>";
  echo "<td><b>" . $row['mob1'] . "</b></td>";
  echo "<td><b>" . $row['email'] . "</b></td>";
  echo "<td>".$row['date']."</td>";
  echo "<td><form action=pay2.php method=POST><input type=hidden name=id value=".$row['id']."><input type=submit value=Payment></form></td></tr>";
 } 
 
echo "</table>";}

?>

<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>