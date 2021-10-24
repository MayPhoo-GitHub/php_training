<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'mayphoowai');
    define('DB_NAME', 'tutorial8');

    /* Attempt to connect to MySQL*/
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    //Check Connection
    if($link == false) {
        echo "ERROR: Cound not connect";
    }
?>
