<?php
include("config.php");

$username=$_POST['username'];
$password=$_POST['password'];



$result=@mysql_query("INSERT INTO facility(facility,discription)VALUES('$username','$password')");

if(!$result){
    die(mysql_error());

}
header("location:facilityinsert.html");
?>