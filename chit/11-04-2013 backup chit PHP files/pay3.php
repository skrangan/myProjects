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
<a class="active" href="pay.php">PayAmount</a> 
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
<h3>Payment Slip</h3>
<hr>
<table border='0'>
<?php
$id=$_POST['id'];
$date=$_POST['jday'].$_POST['jmonth'].$_POST['jyear'];
$flow=$_POST['int'];
$intamount=$_POST['intamt'];
$star=$_POST['star'];
$lic=$_POST['lic'];
$amount=$_POST['amount'];
$mode=$_POST['mode'];
echo "<tr><td><b>Name</td><td>".chusers($id,"name")."</td></tr>";
echo "<tr><td><b>Profession</td><td>".chusers($id,"proff")."</td></tr>";
echo "<tr><td><b>Number of Chits</td><td>".addchit($id,"count")."</td></tr>";
$nchits=addchit($id,"count");
$lchit=addchit($id,"nchit");
echo "<tr><td><b>Selected Chits:</td><td></td></tr>";
addchit($id,"chits");
echo "<tr><td><b>Total Chit Value</td><td>".addchit($id,"total")."</td></tr>";
$ctotal=addchit($id,"total");
echo "<tr><td><b>Previous Balance</td><td>".transaction($id,"prev")."</td></tr>";
if(transaction($id,"ind")==1)
$tot=(addchit($id,"total")+transaction($id,"prev"));
else
$tot=transaction($id,"prev");
$prev=transaction($id,"prev");
echo "<tr><td><b>Total Amount</td><td>".$tot."</td></tr>";
echo "<tr><td><b>Date</td><td>".$date."</td></tr>";
echo "<tr><td><b> Interest Flow</td><td>".$flow."</td></tr>";
echo "<tr><td><b> Interest</td><td>".$intamount."</td></tr>";
echo "<tr><td><b> Star</td><td>".$star."</td></tr>";
echo "<tr><td><b> LIC</td><td>".$lic."</td></tr>";
if($flow=="add")
{ $net=$tot+$star+$lic+$intamount;}
else
{ $net=$tot+$star+$lic-$intamount;}
echo "<tr><td><b> Amount </td><td>".$amount."</td></tr>";
$total=$net-$amount;
echo "<tr><td><b> Balance </td><td>".$total."</td></tr>";
echo "<tr><td><b> Payment Mode </td><td>".$mode."</td></tr>";
if($mode=="cheque")
 {
   $cheque=$_POST['cheque'];
   $bank=$_POST['bank']; 
   $cdate=$_POST['cday'].$_POST['cmonth'].$_POST['cyear'];
echo "<tr><td><b> Cheque Number </td><td>".$cheque."</td></tr>";
echo "<tr><td><b> Cheque Bank </td><td>".$bank."</td></tr>";
echo "<tr><td><b> Cheque Date </td><td>".$cdate."</td></tr>";
}
if($mode=="account")
{
 $accno=$_POST['accno'];
echo "<tr><td><b> Account Number </td><td>".$accno."</td></tr>";
}
echo "<tr><th></th><td><a href=pay.php ><input type=button value=newTransaction></a><form action=pay2.php method=POST><input type=hidden name=id value=".$id."><input type=submit value=anotherTransaction></form></td></tr>";
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$sql="update transaction set prev='$total' where id='$id'";
mysql_query($sql);
$sql="update transaction set ind='0' where id='$id'";
mysql_query($sql);
if($flow=="add")
{
switch($mode)
{
 case "cash":
  $sql="insert into transact(id,date,ctotal,intadd,star,lic,prev,total,newbal,mode,nchits,amount,chitl) values('$id','$date','$ctotal','$intamount','$star','$lic','$prev','$tot','$total','$mode','$nchits','$amount','$lchit')";
  mysql_query($sql);break;
 case "account":
  $sql="insert into transact(id,date,ctotal,intadd,star,lic,prev,total,newbal,mode,account,nchits,amount,chitl) values('$id','$date','$ctotal','$intamount','$star','$lic','$prev','$tot','$total','$mode','$accno','$nchits','$amount','$lchit')";  
  mysql_query($sql);break;
 case "cheque":
  $sql="insert into transact(id,date,ctotal,intadd,star,lic,prev,total,newbal,mode,cno,cdate,bank,nchits,amount,chitl) values('$id','$date','$ctotal','$intamount','$star','$lic','$prev','$tot','$total','$mode','$cheque','$cdate','$bank','$nchits','$amount','$lchit')";
  mysql_query($sql);
  break;
  default:
  $sql="insert into transact(id,date,ctotal,intadd,star,lic,prev,total,newbal,mode,nchits,amount,chitl) values('$id','$date','$ctotal','$intamount','$star','$lic','$prev','$tot','$total','$mode','$nchits','$amount','$lchit')";
  mysql_query($sql);break;
 }  
}
else
{switch($mode)
{
 case "cash":
  $sql="insert into transact(id,date,ctotal,intsub,star,lic,prev,total,newbal,mode,nchits,amount,chitl) values('$id','$date','$ctotal','$intamount','$star','$lic','$prev','$tot','$total','$mode','$nchits','$amount','$lchit')";
  mysql_query($sql);
  break;
 case "account":
  $sql="insert into transact(id,date,ctotal,intsub,star,lic,prev,total,newbal,mode,account,nchits,amount,chitl) values('$id','$date','$ctotal','$intamount','$star','$lic','$prev','$tot','$total','$mode','$accno','$nchits','$amount','$lchit')";  
  mysql_query($sql);
  break;
 case "cheque":
  $sql="insert into transact(id,date,ctotal,intsub,star,lic,prev,total,newbal,mode,cno,cdate,bank,nchits,amount,chitl) values('$id','$date','$ctotal','$intamount','$star','$lic','$prev','$tot','$total','$mode','$cheque','$cdate','$bank','$nchits','$amount','$lchit')";
  mysql_query($sql);
  break;
 default:
 $sql="insert into transact(id,date,ctotal,intsub,star,lic,prev,total,newbal,mode,nchits,amount,chitl) values('$id','$date','$ctotal','$intamount','$star','$lic','$prev','$tot','$total','$mode','$nchits','$amount','$lchit')";
  mysql_query($sql);
  break;
  }
}
?>
</table>
<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>