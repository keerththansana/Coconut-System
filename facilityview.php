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
  </header>
  <p>WELCOME ADMIN</p>
  <div class="container">
    <h1>Facility</h1>

    <table class="custom-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Discription</th>
          
         
        </tr>
      </thead>
      <tbody>
        <?php
     include("config.php");
  
        $qry = "SELECT * FROM facility WHERE fid=fid";

        $result = @mysql_query($qry); 
        if (!$result) {
          die($qry);
        }

        while ($row = mysql_fetch_array($result)) {
          echo '<tr>';
          echo '<td>' . $row[0] . '</td>';
          echo '<td>' . $row[1] . '</td>'; 
          echo '<td>' . $row[2] . '</td>'; 
        
          
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>