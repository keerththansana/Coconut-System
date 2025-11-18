<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Coconut Health Monitoring System</title>
</head>
<body>
    <header>
        <div class="container">
            <h1>Coconut Health Monitoring System</h1>
            <nav>
                <ul>
                    <li><a href="home.html">Overview</a></li>
                    <li><a href="menu.html">Identification</a></li>
                    <li><a href="offers.html">Detection</a></li>
                    <li><a href="facilities.php">Facilities</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="reservation.html">Reservation</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
                <a href="login.html" class="login-button">login</a>
            </nav>
        </div>
    </header>
<div class="container">
        <form method="post" action="facilities.php" class="search-form">
            <div class="center-wrapper">
                <div class="search-container">
                    <input type="text" name="hnic" placeholder="Search Facility" />
                    <button type="submit">Search</button>
                </div>
            </div>
        </form>

        <div class="table-container">
        <?php
     include("config.php");

    $nic=$_POST['hnic'];
    $qry="select* from facility where Facility='$nic'";
    
    $result=@mysql_query($qry);
    if(!$result){
        die($qry);
    }
    print"<table>
      <tr>
        
        <th>Facility</th>
        <th>Descriptions</th>
      </tr>";
    $row=mysql_fetch_array($result);
    do {
      print"<tr>
        
        <td>$row[1]</td>
        <td>$row[2]</td>
      </tr>";
    } while ($row=mysql_fetch_array($result));
    Print"</table>";
  ?>
        </div>
    </div>
   <section id="facility">
    <h2>Facilities</h2>
    <div class="facility-container">

        <div class="facility-item">
            <img src="https://th.bing.com/th/id/R.6dd042d0e41b73bee73e793edbec8e7d?rik=y9m7xVud5vi27w&pid=ImgRaw&r=0" alt="dining Image">
            <h3>healthy coconut</h3>
        </div>
        
       

        <!-- Add more facility items as needed -->

    </div>
</section>
    <footer>
        <div class="container">
            <p>&copy; 2023 Coconut Health Monitoring System. All rights reserved.</p>
        </div>
    </footer>