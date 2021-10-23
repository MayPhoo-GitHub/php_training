<?php
    $servername = "localhost";
    $username = "root";
    $password = "mayphoowai";
    $dbname = "tutorial8";

    // Create connection
    $link = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE employees (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    position VARCHAR(30) NOT NULL,
    salary INT(32) NOT NULL
    )";

mysqli_query($link, $sql);

?>