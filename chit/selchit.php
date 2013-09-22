<?php
session_start();
if(!isset($_SESSION['user']))
header("location:index.php");
?><!DOCTYPE html>
<html>
<head>
<title>Chit Selection</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="description goes here" />
<meta name="keywords" content="keywords,goes,here" />
<link rel="stylesheet" href="andreas07.css" type="text/css" />
<?php
function check($s,$p)
{
    static $list=array();static $i=0;
   if($p==0)
   {
   
 $list[$i++]=$s;
   }
   else
   {
   for($j=0;$j<$i;$j++)
   {
     if($list[$j]==$s)
	  return 0;
    }
	return 1;
}
	}
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
<a class="active" href="chitselect.php">Chit Select</a> 
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
<h1>Chit Selection</h1>
<h3>Add Chits</h3>
<?php
$id=$_POST['id'];
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$sql="select * from chusers where id='$id'";
$k=mysql_query($sql);
echo "<table border='0'>";
while($row=mysql_fetch_array($k))
{
echo "<tr><td><b>Customer ID</td><td>".$row['id']."</td></tr>";
echo "<tr><td><b>Customer Name</td><td>".$row['name']."</td></tr>";
echo "<tr><td><b>Profession</td><td>".$row['prof']."</td></tr>";
echo "<tr><td><b>Mobile-1</td><td>".$row['mob1']."</td></tr>";
echo "<tr><td><b>Joined Date</td><td>".$row['date']."</td></tr>";
echo "<tr><td><b>Email</td><td>".$row['email']."</td></tr>";
}echo "</table>";
$sql="select * from selchits where id='$id'";
$k=mysql_query($sql);
$c=mysql_num_rows($k);
if($c==0)
{
 echo "<br><br>No Chits have been Added";
 $p=0;
}
else
{
$p=1;
echo "<br><br>".$c." Chits have been already Added<br>";
echo "<table border='0'>";
echo "<tr><td><b>The Added Chits are:</td><td></td></tr>";
while($row=mysql_fetch_array($k))
{
 echo "<tr><td></td><td>".$row['cname']."</td></tr>";
 check($row['cname'],0);
 }echo "</table>";
}
echo "<br><table border ='0'><tr><td><b>Add New Chits</td><td></td></tr>";
$sql="select * from addchit";
$k=mysql_query($sql);
echo "<form action=link.php method=POST>";
echo "<input type=hidden name=id value=".$id.">"; 
if($p==0)
{
while($row=mysql_fetch_array($k))
{
echo "<tr><td></td><td><input type=checkbox name=chits[] value=".$row['cname'].">".$row['cname']."(".$row['cvalue'].")<td></tr>";
}
}
else
while($row=mysql_fetch_array($k))
{
   if(check($row['cname'],1))
   {
     echo "<tr><td></td><td><input type=checkbox name=chits[] value=".$row['cname'].">:".$row['cname']."(".$row['cvalue'].")</td></tr>";
   }
}
?>
<tr><td></td><td><input type=submit value="Submit"><td></tr></table>
</form>
<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>