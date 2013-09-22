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
<h3>Payment Slip</h3>
<br>
<hr>
<table border='0'>
<?php
$id=$_POST['id'];
echo "<tr><td><b>Name</td><td>".chusers($id,"name")."</td></tr>";
echo "<tr><td><b>Proffession</td><td>".chusers($id,"proff")."</td></tr>";
echo "<tr><td><b>Number of Chits</td><td>".addchit($id,"count")."</td></tr>";
echo "<tr><td><b>Selected Chits:</td><td></td></tr>";
addchit($id,"chits");
echo "<tr><td><b>Total Chit Value</td><td>".addchit($id,"total")."</td></tr>";
echo "<tr><td><b>Previous Balance</td><td>".transaction($id,"prev")."</td></tr>";
echo "<tr><td><b>Last month Balance</td><td>".transaction($id,"lprev")."</td></tr>";
echo "<tr><td><b>Chits Selected</td><td>".addchit($id,"nchit")."</td></tr>";
if(transaction($id,"ind")==1)
$tot=(addchit($id,"total")+transaction($id,"prev"));
else
$tot=transaction($id,"prev");
echo "<tr><td><b>Total Amount</td><td>".$tot."</td></tr>";
echo "<form action=pay3.php method=POST>";
echo "<input type=hidden name=id value=".$id.">";
echo "<tr><td><b>Interest flow</td><td><input type=radio value=add name=int checked=checked>:Add &nbsp;&nbsp;<input type=radio value=sub name=int>:Sub</td></tr>";
echo "<tr><td><b>Interest Amount</td><td><input type=text name=intamt placeholder=Interest></td></tr>";
echo "<tr><td><b>Star</td><td><input type=text name=star></td></tr>";
echo "<tr><td><b>LIC</td><td><input type=text name=lic></td></tr>";

echo "<tr><td><b>Date</td><td>"; ?><SELECT NAME="jmonth">
<OPTION VALUE="jan">jan
<OPTION VALUE="feb">feb
<OPTION VALUE="mar">mar
<OPTION VALUE="apr">apr
<OPTION VALUE="may">may
<OPTION VALUE="jun">jun
<OPTION VALUE="jul">jul
<OPTION VALUE="aug">aug
<OPTION VALUE="sep">sep
<OPTION VALUE="oct">oct
<OPTION VALUE="nov">nov
<OPTION VALUE="dec">dec
</SELECT><SELECT NAME="jday">
<OPTION VALUE="01">01
<OPTION VALUE="02">02
<OPTION VALUE="03">03
<OPTION VALUE="04">04
<OPTION VALUE="05">05
<OPTION VALUE="06">06
<OPTION VALUE="07">07
<OPTION VALUE="08">08
<OPTION VALUE="09">09
<OPTION VALUE="10">10
<OPTION VALUE="11">11
<OPTION VALUE="12">12
<OPTION VALUE="13">13
<OPTION VALUE="14">14
<OPTION VALUE="15">15
<OPTION VALUE="16">16
<OPTION VALUE="17">17
<OPTION VALUE="18">18
<OPTION VALUE="19">19
<OPTION VALUE="20">20
<OPTION VALUE="21">21
<OPTION VALUE="22">22
<OPTION VALUE="23">23
<OPTION VALUE="24">24
<OPTION VALUE="25">25
<OPTION VALUE="26">26
<OPTION VALUE="27">27
<OPTION VALUE="28">28
<OPTION VALUE="29">29
<OPTION VALUE="30">30
<OPTION VALUE="31">31
</SELECT><SELECT NAME="jyear">
<option value="13">2013</option>
<option value="14">2014</option>
<option value="15">2015</option>
<option value="16">2016</option>
<option value="17">2017</option>
<option value="18">2018</option>
<option value="19">2019</option>
<option value="20">2020</option>
<option value="21">2021</option>
<option value="22">2022</option>
<option value="23">2023</option>
<option value="24">2024</option>
<option value="25">2025</option>
<option value="26">2026</option>
<option value="27">2027</option>
<option value="28">2028</option>
<option value="29">2029</option>
<option value="30">2030</option>
</SELECT></td></tr><tr></tr>
<?php
echo "<tr><td><b>Mode </td><td><input type=radio value=Update name=mode checked=checked>Update</td></tr>";
?>
<tr><td></td><td><input type=submit value=Go!></td></tr>
<tr><td><b>Mode of Payment</td><td><input type=radio value=Cash name=mode>Cash &nbsp;&nbsp;<input type=radio value=Account name=mode>Account &nbsp;<input type=radio value=Cheque name=mode>Cheque &nbsp;</td></tr>

<tr><td><b>Amount</td><td><input type=text name=amount></lic></td></tr>

</table>
<fieldset style="width:280px;">
<legend>If Cheque</legend>
Cheque number:<input type="text" name="cheque"><br>
Bank Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="bank"><br>
Cheque date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="cmonth">
<option value="jan">jan</option>
<option value="feb">feb</option>
<option value="mar">mar</option>
<option value="apr">apr</option>
<option value="may">may</option>
<option value="jun">jun</option>
<option value="jul">jul</option>
<option value="aug">aug</option>
<option value="sep">sep</option>
<option value="oct">oct</option>
<option value="nov">nov</option>
<option value="dec">dec</option>
</select><select name="cday">
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select><select name="cyear">

<option value="13">2013</option>
<option value="14">2014</option>
<option value="15">2015</option>
<option value="16">2016</option>
<option value="17">2017</option>
<option value="18">2018</option>
<option value="19">2019</option>
<option value="20">2020</option>
<option value="21">2021</option>
<option value="22">2022</option>
<option value="23">2023</option>
<option value="24">2024</option>
<option value="25">2025</option>
<option value="26">2026</option>
<option value="27">2027</option>
<option value="28">2028</option>
<option value="29">2029</option>
<option value="30">2030</option></select>
</fieldset>
<fieldset style="width:280px;">
<legend>If Account</legend>
<input type=radio value=6029ICICI name=accno checked="checked">:6029ICICI<br>
<input type=radio value=7404ICICI name=accno>:7404ICICI<br>
<input type=radio value=3324ICICI name=accno>:3324ICICI<br>
</fieldset>
<br>
<input type="submit" name="save"><input type="reset">
</form>
<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>