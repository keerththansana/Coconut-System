<?php
session_start();
include("config.php");
$username = $_POST["username"];
$password = $_POST["password"];

$staff_match = "SELECT loginid FROM login WHERE username = '" . $_POST['username'] . "' AND password = '" . $_POST['password'] . "'";
$staff_qry = mysql_query($staff_match);
$staff_num_rows = mysql_num_rows($staff_qry);


$regular_match = "SELECT stid FROM signup WHERE susername = '" . $_POST['username'] . "' AND spassword = '" . $_POST['password'] . "'";
$regular_qry = mysql_query($regular_match);
$regular_num_rows = mysql_num_rows($regular_qry);

if ($staff_num_rows > 0) {
    
    $_SESSION['username'] = $_POST["username"];
    header("Location: reservationview.php");
    exit();
} elseif ($regular_num_rows > 0) {
   
    $_SESSION['username'] = $_POST["username"];
    header("Location: staffview2.php");
    exit();
} else {
    echo "Sorry, there is no username $username with the specified password.";
    echo "Please try again.";
    exit;
}
?>
