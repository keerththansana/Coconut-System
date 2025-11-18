
<?php
 include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['stid']) && is_numeric($_POST['stid'])) {
    $no = $_POST['stid'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
     $address = $_POST['aaddress'];
    

    $qry = "UPDATE signup SET susername='$username', semail='$email', spassword='$password', aaddress='$address' WHERE stid = $no";

    $result = @mysql_query($qry);
    if (!$result) {
      die("Error while updating the staff record.");
    }
  }
}

header("Location:staffview.php");
exit;
?>