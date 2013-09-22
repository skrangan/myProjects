<?php
function chusers($id,$s)
{
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$sql="select * from chusers where id='$id'";
$k=mysql_query($sql);
$c=mysql_num_rows($k);
if($c==0)
{
  $sql="select * from delusers where id='$id'";
  $k=mysql_query($sql);
}
while($row=mysql_fetch_array($k))
{
 $name=$row['name'];
 $proff=$row['prof'];
 $name=$row['name'];
 $email=$row['email'];
 }
switch($s)
{
  case "name":
   return $name;
   break;
  case "proff":
   return $proff;
   break;
  case "email":
   return $email;
   break;
 }
}
function addchit($id,$s)
{
 mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$sql="select * from selchits where id='$id'";
$k=mysql_query($sql);
$c=mysql_num_rows($k);
$total=0;
$nchit="";
switch($s)
{
 case "count":
  return $c;
 break;
 case "chits":
 while($row=mysql_fetch_array($k))
 {
    echo "<tr><td></td><td>".$row['cname']."(".cvalue($row['cname']).")</td></tr>"; 
 }
 break;
 case "total":
 while($row=mysql_fetch_array($k))
 {
   $total+=cvalue($row['cname']);
 }
 return $total;
 break;
case "nchit":
 while($row=mysql_fetch_array($k))
 {
   $nchit=$nchit.",".$row['cname'];
 }
 return $nchit;
 break;
 }
}
function cvalue($s)
{
mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$sql="select * from addchit where cname='$s'";
$k=mysql_query($sql);
while($row=mysql_fetch_array($k))
{
 $value=$row['cvalue'];
}
return $value;
}
function transaction($id,$s)
{
 mysql_connect("127.0.0.1","","");
mysql_select_db("test");
$sql="select * from transaction where id='$id'";
$k=mysql_query($sql);
while($row=mysql_fetch_array($k))
{
 $prev=$row['prev'];
 $ind=$row['ind'];
 $lprev=$row['lprev'];
}
switch($s)
{
case "prev":
 return $prev;
 break;
case "ind":
 return $ind;
 break;
case "lprev":
 return $lprev;
 break;
}
}
function transact($id,$s)
{
 mysql_connect("127.0.0.1","","");
 mysql_select_db("test");
 $k=mysql_query("select * from transact where id='$id'");
 if(mysql_num_rows($k)==0)
  return 0;
 $star=0;$lic=0;$intadd=0;$intsub=0;$amount=0;$balance=0;
 while($row=mysql_fetch_array($k))
 {
    $star+=$row['star'];
    $lic+=$row['lic'];
    $intadd+=$row['intadd'];
    $intsub+=$row['intsub'];
    $amount+=$row['amount'];	
    $balance=$row['newbal'];
 }
 switch($s)
 {
    case "star":
	 return $star;
	 break;
	case "lic": 
      return $lic;break;
    case "intadd":
       return $intadd;break;
    case "intsub":
      return $intsub;break;
    case "amount":
       return $amount;break;
    case "balance":
        return $balance;	break;
 
 }
}
?>