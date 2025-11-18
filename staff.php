<?php
 include("config.php");


$name = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['aaddress'];

$result=@mysql_query("INSERT INTO signup(susername,semail,spassword,aaddress)values('$name','$email','$password','$address')");

if(!$result){
die(mysql_error());
}
header("Location: staffview.php");
?>