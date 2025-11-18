<?php
include("config.php");

if (isset($_GET['stid']) && is_numeric($_GET['stid'])) {
    $no = $_GET['stid'];
    
    $qry = "DELETE FROM signup WHERE stid = $no";
    
    $result = @mysql_query($qry);
    if (!$result) {
        die("Error while deleting the staff record.");
    }
}

header("Location: staffview.php");
exit;
?>