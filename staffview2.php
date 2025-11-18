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
        <li><a>Reservation Details</a></li>
        
       
        <li class="logout"><a href="Login.html">Logout</a></li>
      </ul>
    </nav>
  </header>
  <p>WELCOME STAFF</p>
  <div class="container">
    <h1>RESERVATION</h1>

    <table class="custom-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Date</th>
          <th>Time</th>
          <th >specialrequest</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include("config.php");

        $qry = "SELECT * FROM reservation WHERE rid=rid";

        $result = @mysql_query($qry);
        if (!$result) {
          die($qry);
        }

        while ($row = mysql_fetch_array($result)) {
          echo '<tr>';
          echo '<td>' . $row[0] . '</td>';
          echo '<td>' . $row[1] . '</td>';
          echo '<td>' . $row[2] . '</td>';
          echo '<td >' . $row[3] . '</td>';
          echo '<td >' . $row[4] . '</td>';
          echo '<td >' . $row[5] . '</td>';
          echo '<td >' . $row[6] . '</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>