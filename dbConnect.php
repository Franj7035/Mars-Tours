<?php
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "csc356";
    $dbhostname = "localhost:3306";

    $dbconn = mysqli_connect($dbhostname, $dbusername, $dbpassword, $dbname);

    if (!$dbconn){
        echo "Connection failed.";
    }
?>