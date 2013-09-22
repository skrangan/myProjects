<?php
$user=$_POST['user'];
$pass=$_POST['pass'];
mysql_connect("localhost","","") or die("cant connect");
mysql_select_db("test") or die ("can't select");

$sql="select * from login where user='$user' and pwd='$pass'";
$r=mysql_query($sql);
$c=mysql_num_rows($r);

if($c==1)
{
header("location:Menu.php");
session_start();
$_SESSION['user']=$user;
}
else
{
header("location:index.html");
}
?>