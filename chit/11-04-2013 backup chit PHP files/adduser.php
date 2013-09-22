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

<form action="insertuser.php" method="POST">
	<table style="padding:5px;" height="100px" width="450px">
		<thead><h3>Add User</h3><hr></thead>
		<tr>
			<td>Name</td><td><input type="text" name="uname" id="uname" required="required" placeholder="User Name here"/></td>
		</tr>
		<tr>
			<td>Profession</td>
			<td>
				<input type="radio" name="proff" id="proff" value="ashokemp" checked="checked"/>Ashok Employee &nbsp;&nbsp;
				<input type="radio" name="proff" id="proff" value="Business"/>Bussiness
			</td>
		</tr>
		<tr>
			<td>Mobile Number 1</td>
			<td><input type="text" name="mob1" id="mob1" required="required" placeholder="Mobile Number"/></td>
		</tr>
		<tr>
			<td>Mobile Number 2(Optional)</td>
			<td><input type="text" name="mob2" id="mob2" placeholder="Mobile 2 here"/></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" required="required" name="emailid" id="emailid" placeholder="Email@serv.com"/></td>
		</tr><tr><td>Date</td>
		<td>
		<SELECT NAME="jmonth">
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

<option value="12">2012</option>
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
</SELECT>
		</td></tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Submit"/><input type="reset" value="reset" /></td>
		</tr>
		</table>
</form>
<br><a href="edituser.php">Click to Edit the user Profile</a></br>
<h3>site info</h3>
<p>&copy; 2010-2014 Adhiyamaan College Of Engineering.</p>
</div>
</body>
</html>