<?php /*
    $conn = new mysqli("localhost","root","root","gdlwebcamp");
    if ($conn->connect_error){
        echo $error->$con->connect_error;

    }

*/?>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = 123456;
        $dbname ="gdlwebcamp";
     
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
     
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        