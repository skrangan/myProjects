<?php
session_start();
if(!isset($_SESSION['user']))
header("location:index.php");
?><!DOCTYPE html>
<html>
<head>
<title>View</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="description goes here" />
<link rel="stylesheet" href="print.css" type="text/css" media="print" />
<meta name="keywords" content="keywords,goes,here" />
<link rel="stylesheet" href="andreas07.css" type="text/css" />
<?php
include "functions.php";
function check($id,$date)
{static $ids=array();  static $count=-1;

 for($i=0;$i<=$count;$i++)
 {
   if($ids[$i]!=$id)
    continue;
   else
    return;   
 }
    $ids[++$count]=$id;
    $month="month";
$sql="SELECT * FROM `transact` WHERE id='$id' and date like '$date' and mode<>'$month' order by date";
    $intadd=$intsub=$lic=$star=$amount=$t=0;
	$k=mysql_query($sql);
	$c=mysql_num_rows($k);
	while($row=mysql_fetch_array($k))
	{ $t++;
	  $intadd+=$row['intadd'];
	  $intsub+=$row['intsub'];
	  $lic+=$row['lic'];
	  $star+=$row['star'];
	  $amount+=$row['amount'];
	  if($t==1)
	   {
	    $prev=$row['prev'];
		$chitl=$row['chitl'];
		$cotal=$row['ctotal'];
	   }
	   if($t==$c)
	     $newbal=$row['newbal'];
	}
  echo "<tr><td>".$id."</td><td>".chusers($id,"name")."(".$c.")</td><td>".$chitl."</td><td>".$cotal."</td><td>".$prev."</td><td>".$intadd."</td><td>".$intsub."</td><td>".$lic."</td><td>".$star."</td><td>".$amount."</td><td>".$newbal."</td></tr>";
  
}
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
<a class="active" href="view.php">View</a> 
<a href="monthly.php">Month Transaction</a>
<a href="logout.php">Logout</a>
<a href="contact.php">Contact</a>
</div>
<h3>Version info:</h3>
<p>v1.1 (Jan 28, 2013)</p>
</div>
<div id="content" class="print">
<h1>View</h1>
<h3>Viewing the records for month</h3>
<br>
<table border='1'>
<tr><th>Id</th><th>Name</th><th>Selchits</th><th>Chit Total</th><th>Prev balance</th><th>Intadd</th><th>Int Sub</th><th>LIC</th><th>Star</th><th>Amount</th><th>Balance</th></tr>
<?php
$month=$_POST['mmonth'];
$year=$_POST['myear'];
$mon=$month.$year;
$date="%".$mon;
$month="month";
$sql="SELECT * FROM `transact` WHERE date like '$date' and mode<>'$month' order by date";
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$k=mysql_query($sql);
if(mysql_num_rows($k)!=0)
{
while($row=mysql_fetch_array($k)) 
{
 check($row['id'],$date);

}
}
?></table>
<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>