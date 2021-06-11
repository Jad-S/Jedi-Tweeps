<?php
//DB connection script
$hostservername = "db.cs.dal.ca";
$username = "said";
$password = "NDFfYkVRCDxmkqMhnZtv5kiM2";
$dbname = "said";

$dbconnection = new mysqli($hostservername, $username, $password, $dbname);
if ($dbconnection->connect_error) {
    die("<br>Database connection failed<br><br>" . $dbconnection->connect_error);
}
?>