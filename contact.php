<?php
include("config.php");

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];


$result=@mysql_query("INSERT INTO contact(cname,cemail,csubject,cmessage)values('$name','$email','$subject','$message')");

if(!$result){
die(mysql_error());
}
header("Location:home.html");
?>