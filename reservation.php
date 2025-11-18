<?php
include("config.php");


$name = $_POST['name'];
$email = $_POST['email'];
$mobilenumber = $_POST['contact-number'];
$date = $_POST['date'];
$time = $_POST['time'];
$request = $_POST['special-requests'];


$result=@mysql_query("INSERT INTO reservation(rname,remail,rcontact,rdate,rtime,specialrequest)values('$name','$email','$mobilenumber','$date','$time','$request')");

if(!$result){
die(mysql_error());
}
header("Location: Home.html");
?>