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
<a class="active" href="adduser.php">Edit User Profile</a> 
<a href="addchit.php">Add Chit</a> 
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
<h1> Edit User</h1>
<h3>Edit the User</h3>
<?php
$id=$_POST['id'];
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$sql="select * from chusers where id='$id'";
$k=mysql_query($sql);
while($row = mysql_fetch_array($k))
{
 $id=$row['id'] ;
 $name=$row['name'] ;
  $prof=$row['prof'] ;
 $mob1=$row['mob1'] ;
  $email=$row['email'];

}
?>

<form action="edituser3.php" method="POST">
	<table style="padding:5px;" width="700px">
		<thead><h3>Add User</h3><hr></thead>
		<tr>
			<td>Name</td><td><input type="text" name="uname" id="uname" required="required" value=<?php echo $name; ?>></td>
		</tr>
		
		<tr>
			<td>Mobile Number 1</td>
			<td><input type="text" name="mob1" id="mob1" required="required" value=<?php echo $mob1; ?>></td>
		</tr>
<tr>
			<td>Email</td>
			<td><input type="email" required="required" name="emailid" id="emailid" value=<?php echo $email; ?>></td>
		</tr>	<tr>
			<td></td><input type=hidden name="id" id="id" value=<?php echo $id; ?>>
			<td><input type="submit" value="Submit"><input type="reset" value="Reset" ></td>
		</tr>
		</table>
</form>
<br>
<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>