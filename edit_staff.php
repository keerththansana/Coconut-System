<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation</title>
  <link rel="stylesheet" href="admin.css">
</head>

<body>
  <header>
    <nav class="navigation">
      <ul>
        <li><a href="reservationview.php">Reservation Details</a></li>
        <li><a href="contactview.php">Contact</a></li>
        <li><a href="staffview.php">Staff</a></li>
        <li><a href="staffinsert.html">Add Staff</a></li>
        <li><a href="facilityinsert.html">Add facility</a></li>
        <li><a href="facilityview.php">facility</a></li>
        <li class="logout"><a href="login.html">Logout</a></li>
      </ul>
    </nav>
 
<h1>Edit Staff Details</h1>

<?php
 include("config.php");
if (isset($_GET['stid']) && is_numeric($_GET['stid'])) {
  $no = $_GET['stid'];
  $qry = "SELECT * FROM stafflog WHERE stid = $no";
  $result = @mysql_query($qry);
  if (!$result) {
    die("Error while fetching staff record.");
  }
  $row = mysql_fetch_array($result);
?>

<form action="update_staff.php" method="post">
  <input type="hidden" name="stid" value="<?php echo $row[0]; ?>">
  <label for="username">Username:</label>
  <input type="text" name="username" value="<?php echo $row[1]; ?>"><br>
  <label for="email">Email</label>
  <input type="email" name="email" value="<?php echo $row[2]; ?>"><br>
  <label for="password">Password:</label>
  <input type="password" name="password" value="<?php echo $row[3]; ?>"><br>
  <label for="address">Address:</label>
  <input type="text" name="aaddress" value="<?php echo $row[4]; ?>"><br>
  <input type="submit" value="Update">
</form>
<?php
}
?>

</body>
</html>